<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $data['nav'] = 'videos';
        $data['metahead'] = 'seo';
        $data['page_title'] = 'Videos Showcase';

        $page = Page::where('slug', 'videos')->first();
        $videoBlock = $page ? $page->getBlock('videos') : null;
        $ctaBlock = $page ? $page->getBlock('cta_banner') : null;

        $limit = (int) ($videoBlock['limit'] ?? 12);

        $dbVideos = Video::where('status', 1)->orderBy('order', 'asc')->limit($limit)->get();

        $data['videos'] = $dbVideos->map(function ($v) {
            $img = $v->image;
            if (!$img) {
                $imageUrl = asset('assets/images/farms/tea-field.jpg');
            } elseif (str_starts_with($img, 'http')) {
                $imageUrl = $img;
            } elseif (str_starts_with($img, 'assets/')) {
                $imageUrl = asset($img);
            } else {
                $imageUrl = asset('storage/uploads/video/' . $img);
            }

            // Convert to embed URL for YouTube popup modal
            $url = $v->video_url ?? '';
            $embedUrl = $url;
            if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))([\w-]{11})/', $url, $matches)) {
                $embedUrl = 'https://www.youtube.com/embed/' . $matches[1] . '?autoplay=1';
            }

            return [
                'id' => $v->id,
                'title' => $v->title,
                'nepali' => $v->nepali_title,
                'video_url' => $url,
                'embed_url' => $embedUrl,
                'duration' => $v->duration,
                'image' => $imageUrl,
                'description' => $v->nepali_title ? $v->nepali_title . ' (' . $v->duration . ')' : 'Duration: ' . $v->duration,
            ];
        })->toArray();

        $data['page'] = $page;
        $data['videoBlock'] = $videoBlock;
        $data['ctaBlock'] = $ctaBlock;

        return view('site.video.index', $data);
    }
}
