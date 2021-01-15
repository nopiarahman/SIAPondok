<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\santriwustha;
use \Carbon\Carbon;
class pelanggaran extends Model
{
    protected $table = 'pelanggaran';
    protected $guarded = ['id','created_at','updated_at']; /* melindungi field yang tidak boleh diisi manual, lihat mass assignment */
    protected $dates = [
        'created_at',
        'updated_at',
        'tanggalPelanggaran'
    ];
    public function getTanggalPelanggaranAttribute()
    {

        return Carbon::parse($this->attributes['tanggalPelanggaran'])
           ->translatedFormat('l, d F Y');
    }
    public function santriwustha()
    {
        return $this->belongsTo(santriwustha::class);
    }
}
