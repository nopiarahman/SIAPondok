<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\santriwustha;
use App\jadwalbelajar;
class kelas extends Model
{
    protected $table = 'kelas';
    protected $guarded = ['id','created_at','updated_at']; /* melindungi field yang tidak boleh diisi manual, lihat mass assignment */

    public function santriwustha()
    {
        return $this->hasMany(santriwustha::class);
    }
    public function jadwalbelajar()
    {
        return $this->hasMany(jadwalbelajar::class);
    }
    public function nilai()
    {
        return $this->hasMany(nilai::class);
    }
}
