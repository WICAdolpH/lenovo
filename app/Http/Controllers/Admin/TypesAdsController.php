<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypesAdsController extends Controller
{
    public function index(Request $request){
        //多表查询

        //加载页面
        return view('admin.sys.types.index');
    }
}
