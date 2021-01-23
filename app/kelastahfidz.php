<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\santriwustha;
class kelastahfidz extends Model
{
    protected $table = 'kelasTahfidz';
    protected $guarded = ['id','created_at','updated_at']; /* melindungi field yang tidak boleh diisi manual, lihat mass assignment */

    public function gurutahfidz()
    {
        return $this->hasOne(gurutahfidz::class);
    }
    public function santriwustha()
    {
        return $this->hasMany(santriwustha::class);
    }

}
