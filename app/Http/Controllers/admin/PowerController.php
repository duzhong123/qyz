<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Power;
class PowerController extends Controller
{
    //权限展示
    public function power(Request $request){
        return view("power.power");
    }
    //添加执行
    public function powerAdd(Request $request){
        $data=$request->all();
        $res=Power::insert($data);
        if($res){
            return ["code"=>"000000","msg"=>"添加成功"];
        }else{
            return ["code"=>"000001","msg"=>"添加失败"];
        }
    }
    //列表展示
    public function show(Request $request){
        $res=Power::where(["p_del"=>1])->paginate(4);
        return view("power.show",compact("res"));
    }
    //删除
    public function del(Request $request){
        $id=$request->id;
        $res=Power::where("p_id",$id)->update(["p_del"=>2]);
        if($res){
            return ["code"=>"000000","msg"=>"删除成功"];
        }else{
            return ["code"=>"000001","msg"=>"删除失败"];
        }
    }
    //修改展示
    public function upd(Request $request){
        $id=$request->id;
        $res= Power::where("p_id",$id)->first();
        return view("power.upd",compact("res"));
    }
    //修改执行
    public function updAdd(Request $request){
        $data=$request->all();
        $id=$data["p_id"];
        $res=Power::where("p_id",$id)->update($data);
        if($res){
            return ["code"=>"000000","msg"=>"修改成功"];
        }else{
            return ["code"=>"000001","msg"=>"修改失败"];
        }
    }

}
