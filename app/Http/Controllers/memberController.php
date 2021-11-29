<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class memberController extends Controller
{
    //

    function quickalert(){
        return view('QuickAlert.index');
    }

    public function warehouse(){
        return view('warehouse.index');
    }

    public function transit(){
        return view('transit.index');        
    }

    public function track(){
        return view('track.index'); 
    }

    public function pickup(){
        return view('pickup.index');
    }
    public function memberInvoice(){
        return view('invoice.index');
    }
}
