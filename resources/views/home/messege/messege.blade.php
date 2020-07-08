@extends('home.layout.main')
@section('content')
<script src="/index/js/jquery.page.js"></script>
<div id="apps">
<div class="container mg-t-b container_col">
  <div class="page-left">
			<div class="pagelist" id="app">
				<h1>仲裁员</h1>
				<ul class="listbox">
					<li v-for="itme in data">
          <a href="javascript:;" v-bind:id="itme['n_id']" @click="send(itme['n_id'])" >@{{itme['n_name']}}</a></li>
				</ul>
			</div>
			<div class="news-txt hotarticl">
				<div class="hottit"><span>热文推荐</span></div>
				<div class="news-con">
        <ul class="newslist">
          @foreach($category as $k=>$v)
          <li><a href="/home/list/content/{{$v->c_id}}">{{$v->c_title}}</a><span>{{date("Y-m-d"),$v->c_time}}</span></li>
         @endforeach
        </ul>
      </div>
			</div>
   </div>
   <div class="page-right">
<div class="page-right">
   	 <div class="pagelujing"><div class="name">在线留言</div><span>您当前所在位置：<a href="#">首页</a> > <a href="#">在线服务</a> > <a href="#">在线留言</a></span></div>
     <div class="news-txt ny mg-t-b">
       <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="liuyantab">
  <form action="" method="post" name="new" id="new"></form><tbody><tr>
    <td width="569" height="38" align="center" bgcolor="#F4F4F4" class="kkkk1">
      <a name="1" id="1"></a>
      
      <input type="radio" value="face2.gif" name="face"  checked="checked">
      <img border="0" src="/index/images/face2.gif">
	  <input type="radio" value="face1.gif" name="face">
      <img border="0" src="/index/images/face1.gif">
      <input type="radio" value="face3.gif" name="face">
      <img border="0" src="/index/images/face3.gif">
      <input type="radio" value="face4.gif" name="face">
      <img border="0" src="/index/images/face4.gif">
      <input type="radio" value="face5.gif" name="face">
      <img border="0" src="/index/images/face5.gif">
      <input type="radio" value="face6.gif" name="face">
      <img border="0" src="/index/images/face6.gif">
      <input type="radio" value="face7.gif" name="face">
      <img border="0" src="/index/images/face7.gif">
      <input type="radio" value="face8.gif" name="face">
      <img border="0" src="/index/images/face8.gif">
      <input type="radio" value="face9.gif" name="face">
      <img border="0" src="/index/images/face9.gif">
      <input type="radio" value="face10.gif" name="face">
    <img border="0" src="/index/images/face10.gif"> </td>
  </tr>
  <tr>
    <td height="66" class="kkkk2">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
      <tbody><tr>
        <td width="11%" height="34" align="center">姓　名：</td>
        <td colspan="2">
		<input name="name" type="text" class="input1" v-model="mess_name" size="52" maxlength="20" style="width:95%; border:#999999 dashed 1px; color:#666666; padding:5px; outline:none;" onfocus="this.select()" onblur="if (this.value =='') this.value='请输入您的姓名，不填写为匿名发表'" onclick="if (this.value=='请输入您的姓名，不填写为匿名发表') this.value=''" value="请输入您的姓名，不填写为匿名发表">
		</td>
      </tr>
      <tr>
        <td align="center">留　言：</td>
        <td colspan="2"><textarea name="words" cols="50" v-model="mess_text" rows="7" style="width:95%; border:#999999 dashed 1px; color: #5C5C5C; line-height:20px; padding:5px; outline:none;"></textarea></td>
      </tr>
      <tr>
        <td height="27" align="center">验证码：</td>
        <td width="14%"><input name="sn" type="text" v-model="mess_code" class="ipt1" id="sn" size="10" style=" border:#999999 dashed 1px;"></td>
        <td width="75%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="12%"></td>
            <td width="88%"><a href="/index/images/code.asp" target="code"><u>换一张</u></a></td>
          </tr>
        </tbody></table></td>
      </tr>

      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><span class="font8">
          <div align="center" style="margin:20px 0;">
          <input type="hidden" name="action_e" value="Add_New">
          <input type="submit" name="Submit2" @click="send" value="发表留言"></div></span></td>
      </tr>
    </tbody></table></td>
  </tr>
</tbody></table>
    </div>
   	 
   </div>
   <div class="clearfix"></div>
</div>
</div>
<script src="/vue/vue.js"></script>
<script src="https://cdn.staticfile.org/axios/0.18.0/axios.min.js"></script>
<script>
var vm=new Vue({
    el:"#apps",
    data:{
        data:null,
        mess_name:null,
        mess_text:null,
        mess_code:null,
        mess_emg:null
    },
    mounted(){
         var url="/home/list/caiyuan";
         axios.post(url,{emulateJSON:true}).then(function(res){
          //  console.log(res.data['data']);return 
           var res=res.data['data'];
          //  console.log(res.data)
           vm.data=res;
          //  console
         })
    },
    methods:{
        send:function(){
            var mess_name=this.mess_name;
            var mess_text=this.mess_text;
            var mess_code=this.mess_code;
            var mess_emg=$("input[name='face']:checked").val();
            // console.log(mess_emg);
            var url="/home/messege/tijiao";
            var dataInfo={
                mess_name:mess_name,
                mess_text:mess_text,
                mess_code:mess_code,
                mess_emg:mess_emg
            };
            axios.post(url,dataInfo).then(function(res){
                var res=res.data;
                if(res.code==000000){
                    alert(res.msg);
                    location.href="/home/index/index";
                }
            })
        }
    }
})
</script>
@endsection