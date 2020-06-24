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
					href="#">导航栏</a>&nbsp;-</span>&nbsp;导航栏管理
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>添加导航栏</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						导航栏名称：<input type="text" id="n_name" value="{{$res->n_name}}" class="input1" />
					</div>
					<div class="bbD">
						导航栏地址：<input type="text" id="n_url" value="{{$res->n_url}}" class="input1" />
					</div>
					<div class="bbD">
						是否显示：<label><input type="radio" name="u_show" id="n_show" value="1" {{$res->n_show==1?"checked":''}}/>是</label>
						 		 <label><input type="radio" name="u_show" id="n_show" value="2" {{$res->n_show==2?"checked":''}}/>否</label>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input class="input2"
							type="text" value="{{$res->n_sort}}" id="n_sort"/>
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" data-id="{{$res->n_id}}" id="tj" href="#">提交</button>
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
        var n_id=$(this).data("id");
        
		var n_name=$("#n_name").val();
		var n_url=$("#n_url").val();
		var n_show=$('input:radio:checked').val();
		var n_sort=$("#n_sort").val();
		var data={};
		data.n_name=n_name;
		data.n_url=n_url;
		data.n_show=n_show;
		data.n_sort=n_sort;
        data.n_id=n_id;
		$.ajax({
			url:"/banner/updAdd",
			data:data,
			dataType:"json",
			success:function(res){
				if(res.code==000000){
                    location.href="/banner/show";
                }
			}
		})

	})
</script>