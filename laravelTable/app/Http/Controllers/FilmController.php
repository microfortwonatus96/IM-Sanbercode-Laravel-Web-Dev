<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Film;
// use symfony\component\HttpFoundation\File\File;
use File;

class FilmController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {
        $film = Film::all();
        return view('film.tampil', ['film' => $film]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = Genre::all();
        return view('film.tambah', ['genre' => $genre]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'ringkasan' => 'required',
            'tahun' => 'required',
            'poster' => 'required|mimes:png,jpg|max:2048',
            'genre_id' => 'required',
        ]);

        $fileImage = time().'.'.$request->poster->extension();
        $request->poster->move(public_path('uploads'), $fileImage);

        $film = new Film;
        $film->judul = $request->input('judul');
        $film->ringkasan = $request->input('ringkasan');
        $film->tahun = $request->input('tahun');
        $film->poster = $fileImage;
        $film->genre_id = $request->input('genre_id');
        $film->save();
        return redirect('/film');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $film = Film::find($id);
        return view('film.detail', ['film' => $film]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $film = Film::find($id);
        $genre = Genre::all();
        return view('film.edit', ['film' => $film, 'genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'ringkasan' => 'required',
            'tahun' => 'required',
            'poster' => 'mimes:png,jpg|max:2048',
            'genre_id' => 'required',
        ]);

        $film = Film::find($id);

        if($request->has('poster')){
            //hapus file lama
            File::delete('uploads/'. $film->poster);
            
            $fileImage = time().'.'.$request->poster->extension();
            $request->poster->move(public_path('uploads'), $fileImage);
            $film->poster = $fileImage;
        }
        $film->judul = $request->input('judul');
        $film->ringkasan = $request->input('ringkasan');
        $film->tahun = $request->input('tahun');
        $film->genre_id = $request->input('genre_id');
        $film->save();

        return redirect('/film');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::find($id);
        File::delete('uploads/'. $film->poster);
        $film->delete();

        return redirect('/film');
        
    }
}
