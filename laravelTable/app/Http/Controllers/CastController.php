<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CastController extends Controller
{
    public function tambah(){
        return view('cast/tambah');
    }

    public function cast(request $request){
        $request->validate([
            'nama' => 'required | min:5',
            'umur' => 'required',
            'bio' => 'required',
        ]);

        DB::table('cast')->insert([
            'nama' => $request->input('nama'),
            'umur' => $request->input('umur'),
            'bio' => $request->input('bio'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('/cast');
    }
    public function index(){
        $cast = DB::table('cast')->get();

        return view('cast.tampil', ['cast' => $cast]);
    }

    public function detail($cast_id){
        $cast = DB::table('cast')->find($cast_id);

        return view('cast.detail', ['cast' => $cast]);
    }

    public function edit($cast_id){
        $cast = DB::table('cast')->find($cast_id);

        return view('cast.edit', ['cast' => $cast]);
    }

    public function update($cast_id, Request $request){
        $request->validate([
            'nama' => 'required | min:5',
            'umur' => 'required',
            'bio' => 'required',
        ]);

        DB::table('cast')
              ->where('id', $cast_id)
              ->update([
                'nama' => $request->input('nama'),
                'umur' => $request->input('umur'),
                'bio' => $request->input('bio'),
                'updated_at' => Carbon::now(),
            ]);

            return redirect('/cast');
    }

    public function delete($cast_id){
        DB::table('cast')->where('id', $cast_id)->delete();
        return redirect('/cast');

    }
}
