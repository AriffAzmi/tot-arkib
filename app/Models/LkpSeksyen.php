<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LkpSeksyen extends Model
{
    protected $table = 'lkp_seksyen';

    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['lkp_bahagian_id','keterangan', 'status'];

    /**
     * Map with Parent table
     */
    public function bahagian()
    {
        return $this->belongsTo(LkpBahagian::class,'lkp_bahagian_id');
    }
}
