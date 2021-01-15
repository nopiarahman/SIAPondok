<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orangtua extends Model
{
    protected $table = 'orangtua';
    protected $guarded = ['id','created_at','updated_at']; /* melindungi field yang tidak boleh diisi manual, lihat mass assignment */

    // public function user()
    // {
    //     return $this->belongsTo('App\User','user_id');
    // }
    public function user()
    {
        return $this->hasOne('\App\User');
    }
}
