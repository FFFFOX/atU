<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>系统主页</title>
	<style type="text/css">
	    body{background-color: #F5F5F5;}
		*{margin:0;padding:0;list-style-type:none;}
		a,img{border:0;}
		/* flexslider */
		.flexslider{position:relative;height:750px;overflow:hidden;background:url(/TeslaDrivers/Public/images/loading.gif) 50% no-repeat;}
		.slides{position:relative;z-index:1;margin-top: 40px;}
		.slides li{height:750px;}
		.flex-control-nav{position:absolute;bottom:10px;z-index:2;width:100%;text-align:center;}
		.flex-control-nav li{display:inline-block;width:14px;height:14px;margin:0 5px;*display:inline;zoom:1;}
		.flex-control-nav a{display:inline-block;width:14px;height:14px;line-height:40px;overflow:hidden;background:url(/TeslaDrivers/Public/images/dot.png) right 0 no-repeat;cursor:pointer;}
		.flex-control-nav .flex-active{background-position:0 0;}

		.flex-direction-nav{position:absolute;z-index:3;width:100%;top:45%;}
		.flex-direction-nav li a{display:block;width:50px;height:50px;overflow:hidden;cursor:pointer;position:absolute;}
		.flex-direction-nav li a.flex-prev{left:40px;background:url(/TeslaDrivers/Public/images/prev.png) center center no-repeat;}
		.flex-direction-nav li a.flex-next{right:40px;background:url(/TeslaDrivers/Public/images/next.png) center center no-repeat;}
	</style>
</head>
<body>
	<div class="jq22-container">

		<div class="flexslider">
			<ul class="slides">
				<li style="background:url(/TeslaDrivers/Public/images/img4.jpg) 50% 0 no-repeat;"></li>
				<li style="background:url(/TeslaDrivers/Public/images/img2.jpg) 50% 0 no-repeat;"></li>
				<li style="background:url(/TeslaDrivers/Public/images/img1.jpg) 50% 0 no-repeat;"></li>
				<li style="background:url(/TeslaDrivers/Public/images/img3.jpg) 50% 0 no-repeat;"></li>
				<li style="background:url(/TeslaDrivers/Public/images/img5.jpg) 50% 0 no-repeat;"></li>
			</ul>
		</div>
		
	</div>
	<!-- 外部调用特效实现轮播功能 -->
	<script src='https://libs.baidu.com/jquery/1.10.2/jquery.min.js'></script>
	<script type="text/javascript" src="/TeslaDrivers/Public/js/jquery.flexslider-min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.flexslider').flexslider({
				directionNav: true,
				pauseOnAction: false,
				slideshowSpeed: 3000
			});
		});
	</script>
</body>
</html>