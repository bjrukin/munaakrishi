<?php
namespace App\Services\Admin;

use App\Models\History;

class HistoryService {
    public function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = History::select('*');
            if ($q) {
                $query->where('year', 'LIKE', '%' . $q . '%');
            }
            $data['historys'] = $query->orderBy('id', 'asc')->paginate($per_page);
            $data['historys']->appends(['q' => $q]);
            $data['count'] = ($page != 1) ? (($per_page * $page) - $per_page + 1) : 1;
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function status($request) {
        try {
            History::where('id', $request->id)
                ->update([
                    $request->field_name => $request->val,
                ]);
            if ($request->val == 1) {
                $response['message'] = 'History enabled successfully';
            } else {
                $response['message'] = 'History disabled successfully';
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
                $history = History::findOrFail($id);
                $response['message'] = 'History updated successfully.';
                $response['error'] = null;
                $response['status'] = 202;
            } else {
                $id = 0;
                $history = new History;
                $response['message'] = 'History created successfully.';
                $response['error'] = null;
                $response['status'] = 201;
            }
            $history->year = $request['year'];
            $history->description = $request['description'];
            $history->save();
            $response['error'] = null;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete($request) {
        try {
            $id = $request->id;
            History::where('id', $id)->delete();
            $response['message'] = 'History deleted successfully.';
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
