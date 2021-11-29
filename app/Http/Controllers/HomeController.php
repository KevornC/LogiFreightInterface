<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ch=curl_init();
        $id=Session()->get('user_id');
        // dd($id);
        $url='http://192.168.100.12:8080/api/LogiFreight/Member/Total/'.$id;

        curl_setopt($ch,CURLOPT_URL,$url);
        
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $res=curl_exec($ch);
        // dd($res);
        curl_close($ch);
        $total=json_decode($res,true);
        // dd($total[0]);
        return view('home',compact('total'));
    }
    public function Main()
    {
        $url='http://192.168.100.12:8080/api/LogiFreight/MainOffice';
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $res=curl_exec($ch);
        $res=json_decode($res,true);
        // dd($res);
        curl_close($ch);
        $packages=array_slice($res,0,1);
        $totalware=array_slice($res,1,1);
        $totaltransit=array_slice($res,-2,1);
        $totalshipped=array_slice($res,3);
        $check=sizeof($packages['packages']);
        // dd($check);
        
        return view('Main.dashboard',compact('totalware','packages','totaltransit','totalshipped','check'));
    }
    public function Local()
    {$url='http://192.168.100.12:8080/api/LogiFreight/MainOffice';
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $res=curl_exec($ch);
        $res=json_decode($res,true);
        // dd($res);
        curl_close($ch);
        $packages=array_slice($res,0,1);
        $totalware=array_slice($res,1,1);
        $totaltransit=array_slice($res,-2,1);
        $totalshipped=array_slice($res,3);
        $check=sizeof($packages['packages']);
        // dd($check);
        
        return view('Local.dashboard',compact('totalware','packages','totaltransit','totalshipped','check'));
    }
    function logout(){
        Session()->flush();
        Session()->regenerateToken();
        return redirect()->route('landing');
    }
}
