<?php

namespace App\Services\Admin;

use App\Models\About;
use App\Models\Page;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AboutService
{
    use StoreImageTrait;

    public function store(array $request)
    {
        try {
            $about = About::first() ?? new About;

            // Handle org structure chart image
            $orgStructureImage = $about->org_structure_image;
            if (! empty($request['org_structure_image'])) {
                if (preg_match('#^data:image.*?base64,#', $request['org_structure_image'])) {
                    $orgStructureImage = $this->StoreBase64Image(
                        $request['org_structure_image'],
                        '/about/',
                        'org_structure_' . time() . '_' . Str::random(5)
                    );
                } else {
                    $orgStructureImage = $request['org_structure_image'];
                }
            }
            $about->org_structure_image = $orgStructureImage;

            // Handle optional who we are side image
            $whoWeAreImage = $about->who_we_are_image;
            if (! empty($request['who_we_are_image'])) {
                if (preg_match('#^data:image.*?base64,#', $request['who_we_are_image'])) {
                    $whoWeAreImage = $this->StoreBase64Image(
                        $request['who_we_are_image'],
                        '/about/',
                        'who_we_are_' . time() . '_' . Str::random(5)
                    );
                } else {
                    $whoWeAreImage = $request['who_we_are_image'];
                }
            }
            $about->who_we_are_image = $whoWeAreImage;

            // Who We Are
            $about->who_we_are_label = $request['who_we_are_label'] ?? null;
            $about->who_we_are_title = $request['who_we_are_title'] ?? null;
            $about->who_we_are_reg_info = $request['who_we_are_reg_info'] ?? null;
            $about->who_we_are_content = $request['who_we_are_content'] ?? null;

            // Vision & Mission
            $about->vision_title = $request['vision_title'] ?? 'Vision';
            $about->vision_content = $request['vision_content'] ?? null;
            $about->mission_title = $request['mission_title'] ?? 'Mission';
            $about->mission_content = $request['mission_content'] ?? null;

            // Organizational Structure
            $about->org_structure_label = $request['org_structure_label'] ?? null;
            $about->org_structure_title = $request['org_structure_title'] ?? null;
            $about->org_structure_subtitle = $request['org_structure_subtitle'] ?? null;
            $about->org_structure_caption = $request['org_structure_caption'] ?? null;

            // Aims to achieve (normalize array or newline string)
            $about->aims_label = $request['aims_label'] ?? null;
            $about->aims_title = $request['aims_title'] ?? null;
            $about->aims_content = $this->normalizeList($request['aims_content'] ?? null);

            // Implementation strategies
            $about->implementation_label = $request['implementation_label'] ?? null;
            $about->implementation_title = $request['implementation_title'] ?? null;
            $about->implementation_content = $this->normalizeList($request['implementation_content'] ?? null);

            // Who can invest
            $about->investment_label = $request['investment_label'] ?? null;
            $about->investment_title = $request['investment_title'] ?? null;
            $about->investment_content = $this->normalizeList($request['investment_content'] ?? null);

            // Meta SEO
            $about->meta_title = $request['meta_title'] ?? null;
            $about->meta_description = $request['meta_description'] ?? null;

            $about->save();

            // Synchronize with Page::blocks (Block architecture concept)
            $blocks = [
                [
                    'type' => 'who_we_are',
                    'data' => [
                        'label' => $about->who_we_are_label,
                        'title' => $about->who_we_are_title,
                        'reg_info' => $about->who_we_are_reg_info,
                        'content' => $about->who_we_are_content,
                        'image' => $about->who_we_are_image,
                    ],
                ],
                [
                    'type' => 'vision_mission',
                    'data' => [
                        'vision_title' => $about->vision_title,
                        'vision_content' => $about->vision_content,
                        'mission_title' => $about->mission_title,
                        'mission_content' => $about->mission_content,
                    ],
                ],
                [
                    'type' => 'organizational_structure',
                    'data' => [
                        'label' => $about->org_structure_label,
                        'title' => $about->org_structure_title,
                        'subtitle' => $about->org_structure_subtitle,
                        'image' => $about->org_structure_image,
                        'caption' => $about->org_structure_caption,
                    ],
                ],
                [
                    'type' => 'aims_to_achieve',
                    'data' => [
                        'label' => $about->aims_label,
                        'title' => $about->aims_title,
                        'items' => $about->aims_content ?? [],
                    ],
                ],
                [
                    'type' => 'implementation_strategies',
                    'data' => [
                        'label' => $about->implementation_label,
                        'title' => $about->implementation_title,
                        'items' => $about->implementation_content ?? [],
                    ],
                ],
                [
                    'type' => 'who_can_invest',
                    'data' => [
                        'label' => $about->investment_label,
                        'title' => $about->investment_title,
                        'items' => $about->investment_content ?? [],
                    ],
                ],
            ];

            Page::where('slug', 'about')->orWhere('id', 2)->update([
                'slug' => 'about',
                'blocks' => $blocks,
                'meta_title' => $about->meta_title,
                'meta_description' => $about->meta_description,
                'updated_at' => now(),
            ]);

            return response()->json([
                'status' => 202,
                'message' => 'About Us & Company Profile updated successfully.',
                'error' => null,
            ], 202);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 400,
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function imageDelete($request)
    {
        try {
            $field_name = $request->field_name;
            $allowed = ['org_structure_image', 'who_we_are_image'];

            if (! in_array($field_name, $allowed)) {
                return response()->json(['error' => 'Invalid field'], 400);
            }

            $about = About::first();
            if ($about && $about->$field_name) {
                if (! str_starts_with($about->$field_name, 'assets/')) {
                    Storage::disk('public')->delete('/about/' . $about->$field_name);
                }
                $about->$field_name = null;
                $about->save();

                $page = Page::where('slug', 'about')->orWhere('id', 2)->first();
                if ($page) {
                    $blockType = ($field_name === 'org_structure_image') ? 'organizational_structure' : 'who_we_are';
                    $data = $page->getBlock($blockType) ?? [];
                    $data['image'] = null;
                    $page->setBlock($blockType, $data)->save();
                }
            }

            return response()->json([
                'status' => 200,
                'message' => 'Image removed successfully.',
                'error' => null,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    protected function normalizeList($raw): array
    {
        if (is_array($raw)) {
            return array_values(array_filter(array_map('trim', $raw), fn ($item) => $item !== ''));
        }

        if (is_string($raw) && trim($raw) !== '') {
            $lines = preg_split('/[\r\n]+/', $raw);
            return array_values(array_filter(array_map('trim', $lines), fn ($line) => $line !== ''));
        }

        return [];
    }
}
