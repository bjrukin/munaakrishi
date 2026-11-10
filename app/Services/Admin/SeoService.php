<?php
namespace App\Services\Admin;

use App\Models\Seo;

class SeoService
{
    public function list($q)
    {
        try {
            $data['q'] = $q;
            $query = Seo::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            }
            $data['seos'] = $query->orderBy('id', 'desc')->get();
            $data['count'] = 1;
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function status($request)
    {
        try {
            Seo::where('id', $request->id)
                ->update([
                    $request->field_name => $request->val,
                ]);
            if ($request->val == 1) {
                $response['message'] = 'Seo enabled successfully';
            } else {
                $response['message'] = 'Seo disabled successfully';
            }
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store($request)
    {
        try {
            if ($request['id']) {
                $id = $request['id'];
                $seo = Seo::findOrFail($id);
                $response['message'] = 'Seo updated successfully.';
                $response['error'] = null;
                $response['status'] = 202;
            } else {
                $id = 0;
                $seo = new Seo;
                $response['message'] = 'Seo created successfully.';
                $response['error'] = null;
                $response['status'] = 201;
            }
            $seo->name = $request['name'];
            $seo->url = $request['url'];
            $seo->meta_title = $request['meta_title'];
            $seo->meta_description = $request['meta_description'];
            $seo->save();
            $response['error'] = null;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete($request)
    {
        try {
            $id = $request->id;
            Seo::where('id', $id)->delete();
            $response['message'] = 'Seo deleted successfully.';
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
