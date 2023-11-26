<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dantrian extends Model
{
    use HasFactory;
    public function dposyandu()
    {
        return $this->belongsTo(Dposyandu::class);
    }
}
