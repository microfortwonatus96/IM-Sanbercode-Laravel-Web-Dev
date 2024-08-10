<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GameController extends Controller
{
    public function tambah(){
        return view('game/tambah');
    }

    public function game(request $request){
        $request->validate([
            'nama' => 'required | min:5',
            'gameplay' => 'required | min:5',
            'year' => 'required',
        ]);

        DB::table('game')->insert([
            'nama' => $request->input('nama'),
            'gameplay' => $request->input('gameplay'),
            'year' => $request->input('year'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('/game');
    }
    public function index(){
        $game = DB::table('game')->get();

        return view('game.tampil', ['game' => $game]);
    }

    public function detail($game_id){
        $game = DB::table('game')->find($game_id);

        return view('game.detail', ['game' => $game]);
    }

    public function edit($game_id){
        $game = DB::table('game')->find($game_id);

        return view('game.edit', ['game' => $game]);
    }

    public function update($game_id, Request $request){
        $request->validate([
            'nama' => 'required | min:5',
            'gameplay' => 'required',
            'year' => 'required',
        ]);

        DB::table('game')
              ->where('id', $game_id)
              ->update([
                'nama' => $request->input('nama'),
                'gameplay' => $request->input('gameplay'),
                'year' => $request->input('year'),
                'updated_at' => Carbon::now(),
            ]);

            return redirect('/game');
    }

    public function delete($game_id){
        DB::table('game')->where('id', $game_id)->delete();
        return redirect('/game');

    }
}
