<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="/TeslaDrivers/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/TeslaDrivers/Public/css/style.css"/>       
        <link rel="stylesheet" href="/TeslaDrivers/Public/assets/css/ace.min.css" />
        <link rel="stylesheet" href="/TeslaDrivers/Public/assets/css/font-awesome.min.css" />
        <link href="/TeslaDrivers/Public/Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
	    <script src="/TeslaDrivers/Public/js/jquery-1.9.1.min.js"></script>
        <script src="/TeslaDrivers/Public/assets/js/bootstrap.min.js"></script>
<title>活动详情页面</title>
</head>
<body>
<h3 style="color: #3b98d6;font-family: '华文中宋'; font-weight: 700; margin-top: 20px;margin-left: 20px;">活动详情页面</h3>
        
<div class="more_left">
<img src="/TeslaDrivers/Public/<?php echo (substr($info["img"],9)); ?>" width="80%">
<br/><br/>
<img src="/TeslaDrivers/Public/<?php echo (substr($info["backgroundimg"],9)); ?>" width="80%">
</div>

<div class="more_right"><div class="type_style">
  <div class="type_content">
    <form action="" method="post" class="form form-horizontal" id="form-user-add">
    <table class="table table-hover">                             
        <tbody>
            <tr>
                <td>1</td>
                <td>活动名称</td>
                <td><?php echo ($info["name"]); ?></td>
			</tr>
            <tr>
                <td>2</td>
                <td>活动时间</td>
                <td><?php echo ($info["date"]); ?> <?php echo ($info["begin"]); ?>--<?php echo ($info["end"]); ?></td>
            </tr>
            <tr>
                <td>3</td>
                <td>活动地点</td>
                <td><?php echo ($info["loc"]); ?> <?php echo ($info["site"]); ?></td>
            </tr>
            <tr>
                <td>4</td>
                <td>人数限制</td>
                <td><?php echo ($info["total"]); ?></td>
            </tr>
            <tr>
                <td>5</td>
                <td>报名截止时间</td>
                <td><?php echo ($info["deadline"]); ?></td>
            </tr>  
            <tr>
                <td>6</td>
                <td>报名限制</td>
                <td>以下俱乐部人员才可以报名，请注意限制条件</td>
            </tr>
          
        </tbody>
    </table>

    <table class="table table-striped table-bordered table-hover" id="sample-table">
      <thead>
        <tr>
              <!---->
			  <th width="100px">俱乐部地点</th>
               <th width="360px">俱乐部名称</th>               
           </tr>
       </thead>
       <tbody>
        <?php if(is_array($info["Allow"])): foreach($info["Allow"] as $k=>$v): ?><tr>
		 <td>
			<?php echo ($v["clubloc"]); ?>
          </td>
          <td>
			<?php echo ($v["club"]); ?>
          </td>
         </tr><?php endforeach; endif; ?>
       </tbody>
      </table> 

  </form>


  </div>
</div>
</div>
</div>

<script type="text/javascript" src="Widget/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="Widget/Validform/5.3.2/Validform.min.js"></script>
<script type="text/javascript" src="assets/layer/layer.js"></script>
<script type="text/javascript" src="js/H-ui.js"></script> 
<script type="text/javascript" src="js/H-ui.admin.js"></script>

</body>
</html>