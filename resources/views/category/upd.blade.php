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
					href="#">分类</a>&nbsp;-</span>&nbsp;分类管理
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>添加分类</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						分类名称：<input type="text" id="cate_name" value="{{$res->cate_name}}" class="input1" />
					</div>
					<div class="bbD">
						是否显示：<label><input type="radio" name="cate_show" id="cate_show" value="1" {{$res->cate_show==1?"checked":''}}/>是</label>
						 		 <label><input type="radio" name="cate_show" id="cate_show" value="2" {{$res->cate_show==2?"checked":''}}/>否</label>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input class="input2"
							type="text" id="cate_sort" value="{{$res->cate_sort}}"/>
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" id="tj" data-id="{{$res->cate_id}}" href="#">提交</button>
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
        var cate_id=$(this).data("id");
		var cate_name=$("#cate_name").val();
		var cate_show=$('input:radio:checked').val();
		var cate_sort=$("#cate_sort").val();
		var data={};
		data.cate_name=cate_name;
		data.cate_show=cate_show;
		data.cate_sort=cate_sort;
        data.cate_id=cate_id;
		$.ajax({
			url:"/category/updAdd",
			data:data,
			dataType:"json",
			success:function(res){
				if(res.code==000000){
                    alert(res.msg);
                    location.href="/category/show";
                }
			}
		})

	})
</script>