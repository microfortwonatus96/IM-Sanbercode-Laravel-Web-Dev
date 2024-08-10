<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Kritik extends Model
{
    use HasFactory;
    protected $table = 'kritik';
    protected $fillable = ['content', 'point', 'user_id', 'film_id'];

    public function user_kritik(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
