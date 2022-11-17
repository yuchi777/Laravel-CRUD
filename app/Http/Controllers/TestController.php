<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    // function asdf(){
    //     // return 'This is asdf function of TestController';
    //     return view('test');
    // }
    // function asdf($id){
    //     return view('test');
    // }
    function asdf($id){
        // return view('test')->with("id",$id);
        return view('test',compact('id'));
    }
}
