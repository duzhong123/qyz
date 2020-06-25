<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>导航栏</title>
<link rel="stylesheet" href="/admin/js/uploadify/uploadify.css">
<script type="text/javascript" src="/admin/js/jquery.min.js"></script>
<script src="/admin/js/uploadify/jquery.uploadify.js"></script>
<link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">分类图片</a>&nbsp;-</span>&nbsp;分类图片管理
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTop">
					<span>添加分类图片</span>
				</div>
				<div class="baBody">
                    <div class="bbD">
					        <input type="file" name="tu_img" id="tu_img" class="input1 tu_img" />
							<div class="show"></div>
					</div>
					<div class="bbD">
						图片名称：<input type="text" id="tu_name" class="input1" />
					</div>
					<div class="bbD">
						选择分类：<label><input type="radio" name="tu_show" id="tu_cate" checked value="1"/>服务指南</label>
						 		 <label><input type="radio" name="tu_show" id="tu_cate" value="2"/>在线服务</label>
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
    <?php $timestamp = time();?>
	$(document).ready(function(){
        $("#tu_img").uploadify({
            'formData': {
                            'timestamp': '<?php echo $timestamp;?>',
                            '_token': "{{csrf_token()}}",
                    },
            "swf":"/admin/js/uploadify/uploadify.swf",//上传插件
            'uploader':'/picture/pictureAdd',//上传路径
            'buttonText':"上传图片",//上传图片的名称
            onUploadSuccess:function(msg,newFilePath,info){
				
                var img_str="<img src = '"+newFilePath+"'>";
                $(".show").append(img_str);
            }
        })

       $(document).on("click","#tj",function(){
           var tu_img=$(".show").find("img").attr("src");
           var tu_name=$("#tu_name").val();
		   var tu_cate=$("input:radio:checked").val();
		   var data={};
		   data.tu_img=tu_img;
		   data.tu_name=tu_name;
		   data.tu_cate=tu_cate;
		   $.ajax({
			   url:"/picture/pictAdd",
			   data:data,
			   dataType:"json",
			   success:function(res){
				   if(res.code==000000){
					   alert(res.msg);
					   location.href="/picture/show";
				   }else{
					   alert(res.msg);
				   }
			   }
		   })
       })
    })
</script>