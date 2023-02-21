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
        $partnerships = DB::table('partnerships')->orderByDesc('isCurrent')->get();
        
        return View::make('connect')
            ->with('partnerships', $partnerships);
    }
}
