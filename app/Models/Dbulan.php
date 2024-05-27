<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dbulan extends Model
{
    use HasFactory;
    public function danaks()
    {
        return $this->belongsTo(Danak::class, 'danaks_id');
    }

    public function dposyandu()
    {
        return $this->belongsTo(Dposyandu::class, 'dposyandu_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
