<?php
namespace App\Services\Admin;

use App\Models\Page;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageService
{
    use StoreImageTrait;
    function list($q)
    {
        try {
            $data['q'] = $q;
            $query = Page::select('*');
            if ($q) {
                $query->where('name', 'LIKE', '%' . $q . '%');
            }
            $data['pages'] = $query->get();
            $data['count'] = 1;
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function status($request)
    {
        try {
            Page::where('id', $request->id)
                ->update([
                    $request->field_name => $request->val,
                ]);
            if ($request->val == 1) {
                    $response['message'] = 'Page enabled successfully.';
            } else {
                    $response['message'] = 'Page disabled successfully.';
            }
            $response['error'] = null;
            $response['status'] = 200;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store($request)
    {
        try {
            if ($request['id']) {
                $id = $request['id'];
                $page = Page::findOrFail($id);
                $slug = $page->slug;
                $response['message'] = 'Page updated successfully.';
                $response['error'] = null;
                $response['status'] = 202;
            } else {
                $id = 0;
                $page = new Page;
                $slug = getSlug("pages", "slug", $request['name'], $id);
                $response['message'] = 'Page created successfully.';
                $response['error'] = null;
                $response['status'] = 201;
            }
            if (isset($request['image']) && !empty($request['image']) && preg_match('#^data:image.*?base64,#', $request['image'])) {
                $image = $this->StoreBase64Image($request['image'], '/page/', $slug);
            } else {
                $image = ($request['image']) ? $request['image'] : (($page) ? $page->image : null);
            }
            $page->name = $request['name'];
            $page->slug = $slug;
            $page->image = $image;
            $page->description = $request['description'] ?? null;
            if (isset($request['blocks'])) {
                $rawBlocks = is_array($request['blocks']) ? $request['blocks'] : (json_decode($request['blocks'], true) ?: []);
                $processedBlocks = [];

                foreach ($rawBlocks as $b) {
                    $bType = $b['type'] ?? 'rich_content';
                    $bData = $b['data'] ?? [];

                    // Process image upload if base64
                    if (!empty($bData['image']) && preg_match('#^data:image.*?base64,#', $bData['image'])) {
                        $bData['image'] = $this->StoreBase64Image(
                            $bData['image'],
                            '/page/',
                            'blk_' . $slug . '_' . $bType . '_' . time() . '_' . Str::random(4)
                        );
                    }

                    // Process secondary image if present (e.g. background image)
                    if (!empty($bData['bg_image']) && preg_match('#^data:image.*?base64,#', $bData['bg_image'])) {
                        $bData['bg_image'] = $this->StoreBase64Image(
                            $bData['bg_image'],
                            '/page/',
                            'bg_' . $slug . '_' . $bType . '_' . time() . '_' . Str::random(4)
                        );
                    }

                    // Normalize repeater items if array
                    if (isset($bData['items']) && is_array($bData['items'])) {
                        $bData['items'] = array_values(array_filter(array_map('trim', $bData['items']), fn($i) => $i !== ''));
                    }

                    $processedBlocks[] = [
                        'type' => $bType,
                        'is_enabled' => !empty($b['is_enabled']),
                        'data' => $bData,
                    ];
                }

                $page->blocks = $processedBlocks;
            }
            $page->meta_title = ($request['meta_title']) ? $request['meta_title'] : $request['name'];
            $page->meta_description = ($request['meta_description']) ? $request['meta_description'] : Str::limit(strip_tags($request['description']), 200, '');
            $page->save();

            // Keep munaa_krishi database synchronized if present
            try {
                \Illuminate\Support\Facades\DB::statement(
                    "UPDATE `munaa_krishi`.`pages` SET `blocks` = ?, `updated_at` = NOW() WHERE `id` = ? OR `slug` = ?",
                    [json_encode($page->blocks), $page->id, $page->slug]
                );
            } catch (\Throwable $t) {
                // Secondary database synchronization is optional
            }

            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function imageDelete($request)
    {
        try {
            $id = $request->id;
            $field_name = $request->field_name;
            $ras = Page::where('id', $id)->first();
            if ($ras) {
                Storage::disk('public')->delete('/page/' . $ras->$field_name);
                $ras->$field_name = '';
                $ras->save();
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