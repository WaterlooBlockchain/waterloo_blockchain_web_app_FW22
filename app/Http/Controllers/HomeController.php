<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog_posts = DB::select(
            "SELECT * FROM laravel.blog_posts bp WHERE bp.isFeatured=? ORDER BY bp.created_at DESC LIMIT ?", [FALSE, 3]
        );

        $latest_post = DB::select(
            "SELECT * FROM laravel.blog_posts WHERE id=(SELECT MAX(id) FROM laravel.blog_posts WHERE isFeatured=?) LIMIT ?", [FALSE, 1]
        );
        
        return View::make('home')
            ->with('blog_posts', $blog_posts)
            ->with('latest_post', $latest_post);
    }
}
