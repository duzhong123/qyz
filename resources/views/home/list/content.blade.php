@extends('home.layout.main')
@section('content')
<div class="container mg-t-b container_col">
  <div class="page-left">
			<div class="pagelist">
				<h1>仲裁员</h1>
				<ul class="listbox">
                    @foreach($banner as $K=>$v)
					<li><a href="jvascript:;">{{$v->n_name}}</a></li>
					@endforeach
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
   	 <div class="pagelujing"><div class="name">仲裁员守则</div><span>您当前所在位置：<a href="#">首页</a> > <a href="#">仲裁员</a> > <a href="#">仲裁员守则</a></span></div>
     <div class="biaoti">{{$content->c_title}}</div>
				<div class="sshuomign"><span>来源:{{$content->c_form}}</span>|<span>发布时间：{{date("Y-m-d"),$content->c_time}}</span></div>
				<div class="article_txt">{{$content->c_content}}</div>
   	 
   </div>
   <div class="clearfix"></div>
</div>

<script src="js/Tabs.js"></script> 
<script type="text/javascript">
	$(function() {
		$("#link").rTabs({
			bind : 'hover',
			animation : 'fadein',
			auto:false
		});
	})
</script> 
<script type="text/javascript">
	$('#weather').leoweather({format:'{时段}好！<span id="colock">现在时间是：{年}年{月}月{日}日 星期{周} {时}:{分}:{秒}，</span> <b>{城市}天气</b> {天气} {夜间气温}℃ ~ {白天气温}℃'});
</script>
<script type="text/javascript">
$(function(){
	$(".listbox>li").click(function(){
		$(".listbox>li").removeClass("active");
  		$(this).addClass("active");
		});
	})
</script>
<script src="js/jquery.page.js"></script>
<script>
    $(".tcdPageCode").createPage({
        pageCount:100,
        current:1,
        backFn:function(p){
            //console.log(p);
        }
    });
</script>
</body>
</html>
@endsection