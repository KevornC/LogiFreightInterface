<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Local extends Controller
{
    //

    function pickup(){
        return view('Local.pickup');
    }

    function list(){
        return view('Local.list');
    }
    function invoice(){
        return view('Local.invoice');
    }
    function qa(){
        return view('Local\quickalert');
    }
}
