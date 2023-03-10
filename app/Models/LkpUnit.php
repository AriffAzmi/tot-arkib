<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LkpUnit extends Model
{

    protected $table = 'lkp_unit';

    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['keterangan', 'status'];
}
