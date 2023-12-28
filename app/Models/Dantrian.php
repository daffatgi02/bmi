<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dantrian extends Model
{
    use HasFactory;
    public function dposyandus()
    {
        return $this->belongsTo(Dposyandu::class);
    }
}
