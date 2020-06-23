<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Banner;
class BannerController extends Controller
{
    //管理员展示模块
    public function banner(){
        return view("banner.banner");
    }
    //添加页面
    public function bannerAdd(Request $request){
        $all=$request->all();
        $all["n_time"]=time();
        $bol=Banner::insert($all);
        if($bol){
            return ["code"=>"000000","msg"=>"添加成功"];
        }else{
            return ["code"=>"000001","msg"=>"添加失败"];
        }
    }
    //展示页面
    public function show(Request $request){
        $res=Banner::where(["n_del"=>1])->orderby("n_sort","desc")->paginate(3);

        return view("banner.show",compact("res"));
    }
    //删除
    public function del(Request $request){
        $id=$request->id;
        $bol=Banner::where("n_id",$id)->update(["n_del"=>2]);
        if($bol){
            return ["code"=>"000000","msg"=>"删除成功"];
        }else{
            return ["code"=>"000001","msg"=>"系统错误"];
        }
    }
    //修改展示
    public function upd(Request $request){
        $id=$request->id;
        $res=Banner::where("n_id",$id)->first();
        return view("banner.upd",compact("res"));
    }
    //修改执行
    public function updAdd(Request $request){
        $data=$request->all();
        $id=$data["n_id"];
        $res= Banner::where("n_id",$id)->update($data);
        if($res){
            return ["code"=>"000000","msg"=>"修改成功"];
        }else{
            return ["code"=>"000001","msg"=>"修改成功"];
        }
    }
    //即点即改
    public function ajaxname(){
        $id = request()->get("n_id");
        $new_name = request()->get("new_name");
        // dd($id);
        $res = Banner::where("n_id",$id)->update(["n_sort"=>$new_name]);
        if($res){
            return json_encode(["code"=>"00000","msg"=>"ok"]);
        }
    }
     //即点即改
     public function ajaxshow(){
        $id = request()->get("n_id");
        $new_name = request()->get("new_name");
        // dd($id);
        $res = Banner::where("n_id",$id)->update(["n_show"=>$new_name]);
        if($res){
            return json_encode(["code"=>"00000","msg"=>"ok"]);
        }
    }
}
