<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danak extends Model
{
    use HasFactory;
    public function dposyandu()
    {
        return $this->belongsTo(Dposyandu::class, 'dposyandu_id');
    }
    public function dbulans()
    {
        return $this->hasMany(Dbulan::class);
    }

}
