<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class test extends Controller
{
    //
    public function index(){
        $data = $this->hui();

        dd($data);
    }

    public function hui($i=0){
        $str = array();
        $str[$i]=$i;
        $i++;
        if($i<5)
        $str=$this->hui($i);

        return $str;
    }
}
