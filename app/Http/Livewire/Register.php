<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $firstname;
    public $lastname;
    public $email;
    public $address;
    public $trn;
    public $telephone;
    public $password;
    public $password_confirmation;
    public $successMsg;
    
    protected $rules = [
        'firstname' => 'required| string| min:2',
        'lastname' => 'required| string| min:2',
        'email' => 'required|string|email|max:255|',
        'trn'=>'required',
        'telephone'=>'required',
        'password' => 'required|string|min:8',
        'password_confirmation' => 'required|string|min:8',
    ];
 
    protected $messages = [
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
    ];
 
    protected $validationAttributes = [
        'email' => 'email address'
    ];
 
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    // Mail::to('andre@andre.com')->send(new ContactFormMailable($contact));
    

private function resetForm()
{
    $this->firstname = '';
    $this->lastname = '';
    $this->email = '';
    $this->trn = '';
    $this->telephone = '';
    $this->address = '';
    $this->password = '';
    $this->password_confirmation = '';
}
function Onsubmit(){
    $registration=$this->validate();
    $registration['fname']=$this->firstname;
    $registration['lname']=$this->lastname;
    $registration['email']=$this->email;
    $registration['trn']=$this->trn;
    $registration['telephone']=$this->telephone;
    $registration['address']=$this->address;
    $registration['email']=$this->email;
    $registration['password']= Hash::make($this->password);
    $registration['password_confirmation']=$this->password_confirmation;
    if($this->password==$this->password_confirmation){
    $data=array(
        'fname'=>$registration['fname'],
        'lname'=>$registration['lname'],
        'email'=>$registration['email'],
        'trn'=>$registration['trn'],
        'telephone'=>$registration['telephone'],
        'address'=>$registration['address'],
        'password'=>$registration['password']
    );

    $ch=curl_init();

    $url='http://192.168.100.12:8080/api/register';
    curl_setopt($ch,CURLOPT_URL,$url);
        
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $res=curl_exec($ch);
    // dd($res);
    curl_close($ch);
    if($res==1){
        $this->successMsg="Registration Successfull";
        $this->resetForm();
    }elseif($res==0){
        $this->successMsg="Registration Failed. Duplicate entries";
    }
    }else{
        $this->successMsg="Registration Failed. Duplicate entries";
    }
    sleep(1);
    // session()->flash('success_message', 'We received your message successfully and will get back to you shortly!');
        
    }

    public function render(){

        return view('livewire.register');
    }
}
