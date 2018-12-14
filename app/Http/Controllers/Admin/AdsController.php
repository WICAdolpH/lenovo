<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdsController extends Controller
{
    public function index(Request $request){
        //从数据库查询数据

        //加载页面
        return view('admin.sys.ads.index');
    }
}
