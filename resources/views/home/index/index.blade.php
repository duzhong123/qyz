@extends('home.layout.main')
@section('content')
<div class="container container_col" id="appss">
  <div class="news-notice">
    <div class="indnews">
      <div class="news-pic">
        <div id="newspic" class="slideBox">
          <ul class="items">
            <li><a href="#" title="本会召开第一届第一次主任会议和委员会议1"><img src="/index/upload/newsimg.jpg"></a></li>
            <li><a href="#" title="本会召开第一届第一次主任会议和委员会议2"><img src="/index/upload/newsimg.jpg"></a></li>
            <li><a href="#" title="本会召开第一届第一次主任会议和委员会议3"><img src="/index/upload/newsimg.jpg"></a></li>
            <li><a href="#" title="本会召开第一届第一次主任会议和委员会议4"><img src="/index/upload/newsimg.jpg"></a></li>
            <li><a href="#" title="本会召开第一届第一次主任会议和委员会议5"><img src="/index/upload/newsimg.jpg"></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="news-txt" >
      <div class="news-title">
        <div class="news-name tab-nav j-tab-nav">
        	<a href="javascript:void(0);" v-for="it in aaa" v-bind:id="it['cate_id']" @click="send(it['cate_id'])">@{{it['cate_name']}}<i></i></a>
        </div>
        <a href="#" class="more">更多 >></a>
      </div>
      <div class="tab-con">
      <div class="j-tab-con">
      <div class="tab-con-item news-con" id="a" style="display: block;">
        <ul class="newslist" v-for="itme in bbb">
          <li><a href="#" v-bind:id="itme['c_id']" @click="dianji(itme['c_id'])">@{{itme['c_title']}}</a><span>09-10</span></li>
        </ul>
      </div>
      <div id="b" style="display:none;">
            
        <div class="biaoti">@{{ccc['c_title']}}</div>
            <div class="sshuomign" ><span>来源:@{{ccc['c_form']}}</span>|<span>发布时间：2020-7-8</span></div>
            <div class="article_txt">@{{ccc['c_content']}}</div>
           
        </div>
      </div>
      </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="fwzn">
    <div class="tit">服<br />
      务<br />
      指<br />
      南</div>
    <div class="iconlist" id="acc" > 
      <a href="#" class="icon1" v-for="i in abc">
      <div class="pic"><img v-bind:src="[i['tu_img']]" width="80px" height="80px" /></div>
      <p>@{{i.tu_name}}</p>
      </a>
    </div>
  </div>
  <div class="col-box">
    <div class="news-txt col-3">
      <div class="news-title">
        <div class="name">仲裁规则<i></i></div>
        <div class="smalllist"> <a href="#">仲裁规则</a> <a href="#">法律法规</a> <a href="#">统计数据</a> </div>
        <a href="#" class="more">更多 >></a> </div>
      <div class="news-con">
        <ul class="newslist">
          <li><a href="#">本会开展加强仲裁工作推进会议</a><span>09-10</span></li>
          <li><a href="#">本会召开第一届仲裁员聘任会议</a><span>09-10</span></li>
          <li><a href="#">本会与市中级人民法院就建立仲裁与诉讼衔接机制召开座谈会</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
          <li><a href="#">“一带一路”仲裁发展交流会在我市召开</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
        </ul>
      </div>
    </div>
    <div class="news-txt col-3">
      <div class="news-title">
        <div class="name">仲裁员<i></i></div>
        <div class="smalllist"> <a href="#">仲裁员名册</a> <a href="#">仲裁员守则</a> </div>
        <a href="#" class="more">更多 >></a> </div>
      <div class="news-con">
        <ul class="newslist">
          <li><a href="#">本会开展加强仲裁工作推进会议</a><span>09-10</span></li>
          <li><a href="#">本会召开第一届仲裁员聘任会议</a><span>09-10</span></li>
          <li><a href="#">本会与市中级人民法院就建立仲裁与诉讼衔接机制召开座谈会</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
          <li><a href="#">“一带一路”仲裁发展交流会在我市召开</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
        </ul>
      </div>
    </div>
    <div class="news-txt col-3 last">
      <div class="news-title">
        <div class="name">法律法规<i></i></div>
        <a href="#" class="more">更多 >></a> </div>
      <div class="news-con">
        <ul class="newslist">
          <li><a href="#">本会开展加强仲裁工作推进会议</a><span>09-10</span></li>
          <li><a href="#">本会召开第一届仲裁员聘任会议</a><span>09-10</span></li>
          <li><a href="#">本会与市中级人民法院就建立仲裁与诉讼衔接机制召开座谈会</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
          <li><a href="#">“一带一路”仲裁发展交流会在我市召开</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
        </ul>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="col-box">
    <div class="col-2-l">
      <div class="tit">在线服务</div>
      <div class="list"> 
        <div class="ct">
          <a href="#" class="color_bj color-1"><div class="pic"><img src="/index/images/zxfw1.png" /></div><p>注册登记</p></a>
        </div>
        <div class="ct">
          <a href="#" class="color_bj color-2"><div class="pic"><img src="/index/images/zxfw2.png" /></div><p>在线立案</p></a>
        </div>
        <div class="ct">
          <a href="#" class="color_bj color-3"><div class="pic"><img src="/index/images/zxfw3.png" /></div><p>在线审批</p></a>
        </div>
        <div class="ct">
          <a href="#" class="color_bj color-4"><div class="pic"><img src="/index/images/zxfw4.png" /></div><p>在线咨询</p></a>
        </div>
        <div class="ct">
          <a href="#" class="color_bj color-5"><div class="pic"><img src="/index/images/zxfw5.png" /></div><p>在线调解</p></a>
        </div>
        <div class="ct">
          <a href="#" class="color_bj color-6"><div class="pic"><img src="/index/images/zxfw6.png" /></div><p>在线查询</p></a>
        </div>
        <div class="ct last">
          <a href="#" class="color_bj color-7"><div class="pic"><img src="/index/images/zxfw7.png" /></div><p>电子送达</p></a>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    
    
  </div>
  <div class="col-box">
    <div class="col-2-r">
      <div class="tit">格式合同</div>
      <div class="tit" style="margin-left:307px;">示范条款</div>
      <div class="tit" style="margin-left:420px; background: url(/index/images/jsq2.png) 0 9px no-repeat;">费用速算</div>
      <div class="clearfix"></div>
      <div class="sfbox">
      	<div class="gsht">
        	<ul class="newslist htlist">
          <li><a href="#">本会开展加强仲裁工作推进会议</a><span>09-10</span></li>
          <li><a href="#">本会召开第一届仲裁员聘任会议</a><span>09-10</span></li>
          <li><a href="#">本会与市中级人民法院就建立仲裁与诉讼衔接机制召开座谈会</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
          <li><a href="#">"一带一路"仲裁发展交流会在我市召开</a><span>09-10</span></li>
          <li><a href="#">宁夏仲裁工作座谈会在我市召开</a><span>09-10</span></li>
        </ul>
        </div>
        <div class="sftxt">
          <div class="info">将民商事案子发展到仲裁机构办理有四种办法：<br />
            ①在合同中写上以上条款若发生纠纷提交仲裁机构仲裁的条款；<br />
            ②后来补充仲裁协议；<br />
            ③临时邀请仲裁；<br />
            ④在签订合同的同时就约定先予仲裁。<br />
            其中第一种是最基本方式。<br />
            根据《中华人民共和国仲裁法》和《最高人民法院关于适用（中华人民共和国仲裁法）》相关规定中华人民共和国仲裁法中华人民共和国仲裁法中华人民共和国仲裁法中华人民共和国仲裁法中华人民共和国仲裁法</div>
          <a href="#">[查看详情]</a> </div>
        <div class="jisuan">
          <div class="jsbox"> <span>争议金额</span>
            <div class="jsq">
              <input type="text" class="ipt-jsq" placeholder="输入金额..." />
              <a href="javascript:;">计算</a> </div>
          </div>
          <div class="jsjg">
            <div class="tab">案件受理费：<span>0.00元</span></div>
            <div class="tab">案件处理费：<span>0.00元</span></div>
            <div class="tab last">总计：<span>0.00元</span></div>
          </div>
          <div class="smtxt">仅供参考，计算结果以立案室的计算为准</div>
          <div class="xxlinks"> <a href="#" class="fl">案件受理费标准>></a> <a href="#" class="fr">案件处理费标准>></a> </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="clearfix"></div>
    
    
  </div>
  <div class="linksbox" id="link">
    <div class="txtlisttit linktit"> <span>友情链接</span>
    <div class="listcon tab-con" id="qqq">
      <div class="j-tab-con">
        <div class="tab-con-item linkcon" style="display: block;">
          <ul class="linkslist" v-for="ire in ddd">
            <li><a v-bind:href="[ire['url']]" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@{{ire['name']}}</a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
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
	$(function() {
		$("#news").rTabs({
			bind : 'hover',
			animation : 'fadein',
			auto:false
		});
	})
