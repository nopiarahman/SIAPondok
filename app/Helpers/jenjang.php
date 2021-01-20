<?php

function jenjangLengkap(){
    $jenjang=auth()->user()->jenjang;
    if($jenjang=="smpPutra"){
        return " Salafiyyah Wushta'";
    }
    else if ($jenjang=="sd"){
        return " Salafiyyah Uulaa";
    }
    else if ($jenjang=="smpPutri"){
        return " Tahfidzul Qur'an Lil Bana'at";
    }
    else if ($jenjang=="smaPutra"){
        return " Salafiyyah Ulyaa";
    }
}
function tulisJenjang($string){
    if($string=='sd'){
        return "Salafiyyah Uulaa";
    }elseif($string=='smpPutra'){
        return "Salafiyyah Wushta'";
    }elseif($string=='smpPutri'){
        return "Tahfidzul Qur'an Lil Bana'at'";
    }elseif($string=='smaPutra'){
        return "Salafiyyah Uulya'";
    }
}
function jenjang(){
    return auth()->user()->jenjang;
}
function tujuanPengumuman($int){
    $namaWali = App\user::find($int);
    $namaSantri = App\santriwustha::where('emailWali',$namaWali->email)->first();
    // dd($namaSantri->namaLengkap);
    return $namaSantri->namaLengkap;
}