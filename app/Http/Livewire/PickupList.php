<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PickupList extends Component
{
    public function render()
    {
        // /LogiFreight/LocalOffice/list
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/LogiFreight/LocalOffice/list';

        curl_setopt($ch,CURLOPT_URL,$url);
        // curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
        // curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $res=curl_exec($ch);
        // dd($res);
        if($error = curl_error($ch)){
            echo $error;
        }else{
            
            $Packages=json_decode($res,true);
            // dd($Packages);
        }
        $this->successMsg='Updated for Pickup';
        sleep(1);
        curl_close($ch);

        return view('livewire.pickup-list',compact('Packages'));
    }
}
