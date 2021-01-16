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
function jenjang(){
    return auth()->user()->jenjang;
}