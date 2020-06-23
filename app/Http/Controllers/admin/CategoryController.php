<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Category;
class CategoryController extends Controller
{
    //添加展示页面
    public function category(Request $request){
        return view("category.category");
    }
    //添加执行页面
    public function categoryAdd(Request $request){
        $data=$request->all();
        $data["cate_time"]=time();
        $bol=Category::insert($data);
        if($bol){
            return ["code"=>"000000","msg"=>"添加成功"];
        }else{
            return ["code"=>"000001","msg"=>"添加失败"];
        }
    }
    //展示列表页
    public function show(Request $request){
        $res=Category::where(["cate_del"=>1])->orderby("cate_sort","desc")->paginate(3);
        return view("category.show",compact("res"));
    }
    //删除
    public function del(Request $request){
        $id=$request->id;
        $res=Category::where("cate_id",$id)->update(["cate_del"=>2]);
        if($res){
            return ["code"=>"000000","msg"=>"删除成功"];
        }else{
            return ["code"=>"000001","msg"=>"删除失败"];
        }
    }
    //修改展示
    public function upd(Request $request){
       $id= $request->id;
        $res=Category::where("cate_id",$id)->first();
        return view("category.upd",compact("res"));
    }
    //修改执行
    public function updAdd(Request $request){
        $res=$request->all();
        $id=$res["cate_id"];
        $data=Category::where("cate_id",$id)->update($res);
        if($data){
            return ["code"=>"000000","msg"=>"修改成功"];
        }else{
            return ["code"=>"000001","msg"=>"修改失败"];
        }
    }
}
