<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Picture;
class PictureController extends Controller
{
    //添加展示页面
    public function picture(Request $request){
        
        return view("picture.picture");
    }
    //添加执行页面
    public function pictureAdd(Request $request){
        $fileinfo=$_FILES["Filedata"];
        $tmp_name=$fileinfo["tmp_name"];//上传文件临时名字
        $ext=explode(".",$fileinfo["name"])[1];//文件扩展名
        $newFileName=md5(uniqid()).".".$ext;
        $newFilePath="./uploads/".Date("Y/m/d/",time());
        if(!is_dir($newFilePath)){
            mkdir($newFilePath,777,true);
        }
        $newFilePath=$newFilePath.$newFileName;
        move_uploaded_file($tmp_name,$newFilePath);
        $newFilePath=ltrim($newFilePath,".");
        echo $newFilePath;
    }
    //添加自行
    public function pictAdd(Request $request){
        $data=$request->all();
        if(empty($data["tu_name"])){
            return ["code"=>"000003","msg"=>"名称不能为空"];
            exit;
        }
        $wx=Picture::where("tu_name",$data["tu_name"])->first();
        if($wx){
            return ["code"=>"000002","msg"=>"已有改名字"];
            exit;
        }
        $data["tu_time"]=time();
        $res=Picture::insert($data);
        if($res){
            return ["code"=>"000000","msg"=>"添加成功"];
        }else{
            return ["code"=>"000001","msg"=>"添加失败"];
        }
    }
    //展示
    public function show(Request $request){
        $res=Picture::where(["tu_del"=>1])->paginate(2);
        return view("picture.show",compact("res"));
    }
    //删除
    public function del(Request $request){
        $id=$request->id;
        $res=Picture::where("tu_id",$id)->update(["tu_del"=>2]);
        if($res){
            return ["code"=>"000000","msg"=>"删除成功"];
        }else{
            return ["code"=>"000001","msg"=>"删除失败"];
        }
    }
    //修改展示
    public function upd(Request $request){
        $id=$request->id;
        $res=Picture::where("tu_id",$id)->first();
        return view("picture.upd",compact("res"));
    }
    //修改执行
    public function updAdd(Request $request){
        $data=$request->all();
        $id=$data["tu_id"];
        $res=Picture::where("tu_id",$id)->update($data);
        if($res){
            return ["code"=>"000000","msg"=>"修改成功"];
        }else{
            return ["code"=>"000001","msg"=>"修改失败"];
        }
    }
}
