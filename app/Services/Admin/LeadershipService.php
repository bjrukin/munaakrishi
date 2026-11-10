<?php
namespace App\Services\Admin;

use App\Models\Leadership;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LeadershipService {
    use StoreImageTrait;
    public function list($q) {
        try {
            $data['q'] = $q;
            $query = Leadership::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            }
            $data['leaderships'] = $query->orderBy('order', 'asc')->get();
            $data['count'] = 1;
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function status($request) {
        try {
            Leadership::where('id', $request->id)
                ->update([
                    $request->field_name => $request->val,
                ]);
            if ($request->val == 1) {
                $response['message'] = 'Leadership enabled successfully';
            } else {
                $response['message'] = 'Leadership disabled successfully';
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
            Leadership::where('id', $request->id)->update([$request->order_field_name => $request->order]);
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
                $leadership = Leadership::findOrFail($id);
                $response['message'] = 'Leadership updated successfully.';
                $response['error'] = null;
                $response['status'] = 202;
            } else {
                $id = 0;
                $leadership = new Leadership;
                $leadership->order = getMax('leaderships', 'order');
                $response['message'] = 'Leadership created successfully.';
                $response['error'] = null;
                $response['status'] = 201;
            }

            if (isset($request['image']) && ! empty($request['image']) && preg_match('#^data:image.*?base64,#', $request['image'])) {
                $image = $this->StoreBase64Image($request['image'], '/leadership/', Str::slug($request['name']));
            } else {
                $image = ($request['image']) ? $request['image'] : (($leadership) ? $leadership->image : null);
            }

            if (isset($request['mobile_image']) && ! empty($request['mobile_image']) && preg_match('#^data:image.*?base64,#', $request['mobile_image'])) {
                $mobile_image = $this->StoreBase64Image($request['mobile_image'], '/leadership/', 'mobile-'.Str::slug($request['name']));
            } else {
                $mobile_image = ($request['mobile_image']) ? $request['mobile_image'] : (($leadership) ? $leadership->mobile_image : null);
            }
            $leadership->name = $request['name'];
            $leadership->designation = $request['designation'];
            $leadership->summary = $request['summary'];
            $leadership->information = $request['information'];
            $leadership->image = $image;
            $leadership->mobile_image = $mobile_image;
            $leadership->save();
            $response['error'] = null;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete($request) {
        try {
            $id = $request->id;
            $ras = Leadership::where('id', $id)->first();
            if ($ras) {
                Storage::disk('public')->delete('/leadership/' . $ras->image);
                Storage::disk('public')->delete('/leadership/' . $ras->mobile_image);
                Leadership::where('id', $id)->delete();
            }
            $response['message'] = 'Leadership deleted successfully.';
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
            $row = Leadership::where('id', $id)->first();
            if ($row) {
                Storage::disk('public')->delete('/leadership/' . $row->$field_name);
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
