<?php
namespace App\Services\Admin;

use App\Models\Achievement;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AchievementService {
    use StoreImageTrait;
    public function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Achievement::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            }
            $data['achievements'] = $query->orderBy('id', 'asc')->paginate($per_page);
            $data['achievements']->appends(['q' => $q]);
            $data['count'] = ($page != 1) ? (($per_page * $page) - $per_page + 1) : 1;
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function status($request) {
        try {
            Achievement::where('id', $request->id)
                ->update([
                    $request->field_name => $request->val,
                ]);
            if ($request->val == 1) {
                $response['message'] = 'Achievement enabled successfully';
            } else {
                $response['message'] = 'Achievement disabled successfully';
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
                $achievement = Achievement::findOrFail($id);
                $response['message'] = 'Achievement updated successfully.';
                $response['error'] = null;
                $response['status'] = 202;
            } else {
                $id = 0;
                $achievement = new Achievement;
                $response['message'] = 'Achievement created successfully.';
                $response['error'] = null;
                $response['status'] = 201;
            }

            if (isset($request['image']) && ! empty($request['image']) && preg_match('#^data:image.*?base64,#', $request['image'])) {
                $image = $this->StoreBase64Image($request['image'], '/achievement/', Str::slug($request['name']));
            } else {
                $image = ($request['image']) ? $request['image'] : (($achievement) ? $achievement->image : null);
            }
            $achievement->name = $request['name'];
            $achievement->image = $image;
            $achievement->save();
            $response['error'] = null;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete($request) {
        try {
            $id = $request->id;
            $ras = Achievement::where('id', $id)->first();
            if ($ras) {
                Storage::disk('public')->delete('/achievement/' . $ras->image);
                Achievement::where('id', $id)->delete();
            }
            $response['message'] = 'Achievement deleted successfully.';
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
            $row = Achievement::where('id', $id)->first();
            if ($row) {
                Storage::disk('public')->delete('/achievement/' . $row->$field_name);
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
