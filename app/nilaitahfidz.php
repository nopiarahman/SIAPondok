<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilaitahfidz extends Model
{
    protected $table = "nilaitahfidz";
    protected $guarded = ['id','created_at','updated_at']; /* melindungi field yang tidak boleh diisi manual, lihat mass assignment */
    

}
