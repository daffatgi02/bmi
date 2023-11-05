<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dbulan extends Model
{
    use HasFactory;
    public function danaks()
    {
        return $this->belongsTo(Danak::class);
    }
}
