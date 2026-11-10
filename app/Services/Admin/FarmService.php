<?php

namespace App\Services\Admin;

use App\Models\Farm;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FarmService
{
    use StoreImageTrait;

    public function list($q)
    {
        try {
            $data['q'] = $q;
            $query = Farm::select('*');
            if ($q) {
                $query->where(function ($sq) use ($q) {
                    $sq->where('name', 'LIKE', '%' . $q . '%')
                       ->orWhere('nepali_name', 'LIKE', '%' . $q . '%')
                       ->orWhere('district', 'LIKE', '%' . $q . '%')
                       ->orWhere('province', 'LIKE', '%' . $q . '%')
                       ->orWhere('produce', 'LIKE', '%' . $q . '%');
                });
            }
            $data['farms'] = $query->orderBy('order', 'asc')->get();
            $data['count'] = 1;
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function status($request)
    {
        try {
            Farm::where('id', $request->id)->update([
                $request->field_name => $request->val,
            ]);
            $msg = ($request->val == 1) ? 'Partner farm enabled successfully.' : 'Partner farm disabled successfully.';
            return response()->json(['message' => $msg, 'error' => null, 'status' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function order($request)
    {
        try {
            Farm::where('id', $request->id)->update([$request->order_field_name => $request->order]);
            return response()->json(['message' => 'Order updated successfully.', 'error' => null, 'status' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store($request)
    {
        try {
            if (!empty($request['id'])) {
                $farm = Farm::findOrFail($request['id']);
                $response['message'] = 'Partner farm updated successfully.';
                $response['status'] = 202;
            } else {
                $farm = new Farm();
                $farm->order = getMax('farms', 'order') ?: (Farm::count() + 1);
                $response['message'] = 'Partner farm created successfully.';
                $response['status'] = 201;
            }

            if (isset($request['image']) && !empty($request['image']) && preg_match('#^data:image.*?base64,#', $request['image'])) {
                $image = $this->StoreBase64Image($request['image'], '/farm/', Str::slug($request['name']) . '-' . time());
            } else {
                $image = $request['image'] ?? ($farm->image ?? null);
            }

            $slug = !empty($request['slug']) ? Str::slug($request['slug']) : Str::slug($request['name']);
            $existing = Farm::where('slug', $slug)->where('id', '!=', $farm->id ?? 0)->exists();
            if ($existing) {
                $slug .= '-' . time();
            }

            $farm->name = $request['name'];
            $farm->nepali_name = $request['nepali_name'] ?? null;
            $farm->slug = $slug;
            $farm->province = $request['province'] ?? 'Karnali';
            $farm->district = $request['district'] ?? null;
            $farm->altitude = $request['altitude'] ?? null;
            $farm->practice = $request['practice'] ?? 'Organic';
            $farm->produce = $request['produce'] ?? null;
            $farm->farmers_count = $request['farmers_count'] ?? 50;
            $farm->description = $request['description'] ?? null;
            $farm->image = $image;
            $farm->save();

            $response['error'] = null;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete($request)
    {
        try {
            $farm = Farm::find($request->id);
            if ($farm) {
                if ($farm->image && Storage::disk('public')->exists('/farm/' . $farm->image)) {
                    Storage::disk('public')->delete('/farm/' . $farm->image);
                }
                $farm->delete();
            }
            return response()->json(['message' => 'Partner farm deleted successfully.', 'error' => null, 'status' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function imageDelete($request)
    {
        try {
            $farm = Farm::find($request->id);
            if ($farm) {
                $field = $request->field_name ?? 'image';
                if ($farm->$field && Storage::disk('public')->exists('/farm/' . $farm->$field)) {
                    Storage::disk('public')->delete('/farm/' . $farm->$field);
                }
                $farm->$field = null;
                $farm->save();
            }
            return response()->json(['message' => 'Image deleted successfully.', 'error' => null, 'status' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
