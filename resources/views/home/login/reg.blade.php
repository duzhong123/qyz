<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>前台登录</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/login/css/style.css" />
<style>
body{height:100%;background:#16a085;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
</style>
<script src="/login/js/jquery.js"></script>
<script src="/login/js/verificationNumbers.js"></script>
<script src="/login/js/Particleground.js"></script>
<script>
$(document).ready(function() {
  //粒子背景特效
  $('body').particleground({
    dotColor: '#5cbdaa',
    lineColor: '#5cbdaa'
  });
  //验证码
  createCode();
  //测试提交，对接程序删除即可
  $(".submit_btn").click(function(){
	  location.href="index.html";
	  });
});
</script>
</head>
<body>
<dl class="admin_login">
 <dt>
  <strong>企业站管理系统</strong>
  <em>Management System</em>
 </dt>
 <div id="app">
 <dd class="user_icon">
  <input type="text" placeholder="账号"  name="u_name" v-model="u_name" class="login_txtbx"/>
 </dd>
 <dd class="pwd_icon">
  <input type="password" placeholder="密码" name="u_pwd" v-model="u_pwd" class="login_txtbx"/>
 </dd>
 <dd>
  <input type="button" value="立即注册" @click="send" class="submit_btn"/>
 </dd>
 </div>
 <a href="/home/login/login">登录</a>
 <dd>
  <p>© 2015-2016 DeathGhost 版权所有</p>
  <p>陕B2-20080224-1</p>
 </dd>
</dl>
</body>
</html>
<script src="/vue/vue.js"></script>
<script src="https://cdn.staticfile.org/axios/0.18.0/axios.min.js"></script>
<script>
    var vm=new Vue({
        el:"#app",
        data:{
            u_name:null,
            u_pwd:null
        },
        methods:{
            send:function(){
               var u_name=this.u_name;
               var u_pwd=this.u_pwd;
               var dataInfo={
                   u_name:u_name,
                   u_pwd:u_pwd,
               };
               var url="/home/login/regAdd";
               axios.post(url,dataInfo).then(function(res){
                    var res=res.data;
                    if(res.code==000001){
                        alert(res.msg);
                        location.href="/home/login/login";
                    }else{
                        alert(res.msg)
                    }
               })
            },
        },
    });
</script>
