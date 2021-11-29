<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Auth;

class Login extends Component
{
    public $email;
    public $password;
    public $successMsg;
    
    protected $rules = [
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8',
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
    private function resetForm()
{
    $this->email = '';
    $this->password = '';
}
    public function Onsubmit(){
        //
        $login=$this->validate();
        $login['email']=$this->email;
        $login['password']=$this->password;

        $data=array(
            'email'=>$login['email'],
            'password'=> $login['password']
        );
        $ch=curl_init();
        $data=http_build_query($data);
        // dd($data);
        $url='http://192.168.100.12:8080/api/login';
        curl_setopt($ch,CURLOPT_URL,$url);
        
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $res=curl_exec($ch);
        $check=is_array($res);
        $explode=explode(',',$res);
        $check=count($explode);
        // dd($check);
        if($check==1){
            Session()->put('Active','active');
            Session()->put('user_id',$res);
            return redirect()->route('home');
        }
        // dd($res);
        // $res=json_decode($res,true);
        curl_close($ch);
        $explode=explode(',',$res);
        // dd($explode);
        if($res[0]==0){
            $this->successMsg="Login Failed";
        }else{
            $user_id=$explode[0];
            $office_status=$explode[1];
            // dd($office_status);
            if($office_status=='Main'){
                Session()->put('Active','active');
                Session()->put('user_id',$user_id);
                return redirect()->route('Mainhome');
            }
            if($office_status=='Local'){
                Session()->put('Active','active');
                Session()->put('user_id',$user_id);
                return redirect()->route('Localhome');
            }
        }
        sleep(1);
        // session()->flash('success_message', 'We received your message successfully and will get back to you shortly!');
            // $this->resetForm();
    }

    public function render()
    {
        return view('livewire.login');
    }
}
