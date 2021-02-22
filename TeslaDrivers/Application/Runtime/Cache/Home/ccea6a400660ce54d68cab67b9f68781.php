<?php if (!defined('THINK_PATH')) exit();?>﻿
<!DOCTYPE html>
<html>
<head autoConcat="1">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="renderer" content="webkit" />
<meta http-equiv="Cache-Control" content="no-transform " />

<meta name="keywords" content="">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0,minimal-ui">
<link rel="shortcut icon" href="/TeslaDrivers/Public/assets/images/51vui-favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" href="/TeslaDrivers/Public/assets/css/login-reset.css"/>
<link rel="stylesheet" type="text/css" href="/TeslaDrivers/Public/assets/css/login-style.css"/>

<title>特友后台管理系统登录</title>
<script type="text/javascript" src="/TeslaDrivers/Public/assets/js/jquery-1.9.1.js"></script>

<script type="text/javascript">
$(document).ready(function(e) {
    $(".aqhuan").click(function(e) {
        if( $(".box-form").hasClass("loginAppShow") ){
            $(".box-form").hide().removeClass("loginAppShow");
            $(".app-hidden-novisibility").show().addClass("loginAppShow");
        }else{
            $(".box-form").show().addClass("loginAppShow");
            $(".app-hidden-novisibility").hide().removeClass("loginAppShow");
        }
    });
});
function selectNotAll(){//全选删除class
 $('.goods_sale_property').each(function(i){
    $(this).removeClass('goods_sale_property_checked');
 }); 
}

function setTab(name,cursel,n,vuiTabsActive,loginItem){
    for(i=1;i<=n;i++){
        var menu=document.getElementById(name+i);
        var con=document.getElementById("con_"+name+"_"+i);
        menu.className=i==cursel?"vuiTabsActive loginItem":"loginItem";
        con.style.display=i==cursel?"block":"none";
    }
}

</script>

</head>

<body class="login-register-content">
    <div class="header">
        <div class="vui-grid">
            <div class="logo">
                <a  class="logo-img"  ></a>
                <h1 class="login-title">欢迎登录</h1>
            </div>
        </div>
    </div>


<div style="position: absolute;">
  <!-- <video src="assets/images/1.mp4" controls='controls' loop='loop'></video> -->
  <!---->
  <video class="hero__asset hero-video" preload="auto" playsinline="" data-autoplay-desktop="true" data-autoplay-portrait="true" data-autoplay-mobile="true" muted="" loop="" poster="assets/images/1.mp4" data-poster-desktop="assets/images/1.mp4" data-poster-portrait="assets/images/1.mp4" data-poster-mobile="assets/images/1.mp4" data-src-desktop="assets/images/1.mp4" data-src-mobile="assets/images/1.mp4" data-src-portrait="assets/images/1.mp4" data-object-fit="true" src="/TeslaDrivers/Public/assets/images/1.mp4" autoplay="" data-loaded="true"></video>
	
