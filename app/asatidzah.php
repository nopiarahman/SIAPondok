<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\storage;
use App\jadwalbelajar;

class asatidzah extends Model
{
    protected $table = 'asatidzah';
    protected $guarded = ['id','created_at','updated_at']; /* melindungi field yang tidak boleh diisi manual, lihat mass assignment */
    public function jadwalbelajar()
    {
        return $this->hasMany(jadwalbelajar::class);
    }
}
