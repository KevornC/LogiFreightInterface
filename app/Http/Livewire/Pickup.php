<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Pickup extends Component
{
    public function render()
    {
        $pPackages; 
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/LogiField/member/pickup';
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $res=curl_exec($ch);
        $pPackages=json_decode($res,true);
        return view('livewire.pickup',compact('pPackages'));
    }
}
