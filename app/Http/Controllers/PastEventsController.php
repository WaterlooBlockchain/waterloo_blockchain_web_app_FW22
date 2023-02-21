<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class PastEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $past_events = DB::table('past_events')->orderByDesc('date')->get();

        return View::make('About')->with('past_events', $past_events);
    }
}
