<?php
namespace App\Services\Admin;

use App\Models\Project;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectService {
    use StoreImageTrait;
    public function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Project::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            }
            $data['projects'] = $query->orderBy('id', 'asc')->paginate($per_page);
            $data['projects']->appends(['q' => $q]);
            $data['count'] = ($page != 1) ? (($per_page * $page) - $per_page + 1) : 1;
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function status($request) {
        try {
            Project::where('id', $request->id)
                ->update([
                    $request->field_name => $request->val,
                ]);
            if ($request->val == 1) {
                $response['message'] = 'Project enabled successfully';
            } else {
                $response['message'] = 'Project disabled successfully';
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
                $project = Project::findOrFail($id);
                $response['message'] = 'Project updated successfully.';
                $response['error'] = null;
                $response['status'] = 202;
            } else {
                $id = 0;
                $project = new Project;
                $response['message'] = 'Project created successfully.';
                $response['error'] = null;
                $response['status'] = 201;
            }

            if (isset($request['image']) && ! empty($request['image']) && preg_match('#^data:image.*?base64,#', $request['image'])) {
                $image = $this->StoreBase64Image($request['image'], '/project/', Str::slug($request['name']));
            } else {
                $image = ($request['image']) ? $request['image'] : (($project) ? $project->image : null);
            }
            $project->name = $request['name'];
            $project->image = $image;
            $project->save();
            $response['error'] = null;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete($request) {
        try {
            $id = $request->id;
            $ras = Project::where('id', $id)->first();
            if ($ras) {
                Storage::disk('public')->delete('/project/' . $ras->image);
                Project::where('id', $id)->delete();
            }
            $response['message'] = 'Project deleted successfully.';
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
            $row = Project::where('id', $id)->first();
            if ($row) {
                Storage::disk('public')->delete('/project/' . $row->$field_name);
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
