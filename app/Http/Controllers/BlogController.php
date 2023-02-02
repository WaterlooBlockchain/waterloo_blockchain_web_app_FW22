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
        $blog_posts = DB::table('blog_posts')->get();
        
        return View::make('Blog')
            ->with('blog_posts', $blog_posts);
    }
}
