<?php if (!defined('THINK_PATH')) exit();?>﻿
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>特友后台管理系统  </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="/TeslaDrivers/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/TeslaDrivers/Public/assets/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="/TeslaDrivers/Public/assets/css/ace.min.css" />
		<link rel="stylesheet" href="/TeslaDrivers/Public/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="/TeslaDrivers/Public/assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="/TeslaDrivers/Public/css/style.css"/>
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="/TeslaDrivers/Public/assets/js/ace-extra.min.js"></script>
		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
        <!--[if !IE]> -->
		<script src="/TeslaDrivers/Public/js/jquery-1.9.1.min.js"></script>        
		<!-- <![endif]-->
		<!--[if IE]>
         <script type="text/javascript">window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"script>");</script>
        <![endif]-->
		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
		</script>
		<script src="/TeslaDrivers/Public/assets/js/bootstrap.min.js"></script>
		<script src="/TeslaDrivers/Public/assets/js/typeahead-bs2.min.js"></script>
		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="/TeslaDrivers/Public/assets/js/ace-elements.min.js"></script>
		<script src="/TeslaDrivers/Public/assets/js/ace.min.js"></script>
        <script src="/TeslaDrivers/Public/assets/layer/layer.js" type="text/javascript"></script>
		<script src="/TeslaDrivers/Public/assets/laydate/laydate.js" type="text/javascript"></script>
        <script src="/TeslaDrivers/Public/js/jquery.nicescroll.js" type="text/javascript"></script>
        
<script type="text/javascript">	
 $(function(){ 
 var cid = $('#nav_list> li>.submenu');
	  cid.each(function(i){ 
       $(this).attr('id',"Sort_link_"+i);
   
    })  
 })
 jQuery(document).ready(function(){ 	
    $.each($(".submenu"),function(){
	var $aobjs=$(this).children("li");
	var rowCount=$aobjs.size();
	var divHeigth=$(this).height();
    $aobjs.height(divHeigth/rowCount);	  	
  }); 
    //初始化宽度、高度

    $("#main-container").height($(window).height()-76); 
	$("#iframe").height($(window).height()-140); 
	 
	$(".sidebar").height($(window).height()-99); 
    var thisHeight = $("#nav_list").height($(window).outerHeight()-173); 
	$(".submenu").height();
	$("#nav_list").children(".submenu").css("height",thisHeight);
	
    //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	$("#main-container").height($(window).height()-76); 
	$("#iframe").height($(window).height()-140);
	$(".sidebar").height($(window).height()-99); 
	
	var thisHeight = $("#nav_list").height($(window).outerHeight()-173); 
	$(".submenu").height();
	$("#nav_list").children(".submenu").css("height",thisHeight);
  });
    $(document).on('click','.iframeurl',function(){
                var cid = $(this).attr("name");
				var cname = $(this).attr("title");
                $("#iframe").attr("src",cid).ready();
				$("#Bcrumbs").attr("href",cid).ready();
				$(".Current_page a").attr('href',cid).ready();	
                $(".Current_page").attr('name',cid);
				$(".Current_page").html(cname).css({"color":"#333333","cursor":"default"}).ready();	
				$("#parentIframe").html('<span class="parentIframe iframeurl"> </span>').css("display","none").ready();	
				$("#parentIfour").html(''). css("display","none").ready();		
      });
	 
    
		
});
 /******/
  $(document).on('click','.link_cz > li',function(){
	$('.link_cz > li').removeClass('active');
	$(this).addClass('active');
});
/*******************/
//jQuery( document).ready(function(){
//	  $("#submit").click(function(){
//	// var num=0;
//     var str="";
//     $("input[type$='password']").each(function(n){
//          if($(this).val()=="")
//          {
//              // num++;
//			   layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
//                title: '提示框',				
//				icon:0,				
//          }); 
//             // layer.msg(str+=""+$(this).attr("name")+"不能为空！\r\n");
//             layer.close(index);
//          }		  
//     });    
//})		
//	});

