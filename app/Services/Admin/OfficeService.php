<?php
namespace App\Services\Admin;

use App\Models\Office;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Facades\Storage;

class OfficeService {
    use StoreImageTrait;
    function list($q) {
        try {
            $data['q'] = $q;
            $query = Office::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            }
            $data['offices'] = $query->orderBy('order', 'asc')->get();
            $data['count'] = 1;
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function status($request) {
        try {
            Office::where('id', $request->id)
                ->update([
                    $request->field_name => $request->val,
                ]);
            if ($request->val == 1) {
                $response['message'] = 'Office enabled successfully.';
            } else {
                $response['message'] = 'Office disabled successfully.';
            }
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function order($request) {
        try {
            Office::where('id', $request->id)->update([$request->order_field_name => $request->order]);
            $response['message'] = 'Order updated successfully';
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
                $office = Office::findOrFail($id);
                $response['message'] = 'Office updated successfully.';
                $response['error'] = null;
                $response['status'] = 202;
            } else {
                $id = 0;
                $office = new Office;
                $office->order = getMax('offices', 'order');
                $response['message'] = 'Office created successfully.';
                $response['error'] = null;
                $response['status'] = 201;
            }

            $office->name = $request['name'];
            $office->address = $request['address'];
            $office->email = $request['email'];
            $office->phone = $request['phone'];
            $office->save();
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete($request) {
        try {
            $id = $request->id;
            Office::where('id', $id)->delete();
            $response['message'] = 'Office deleted successfully.';
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
