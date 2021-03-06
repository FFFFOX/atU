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
		<script src="/TeslaDrivers/Public/assets/js/jquery.dataTables.min.js"></script>
		<script src="/TeslaDrivers/Public/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="/TeslaDrivers/Public/assets/layer/layer.js" type="text/javascript" ></script>          
        <script src="/TeslaDrivers/Public/assets/laydate/laydate.js" type="text/javascript"></script>
<title>活动报名限制</title>
</head>

<body>
	
<div class="margin clearfix">
 <div class="Guestbook_style">
     <h3 style="color: #3b98d6;font-family: '华文中宋'; font-weight: 700;">活动报名限制查询</h3>
 <div class="search_style">
     <!-- 查询窗格 -->
	 <form action="" method="post">
      <ul class="search_content clearfix">
       <li><label class="l_f"></label><input name="activity" type="text" class="text_add" placeholder="请输入活动名称" style=" width:300px"></li>
     
        <li style="width:90px;">
			<button type="submit" class="btn_search"><i class="fa fa-search"></i>查询</button>
			
	    </li>
      </ul>
	  </form>
    </div>

    <!--留言列表-->
    <div class="Guestbook_list">
      <table class="table table-striped table-bordered table-hover" id="sample-table">
      <thead>
		 <tr>
          <th width="300px">活动名称</th>             
          <th width="300">可参与俱乐部名称</th>
          </tr>
      </thead>
	<tbody>
		<?php if(is_array($info)): foreach($info as $k=>$v): ?><tr>
          <td><?php echo ($v["activity"]); ?></td>
          <td><?php echo ($v["club"]); ?></td>
        </tr><?php endforeach; endif; ?>
        </tbody>
      </table>
	</div>
	<br/>
	<div class="col-sm-6"><div class="dataTables_info" id="sample-table_info" role="status" aria-live="polite">第 1 到 <?php echo ($info1); ?> 条记录，共 <?php echo ($info1); ?> 条</div></div> 
</div>
 </div>
</div>
</body>
</html>
 <!--
<script type="text/javascript">
 /*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url+'#?='+id,w,h);
}
/*留言-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}

/*checkbox激发事件*/
$('#checkbox').on('click',function(){
	if($('input[name="checkbox"]').prop("checked")){
		 $('.Reply_style').css('display','block');
		}
	else{
		
		 $('.Reply_style').css('display','none');
		}	
	})
/*留言查看*/
function Guestbook_iew(id){
	var index = layer.open({
        type: 1,
        title: '留言信息',
		maxmin: true, 
		shadeClose:false,
        area : ['600px' , ''],
        content:$('#Guestbook'),
		btn:['确定','取消'],
		yes: function(index, layero){		 
		  if($('input[name="checkbox"]').prop("checked")){			 
			 if($('.form-control').val()==""){
				layer.alert('回复内容不能为空！',{
               title: '提示框',				
			  icon:0,		
			  }) 
			 }else{			
			      layer.alert('确定回复该内容？',{
				   title: '提示框',				
				   icon:0,	
				   btn:['确定','取消'],	
				   yes: function(index){					   
					     layer.closeAll();
					   }
				  }); 		  
		   }			
	      }else{			
			 layer.alert('是否要取消回复！',{
               title: '提示框',				
			icon:0,		
			  }); 
			  layer.close(index);      		  
		  }
	   }
	})	
};
	/*字数限制*/
function checkLength(which) {
	var maxChars = 200; //
	if(which.value.length > maxChars){
	   layer.open({
	   icon:2,
	   title:'提示框',
	   content:'您输入的字数超过限制!',	
    });
		// 超过限制的字数了就将 文本框中的内容按规定的字数 截取
		which.value = which.value.substring(0,maxChars);
		return false;
	}else{
		var curr = maxChars - which.value.length; //250 减去 当前输入的
		document.getElementById("sy").innerHTML = curr.toString();
		return true;
	}
};
</script>
<script type="text/javascript">
jQuery(function($) {
		var oTable1 = $('#sample-table').dataTable( {
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,5,6]}// 制定列不参与排序
		] } );
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});	
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			})
</script>
-->