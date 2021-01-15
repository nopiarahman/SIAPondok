<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\jadwalbelajar;
use App\santriwustha;
class mapel extends Model
{
    protected $table = 'mapel';
    protected $guarded = ['id','created_at','updated_at']; /* melindungi field yang tidak boleh diisi manual, lihat mass assignment */
    public function jadwalbelajar()
    {
        return $this->hasMany(jadwalbelajar::class);
    }
    public function santriwustha()
    {
        return $this->belongsToMany(santriwustha::class)->withPivot(['harian','uts','uas','akhlak']);
    }
    public function nilai()
    {
        return $this->hasMany(nilai::class);
    }
}
