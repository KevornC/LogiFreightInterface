<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MemberInvoice extends Component
{
    public $IN,$data;
    public function search(){
        $value=$this->IN;
        // dd($package);
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/LogiFreight/Mail/Member/Invoice/'.$value;

        curl_setopt($ch,CURLOPT_URL,$url);
        // curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $res=curl_exec($ch);
        if($error = curl_error($ch)){
            echo $error;
        }else{
            // $res=html_entity_decode($res);
            
            $this->data=json_decode($res,true);
            // dd($this->data);
        }
        sleep(1);
        curl_close($ch);
    }
    public function render()
    {
        return view('livewire.member-invoice');
    }
}
