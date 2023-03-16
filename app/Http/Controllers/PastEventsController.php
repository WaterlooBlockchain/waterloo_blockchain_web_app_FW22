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
        //$past_events = DB::table('past_events')->orderByDesc('date')->get();

        $past_events = DB::select(
            'SELECT
                desanitize_string(title) as title,
                date,
                desanitize_string(content) as content,
                desanitize_string(image) as image
            FROM laravel.past_events
            ORDER BY date DESC'
        );

        $socials = DB::select(
            'SELECT
                desanitize_string(name) as name,
                desanitize_string(link) as link,
                desanitize_string(icon) as icon
            FROM laravel.socials
            WHERE name != "Email" or name != "Voting"
            ');

        return View::make('PastEvents')
            ->with('past_events', $past_events)
            ->with('socials', $socials);
    }
}
