<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tani extends Model
{
    use HasFactory;

    protected $fillable = [
        'berat_basah', 'drc', 'berat_kering'
    ];
}