/*********************点击事件*********************/
$( document).ready(function(){
  $('#nav_list,.link_cz').find('li.home').on('click',function(){
	$('#nav_list,.link_cz').find('li.home').removeClass('active');
	$(this).addClass('active');
  });												
//时间设置
  function currentTime(){ 
    var d=new Date(),str=''; 
    str+=d.getFullYear()+'年'; 
    str+=d.getMonth() + 1+'月'; 
    str+=d.getDate()+'日'; 
    str+=d.getHours()+'时'; 
    str+=d.getMinutes()+'分'; 
    str+= d.getSeconds()+'秒'; 
    return str; 
} 

setInterval(function(){$('#time').html(currentTime)},1000); 
//修改密码
$('.change_Password').on('click', function(){
    layer.open({
    type: 1,
	title:'修改密码',
	area: ['300px','300px'],
	shadeClose: true,
	content: $('#change_Pass'),
	btn:['确认修改'],
	yes:function(index, layero){		
		   if ($("#password").val()==""){
			  layer.alert('原密码不能为空!',{
              title: '提示框',				
				icon:0,
			    
			 });
			return false;
          } 
		  if ($("#Nes_pas").val()==""){
			  layer.alert('新密码不能为空!',{
              title: '提示框',				
				icon:0,
				
			 });
			return false;
          } 
		   
		  if ($("#c_mew_pas").val()==""){
			  layer.alert('确认新密码不能为空!',{
              title: '提示框',				
				icon:0,
			    
			 });
			return false;
          }
		    if(!$("#c_mew_pas").val || $("#c_mew_pas").val() != $("#Nes_pas").val() )
        {
            layer.alert('密码不一致!',{
              title: '提示框',				
				icon:0,
			    
			 });
			 return false;
        }   
		 else{			  
			  layer.alert('修改成功！',{
               title: '提示框',				
			icon:1,		
			  }); 
			  layer.close(index);      
		  }	 
	}
    });
});
  $('#Exit_system').on('click', function(){
      layer.confirm('是否确定退出系统？', {
     btn: ['是','否'] ,//按钮
	 icon:2,
    }, 
	function(){
	  location.href="<?php echo U('logout');?>";
        
    });
});
});
function link_operating(name,title){
                var cid = $(this).name;
				var cname = $(this).title;
                $("#iframe").attr("src",cid).ready();
				$("#Bcrumbs").attr("href",cid).ready();
				$(".Current_page a").attr('href',cid).ready();	
                $(".Current_page").attr('name',cid);
				$(".Current_page").html(cname).css({"color":"#333333","cursor":"default"}).ready();	
				$("#parentIframe").html('<span class="parentIframe iframeurl"> </span>').css("display","none").ready();	
				$("#parentIfour").html(''). css("display","none").ready();		
      
    
}
</script>	
	</head>
	<body>
		<div class="navbar navbar-default" id="navbar">
        <script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>					
						<!-- <img src="images/logo.png" width="470px"> -->
						<h2 style="margin:20px; font-family: '黑体';">特友后台管理系统</h2>
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->
				<div class="navbar-header operating pull-left">
				
				</div>
			   <div class="navbar-header pull-right" role="navigation">
               <ul class="nav ace-nav">	
                <li class="light-blue">
				<a data-toggle="dropdown" href="#" class="dropdown-toggle">
				 <span  class="time"><em id="time"></em></span><span class="user-info"><small>欢迎光临,</small><?php echo (session('admin_id')); ?></span>
				 <i class="icon-caret-down"></i>
				</a>
				<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
				 <li><a href="javascript:void(0)" name="admin_info.html" title="个人信息" class="iframeurl"><i class="icon-user"></i>个人资料</a></li>
				 <li class="divider"></li>
				 <li><a href="javascript:ovid(0)" id="Exit_system"><i class="icon-off"></i>退出</a></li>
				</ul>
			   </li>
							</ul>
						</li>

					
					</ul>
                </div>
			</div>
		</div>


		<div class="main-container" id="main-container">
        <script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>
				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
						
					</script>
				
					<div id="menu_style" class="menu_style">
					<ul class="nav nav-list" id="nav_list">
					 <li class="home"><a href="javascript:void(0)" name="<?php echo U('home');?>" class="iframeurl" title=""><i class="icon-home"></i><span class="menu-text"> 系统首页 </span></a></li>
					 
					 <li><a href="#" class="dropdown-toggle"><i class="icon-bookmark"></i><span class="menu-text"> 车型管理 </span><b class="arrow icon-angle-down"></b></a>
						<ul class="submenu">
							<li class="home"><a href="javascript:void(0)" name="<?php echo U('cartypemanage');?>" title="车型列表" class="iframeurl"><i class="icon-double-angle-right"></i>车型列表</a></li>
							<li class="home"><a href="javascript:void(0)" name="<?php echo U('cartypemanage_add');?>" title="车型添加" class="iframeurl"><i class="icon-double-angle-right"></i>车型添加</a></li>
						</ul>
					</li>

					<li><a href="#" class="dropdown-toggle"><i class="icon-group"></i><span class="menu-text"> 俱乐部管理 </span><b class="arrow icon-angle-down"></b></a>
						<ul class="submenu">
							<li class="home"><a href="javascript:void(0)" name="<?php echo U('clubmanage');?>" title="俱乐部查询"  class="iframeurl"><i class="icon-double-angle-right"></i>俱乐部查询</a></li>
							<li class="home"><a href="javascript:void(0)" name="<?php echo U('clubmanage_add');?>" title="俱乐部添加" class="iframeurl"><i class="icon-double-angle-right"></i>俱乐部添加</a></li>
						</ul>
					</li>

					<li><a href="#" class="dropdown-toggle"><i class="icon-list"></i><span class="menu-text"> 活动管理 </span><b class="arrow icon-angle-down"></b></a>
						<ul class="submenu">
							<li class="home"><a href="javascript:void(0)" name="<?php echo U('actmanage');?>" title="活动列表"  class="iframeurl"><i class="icon-double-angle-right"></i>活动列表</a></li>
							<li class="home"><a href="javascript:void(0)" name="<?php echo U('act_add');?>" title="活动添加" class="iframeurl"><i class="icon-double-angle-right"></i>活动添加</a></li>
							<li class="home"><a href="javascript:void(0)" name="<?php echo U('act_limit');?>" title="活动限制查询" class="iframeurl"><i class="icon-double-angle-right"></i>活动限制查询</a></li>
						</ul>
					</li>

					<li><a href="#" class="dropdown-toggle"><i class="icon-user"></i><span class="menu-text"> 用户管理 </span><b class="arrow icon-angle-down"></b></a>
						<ul class="submenu">
							<li class="home"><a href="javascript:void(0)" name="<?php echo U('usermanage');?>" title="用户查询"  class="iframeurl"><i class="icon-double-angle-right"></i>用户查询</a></li>
							<li class="home"><a href="javascript:void(0)" name="<?php echo U('usermanage_total');?>" title="用户统计" class="iframeurl"><i class="icon-double-angle-right"></i>用户统计</a></li>
						</ul>
					</li>

					<li><a href="#" class="dropdown-toggle"><i class="icon-desktop"></i><span class="menu-text"> 报名情况 </span><b class="arrow icon-angle-down"></b></a>
						<ul class="submenu">
							<li class="home"><a href="javascript:void(0)" name="<?php echo U('applymanage');?>" title="报名情况查询"  class="iframeurl"><i class="icon-double-angle-right"></i>报名情况查询</a></li>
						</ul>
					</li>
  
					</ul>
					</div>
					<script type="text/javascript">
           $("#menu_style").niceScroll({  
	        cursorcolor:"#888888",  
	        cursoropacitymax:1,  
         	touchbehavior:false,  
	        cursorwidth:"5px",  
	        cursorborder:"0",  
	        cursorborderradius:"5px"  
            }); 
          </script>
					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>
                    <script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

				<div class="main-content">
                <script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>
					<div class="breadcrumbs" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="">首页</a>
							</li>
							<li class="active"><span class="Current_page iframeurl"></span></li>
                            <li class="active" id="parentIframe"><span class="parentIframe iframeurl"></span></li>
							<li class="active" id="parentIfour"><span class="parentIfour iframeurl"></span></li>
						</ul>
					</div>
                    
                 <iframe id="iframe" style="border:0; width:100%; background-color:#FFF;"name="iframe" frameborder="0" src="<?php echo U('home');?>">  </iframe>
				 

