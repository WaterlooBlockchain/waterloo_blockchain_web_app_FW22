<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $blog_posts = DB::select('SELECT * FROM laravel.blog_posts WHERE id < (SELECT MAX(id) FROM laravel.blog_posts WHERE isFeatured=?) ORDER BY id', [FALSE]);
        
        return View::make('Blog')
            ->with('blog_posts', $blog_posts);
    }
}
