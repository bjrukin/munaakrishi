<?php
namespace App\Services\Admin;

use App\Models\Brand;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandService {
    use StoreImageTrait;
    public function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Brand::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            }
            $data['brands'] = $query->orderBy('id', 'asc')->paginate($per_page);
            $data['brands']->appends(['q' => $q]);
            $data['count'] = ($page != 1) ? (($per_page * $page) - $per_page + 1) : 1;
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function status($request) {
        try {
            Brand::where('id', $request->id)
                ->update([
                    $request->field_name => $request->val,
                ]);
            if ($request->val == 1) {
                $response['message'] = 'Brand enabled successfully';
            } else {
                $response['message'] = 'Brand disabled successfully';
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
                $brand = Brand::findOrFail($id);
                $response['message'] = 'Brand updated successfully.';
                $response['error'] = null;
                $response['status'] = 202;
            } else {
                $id = 0;
                $brand = new Brand;
                $response['message'] = 'Brand created successfully.';
                $response['error'] = null;
                $response['status'] = 201;
            }

            if (isset($request['image']) && ! empty($request['image']) && preg_match('#^data:image.*?base64,#', $request['image'])) {
                $image = $this->StoreBase64Image($request['image'], '/brand/', Str::slug($request['name']));
            } else {
                $image = ($request['image']) ? $request['image'] : (($brand) ? $brand->image : null);
            }
            $brand->name = $request['name'];
            $brand->image = $image;
            $brand->save();
            $response['error'] = null;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete($request) {
        try {
            $id = $request->id;
            $ras = Brand::where('id', $id)->first();
            if ($ras) {
                Storage::disk('public')->delete('/brand/' . $ras->image);
                Brand::where('id', $id)->delete();
            }
            $response['message'] = 'Brand deleted successfully.';
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
            $row = Brand::where('id', $id)->first();
            if ($row) {
                Storage::disk('public')->delete('/brand/' . $row->$field_name);
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
