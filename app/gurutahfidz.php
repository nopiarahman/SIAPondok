<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gurutahfidz extends Model
{
    protected $table = 'gurutahfidz';
    protected $guarded = ['id','created_at','updated_at']; /* melindungi field yang tidak boleh diisi manual, lihat mass assignment */

    public function kelasTahfidz()
    {
        return $this->belongsTo(kelastahfidz::class);
    }
}
