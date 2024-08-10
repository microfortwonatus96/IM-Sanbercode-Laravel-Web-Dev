<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Kritik;

class KritikController extends Controller
{
    public function kritik(request $request, $film_id){
        $request->validate([
            'content' => 'required|min:5',
            'point' => 'required',
        ]);

        $user_id = Auth::id();

        $kritik = new Kritik;
        $kritik->content = $request->input('content');
        $kritik->point = $request->input('point');
        $kritik->user_id = $user_id;
        $kritik->film_id = $film_id;

        $kritik->save();

        return redirect('/film/'. $film_id);
    }
}
