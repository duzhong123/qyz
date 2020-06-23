<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>广告-有点</title>
<link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
<script type="text/javascript" src="/admin/js/jquery.min.js"></script>
<style>
.aaa nav ul{
    margin-left: 40%;

}
.aaa nav ul li .page-link{
    float: left;
    margin-left: 10px;
    width: 17px;
    height: 20px;
    background: #5bc0de;
    line-height: 20px;
    padding-left: 8px;
    color: #ffffff;
 }

</style>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">导航栏</a>&nbsp;-</span>&nbsp;导航栏管理
			</div>
		</div>
		<div class="page">
			<!-- banner页面样式 -->
			<div class="banner">
				<div class="add">
					<a class="addA" href="/banner/banner">添加导航栏&nbsp;&nbsp;+</a>
				</div>
				<!-- banner 表格 显示 -->
				<div class="banShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="308px" class="tdColor">导航栏名称</td>
							<td width="450px" class="tdColor">导航栏链接</td>
							<td width="215px" class="tdColor">是否显示</td>
							<td width="180px" class="tdColor">排序</td>
							<td width="125px" class="tdColor">操作</td>
                        </tr>
                        @foreach($res as $v)
						<tr n_id="{{$v->n_id}}">
							<td height="50px">{{$v->n_id}}</td>
							<td height="50px">{{$v->n_name}}</td>
							<td>{{$v->n_url}}</td>
							<td>
                                <span class="span_show">{{$v->n_show=="1"?"展示":"不展示"}}</span>
                            </td>
							<td>
                                <span class="span_name">{{$v->n_sort}}</span>
                            </td>
							<td>
                            <a href="{{url('/banner/upd/'.$v->n_id)}}">
                                <img class="operation" data-id="{{$v->n_id}}" src="/admin/img/update.png"></a>
                                <img class="operation delban" data-id="{{$v->n_id}}" src="/admin/img/delete.png">
                            </td>
                            </tr>
                            @endforeach
                            <tr>
                             <td class="aaa" colspan="6">{{$res->links()}}</td>
                            </tr>
                    </table>

				</div>
				<!-- banner 表格 显示 end-->
			</div>
			<!-- banner页面样式end -->
		</div>

	</div>
	<!-- 删除弹出框 -->
	<div class="banDel">
		<div class="delete">
			<div class="close">
				<a><img src="/admin/img/shanchu.png" /></a>
			</div>
			<p class="delP1">你确定要删除此条记录吗？</p>
			<p class="delP2">
				<a href="#" class="ok yes" >确定</a><a class="ok no">取消</a>
			</p>
		</div>
	</div>
	<!-- 删除弹出框  end-->
</body>
</html>
<script>
    //删除
    $(function(){
        $(document).on("click",".delban",function(){
            var id=$(this).data("id");
            // console.log(id);
            $(".banDel").show();
            $(".yes").click(function(){
                $.ajax({
                    url:"/banner/del",
                    data:{"id":id},
                    dataType:"json",
                    success:function(res){
                        if(res.code==000000){
                            window.location.href="/banner/show";
                        }else{
                            alert(res.msg);
                        }
                    }
                })
            })
        })
        $(document).on("click",".no",function(){
            $(".banDel").hide();
           
        })
        
    });

//即点即改
$(document).on("click",".span_name",function(){
    //获取修改的内容
    var name=$(this).text();
    //给修改对象赋值个文本框
    $(this).parent().html("<input type='text' class='input_name' value="+name+">");
})
$(document).on("blur",".input_name",function(){
    var _this=$(this);
    //获取文本框的新值
    var new_name=_this.val();
    //获取id值
    var n_id=_this.parents("tr").attr("n_id");
    $.get(
        "/banner/ajaxname",
        {n_id:n_id,new_name:new_name},
        function(res){
            if(res.code==00000){
                _this.parent().html("<span class='span_name'>"+new_name+"</span>");
            }
        },"json"
    )
})

//极点技改是否展示

$(document).on("click",".span_show",function(){
    var _this=$(this);
    //获取文本框的新值
    var new_name=_this.text();
    if(new_name=="展示"){
        _this.text("不展示");
    }else{
        _this.text("展示");
    }
    // console.log(new_name);
    //获取id值
    var n_id=_this.parents("tr").attr("n_id");
    if(new_name=="展示"){
         new_name=2;
    }else{
         new_name=1;
    }
    
    $.get(
        "/banner/ajaxshow",
        {n_id:n_id,new_name:new_name},
        function(res){
            if(res.code==00000){
                if(new_name=="展示"){
                    new_name.text("不展示");
                }else{
                    new_name.text("展示");
                }
            }
        },"json"
    )
})

</script>