</script>
</body>
</html>
<script src="/vue/vue.js"></script>
<script src="https://cdn.staticfile.org/axios/0.18.0/axios.min.js"></script>
<script>
  //分类查询
var vm=new Vue({
  el:"#appss",
  data:{
    aaa:null,
    bbb:null,
    ccc:1,
  },
  mounted(){
    var url="/home/index/home";
    axios.post(url).then(function(res){
      var res=res.data["data"];
      vm.aaa=res;
      // console.log(vm.aaa);
    })
  },
  methods:{
    send:function(id){
      var url="/home/index/content";
      axios.post(url,{id}).then(function(res){
        var res=res.data['data'];
        vm.bbb=res;
        // console.log(res);
      })
    },
    dianji:function(id){
      var url="/home/index/cate";
      axios.post(url,{id},{emulateJSON:true}).then(function(res){
        var res=res.data['data'];
        $("#a").hide()
        $("#b").show()
        vm.ccc=res;
        console.log(res);
      })
    },
  }
})
//分类图片
var vm2=new Vue({
  el:"#acc",
  data:{
    abc:null,
  },
  mounted(){
    var url="/home/index/tupian";
    axios.post(url,{emulateJSON:true}).then(function(res){
      var res=res.data['data'];
      vm2.abc=res;
      // console.log(vm.abc.tu_name);
    })
  }
})
//友情链接
var vm3=new Vue({
  el:'#qqq',
  data:{
    ddd:null,
  },
  mounted(){
    var url="/home/index/youqing";
    axios.post(url).then(function(res){
      var res=res.data['data'];
      // console.log(res);
      vm3.ddd=res;
    })
  }
})
</script>
@endsection
