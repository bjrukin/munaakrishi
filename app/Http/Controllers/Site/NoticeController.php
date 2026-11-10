<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoticeController extends Controller
{
    public function index(Request $request)
    {
        $data['nav'] = 'news';
        $data['metahead'] = 'seo';
        $data['page_title'] = 'News and Activities';

        $dbNotices = Notice::where('status', 1)->orderBy('date', 'desc')->get();

        $data['articles'] = $dbNotices->map(function ($n) {
            $slug = Str::slug($n->name);
            return [
                'id' => $n->id,
                'slug' => $slug,
                'title' => $n->name,
                'category' => 'Harvest Stories',
                'date' => date('F d, Y', strtotime($n->date ?? now())),
                'nepali_date' => date('Y', strtotime($n->date ?? now())),
                'author' => 'Munaa Krishi Team',
                'read_time' => '3 min read',
                'image' => $n->display_image,
                'summary' => Str::limit(strip_tags($n->description ?? ''), 120),
            ];
        })->toArray();

        return view('site.news.index', $data);
    }

    public function detail($slug)
    {
        $noticeModel = Notice::where('status', 1)->get()->first(function ($n) use ($slug) {
            return Str::slug($n->name) === $slug;
        });

        if (!$noticeModel) {
            $noticeModel = Notice::where('status', 1)->orderBy('date', 'desc')->first();
            if (!$noticeModel) {
                abort(404);
            }
        }

        $article = [
            'id' => $noticeModel->id,
            'slug' => Str::slug($noticeModel->name),
            'title' => $noticeModel->name,
            'category' => 'Company News & Activities',
            'date' => date('F d, Y', strtotime($noticeModel->date ?? now())),
            'nepali_date' => date('Y', strtotime($noticeModel->date ?? now())),
            'author' => 'Munaa Editorial Team',
            'read_time' => '3 min read',
            'image' => $noticeModel->display_image,
            'summary' => Str::limit(strip_tags($noticeModel->description ?? ''), 160),
            'content' => $noticeModel->description ?? '<p>No additional content provided for this notice.</p>',
            'contact_note' => 'For additional information, farmer partnerships, or procurement questions related to this update, please contact Munaa Krishi head office in Sanepa, Lalitpur at +977-98031 65605.'
        ];

        $other_articles = Notice::where('status', 1)
            ->where('id', '!=', $noticeModel->id)
            ->orderBy('date', 'desc')
            ->take(3)
            ->get()
            ->map(function ($n) {
                return [
                    'slug' => Str::slug($n->name),
                    'title' => $n->name,
                    'category' => 'Updates',
                    'date' => date('M d, Y', strtotime($n->date ?? now())),
                    'image' => $n->display_image,
                    'summary' => Str::limit(strip_tags($n->description ?? ''), 90),
                ];
            })->toArray();

        $data['nav'] = 'news';
        $data['metahead'] = 'seo';
        $data['page_title'] = $article['title'];
        $data['article'] = $article;
        $data['related'] = $other_articles;

        return view('site.news.detail', $data);
    }
}
