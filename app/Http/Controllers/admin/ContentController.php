<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Category;
use App\models\Content;
class ContentController extends Controller
{
    //添加展示
    public function content(Request $request){
        $res=Category::get();
        return view("content.content",compact("res"));
    }
    //添加执行
    public function contentAdd(Request $request){
        $data=$request->all();
        $data["c_time"]=time();
        $bol=Content::insert($data);
        if($bol){
            return ["code"=>"000000","msg"=>"添加成功"];
        }else{
            return ["code"=>"000001","msg"=>"添加失败"];
        }
    }
    //展示页面
    public function show(Request $request){
        $res=Content::leftjoin("category","category.cate_id","=","cate_content.cate_id")
                    ->where(["c_del"=>1])
                    ->orderby("c_sort","desc")
                    ->paginate(3);
        return view("content.show",compact("res"));
    }
    //删除
    public function del(Request $request){
        $id=$request->id;
        $res=Content::where("c_id",$id)->update(["c_del"=>2]);
        if($res){
            return ["code"=>"000000","msg"=>"删除成功"];
        }else{
            return ["code"=>"000001","msg"=>"删除失败"];
        }
    }
    //即点即改
    public function ajaxname(Request $request){
        $id = request()->get("c_id");
        $new_name = request()->get("new_name");
        // dd($id);
        $res = Content::where("c_id",$id)->update(["c_sort"=>$new_name]);
        if($res){
            return ["code"=>"00000","msg"=>"ok"];
        }
    }
    //修改展示
    public function upd(Request $request){
        $id=$request->id;
        $res=Category::get();
        $data=Content::where("c_id",$id)->first();
        return view("content.upd",compact("res","data"));
    }
    //修改执行
    public function updAdd(Request $request){
        $data=$request->all();
        $id=$data["c_id"];
        $res = Content::where("c_id",$id)->update($data);
        if($res){
            return ["code"=>"00000","msg"=>"修改成功"];
        }else{
            return ["code"=>"00000","msg"=>"修改失败"];
        }
    }
}
