<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AdminController extends Controller
{
    //
    public function index(){
        $tot = \DB::table('admin')->count();
        $data = \DB::table('admin')->paginate(3);
        return view("admin.admin.index")->with('data',$data)->with('tot',$tot);
    }
    //添加页面 admin/admin/create  get
    public function create(){
        return view("admin.admin.add");
    }

    //插入操作 admin/admin  post
    public function store(Request $request){
        // 直接把字符串数组化

        parse_str($_POST['str'],$arr);

        // 表单验证的规则

        $rules=[
            'name' => 'required|unique:admin|between:6,12',
            'pass' => 'required|same:repass|between:6,12',

        ];


        // 表单验证的提示信息

        $message=[

            "name.required"=>"请输入用户名",
            "pass.required"=>"请输入密码",
            "name.unique"=>"用户名已存在",
            "pass.same"=>"两次密码不一致",
            "pass.between"=>"密码长度不在6-12位之间",
            "name.between"=>"用户名长度不在6-12位之间",

        ];

        // 使用laravel的表单验证
        $validator = \Validator::make($arr,$rules,$message);

        // 开始验证

        if ($validator->passes()) {

            // 验证通过添加数据库

            unset($arr['repass']);

            //密码加密
            $arr['pass']=\Crypt::encrypt($arr['pass']);

            $arr['time']=time();

            // 插入数据库

            if (\DB::table("admin")->insert($arr)) {
                return 1;
            }else{
                return 0;
            }

        }else{
            // 具体查看laravel的核心类
            return $validator->getMessageBag()->getMessages();
        }
    }
    //修改页面 admin/admin/{admin}/edit get
    public function edit($id){
        //查询数据库
        $data = \DB::table("admin")->find($id);
        //解密密码
        $data->pass = \Crypt::decrypt($data->pass);
        //分配数据
        return view("admin.admin.edit")->with("data",$data);
    }
    //更新操作 admin/admin/{admin} put
    public function update(Request $request){
        // 直接把字符串数组化

        parse_str($_POST['str'],$arr);

        // 表单验证的规则

        $rules=[
            'pass' => 'required|same:repass|between:6,12',

        ];


        // 表单验证的提示信息

        $message=[

            "pass.required"=>"请输入密码",
            "pass.same"=>"两次密码不一致",
            "pass.between"=>"密码长度不在6-12位之间",

        ];

        // 使用laravel的表单验证
        $validator = \Validator::make($arr,$rules,$message);

        // 开始验证

        if ($validator->passes()) {

            // 验证通过添加数据库

            unset($arr['repass']);

            $arr['pass']=\Crypt::encrypt($arr['pass']);


            // 插入数据库

            if (\DB::table("admin")->where("id",$arr["id"])->update(['pass'=>$arr['pass'],'status'=>$arr['status']])) {
                return 1;
            }else{
                return 0;
            }

        }else{
            // 具体查看laravel的核心类
            return $validator->getMessageBag()->getMessages();
        }
    }
    //删除操作 admin/admin/{admin}  delete
    public function destroy($id){

        if(DB::table("admin")->delete($id)){
            return 1;
        }else {
            return 0;
        }
    }
    // 状态修改
    public function ajaxStatus(Request $request){
        //剔除数据
        $arr = $request->except('_token','_method');


        if(\DB::table("admin")->where('id',$arr['id'])->update(['status'=>$arr['status']])){
            return 1;
        }else{
            return 0;
        }
    }

}

