<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;
use App\models\Role;
use App\models\PowerRole;
class RoleController extends Controller
{
    //角色添加
    public function role(Request $request){
        $user=User::get();
        return view("role.role",compact("user"));
    }
    //角色添加执行
    public function roleAdd(Request $request){
        $data=$request->all();
        $data["r_time"]=time();
        $res=Role::insert($data);
        if($res){
            return ["code"=>"000000","msg"=>"添加角色成功"];
        }else{
            return ["code"=>"000001","msg"=>"添加角色失败"];
        }
    }
    //角色展示
    public function show(Request $request){
        $res=Role::leftjoin("user","user.user_id","=","admin_role.user_id")
            ->where(["r_del"=>1])
            ->paginate(2);
        return view("role.show",compact("res"));
    }
    //删除
    public function del(Request $request){
        $id=$request->id;
        $res=Role::where("r_id",$id)->update(["r_del"=>2]);
        if($res){
            return ["code"=>"000000","msg"=>"删除角色成功"];
        }else{
            return ["code"=>"000001","msg"=>"删除角色失败"];
        }
    }
    //修改展示
    public function upd(Request $request){
        $id=$request->id;
        $res=Role::where("r_id",$id)->first();
        $user=User::get();
        return view("role.upd",compact("res","user"));
    }
    //修改执行
    public function updAdd(Request $request){
        $data=$request->all();
        $id=$data["r_id"];
        $res=Role::where("r_id",$id)->update($data);
        if($res){
            return ["code"=>"000000","msg"=>"修改角色成功"];
        }else{
            return ["code"=>"000001","msg"=>"修改角色失败"];
        }
    }
    //给用户赋予权限
    public function content(Request $request){
        $id=$request->id;
        $res=Role::where("r_id",$id)->first();
        return view("role.content",compact("res"));
    }
    //赋予角色权限
    public function contentAdd(Request $request){
        $res=$request->all();
        // print_r($res);exit;
        $model=new PowerRole;
        foreach($res["p_id"] as $k=>$v){
            $data=[
                "p_id"=>intval($v),
                "r_id"=>$res["r_id"],
            ];
           
            $res1=$model->insert($data);
        }
        if($res1){
            return ["code"=>"000000","msg"=>"赋值权限成功"];
        }else{
            return ["code"=>"000001","msg"=>"赋值权限失败"];
        }
    }
}
