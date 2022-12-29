<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PastEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('past_events')->get();

        $view = view('past_events.index', ['past_events' => $users]);

        return response($view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $table = DB::table('past_events')->create([
          'title' => $request->get('title'),
          'date' => $request->get('date'),
          'content' => $request->get('content')
        ]);

        return response($table);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rows = DB::table('past_events')->orderBy('id')->lazy()->each(function ($user) {
            DB::table('past_events')->where('id', $user->id)->get();
        });

        return response($rows);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $query = DB::table('past_events')->where('id', 'id')->value($id)->upsert(
            [
                'title' => $request->get('title'),
                'date' => $request->get('date'),
                'content' => $request->get('content')
            ],
            ['id'],
            ['title', 'date', 'content']
        );

        return response($query);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = DB::table('past_events')->where('id', 'id')->value($id)->delete();
    }
}
