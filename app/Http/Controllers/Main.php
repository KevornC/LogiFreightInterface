<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Main extends Controller
{
    
    function mSearch(){
        return view('Main.memberSearch');
    }
    function pSearch(){
        return view('Main.packageSearch');
    }
    function checkStatus(){
        return view('Main.checkStatus');
    }
    function addM(){
        return view('Main.AddMember');
    }
    function addP(){
        return view('Main.AddPackage');
    }
    function shipP(){
        return view('Main.ship');
    }
}
