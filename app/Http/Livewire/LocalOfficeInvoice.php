<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
class LocalOfficeInvoice extends Component
{
    use WithFileUploads;
    public $PTN,$custompackage=0,$successMsg,$package,$in;
    public $addmode=false;
    public $member;

    public $HandlerFees,$cf,$pid;

    public function addmode(){
        // $data=$pk;
        foreach ($this->package as $key) {
        foreach ($key as $info) {
            # code...
            if($info['est_cost']>50){
                $this->custompackage=1;
            }
        }
    }

        $this->addmode=true;
    }
    public function searchmode(){
        $this->addmode=false;
    }
    protected $rules = [
        'HandlerFees'=>'required'
    ];
    
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function search(){
        //member search
        $member_id;
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/LogiFreight/member/search/'.$this->PTN;

        curl_setopt($ch,CURLOPT_URL,$url);
        // curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $res=curl_exec($ch);
        $res=json_decode($res,true);
        // dd($res);
        $member_id=$res[0]['id'];
        if($error = curl_error($ch)){
            echo $error;
        }
        curl_close($ch);
        if($res!=null || $res!=null || $res!= []){
            // $memebr_id=$res
            // $search=$this->PTN;
        // dd($search);
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/LogiFreight/LocalOffice/list/Invoice';
        $search=array(
            'member'=>$member_id
        );
        $search=http_build_query($search);
        curl_setopt($ch,CURLOPT_URL,$url);
        // curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$search);

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $res=curl_exec($ch);
        // dd($res);
        $res=json_decode($res,true);
        $this->member=array_splice($res,0,1);
        $this->package=$res;
        sleep(1);
        curl_close($ch);
        }else{

        }
    }
    public function invoice(){
        $validate=$this->validate();
        $id=$this->member['member_id'];
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/LogiFreight/Generate/Invoice/'.$id;
        if($this->HandlerFees==0 || $this->HandlerFees==null){
            $this->HandlerFees=0;
        }
        if($this->cf==0 || $this->cf==null){
            $this->cf=0;
        }
        $data=array(
            'handling_fee'=>$this->HandlerFees,
            'custom_fee'=>$this->cf
        );

        $data=http_build_query($data);
        // dd($id);
        curl_setopt($ch,CURLOPT_URL,$url);
        // curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $res=curl_exec($ch);
        // dd($res);
        $res=json_decode($res,true);
        // $in=http_build_query($res);
        // $this->sendMail();
        
        if($error = curl_error($ch)){
            echo $error;
        }else{
            // $res=html_entity_decode($res);
            // $this->package=json_decode($res,true);
            $this->package=[];
            $this->PTN='';
            $this->pid='';
            $this->cf='';
            $this->member='';
            $this->HandlerFees='';
        }
        curl_close($ch);
        $this->successMsg='Invoice Generated Successfully';
        sleep(1);
        $this->searchmode();
    }

    function sendMail(){
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/LogiFreight/Mail/Invoice';
        $invoice_data=$this->in;
        curl_setopt($ch,CURLOPT_URL,$url);
        // curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$invoice_data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        // ini_set('max_execution_time', 180);
        $send=curl_exec($ch);
        // dd($res);
        curl_close($ch);
    }
    public function render()
    {
        return view('livewire.local-office-invoice');
    }
}
