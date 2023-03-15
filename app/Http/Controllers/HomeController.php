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
        'SELECT 
            desanitize_string(title) as title,
            isFeatured,
            desanitize_string(image) as image,
            desanitize_string(tags) as tags,
            desanitize_string(content) as content
        FROM laravel.blog_posts 
        WHERE isFeatured=?
        ORDER BY id DESC 
        LIMIT ?
        ', [FALSE, 4]);
        
        return View::make('home')
            ->with('blog_posts', array_slice($blog_posts, 1, 3))
            ->with('latest_post', $blog_posts[0]);
    }
}
