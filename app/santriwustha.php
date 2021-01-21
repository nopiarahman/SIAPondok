<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\storage;
use App\kelas;
use App\kelastahfidz;
use App\nilai;
use App\mapel;
use App\santriwustha;
use App\pelanggaran;

class santriwustha extends Model
{
    protected $table = 'santriwustha';
    protected $guarded = ['id','created_at','updated_at']; /* melindungi field yang tidak boleh diisi manual, lihat mass assignment */

    public function kelastahfidz()
    {
        return $this->belongsTo(kelastahfidz::class);
    }
    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }
    public function pelanggaran(){
        return $this->hasMany(pelanggaran::class);
    }
    public function nilai()
    {
        return $this->hasMany(nilai::class);
    }
    public function mapel()
    {
        return $this->belongsToMany(mapel::class)->withPivot(['harian','uts','uas','akhlak']);
    }
}
