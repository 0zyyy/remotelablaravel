<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praktikum extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function antrian()
    {
        return $this->hasMany(Antrian::class,'id_praktikum','id');
    }
    
}
