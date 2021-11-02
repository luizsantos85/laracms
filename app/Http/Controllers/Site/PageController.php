<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;
use App\Visitor;

class PageController extends Controller
{
    public function home()
    {
        return view('site.home');
    }

    public function index(string $slug, Request $request)
    {
        $page = Page::where('slug', $slug)->first();

        if (!$page) {
            abort(404);
        }

        $this->countVisit($request->ip(), $slug);

        return view('site.page', [
            'page' =>$page,
        ]);
    }

    private function countVisit($ip, $page)
    {
        $timeLimit = date('Y-m-d H:i:s', strtotime('-60 minutes'));

        $visitor = Visitor::where('ip', $ip)
            ->where('page', $page)
            ->where('date_access', '>', $timeLimit)
            ->orderBy('date_access', 'desc')
            ->first();

        if (!$visitor) {
            $v = new Visitor();
            $v->ip = $ip;
            $v->page = $page;
            $v->date_access = date('Y-m-d H:i:s');
            $v->save();
        }
    }
}
