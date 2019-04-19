<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $filltable = [
        'nim',
        'namamahasiswa',
        'alamat',
        'kelamin',
        'nomortelepon',
        'created_at',
        'updated_at'
    ];
}