<!-- /.page-content -->
				</div><!-- /.main-content -->	
                
                  <div class="ace-settings-container" id="ace-settings-container">
                      <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                          <i class="icon-cog bigger-150"></i>
                      </div>
  
                      <div class="ace-settings-box" id="ace-settings-box">
                          <div>
                              <div class="pull-left">
                                  <select id="skin-colorpicker" class="hide">
                                      <option data-skin="default" value="#438EB9">#438EB9</option>
                                      <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                      <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                  </select>
                              </div>
                              <span>&nbsp; 选择皮肤</span>
                          </div>
  
                          <div>
                              <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                              <label class="lbl" for="ace-settings-sidebar"> 固定滑动条</label>
                          </div>
  
                          <div>
                              <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                              <label class="lbl" for="ace-settings-rtl">切换到左边</label>
                          </div>
  
                          <div>
                              <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                              <label class="lbl" for="ace-settings-add-container">
                                  切换窄屏
                                  <b></b>
                              </label>
                          </div>
                      </div>
                  </div>
	</div>
		</div>

         <!--修改密码样式-->
         <div class="change_Pass_style" id="change_Pass">
            <ul class="xg_style">
             <li><label class="label_name">原&nbsp;&nbsp;密&nbsp;码</label><input name="原密码" type="password" class="" id="password"></li>
             <li><label class="label_name">新&nbsp;&nbsp;密&nbsp;码</label><input name="新密码" type="password" class="" id="Nes_pas"></li>
             <li><label class="label_name">确认密码</label><input name="再次确认密码" type="password" class="" id="c_mew_pas"></li>              
            </ul>          
         </div>
        <!-- /.main-container -->
		<!-- basic scripts -->
		
</body>
</html>