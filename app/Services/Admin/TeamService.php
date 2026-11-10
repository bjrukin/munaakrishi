<?php
namespace App\Services\Admin;

use App\Models\Team;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeamService {
    use StoreImageTrait;
    public function list($q) {
        try {
            $data['q'] = $q;
            $query = Team::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            }
            $data['teams'] = $query->orderBy('order', 'asc')->get();
            $data['count'] = 1;
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function status($request) {
        try {
            Team::where('id', $request->id)
                ->update([
                    $request->field_name => $request->val,
                ]);
            if ($request->val == 1) {
                $response['message'] = 'Team enabled successfully';
            } else {
                $response['message'] = 'Team disabled successfully';
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
            Team::where('id', $request->id)->update([$request->order_field_name => $request->order]);
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
                $team = Team::findOrFail($id);
                $response['message'] = 'Team updated successfully.';
                $response['error'] = null;
                $response['status'] = 202;
            } else {
                $id = 0;
                $team = new Team;
                $team->order = getMax('teams', 'order');
                $response['message'] = 'Team created successfully.';
                $response['error'] = null;
                $response['status'] = 201;
            }

            if (isset($request['image']) && ! empty($request['image']) && preg_match('#^data:image.*?base64,#', $request['image'])) {
                $image = $this->StoreBase64Image($request['image'], '/team/', Str::slug($request['name']));
            } else {
                $image = ($request['image']) ? $request['image'] : (($team) ? $team->image : null);
            }
            $team->name = $request['name'];
            $team->designation = $request['designation'];
            $team->image = $image;
            $team->save();
            $response['error'] = null;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete($request) {
        try {
            $id = $request->id;
            $ras = Team::where('id', $id)->first();
            if ($ras) {
                Storage::disk('public')->delete('/team/' . $ras->image);
                Team::where('id', $id)->delete();
            }
            $response['message'] = 'Team deleted successfully.';
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
            $row = Team::where('id', $id)->first();
            if ($row) {
                Storage::disk('public')->delete('/team/' . $row->$field_name);
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
