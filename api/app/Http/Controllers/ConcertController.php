<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\ConcertP;
use Illuminate\Http\Request;


class ConcertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $concerts = ConcertP::all();
        return $concerts ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $concert = new ConcertP();
        $concert->place = $request->place;
        $concert->date = $request->date;
        $concert->artist = $request->artist;
        $concert->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $concert = ConcertP::find($id);
        return $concert;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $concert = ConcertP::findOrFail($request->$id);
        $concert->place = $request->place;
        $concert->date = $request->date;
        $concert->artist = $request->artist;

        $concert->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $concert=ConcertP::destroy($id);
        return $concert;
    }
}

