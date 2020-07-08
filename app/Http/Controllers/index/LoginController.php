<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\index\Login;
class LoginController extends Controller
{
    //注册展示
    public function reg(Request $request){
        return view("home.login.reg");
    }
    //登录
    public function login(Request $request){
        return view("home.login.login");
    }
    //注册执行
    public function regAdd(Request $request){
        $data=$request->all();
        $u_name=$data['u_name'];
        if(empty($u_name)){
            return ["code"=>"00005","msg"=>"用户名不能为空"];
            exit;
        }
        $u_pwd=md5($data['u_pwd']);
        if(empty($u_pwd)){
            return ["code"=>"00006","msg"=>"密码不能为空"];
            exit;
        }
        $re=Login::where("u_name",$u_name)->first();
        if($re){
            return ["code"=>"00004","msg"=>"已有用户名"];
            exit;
        }
        $all=[
            "u_name"=>$u_name,
            "u_pwd"=>$u_pwd
        ];
        $res=Login::insert($all);
        if($res){
            return ["code"=>"000001","msg"=>"注册成功"];
        }else{
            return ["code"=>"000002","msg"=>"注册失败"];
        }
    }
    //登录执行
    public function loginAdd(Request $request){
        $all=$request->all();
        $u_name=$all['u_name'];
        $u_pwd=md5($all['u_pwd']);
        //查询是否有次用户
        $rs=Login::where("u_name",$u_name)->first();
        if($rs){
            //判断密码是否正确
            if($rs->u_pwd==$u_pwd){
                session(["u_name"=>$rs->u_name]);
                return ["code"=>"000000","msg"=>"登录成功"];
            }else{
                return ["code"=>"000000","msg"=>"密码错误"];
            }
        }else{
            return ["code"=>"000001","msg"=>"没有此用户"];
        }
    }
}

