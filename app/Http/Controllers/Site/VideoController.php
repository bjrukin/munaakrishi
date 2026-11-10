<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $data['nav'] = 'videos';
        $data['metahead'] = 'seo';
        $data['page_title'] = 'Videos Showcase';

        $dbVideos = Video::where('status', 1)->orderBy('order', 'asc')->get();

        $data['videos'] = $dbVideos->map(function ($v) {
            return [
                'id' => $v->id,
                'title' => $v->title,
                'nepali' => $v->nepali_title,
                'video_url' => $v->video_url,
                'duration' => $v->duration,
                'image' => $v->url_image,
                'description' => $v->nepali_title ? $v->nepali_title . ' (' . $v->duration . ')' : 'Duration: ' . $v->duration,
            ];
        })->toArray();

        return view('site.video.index', $data);
    }
}