</div>

           
<div class="j-content content">
<div class="vui-grid">
<!--
<a href="/TeslaDrivers/Public/javascript:;" class="mask"></a>
-->
<div class="box-warp">
<div class="box-form-wrap">
<!-- 账号密码登录 -->
    <div class="box-form loginAppShow">
        <div class="form-wrap">
            <div class="login-tabs">
                <div class="login-tab-con vui-tabs-content">
                    <div class="j-login-content-item login-content-item login-form-content vui-tabs-panel login-con-panel login-content-active">
                        <div class="login-header">

                           		<div class="scan">
                                    <span class="scan-tip">
                                        <img src="/TeslaDrivers/Public/assets/images/icon-scan-tip.png" width="97px">
                                    </span>
									<!---->
                                    <a class="login-by-item-app hiddenAccount aqhuan" href="javascript:;">
                                        
										<span class="scan-right">
                                        <img src="/TeslaDrivers/Public/assets/images/icon-scan_ec.png" width="52px">
                                        </span>
                                    </a>
                                </div>
                               <div class="scan-title-sty" style="text-align: center;">账号密码登录</div>
                        
                        </div>
                        <div class="j-login-form vui-tabs-content">
                          
                            <div class="vui-tabs-panel login-password-panel" id="con_one_1">
                                <form id="login" class="login-form" action="" method="post">
								
                                    <div class="j-login-by login-by-username login-by-active">
                                        <div class="vui-form-item vui-form-username">
                                            <div class="visibilityWarning input-new" id="accent-pas-tip">
                                                <label>
												<img src="/TeslaDrivers/Public/assets/images/icon-username-input.png" width="37px" class="left"/>
												
												<input id="username" name="username" class="vui-inp-log username-input left vui-input j-vui-form-username" type="text" placeholder="用户名">
												
												</label>
                                            </div>
                                            <div class="visibilityError"></div>
                                        </div>
                                        <div class="vui-form-item vui-form-password">
                                            <div class="input-new" id="accent-password-tip">
                                                <label>
												<img src="/TeslaDrivers/Public/assets/images/icon-password-input.png" width="37px" class="left"/>
                                               
											   <input id="password" name="password" class="vui-inp-log username-input left vui-input" type="password" placeholder="密码">
											   
											   </label>
										   </div>
                                            <div class="visibilityError"></div>
                                        </div>
										<p style="color:red"><?php echo ((isset($errorLogin ) && ($errorLogin !== ""))?($errorLogin ):"&nbsp;"); ?></p>
                                        <div class="vui-form-item login-form-button">
                                            <button class="vui-btn vui-btn-primary j-login-btn linear-gradient-btn" type="submit" id="login_btn" >立即登录</button>
                                        </div>                            
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="vui-tabs-panel login-con-panel"></div>
                    <div class="vui-tabs-panel login-con-panel"></div>
                </div>
            </div>
        </div>
        <div class="login-other-ways-login login-other-ways">
            <div class="authorize-login " >
                <p class="clearfix authorize-login-title">
                    <span class="authorize-login-title-right authorize-login-title-right-sty">
                    </span>
                </p>

            </div>
        </div>
    </div>
<!-- APP扫码登陆 -->
    <div class="app-hidden-novisibility" id="con_tow_2">
        <div class="scan">
            <span class="scan-tip"><img src="/TeslaDrivers/Public/assets/images/icon-scan-account-tip.png" width="120px"></span>
            <a class="login-by-item-app hiddenAppScan aqhuan" href="javascript:;">
                <span class="scan-right"><img src="/TeslaDrivers/Public/assets/images/icon-app-scan.png" width="52px"></span>
            </a>
        </div>
        <div class="scan-content-sty">
            <div class="scan-main-mar">
                <div class="scan-title-sty">App扫码登录</div>
                <div id="app">
                    <div class="login-app-code">
                        <p class=""><span class="scan-tip-mar"><img src="/TeslaDrivers/Public/assets/images/icon-square-scan.png" class="scan-tip-img">手机APP<br><span class="scan-tip-orange">扫码登录</span>方便快捷</span></p>
                        <div class="qrcode-wrap j-qrcode-wrap">
                            <div class="qrcode-img j-qrcode-img">
                                <img id="appWeiImg" class="wei-img" src="/TeslaDrivers/Public/assets/images/icon-ewm.png"/>
                                <div class="wei-51vui"></div>
                            </div>
                            <div class="qrcode-help j-qrcode-help app_help"></div>
                        </div>
                        <div class="upload-link">
                            <span>使用<a href="#">微信</a>扫码登录</span>
                        </div>
                    </div>
                    <div class="login-scan-fail">
                        <div class="login-fail-main">
                            <h3>
                                <i></i>
                                <span>登录失败</span>
                            </h3>
                            <p class="fail-note">请刷新二维码后重新扫描</p>
                            <a href="javascript:;" class="btn-refresh-code" id="login-refresh">刷新二维码</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<!-- 版权信息 -->
<div class="vui-footer" >
    <div class="grid vui-grid vui-footer-bd">
        <div class="vui-footer-sitelink">
            <a href="javascript:;" target="_blank">电话：0852-123456</a><span class="split">|</span>
            <a href="javascript:;" target="_blank">邮箱：12345678@163.com</a><span class="split">|</span>
            <a href="javascript:;" target="_blank">QQ：123456</a>
        </div>
        <p class="gray vui-footer-copyright">
            **公司版权所有©2020-2030 &nbsp;&nbsp;&nbsp;<a rel="nofollow" href="javascript:;" target="_blank" rel="nofollow">ICP备案 12345678号</a>
        </p>
    </div>
</div>

</body>
</html>