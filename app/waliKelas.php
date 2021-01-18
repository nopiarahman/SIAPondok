<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class waliKelas extends Model
{
    protected $table = 'waliKelas';
    protected $guarded = ['id','created_at','updated_at']; /* melindungi field yang tidak boleh diisi manual, lihat mass assignment */

    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    }

}
