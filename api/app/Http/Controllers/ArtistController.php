<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::all();
        return $artists ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $artist = new Artist();
        $artist->name = $request->name;
        $artist->description = $request->description;
        $artist->age = $request->age;
        $artist->style = $request->style;
        $artist->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artist = Artist::find($id);
        return $artist;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $artist = Artist::findOrFail($request->$id);
       $artist->name = $request->name;
       $artist->description = $request->description;
       $artist->age = $request->age;
       $artist->style = $request->style;
       $artist->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artist=Artist::destroy($id);
        return $artist;
    }
}
