<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    public function dbulans()
    {
        return $this->belongsTo(Dbulan::class, 'dbulans_id');
    }
}
