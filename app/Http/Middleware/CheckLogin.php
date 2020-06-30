<?php

namespace App\Http\Middleware;

use Closure;
use App\models\UserRole;
class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $server_name=$request->path();
        $user_id=session("user");
        // dd($user_id);
        if(empty($user_id)){
            return redirect('/rbac/login');
            exit;
        }
        $route=0;
        $allRoute=["/"];
        if(in_array($server_name,$allRoute)){
            $route=1;
        }else{
            foreach($user_id["power"] as $k=>$v){
                if($v["p_url"]==$server_name){
                    $route=1;
                    break;
                }
            }
        }
        if(!$route){
            echo "<script>alert('没有权限');</script>";
            exit;
        }
        return $next($request);
    }
}
