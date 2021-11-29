<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Package extends Component
{
    public $mID;
    public $successMsg;
    public $pID, $pATN, $pDesc, $quan, $weight, $eCost;
    public $shipperName, $shipperAdd, $shipperTN;

    protected $rules = [
        'mID'=>'required',
        'pID'=>'required',
        'pATN'=>'required',
        'pDesc'=>'required | min:5 | max:30',
        'quan'=>'required',
        'weight'=>'required',
        'eCost'=>'required',
        'shipperName'=>'required | min:3',
        'shipperAdd'=>'required | min:5',
        'shipperTN'=>'required'
    ];

    protected $messages = [
        'mID.required'=>'The Member Name is required.',
        'pID.required'=>'The Package Name is required.',
        'pATN.required'=>'The Package Assigned Tracking Number is required.',
        'pDesc.required'=>'The Package Description is required.',
        'pDesc.min'=>'The Package Description  must be at least 5 characters long.',
        'pDesc.max'=>'The Package Description  cannot be at greater than 30 characters.',
        'quan.required'=>'The Quantity is required.',
        'weight.required'=>'The weight of the package is required.',
        'eCost.required'=>'The Estimated Cost is required.',
        'shipperName.required'=>'The Shipping Company is required.',
        'shipperName.min'=>'The Shipping Company Name is must be at least 3 characters long.',
        'shipperAdd.required'=>'The Shipping Company Address is required.',
        'shipperAdd.min'=>'The Shipping Company Address must be at least 5 characters long.',
        'shipperTN.required'=>'The Shipping Tracking Number is required.',
    ];
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    public function resetForm(){
        $this->mID=' ';
        $this->pID=' ';
        $this->pDesc=' ';
        $this->quan=' ';
        $this->weight=' ';
        $this->shipperName=' ';
        $this->shipperAdd=' ';
        $this->shipperTN=' ';
        $this->pATN=' ';
        $this->eCost=' ';
    }

    public function submit(){
        $validate=$this->validate();

        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/LogiFreight/package';

        $data=array(
            'member_id'=>$this->mID,
            'package_name'=>$this->pID,
            'package_desc'=>$this->pDesc,
            'user_id'=>Session()->get('user_id'),
            'quantity'=>$this->quan,
            'weight'=>$this->weight,
            'shipper'=>$this->shipperName,
            'shipper_address'=>$this->shipperAdd,
            'shipper_TN'=>$this->shipperTN,
            'Package_TN'=>$this->pATN,
            'est_cost'=>$this->eCost,
            'status'=>'warehouse',
        );

        $data=http_build_query($data);

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $res=curl_exec($ch);
        // dd($res);
        $this->successMsg='Package Added Successfully';
        $this->resetForm();
        sleep(1);
    }

    public function render()
    {
        $ch=curl_init();
        $url='http://192.168.100.12:8080/api/LogiFreight/members';

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $res=curl_exec($ch);
        $members=json_decode($res,true);
        return view('livewire.package',compact('members'));
    }
}
