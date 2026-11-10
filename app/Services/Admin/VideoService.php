<?php

namespace App\Services\Admin;

use App\Models\Video;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VideoService
{
    use StoreImageTrait;

    public function list($q)
    {
        try {
            $data['q'] = $q;
            $query = Video::select('*');
            if ($q) {
                $query->where(function ($sq) use ($q) {
                    $sq->where('title', 'LIKE', '%' . $q . '%')
                       ->orWhere('nepali_title', 'LIKE', '%' . $q . '%');
                });
            }
            $data['videos'] = $query->orderBy('order', 'asc')->get();
            $data['count'] = 1;
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function status($request)
    {
        try {
            Video::where('id', $request->id)->update([
                $request->field_name => $request->val,
            ]);
            $msg = ($request->val == 1) ? 'Video enabled successfully.' : 'Video disabled successfully.';
            return response()->json(['message' => $msg, 'error' => null, 'status' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function order($request)
    {
        try {
            Video::where('id', $request->id)->update([$request->order_field_name => $request->order]);
            return response()->json(['message' => 'Order updated successfully.', 'error' => null, 'status' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store($request)
    {
        try {
            if (!empty($request['id'])) {
                $video = Video::findOrFail($request['id']);
                $response['message'] = 'Video updated successfully.';
                $response['status'] = 202;
            } else {
                $video = new Video();
                $video->order = getMax('videos', 'order') ?: (Video::count() + 1);
                $response['message'] = 'Video created successfully.';
                $response['status'] = 201;
            }

            if (isset($request['image']) && !empty($request['image']) && preg_match('#^data:image.*?base64,#', $request['image'])) {
                $image = $this->StoreBase64Image($request['image'], '/video/', Str::slug($request['title']) . '-' . time());
            } else {
                $image = $request['image'] ?? ($video->image ?? null);
            }

            $video->title = $request['title'];
            $video->nepali_title = $request['nepali_title'] ?? null;
            $video->video_url = $request['video_url'];
            $video->duration = $request['duration'] ?? '4:00';
            $video->image = $image;
            $video->save();

            $response['error'] = null;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete($request)
    {
        try {
            $video = Video::find($request->id);
            if ($video) {
                if ($video->image && Storage::disk('public')->exists('/video/' . $video->image)) {
                    Storage::disk('public')->delete('/video/' . $video->image);
                }
                $video->delete();
            }
            return response()->json(['message' => 'Video deleted successfully.', 'error' => null, 'status' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function imageDelete($request)
    {
        try {
            $video = Video::find($request->id);
            if ($video) {
                $field = $request->field_name ?? 'image';
                if ($video->$field && Storage::disk('public')->exists('/video/' . $video->$field)) {
                    Storage::disk('public')->delete('/video/' . $video->$field);
                }
                $video->$field = null;
                $video->save();
            }
            return response()->json(['message' => 'Thumbnail deleted successfully.', 'error' => null, 'status' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
