<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodsController extends Controller
{
    public function index(){
        $data = \DB::table('goods')->orderBy('id', 'desc')->paginate(2);

        foreach ($data as $key => $value) {
            $value->tupian = DB::table('goodsimg')->where('gid',$value->id)->get();
        }

        return view("admin.goods.index")->with('data',$data);
    }
    public function create(){
        // 查询分类

        $data=\DB::select("select types.*,concat(path,id) p from types order by p");

        // 数据处理
        foreach ($data as $key => $value) {
            # code...

            $arr=explode(',', $value->path);

            $size=count($arr);

            $value->size=$size-2;

            $value->html=str_repeat('|----', $size-2).$value->name;
        }
        return view("admin.goods.add")->with("data",$data);
    }
    public function store(Request $request){
        //dd($request->all());

        //获取多图
        $imgs = $request->input('imgs');
        //一处不需要的字符
        $data = $request->except("_token","imgs");

        //插入数据库
        if($id =\DB::table("goods")->insertGetId($data)){
            //处理商品多图片
            $arr = explode(',',$imgs);
            foreach($arr as $key=>$value) {
                $brr = array();

                $brr['gid'] = $id;
                $brr['img'] = $value;

                \DB::table("goodsimg")->insert($brr);
            }

            return redirect('/admin/goods');
        }else {
            return back();
        }
    }
}
