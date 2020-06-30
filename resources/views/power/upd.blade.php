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
					href="#">权限</a>&nbsp;-</span>&nbsp;权限管理
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>添加权限</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						权限名称：<input type="text" id="p_name" value="{{$res->p_name}}" class="input1" />
					</div>
					<div class="bbD">
						url地址：<input type="text" id="p_url" value="{{$res->p_url}}" class="input1" />
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" data-id="{{$res->p_id}}" id="tj" href="#">提交</button>
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
        var p_id=$(this).data("id");
		var p_name=$("#p_name").val();
        var p_url=$("#p_url").val();
		var data={};
		data.p_name=p_name;
		data.p_url=p_url;
        data.p_id=p_id;
		$.ajax({
			url:"/power/updAdd",
			data:data,
			dataType:"json",
			success:function(res){
                // alert(res);
				if(res.code==000000){
                    alert(res.msg);
					location.href="/power/show";
				}else{
                    alert(res.msg);
                }
			}
		})

	})
</script>