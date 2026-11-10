<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Banner;
use App\Models\History;
use App\Models\Leadership;
use App\Models\Team;

class AboutController extends Controller {

    public function whoWeAre() {
        $data['nav'] = 'about';
        $data['metahead'] = 'seo';
        $data['page_title'] = 'About Munaa Krishi';
        $data['banner'] = Banner::where(['name' => 'Who we are', 'status' => 1])->first();
        $data['histories'] = History::where('status', 1)->orderBy('year', 'asc')->get();
        $data['achievements'] = Achievement::where('status', 1)->orderBy('id', 'desc')->get();
        return view('site.about.index', $data);
    }

    public function chairmanMessage() {
        $data['nav'] = 'chairman';
        $data['metahead'] = 'seo';
        $data['page_title'] = "Chairman's Message";
        $data['chairman'] = Leadership::where('status', 1)
            ->where(function($q) {
                $q->where('designation', 'like', '%Chair%')
                  ->orWhere('designation', 'like', '%President%');
            })->first() ?? Leadership::where('status', 1)->first();
        return view('site.about.chairman', $data);
    }

    public function leadership() {
        return $this->chairmanMessage();
    }

    public function boardOfDirectors() {
        $data['nav'] = 'about';
        $data['metahead'] = 'seo';
        $data['page_title'] = 'Board of Directors';
        $data['banner'] = Banner::where(['name' => 'Board of Directors', 'status' => 1])->first();
        $data['directors'] = Leadership::where('status', 1)->orderBy('order', 'asc')->get();
        return view('site.about.board', $data);
    }

    public function ourTeam() {
        $data['nav'] = 'about';
        $data['metahead'] = 'seo';
        $data['page_title'] = 'Our Team';
        $data['banner'] = Banner::where(['name' => 'Our Team', 'status' => 1])->first();
        $data['teams'] = Team::where('status', 1)->orderBy('order', 'asc')->get();
        return view('site.team.index', $data);
    }
}