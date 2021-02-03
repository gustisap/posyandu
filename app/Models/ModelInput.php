<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelInput extends Model
{
    protected $table = 'posyandu1';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'berat_badan',
        'tinggi_badan',
        'usia',
        'status_gizi'
    ];
}
