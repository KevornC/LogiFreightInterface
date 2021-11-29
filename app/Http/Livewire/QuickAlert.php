<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\With\Livewire;
use Livewire\WithFileUploads;

class QuickAlert extends Component
{
    use WithFileUploads;
    public $successMsg;
    public $pr;

    protected $rules = [
        'pr'=>'required',
    ];

    protected $messages = [
        'pr.required'=>'Purchase Receipt is required',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    private function resetForm(){
        $this->pr='';
    }
    public function submit(){
        $validate=$this->validate();
        $ch=curl_init();
        $id=Session()->get('user_id');
        $url='http://192.168.100.12:8080/api/LogiField/member/QuickAlert/'.$id;
        $pr='Member'.''.$id.' PR '.$this->pr->getClientOriginalName();

        $this->pr->storePubliclyAs('LogiFreightMember',$pr,'pr');
        // dd($pr);
        $data=array(
            'pr'=>$pr, 
        );
        $data=http_build_query($data);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $res=curl_exec($ch);
        // dd($res);
        curl_close($ch);
        if($res==1){
            $this->successMsg="Data Uploaded";
            $this->resetForm();
        }elseif($res==0){
            $this->successMsg="Data Uploading Failed";
        }
    }
    public function render()
    {
        return view('livewire.quick-alert');
    }
}
