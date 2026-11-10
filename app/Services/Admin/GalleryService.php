<?php
namespace App\Services\Admin;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\GalleryImage;
use App\Models\GalleryInfo;
use App\Models\GalleryStock;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryService {
    use StoreImageTrait;
    function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Gallery::select('*')->with(['images']);
            if ($q) {
                $query->where(function ($qry) use ($q) {
                    $qry->where('name', 'LIKE', '%' . $q . '%');
                });
            }
            $data['galleries'] = $query->orderBy('id', 'desc')->paginate($per_page);
            $data['galleries']->appends(['q' => $q]);
            $data['count'] = ($page != 1) ? (($per_page * $page) - $per_page + 1) : 1;
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function status($request) {
        try {
            Gallery::where('id', $request->id)
                ->update([
                    $request->field_name => $request->val,
                ]);
            if ($request->val == 1) {
                $response['message'] = 'Gallery enabled successfully.';
            } else {
                $response['message'] = 'Gallery disabled successfully.';
            }
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store($request) {
        try {
            if ($request['id']) {
                $id = $request['id'];
                $gallery = Gallery::findOrFail($id);
                $response['message'] = 'Gallery updated successfully.';
                $response['error'] = null;
                $response['status'] = 202;
            } else {
                $id = 0;
                $gallery = new Gallery;
                $response['message'] = 'Gallery created successfully.';
                $response['error'] = null;
                $response['status'] = 201;
            }
            $slug = getSlug("galleries", "slug", $request['name'], $id);
            $folder = ($request['folder']) ? $request['folder'] : $slug;
            $directory = 'gallery/' . $folder;
            if ($id == 0) {
                Storage::disk('public')->makeDirectory($directory);
            }
            if (preg_match('#^data:image.*?base64,#', $request['image'])) {
                $image = $this->StoreBase64Image($request['image'], '/gallery/' . $folder . '/', $slug);
            } else {
                $image = ($request['image']) ? $request['image'] : (($gallery) ? $gallery->image : null);
            }

            $gallery->name = $request['name'];
            $gallery->slug = $slug;
            $gallery->folder = $folder;
            $gallery->image = $image;
            $gallery->meta_title = $request['meta_title'] ?? $request['name'];
            $gallery->meta_description = $request['meta_description'];
            $gallery->save();
          
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete($request) {
        try {
            $id = $request->id;
            $gallery = Gallery::where('id', $id)->first();
            if ($gallery) {
                $directory = 'gallery/' . $gallery->folder;
                Gallery::where('id', $id)->delete();
                Storage::disk('public')->deleteDirectory($directory);
            }
            $response['message'] = 'Gallery deleted successfully.';
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function imageDelete($request) {
        try {
            $id = $request->id;
            $field_name = $request->field_name;
            $ras = Gallery::where('id', $id)->first();
            if ($ras) {
                Storage::disk('public')->delete('/gallery/' . $ras->folder . '/' . $ras->image);
                $ras->$field_name = '';
                $ras->save();
            }
            $response['message'] = 'Image deleted successfully.';
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    //for more images
    public function saveImages($request) {
        try {
            $gallery_id = $request['gallery_id'];
            $gallery = Gallery::where('id', $gallery_id)->first();
            if (preg_match('#^data:image.*?base64,#', $request['image'])) {
                $image = $this->StoreBase64Image($request['image'], '/gallery/' . $gallery->folder . '/', $gallery->slug . '-' . time());
            } else {
                $image = '';
            }
            $gallery_image = new GalleryImage;
            $gallery_image->gallery_id = $gallery_id;
            $gallery_image->image = $image;
            $gallery_image->order = $gallery->images->count() + 1;
            $gallery_image->save();
            $response['message'] = 'Image added.';
            $response['error'] = false;
            $response['status'] = 201;
            return response()->json($response, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function imagesDelete($request) {
        try {
            $id = $request->id;
            $row = GalleryImage::with('gallery')->where('id', $id)->first();
            Storage::disk('public')->delete('/gallery/' . $row->gallery->folder . '/' . $row->image);
            GalleryImage::where('id', $id)->delete();
            $response['message'] = 'Image deleted successfully.';
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    

    public function imageOrder($request)
    {
        try {
            GalleryImage::where('id', $request->id)->update([$request->order_field_name => $request->order]);
            $response['message'] = 'Order updated successfully';
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

}
