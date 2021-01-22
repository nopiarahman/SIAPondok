<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surah extends Model
{
    protected $table = 'surah';
    protected $guarded = ['id','created_at','updated_at']; /* melindungi field yang tidak boleh diisi manual, lihat mass assignment */


}
