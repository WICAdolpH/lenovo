<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    //商品详情首页
    public function index($id){

        // 获取商品相关数据
        $goods=\DB::table("goods")->where("id",$id)->first();

        //商品图片表
        $goodsImg=\DB::table("goodsImg")->where("gid",$id)->get();

        // 查询商品对应品论

        $commentTot=\DB::table("comment")->where("gid",$id)->count();//总评论数
        $goodTot=\DB::table("comment")->where([["star",">",4],["gid",$id]])->count();//好评数
        $chaTot=\DB::table("comment")->where([["star","<=",2],["gid",$id]])->count();//差评数
        if($commentTot-$goodTot-$chaTot>0) {
            $zhongTot=$commentTot-$goodTot-$chaTot;//中评数
        }else {
            $zhongTot=0;
        }


        $arr=array(
            "commentTot"=>$commentTot,
            "goodTot"=>$goodTot,
            "chaTot"=>$chaTot,
            "zhongTot"=>$zhongTot,

        );

        $comment=\DB::table("comment")->where("gid",$id)->get();

        // 格式化数据
        $data=array(

            "goods"=>$goods,
            "goodsImg"=>$goodsImg,
            "arr"=>$arr,
            "comment"=>$comment,
        );
        // 加载页面
        return view("home.goods")->with($data);
    }
}
