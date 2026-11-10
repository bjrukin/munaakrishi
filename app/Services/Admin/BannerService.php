<?php
namespace App\Services\Admin;

use App\Models\Banner;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerService {
    use StoreImageTrait;
    public function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Banner::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            }
            $data['banners'] = $query->orderBy('id', 'asc')->paginate($per_page);
            $data['banners']->appends(['q' => $q]);
            $data['count'] = ($page != 1) ? (($per_page * $page) - $per_page + 1) : 1;
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function status($request) {
        try {
            Banner::where('id', $request->id)
                ->update([
                    $request->field_name => $request->val,
                ]);
            if ($request->val == 1) {
                $response['message'] = 'Banner enabled successfully';
            } else {
                $response['message'] = 'Banner disabled successfully';
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
                $banner = Banner::findOrFail($id);
                $response['message'] = 'Banner updated successfully.';
                $response['error'] = null;
                $response['status'] = 202;
            } else {
                $id = 0;
                $banner = new Banner;
                $response['message'] = 'Banner created successfully.';
                $response['error'] = null;
                $response['status'] = 201;
            }

            if (isset($request['image']) && ! empty($request['image']) && preg_match('#^data:image.*?base64,#', $request['image'])) {
                $image = $this->StoreBase64Image($request['image'], '/banner/', Str::slug($request['name']));
            } else {
                $image = ($request['image']) ? $request['image'] : (($banner) ? $banner->image : null);
            }
            $banner->name = $request['name'];
            $banner->image = $image;
            $banner->save();
            $response['error'] = null;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete($request) {
        try {
            $id = $request->id;
            $ras = Banner::where('id', $id)->first();
            if ($ras) {
                Storage::disk('public')->delete('/banner/' . $ras->image);
                Banner::where('id', $id)->delete();
            }
            $response['message'] = 'Banner deleted successfully.';
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
            $row = Banner::where('id', $id)->first();
            if ($row) {
                Storage::disk('public')->delete('/banner/' . $row->$field_name);
                $row->$field_name = '';
                $row->save();
            }
            $response['message'] = 'Image deleted successfully.';
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
