<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use DB;

class LoginController extends Controller
{
    //登录页面
    public function index(){
        return view('admin.login');
    }

    //验证码
    public function yzm(){
        require_once("../resources/code/Code.class.php");
        //实例化
        $code = new \Code();
        //生成验证码
        $code -> make();
    }
    //验证操作
    public function check(Request $request){
        //获取数据
        $name = $request->get('name');
        $pass = $request->get('password');
        $ucode = $request->get('code');

        //
        require_once("../resources/code/Code.class.php");
        $code = new \Code();

        $ocode = $code->get();

        //检测验证码
        if(strtoupper($ucode) == $ocode){
            //验证密码
            $data = \DB::table('admin')->where('name',$name)->first();


            if($data){
                if($pass == \Crypt::decrypt($data->pass)){
                    //声明数组
                    $arr = [];
                    $arr['lasttime'] = time();
                    $arr['count'] = ++$data->count;

                    //更新登录信息
                    \DB::table('admin')->where('id','=',$data->id)->update($arr);
                    //存session
                    $newArr = [];
                    $newArr['name'] = $data->name;
                    $newArr['id'] = $data->id;
                    var_dump($data->id);
                    var_dump($newArr);
                    \Session::put('lenovoAdminUserInfo',$newArr);


                    return redirect('/admin');
                }else{
                    return back()->withInput()->withErrors('密码错误');
                }

            }else{
                return back()->withInput()->withErrors('用户名不存在');
            }

        }else{
            return back()->withInput()->withErrors('验证码错误');
        }

    }
    //退出
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/admin/login');
    }

}
