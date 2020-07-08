<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Banner;
use App\models\Category;
use App\models\Content;
use App\models\Picture;
use App\models\You;
class IndexController extends Controller
{
    //导航栏查询
    public function index(Request $request){
        //查询导航栏
        $banner_where=[
            "n_show"=>1,
            "n_del"=>1,
        ];
        $banner=Banner::where($banner_where)->limit(7)->get();
        return view("home.index.index",compact("banner"));
    }
    //分类展示
    public function home(){
        $cate_where=[
            'cate_del'=>1,
        ];
       $res= Category::where($cate_where)->limit(4)->get();
       if($res){
            return json_encode(['code'=>"00000","msg"=>"ok","data"=>$res]);
       }else{
            return json_encode(['code'=>"00000","msg"=>"no"]);
       }
    }
    //分类下内容
    public function content(Request $request){
        $id=$request->id;
        $res=Content::where("cate_id",$id)->get();
        if($res){
            return json_encode(['code'=>"00000","msg"=>"ok","data"=>$res]);
       }else{
            return json_encode(['code'=>"00000","msg"=>"no"]);
       }
    }
    //分类内容
    public function cate(Request $request){
        $id=$request->id;
        $res=Content::where("c_id",$id)->first()->toArray();
        if($res){
            return json_encode(["code"=>"00000","msg"=>"ok","data"=>$res]);
        }else{
            return json_encode(["code"=>"00001","msg"=>"no"]);
        }
    }
    //分类图片
    public function tupian(Request $request){
        $res=Picture::limit(7)->get()->toArray();
        if($res){
            return json_encode(["code"=>"00000","msg"=>"ok","data"=>$res]);
        }else{
            return json_encode(["code"=>"00001","msg"=>"no"]);
        }
    }
    //友情链接
    public function youqing(Request $request){
        $res=You::get()->toArray();
        if($res){
            return json_encode(["code"=>"00000","msg"=>"ok","data"=>$res]);
        }else{
            return json_encode(["code"=>"00001","msg"=>"no"]);
        }
    }
}
