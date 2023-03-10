<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LkpBahagian extends Model
{
    protected $table = 'lkp_bahagian';

    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['keterangan', 'status'];
}
