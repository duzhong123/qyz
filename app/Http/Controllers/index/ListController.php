<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Banner;
use App\models\Category;
use App\models\Content;
class ListController extends Controller
{
    //列表展示
    public function list(Request $request){
        // $id=$request->id;
        
         //查询导航栏
         $banner_where=[
            "n_show"=>1,
            "n_del"=>1,
        ];
        $banner=Banner::where($banner_where)->limit(7)->get();

        //查询列表
        $cate_where=[
            "c_show"=>1,
            "c_del"=>1,
        ];
        $category=Category::join("cate_content","category.cate_id","=","cate_content.cate_id")
                        ->where($cate_where)
                        ->orderby("c_sort","desc")
                        ->limit(6)
                        ->get();
        
        return view("home.list.list",compact("banner","category"));
    }
    //内容展示
    public function content(Request $request){
         //查询导航栏
         $banner_where=[
            "n_show"=>1,
            "n_del"=>1,
        ];
        $banner=Banner::where($banner_where)->limit(7)->get();

        //查询列表
        $cate_where=[
            "c_show"=>1,
            "c_del"=>1,
        ];
        $category=Category::join("cate_content","category.cate_id","=","cate_content.cate_id")
                        ->where($cate_where)
                        ->orderby("c_sort","desc")
                        ->limit(6)
                        ->get();
        //查询内容
        $id=$request->id;
        $content=Content::where("c_id",$id)->first();
        return view("home.list.content",compact("banner","category","content"));
    }
    //查询左侧导航
    public function caiyuan(Request $request){
         //查询导航栏
         $banner_where=[
            "n_show"=>1,
            "n_del"=>1,
        ];
        $banner=Banner::where($banner_where)->limit(7)->get();
                        // var_dump($category);
        if($banner){
            return json_encode(["code"=>"00000","msg"=>"ok","data"=>$banner]);
        }else{
            return json_encode(["code"=>"00001","msg"=>"no"]);
        }
    }
    //查询标题
    public function cate(Request $request){
        $id=$request->id;
        $res=Content::where("n_id",$id)->get()->toArray();
        if($res){
            return json_encode(["code"=>"00000","msg"=>"ok","data"=>$res]);
        }else{
            return json_encode(["code"=>"00001","msg"=>"no"]);
        }
    }
    //内容详情
    public function contents(Request $request){
        $id=$request->id;
        $res=Content::where("c_id",$id)->first()->toArray();
        if($res){
            return json_encode(["code"=>"00000","msg"=>"ok","data"=>$res]);
        }else{
            return json_encode(["code"=>"00001","msg"=>"no"]);
        }
    }
}
