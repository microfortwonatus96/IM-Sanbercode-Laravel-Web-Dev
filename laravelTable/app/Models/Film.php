<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $table = 'film';
    protected $fillable = ['judul', 'ringkasan', 'tahun', 'poster','genre_id'];

    //menampilkan nama genre di film
    public function genre(){
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    public function kritik(){
        return $this->hasMany(Kritik::class, 'film_id');
    }
}
