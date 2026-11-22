<?php
namespace App\Services\Admin;

use App\Models\Testimonial;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TestimonialService {
    use StoreImageTrait;
    public function list($per_page, $page, $q) {
        try {
            $data['q'] = $q;
            $query = Testimonial::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            }
            $data['testimonials'] = $query->orderBy('order')->orderBy('id')->paginate($per_page);
            $data['testimonials']->appends(['q' => $q]);
            $data['count'] = ($page != 1) ? (($per_page * $page) - $per_page + 1) : 1;
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function status($request) {
        try {
            Testimonial::where('id', $request->id)
                ->update([
                    $request->field_name => $request->val,
                ]);
            if ($request->val == 1) {
                $response['message'] = 'Testimonial enabled successfully';
            } else {
                $response['message'] = 'Testimonial disabled successfully';
            }
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function order($request)
    {
        try {
            if ($request->order_field_name !== 'order') {
                return response()->json(['error' => 'Invalid order field.'], 422);
            }

            Testimonial::where('id', $request->id)->update([
                'order' => $request->order,
            ]);

            return response()->json([
                'message' => 'Order updated successfully.',
                'error' => null,
                'status' => 200,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store($request) {
        try {
            if ($request['id']) {
                $id = $request['id'];
                $testimonial = Testimonial::findOrFail($id);
                $response['message'] = 'Testimonial updated successfully.';
                $response['error'] = null;
                $response['status'] = 202;
            } else {
                $id = 0;
                $testimonial = new Testimonial;
                $testimonial->order = getMax('testimonials', 'order');
                $response['message'] = 'Testimonial created successfully.';
                $response['error'] = null;
                $response['status'] = 201;
            }

            if (isset($request['image']) && ! empty($request['image']) && preg_match('#^data:image.*?base64,#', $request['image'])) {
                $image = $this->StoreBase64Image($request['image'], '/testimonial/', Str::slug($request['name']));
            } else {
                $image = ($request['image']) ? $request['image'] : (($testimonial) ? $testimonial->image : null);
            }
            $testimonial->name = $request['name'];
            $testimonial->company = $request['company'] ?? null;
            $testimonial->reviews = $request['reviews'];
            $testimonial->image = $image ?: null;
            $testimonial->save();
            $response['error'] = null;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete($request) {
        try {
            $id = $request->id;
            $ras = Testimonial::where('id', $id)->first();
            if ($ras) {
                $this->deleteStoredImage($ras->image);
                Testimonial::where('id', $id)->delete();
            }
            $response['message'] = 'Testimonial deleted successfully.';
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
            $row = Testimonial::where('id', $id)->first();
            if ($row) {
                $this->deleteStoredImage($row->$field_name);
                $row->$field_name = null;
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

    private function deleteStoredImage(?string $image): void
    {
        if (! $image || str_starts_with($image, 'assets/') || str_starts_with($image, 'http')) {
            return;
        }

        Storage::disk('public')->delete('/testimonial/' . $image);
    }
}
