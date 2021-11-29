<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LocalPickup extends Component
{
    public $PTN,$package,$successMsg;
    public function search(){
        $search=$this->PTN;
        // dd($package);
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/LogiFreight/member/track/'.$search;

        curl_setopt($ch,CURLOPT_URL,$url);
        // curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $res=curl_exec($ch);
        // dd($res);
        if($error = curl_error($ch)){
            echo $error;
        }else{
            $res=html_entity_decode($res);
            
            $this->package=json_decode($res,true);
            // dd($this->package);
        }
        sleep(1);
        curl_close($ch);
    }
    public function pickup($id){
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/Logifreight/Package/Pickup/'.$id;

        curl_setopt($ch,CURLOPT_URL,$url);
        // curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
        // curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $res=curl_exec($ch);
        // dd($res);
        if($error = curl_error($ch)){
            echo $error;
        }else{
            $res=html_entity_decode($res);
            
            // $this->package=json_decode($res,true);
            $this->package=[];
        $this->PTN='';
        }
        $this->successMsg='Updated for Pickup';
        sleep(1);
        curl_close($ch);
    }
    public function render()
    {
        return view('livewire.local-pickup');
    }
}
