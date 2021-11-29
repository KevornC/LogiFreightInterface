<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Transit extends Component
{
    public function render()
    {
        $tPackages; 
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/LogiField/member/transit';
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $res=curl_exec($ch);
        $tPackages=json_decode($res,true);
        return view('livewire.transit',compact('tPackages'));
    }
}
