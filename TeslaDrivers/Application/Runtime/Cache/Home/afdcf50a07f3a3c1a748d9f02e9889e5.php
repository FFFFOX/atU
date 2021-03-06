<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="/TeslaDrivers/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/TeslaDrivers/Public/css/style.css"/>       
        <link href="/TeslaDrivers/Public/assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="/TeslaDrivers/Public/assets/css/ace.min.css" />
        <link rel="stylesheet" href="/TeslaDrivers/Public/font/css/font-awesome.min.css" />
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="/TeslaDrivers/Public/js/jquery-1.9.1.min.js"></script>
        <script src="/TeslaDrivers/Public/assets/js/bootstrap.min.js"></script>
		<script src="/TeslaDrivers/Public/assets/js/typeahead-bs2.min.js"></script>  
        <script src="/TeslaDrivers/Public/js/lrtk.js" type="text/javascript" ></script>	         	
		<script src="/TeslaDrivers/Public/assets/js/jquery.dataTables.min.js"></script>
		<script src="/TeslaDrivers/Public/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="/TeslaDrivers/Public/assets/layer/layer.js" type="text/javascript" ></script>          
        <script src="/TeslaDrivers/Public/assets/laydate/laydate.js" type="text/javascript"></script>
        <script src="/TeslaDrivers/Public/js/H-ui.js" type="text/javascript"></script>
        <script src="/TeslaDrivers/Public/js/displayPart.js" type="text/javascript"></script>
<title>车型管理</title>
 <script language="javascript">
    function delcfm() {
        if (!confirm("确认要删除？")) {
            window.event.returnValue = false;
        }
    }
</script>
</head>

<body>

	<h3 style="color: #3b98d6;font-family: '华文中宋'; font-weight: 700; margin-top: 20px;margin-left: 20px;">车型列表</h3>
<div class="clearfix">
 <div class="article_style" id="article_style">

 <!--文章列表-->
 <div class="Ads_list">
     <div class="article_list">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
       <thead>
		 <tr>
				<th width="80px">序号</th>
				<th width="220px">车型</th>               
				<th width="150px">操作</th>
			</tr>
		</thead>
        <tbody>
			<?php if(is_array($info)): foreach($info as $k=>$v): ?><tr> 
					<td><?php echo ($k+1); ?></td>
					<td><?php echo ($v["name"]); ?></td>
					<td class="td-manage">   
					<a title="编辑" href="<?php echo U('cartypemanage_update',array('tid'=>$v['tid']));?>" class="btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a>      
					<a title="删除" href="<?php echo U('cartypemanage_delete',array('tid'=>$v['tid']));?>" class="btn btn-xs btn-danger" onClick="delcfm()" ><i class="fa fa-trash  bigger-120"></i></a>
					</td>
				</tr><?php endforeach; endif; ?>
        </tbody>
	   </table> 
	   <br/>    
       <div class="col-sm-6"><div class="dataTables_info" id="sample-table_info" role="status" aria-live="polite">第 1 到 <?php echo ($info1); ?> 条记录，共 <?php echo ($info1); ?> 条</div></div> 
     </div>
 </div>
 </div>
</div>
</body>
</html>
<script>
$(function () {  
        $(".displayPart").displayPart();  
   });
 //面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('#add_page').on('click', function(){
	var cname = $(this).attr("title");
	var chref = $(this).attr("href");
	var cnames = parent.$('.Current_page').html();
	var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe').html(cname);
    parent.$('#iframe').attr("src",chref).ready();;
	parent.$('#parentIframe').css("display","inline-block");
	parent.$('.Current_page').attr({"name":herf,"href":"javascript:void(0)"}).css({"color":"#4c8fbd","cursor":"pointer"});
	//parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+" class='iframeurl'>" + cnames + "</a>");
    parent.layer.close(index);
	
}); 
$(function() {
		var oTable1 = $('#sample-table').dataTable( {
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,4,5,7,]}// 制定列不参与排序
		] } );
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
})

 $(function() { 
	$("#article_style").fix({
		float : 'left',
		//minStatue : true,
		skin : 'green',	
		durationTime :false,
		stylewidth:'220',
		spacingw:30,//设置隐藏时的距离
	    spacingh:250,//设置显示时间距
		set_scrollsidebar:'.Ads_style',
		table_menu:'.Ads_list'
	});
});
//初始化宽度、高度  
 $(".widget-box").height($(window).height()); 
 $(".Ads_list").width($(window).width()-220);
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	$(".widget-box").height($(window).height());
	 $(".Ads_list").width($(window).width()-220);
});

</script>