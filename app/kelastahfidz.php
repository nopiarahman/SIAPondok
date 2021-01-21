<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\santriwustha;
class kelastahfidz extends Model
{
    protected $table = 'kelastahfidz';
    protected $guarded = ['id','created_at','updated_at']; /* melindungi field yang tidak boleh diisi manual, lihat mass assignment */

    public function guruTahfidz()
    {
        return $this->hasOne(guruTahfidz::class);
    }
    public function santriwustha()
    {
        return $this->hasMany(santriwustha::class);
    }

}
