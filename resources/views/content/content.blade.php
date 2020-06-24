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
					href="#">分类内容</a>&nbsp;-</span>&nbsp;分类内容管理
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>添加分类内容</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						内容标题：<input type="text" id="c_title" class="input1" />
					</div>
					<div class="bbD">
						内容cate_id：<select name="cate_id" id="cate_id">
                                            <option value="0">--请选择--</option>
                                            @foreach($res as $v)
                                                <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                                            @endforeach
                                        </select>
                    </div>
                    <div class="bbD">
						发布作者：<input type="text" id="c_form" class="input1" />
					</div>
					<div class="bbD">
						是否显示：<label><input type="radio" name="c_show" id="c_show" checked value="1"/>是</label>
						 		 <label><input type="radio" name="c_show" id="c_show" value="2"/>否</label>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input class="input2"
							type="text" id="c_sort"/>
                    </div>
                    <div class="bbD">
						发布内容：<textarea name="c_content" id="c_content" cols="30" rows="10"></textarea>
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" id="tj" href="#">提交</button>
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
		var c_title=$("#c_title").val();
		var cate_id=$("#cate_id").val();
        // console.log(cate_id);
		var c_show=$("#c_show").val();
		var c_sort=$("#c_sort").val();
        var c_content=$("#c_content").val();
        var c_form=$("#c_form").val();
		var data={};
		data.c_title=c_title;
		data.cate_id=cate_id;
		data.c_show=c_show;
		data.c_sort=c_sort;
        data.c_content=c_content;
		data.c_form=c_form;
		$.ajax({
			url:"/content/contentAdd",
			data:data,
			dataType:"json",
			success:function(res){
                
				if(res.code==000000){
                    alert(res.msg);
					location.href="/content/show";
				}
			}
		})

	})
</script>