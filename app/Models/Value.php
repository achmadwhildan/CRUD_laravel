<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    protected $table = 'values';

    protected $fillable = [
        'name_siswa',
        'mata_pelajaran',
        'nilai',
    ];
}
