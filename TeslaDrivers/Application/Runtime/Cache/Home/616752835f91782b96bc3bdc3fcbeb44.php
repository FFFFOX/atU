<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<script type="text/javascript" src="js/respond.min.js"></script>
<script type="text/javascript" src="js/PIE_IE678.js"></script>
<![endif]-->
<link href="/TeslaDrivers/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="/TeslaDrivers/Public/css/style.css"/>       
<link href="/TeslaDrivers/Public/assets/css/codemirror.css" rel="stylesheet">
<link rel="stylesheet" href="/TeslaDrivers/Public/assets/css/ace.min.css" />
      <link rel="stylesheet" href="/TeslaDrivers/Public/Widget/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">
<link rel="stylesheet" href="/TeslaDrivers/Public/assets/css/font-awesome.min.css" />
<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
<link href="/TeslaDrivers/Public/Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
<link href="/TeslaDrivers/Public/Widget/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />

<title>修改俱乐部</title>
</head>
<body>
	<h3 style="color: #3b98d6;font-family: '华文中宋'; font-weight: 700; margin-top: 20px;margin-left: 20px;">俱乐部修改</h3>
<div class="clearfix" id="add_picture">
	<form action="" method="post" class="form form-horizontal" id="form-article-add">
		<div class=" clearfix cl">
         <label class="form-label col-2">俱乐部地点：</label>
		 <div class="formControls col-10"><input class="input-text" type="hidden" name="cid" value="<?php echo ($info["cid"]); ?>"/></div>
		 <input class="form-control" type="hidden" name="cid" value="<?php echo ($info["cid"]); ?>"/>
	     <div class="formControls col-10"><input type="text" class="input-text" value="<?php echo ($info["loc"]); ?>" placeholder="" id="" name="loc"></div>
        </div>
        <div class=" clearfix cl">
            <label class="form-label col-2">俱乐部名称：</label>
            <div class="formControls col-10"><input type="text" class="input-text" value="<?php echo ($info["name"]); ?>" placeholder="" id="" name="name"></div>
           </div>

		<div class="clearfix cl">
			<div class="Button_operation">
				<input class="btn btn-primary radius" type="submit" value="确认"></input> 
				<a class="btn btn-default radius" href="<?php echo U('clubmanage');?>" type="button" value="">取消</a>
			</div>
		</div>
	</form>
    </div>
</div>
<script src="js/jquery-1.9.1.min.js"></script>   
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/typeahead-bs2.min.js"></script>
<script src="assets/layer/layer.js" type="text/javascript" ></script>
<script src="assets/laydate/laydate.js" type="text/javascript"></script>
<script type="text/javascript" src="Widget/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="Widget/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="Widget/zTree/js/jquery.ztree.all-3.5.min.js"></script> 
<script type="text/javascript" src="Widget/Validform/5.3.2/Validform.min.js"></script> 
<script type="text/javascript" src="Widget/webuploader/0.1.5/webuploader.min.js"></script>
<script type="text/javascript" src="Widget/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="Widget/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="Widget/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script> 
<script src="js/lrtk.js" type="text/javascript" ></script>
<script type="text/javascript" src="js/H-ui.js"></script> 
<script type="text/javascript" src="js/H-ui.admin.js"></script> 
<script>
$(function() { 
	$("#add_picture").fix({
		float : 'left',
		skin : 'green',	
		durationTime :false,
		stylewidth:'220',
		spacingw:0,
		spacingh:260,
	});
});
$( document).ready(function(){
//初始化宽度、高度
  
   $(".widget-box").height($(window).height()); 
   $(".page_right_style").height($(window).height()); 
   $(".page_right_style").width($(window).width()-220); 
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){

	 $(".widget-box").height($(window).height()); 
	 $(".page_right_style").height($(window).height()); 
	 $(".page_right_style").width($(window).width()-220); 
	});	
});
$(function(){
	var ue = UE.getEditor('editor');
});

</script>
</body>
</html>