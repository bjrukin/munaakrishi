<?php
namespace App\Services\Admin;

use App\Models\Career;

class CareerService {
    public function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Career::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            }
            $data['careers'] = $query->orderBy('id', 'asc')->paginate($per_page);
            $data['count'] = ($page != 1) ? (($per_page * $page) - $per_page + 1) : 1;
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function status($request) {
        try {
            Career::where('id', $request->id)
                ->update([
                    $request->field_name => $request->val,
                ]);
            if ($request->val == 1) {
                $response['message'] = 'Career enabled successfully';
            } else {
                $response['message'] = 'Career disabled successfully';
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
                $career = Career::findOrFail($id);
                $response['message'] = 'Career updated successfully.';
                $response['error'] = null;
                $response['status'] = 202;
            } else {
                $id = 0;
                $career = new Career;
                $response['message'] = 'Career created successfully.';
                $response['error'] = null;
                $response['status'] = 201;
            }
            $career->expiry_date = $request['expiry_date'];
            $career->name = $request['name'];
            $career->slug = getSlug("careers", "slug", $request['name'], $id);
            $career->location = $request['location'];
            $career->department = $request['department'];
            $career->employment_type = $request['employment_type'];
            $career->experience = $request['experience'];
            $career->summary = $request['summary'];
            $career->responsibility = $request['responsibility'];
            $career->requirement = $request['requirement'];
            $career->meta_title = ($request['meta_title']) ? $request['meta_title'] : $request['name'];
            $career->meta_description = $request['meta_description'];
            $career->save();
            $career->save();
            $response['error'] = null;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete($request) {
        try {
            $id = $request->id;
            Career::where('id', $id)->delete();
            $response['message'] = 'Career deleted successfully.';
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
