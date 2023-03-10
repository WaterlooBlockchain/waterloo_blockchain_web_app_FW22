<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;


class ConnectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$partnerships = DB::table('partnerships')->orderByDesc('isCurrent')->get();
        $partnerships = DB::select(
            'SELECT
                desanitize_string(name) as name,
                desanitize_string(link) as link,
                isCurrent,
                desanitize_string(image) as image
            FROM laravel.partnerships
            ORDER BY isCurrent DESC'
        );
        
        return View::make('connect')
            ->with('partnerships', $partnerships);
    }
}
