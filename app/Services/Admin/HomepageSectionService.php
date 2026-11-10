<?php
namespace App\Services\Admin;

use App\Models\HomepageSection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class HomepageSectionService
{
    const CACHE_PREFIX = 'homepage_sections_';

    public function list(?string $page = null): array
    {
        $query = HomepageSection::orderBy('page')->orderBy('sort_order');
        if ($page && $page !== 'all') {
            $query->where('page', $page);
        }
        $sections = $query->get();

        $pageCounts = HomepageSection::selectRaw('page, count(*) as count')
            ->groupBy('page')
            ->pluck('count', 'page')
            ->toArray();

        return [
            'sections'   => $sections,
            'page'       => $page ?? 'all',
            'pages'      => HomepageSection::availablePages(),
            'types'      => HomepageSection::availableTypes(),
            'pageCounts' => $pageCounts,
        ];
    }

    public function store(array $data)
    {
        try {
            $id = (int) ($data['id'] ?? 0);
            $page = $data['page'] ?? 'home';

            if ($id > 0) {
                $section = HomepageSection::findOrFail($id);
            } else {
                $section = new HomepageSection();
                $maxOrder = HomepageSection::where('page', $page)->max('sort_order') ?? 0;
                $section->sort_order = $maxOrder + 1;
                $section->is_enabled = 1;
            }

            $section->page  = $page;
            $section->type  = $data['type'] ?? 'rich_content';
            $section->label = $data['label'] ?? 'Custom Component';

            $settings = $section->settings ?? [];
            foreach (['subtitle', 'title', 'copy', 'btn_text', 'btn_link', 'bg_style'] as $key) {
                if (isset($data[$key])) {
                    $settings[$key] = $data[$key];
                }
            }
            if (isset($data['limit']) && is_numeric($data['limit'])) {
                $settings['limit'] = (int) $data['limit'];
            }

            $section->settings = $settings;
            $section->save();

            $this->clearCache();

            $msg = $id > 0 ? 'Component updated successfully.' : 'New component added successfully.';
            return response()->json(['message' => $msg, 'error' => null, 'status' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete($id)
    {
        try {
            $section = HomepageSection::findOrFail($id);
            $section->delete();

            $this->clearCache();

            return response()->json(['message' => 'Component removed successfully.', 'error' => null, 'status' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function status($request)
    {
        try {
            HomepageSection::where('id', $request->id)
                ->update([$request->field_name => $request->val]);

            $this->clearCache();

            $msg = $request->val == 1 ? 'Component enabled successfully' : 'Component disabled successfully';
            return response()->json(['message' => $msg, 'error' => null, 'status' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function updateOrder($request)
    {
        try {
            if (is_array($request->order)) {
                foreach ($request->order as $idx => $id) {
                    HomepageSection::where('id', $id)->update(['sort_order' => $idx + 1]);
                }
            } elseif ($request->has('id') && $request->has('order')) {
                HomepageSection::where('id', $request->id)->update(['sort_order' => (int) $request->order]);
            }
            $this->clearCache();
            return response()->json(['message' => 'Order updated successfully.', 'error' => null, 'status' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function clearCache(): void
    {
        Cache::forget(self::CACHE_PREFIX . 'home');
        Cache::forget(self::CACHE_PREFIX . 'about');
        Cache::forget(self::CACHE_PREFIX . 'contact');
        Cache::forget(self::CACHE_PREFIX . 'products');
        Cache::forget(self::CACHE_PREFIX . 'farms');
        Cache::forget(self::CACHE_PREFIX . 'outlets');
        Cache::forget(self::CACHE_PREFIX . 'news');
        Cache::forget('homepage_sections_config');
    }

    // Used by frontend controllers
    public static function getCached(string $page = 'home'): Collection
    {
        return Cache::remember(self::CACHE_PREFIX . $page, 3600, function () use ($page) {
            return HomepageSection::getForPage($page);
        });
    }
}
