<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\kelas;
use \App\nilai;
use \App\mapel;
use \App\asatidzah;

class jadwalbelajar extends Model
{
    protected $table = 'jadwal';
    protected $guarded = ['id','created_at','updated_at']; /* melindungi field yang tidak boleh diisi manual, lihat mass assignment */

    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }
    public function asatidzah()
    {
        return $this->belongsTo(asatidzah::class);
    }
    public function mapel()
    {
        return $this->belongsTo(mapel::class);
    }
    public function nilai()
    {
        return $this->hasMany(nilai::class);
    }
    
}
