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
  
   	
     <div class="pagelujing"><div class="name">仲裁员守则</div><span>您当前所在位置：<a href="#">首页</a> > <a href="#">仲裁员</a> > <a href="#">仲裁员守则</a></span></div>
     <div class="news-txt ny mg-t-b">
      <div class="news-con" id="a">
        <ul class="newslist ny" v-for="itm in da">
          <li><a href="#" v-bind:id="itm['c_id']" @click="dianji(itm['c_id'])">@{{itm['c_title']}}</a><span></span></li>
        </ul>
        
        <div class="tcdPageCode"></div>
      </div>
     <div id="b" style="display:none;">
        <div class="page-right">      
        <div class="biaoti">@{{d['c_title']}}</div>
            <div class="sshuomign" ><span>来源:@{{d['c_form']}}</span>|<span>发布时间：2020-7-8</span></div>
            <div class="article_txt">@{{d['c_content']}}</div>
        </div>     
        </div>
      </div>
      
    
   </div>

   <div class="clearfix"></div>
</div>
</div>
<script src="/index/js/Tabs.js"></script> 
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
	// $('#weather').leoweather({format:'{时段}好！<span id="colock">现在时间是：{年}年{月}月{日}日 星期{周} {时}:{分}:{秒}，</span> <b>{城市}天气</b> {天气} {夜间气温}℃ ~ {白天气温}℃'});
</script>
<script type="text/javascript">
$(function(){
	$(".listbox>li").click(function(){
		$(".listbox>li").removeClass("active");
  		$(this).addClass("active");
		});
	})
</script>
<!-- <script src="/index/js/jquery.page.js"></script>
<script>
    $(".tcdPageCode").createPage({
        pageCount:100,
        current:1,
        backFn:function(p){
            //console.log(p);
        }
    });
</script> -->
</body>
</html>
<script src="/vue/vue.js"></script>
<script src="https://cdn.staticfile.org/axios/0.18.0/axios.min.js"></script>
<script>
var vm=new Vue({
    el:"#apps",
    data:{
        data:null,
        da:null,
        d:111,
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
      send:function(id){
        var url="/home/list/cate";
         axios.post(url,{id},{emulateJSON:true}).then(function(res){
            var res=res.data["data"];
            //  console.log(res);return
            vm.da=res;
            // console.log(vm.da)
         })
      },
      dianji:function(id){
        var url="/home/list/contents";
        axios.post(url,{id},{emulateJSON:true}).then(function(res){
            var res=res.data["data"];
            $("#a").hide()
            $("#b").show()
            //  console.log(res);return
            
             vm.d=res;
         })
      }
    }
    
 })
</script>


@endsection


