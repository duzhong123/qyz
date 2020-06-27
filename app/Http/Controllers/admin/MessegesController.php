<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Messeges;
class MessegesController extends Controller
{
    //列表展示
    public function show(Request $request){
        $res=Messeges::where(["mess_del"=>1])->paginate(2);
        return view("messeges.show",compact("res"));
    }
    //删除
    public function del(Request $request){
        $id=$request->id;
        $res=Messeges::where("mess_id",$id)->update(["mess_del"=>2]);
        if($res){
            return ["code"=>"000000","msg"=>"删除成功"];
        }else{
            return ["code"=>"000000","msg"=>"删除失败"];
        }
    }
}
