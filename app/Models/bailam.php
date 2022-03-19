<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bailam extends Model
{
    protected $table = 'bailam';
    protected $fillable = [
        'de',
        'id_hs',
        'thoigianlam',
        'lastcheck',
        'thoigiannop',
        'dapan',
        'diem'
    ];
    public $timestamps = false;
}
