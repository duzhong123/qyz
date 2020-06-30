<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;
use App\models\UserRole;
use App\models\PowerRole;
class LoginController extends Controller
{
    //注册展示
    public function reg(Request $request){
        return view("login.reg");
    }
    //注册执行
    public function regAdd(Request $request){
        $data=$request->all();
        //判断是否重复
        $user=User::where("user_name",$data['user_name'])->first();
        if($user){
            return ["code"=>"000005","msg"=>"已有改名字"];
            exit;
        }
        //判断不能为空
        if(empty($data["user_name"])){
            return ["code"=>"000001","msg"=>"用户名不能为空"];
            exit;
        }
        if(empty($data["user_pwd"])){
            return ["code"=>"000002","msg"=>"密码不能为空"];
            exit;
        }
        $data["user_pwd"]=md5($data["user_pwd"]);
        $data["user_time"]=time();
        $res=User::insert($data);
        if($res){
            return ["code"=>"000000","msg"=>"注册成功"];
        }else{
            return ["code"=>"000003","msg"=>"注册失败"];
        }
    }
    //登录展示
    public function login(Request $request){
        return view("login.login");
    }
    //登录执行
    public function loginAdd(Request $request){
        $data=$request->all();
        //判断不能为空
        if(empty($data["user_name"])){
            return ["code"=>"000001","msg"=>"用户名不能为空"];
            exit;
        }
        if(empty($data["user_pwd"])){
            return ["code"=>"000002","msg"=>"密码不能为空"];
            exit;
        }
        
        //登录执行
        $user=User::where("user_name",$data["user_name"])->first();
        if($user){
            if($user["user_pwd"]==md5($data["user_pwd"])){
                $user_id=$user->user_id;
                $r_id=UserRole::where("user_id",$user_id)->get(["r_id"]);
                
                // dd($r_id);
                $power_role=PowerRole::join("admin_power","power_role.p_id","=","admin_power.p_id")
                            ->whereIn("power_role.r_id",$r_id)
                            ->get()
                            ->toArray();
                $user["power"]=$power_role;
                // dd($power);
                session(["user"=>$user]);
                return ["code"=>"000000","msg"=>"登录成功"];
            }else{
                return ["code"=>"000002","msg"=>"密码错误"];
            }
        }else{
            return ["code"=>"000001","msg"=>"用户名不存在"];
        }
    }
}
