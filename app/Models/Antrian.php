<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;
    protected $guarded = ['id_antrian'];


    public function praktikum()
    {
        return $this->belongsTo(Praktikum::class, 'id_praktikum');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
