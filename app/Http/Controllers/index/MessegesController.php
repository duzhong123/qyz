<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Banner;
use App\models\Category;
use App\models\Content;
use App\models\Messeges;
class MessegesController extends Controller
{
    //留言展示
    public function messege(Request $request){
         //查询导航栏
         $banner_where=[
            "n_show"=>1,
            "n_del"=>1,
        ];
        $banner=Banner::where($banner_where)->limit(7)->get();

        //查询列表
        $cate_where=[
            "c_show"=>1,
            "c_del"=>1,
        ];
        $category=Category::join("cate_content","category.cate_id","=","cate_content.cate_id")
                        ->where($cate_where)
                        ->orderby("c_sort","desc")
                        ->limit(6)
                        ->get();
        return view("home.messege.messege",compact('banner',"category"));
    }

    //留言提交
    public function tijiao(Request $request){
        $data=$request->all();
        $all['mess_name']=$data['mess_name'];
        $all['mess_emg']=$data['mess_emg'];
        $all['mess_code']=$data['mess_code'];
        $all['mess_text']=$data['mess_text'];
        $all['mess_time']=time();
        if(empty($data['mess_emg'])){
            return ['code'=>"000002","msg"=>"验证码不能为空"];
            exit;
        }
        $res=Messeges::insert($all);
        if($res){
            return ['code'=>"000000","msg"=>"添加成功"];
        }else{
            return ['code'=>"000001","msg"=>"添加失败"];
        }
    }

}
