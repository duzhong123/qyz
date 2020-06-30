<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>导航栏</title>
<link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
<script type="text/javascript" src="/admin/js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">角色</a>&nbsp;-</span>&nbsp;角色管理
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>添加角色</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						角色名称：<input type="text" id="r_name" value="{{$res->r_name}}" class="input1" />
                    </div>
                    <div class="bbD">
						用户名：<select name="" id="user_id">
                                    <option value="">--请选择--</option>
                                    @foreach($user as $k=>$v)
                                    <option value="{{$v->user_id}}"{{$res->user_id==$v->user_id ? "selected" : ""}}>{{$v->user_name}}</option>
                                    @endforeach
                            </select>
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" data-id="{{$res->r_id}}" id="tj" href="#">提交</button>
							<a class="btn_ok btn_no" href="#">取消</a>
						</p>
					</div>
				</div>
			</div>

			<!-- 上传广告页面样式end -->
		</div>
	</div>
</body>
</html>
<script>
	$(document).on("click","#tj",function(){
        var r_id=$(this).data("id");
       console.log(r_id);
		var r_name=$("#r_name").val();
        var user_id=$("#user_id").val();
		var data={};
        data.r_id=r_id;
		data.r_name=r_name;
		data.user_id=user_id;
		$.ajax({
			url:"/role/updAdd",
			data:data,
			dataType:"json",
			success:function(res){
                // alert(res);
				if(res.code==000000){
                    alert(res.msg);
					location.href="/role/show";
				}else{
                    alert(res.msg);
                }
			}
		})

	})
</script>