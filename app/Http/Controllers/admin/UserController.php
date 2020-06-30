<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;
use App\models\UserRole;
class UserController extends Controller
{
    //用户名展示
    public function show(Request $request){
        $res=User::paginate(2);
        return view("user.show",compact("res"));
    }
    //赋值角色
    public function content(Request $request){
        $id=$request->id;
        $res=User::where("user_id",$id)->first();
        return view("user.content",compact("res"));
    }
    //赋予角色执行
    public function contentAdd(Request $request){
        $res=$request->all();
        $model=new UserRole;
        foreach($res['r_id'] as $k=>$v){
            $data=[
                "r_id"=>intval($v),
                "user_id"=>$res['user_id'],
            ];
            $res1=$model->insert($data);
        }
        if($res1){
            return ['code'=>'000000',"msg"=>"赋予角色成功"];
        }else{
            return ["code"=>"000001","msg"=>"赋予角色失败"];
        }
    }
    
}
