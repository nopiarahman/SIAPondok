<?php

namespace App;
use App\santriwustha;
use App\jadwal;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    protected $table = 'nilai';
    protected $guarded = ['id','created_at','updated_at']; /* melindungi field yang tidak boleh diisi manual, lihat mass assignment */

    public function santriwustha()
    {
        return $this->belongsTo(santriwustha::class);
    }

    public function mapel()
    {
        return $this->belongsTo(mapel::class);
    }
    public function jadwalbelajar()
    {
        return $this->belongsTo(jadwalbelajar::class);
    }
    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }

}
