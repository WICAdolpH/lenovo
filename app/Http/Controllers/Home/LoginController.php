<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class LoginController extends Controller
{
    //登录页
    public function index(){
        //获取上一个页面
        session(['prevPage'=>$_SERVER['HTTP_REFERER']]);
        //登录页面
        return view('home.login');
    }

    //处理登录
    public function check(Request $request){
        //接收数据
        $email = $request -> get('email');
        $pass = $request -> get('pass');

        //去数据库中进行查询
        $data = DB::table('user')->where('email','=',$email)->first();

        //判断数据是否存在
        if($data){
            //判断密码是否正确
            if($pass == \Crypt::decrypt($data->pass)){
                session(['lenovoHomeUserInfo.email'=>$data->email]);
                session(['lenovoHomeUserInfo.name'=>$data->name]);
                session(['lenovoHomeUserInfo.id'=>$data->id]);
                return redirect(session('prevPage'));


            }else{

                return back()->with('error',"密码错误");
            }

        }else{

            return back()->with("error","用户不存在");
        }
    }

    // 退出的方法
    public function logout(Request $request){
        $request->session()->flush();

        return redirect('/');
    }

    //找回密码
    public function zhaohui(){

        if($_POST){

            //接收数据
            $email = $_POST['email'];
            //获取数据
            $data = \DB::table("user")->where("email","=",$email)->first();

            //判断是否有数据
            if($data) {

                /*\Mail::send('mail.zh',["id"=>$data->id,"token"=>$data->token],function($message) use($email){
                    $message->to($email);
                    $message->subject("密码找回");
                });*/

                \Mail::send("mail.zh",["id"=>$data->id,"token"=>$data->token],function($message) {
                    $message->to("1650959546@qq.com");
                    $message->subject("11111");
                });

                //加载立即激活的提示页面
                $mailArr = explode('@', $email);
                $href = 'mail.'.$mailArr[1];

                return view('home.zhaohuiTishi')->with('href',$href);

            }else{
                return back()->with("error","用户不存在");
            }
        }else {
            return view("home.zhaohui");
        }

    }

    //密码修改
    public function savePass($id,$token){
        if($_POST['pass']){
            //判断两次输入密码是否一致
            if($_POST['pass'] == $_POST['repass']){
                //判断密码长度是否合法
                if(strlen($_POST['pass']) >= 6 && strlen($_POST['pass']) <= 12){
                    //修改密码，入库
                    $data = array();
                    $data['token'] = str_random(50);
                    $data['pass'] = \Crypt::encrypt($_POST['pass']);
                    if(DB::table('user')->where('id','=',$id)->update($data)){
                        /**此时修改成功，但这里最好不要return redirect('/login')，因为在上面的
                        check()方法中已经做了在哪里登录等到登录之后回到哪里的功能，所以此时修
                        改完密码之后若回到登录页面时进行登录之后又会重新跳转到修改页面，无法跳
                        转到首页*/
                        return redirect('/');
                    }else{
                        return back()->with("error","更新失败");
                    }
                }else{
                    return back()->with("error","长度不符合要求");
                }
            }else{
                return back()->with("error","两次密码不一致");
            }
        }else{
            return view('home.savePass');
        }

    }
}
