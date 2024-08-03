<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GenreController extends Controller
{
    public function tambah(){
        return view('genre/tambah');
    }

    public function genre(request $request){
        $request->validate([
            'nama' => 'required | min:5',
            'description' => 'required',
        ]);

        DB::table('genre')->insert([
            'nama' => $request->input('nama'),
            'description' => $request->input('description'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        return redirect('/genre');
    }
}
