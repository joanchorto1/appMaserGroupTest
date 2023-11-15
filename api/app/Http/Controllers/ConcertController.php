<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Concert;
use Illuminate\Http\Request;


class ConcertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        $concerts = Concert::all();
        return $concerts ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $concert = new Concert();
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
        $concert = Concert::find($id);
        return $concert;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $concert = Concert::findOrFail($request->$id);
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
        $concert=Concert::destroy($id);
        return $concert;
    }
}

