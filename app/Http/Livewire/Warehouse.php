<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Warehouse extends Component
{

    public function render()
    {
        $wPackages; 
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/LogiField/member/warehouse';
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $res=curl_exec($ch);
        // dd($res);
        $wPackages=json_decode($res,true);
        return view('livewire.warehouse',compact('wPackages'));
    }
}
