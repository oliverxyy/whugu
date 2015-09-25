<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title>武汉大学研究生会</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta name="keywords" content="武汉大学研究生会">
    <meta name="description" content="武汉大学研究生会">
    <link rel="shortcut icon" href="favicon.ico"/>
    <link href="/whugu/Public/static/css/style-admin.css" rel="stylesheet">
    <script type="text/javascript" src="/whugu/Public/static/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/whugu/Public/static/js/scripts.js"></script>
</head>
<body>
<div id="sidebar">
    <ul>
        <li class="sidebar_list_level1"><a href="#">使用</a></li>
        <ul>
            <li class="sidebar_list_level2"><a href="/whugu/Admin/User/info">使用须知</a></li>
        </ul>
        <li class="sidebar_list_level1"><a href="#">用户管理</a></li>
        <ul>
            <li class="sidebar_list_level2"><a href="/whugu/Admin/User/logout">退出登陆</a></li>
            <li class="sidebar_list_level2"><a href="/whugu/Admin/User/changePdPage">修改密码</a></li>
            <?php if(session('user.level')>1){ ?>
            <li class="sidebar_list_level2"><a href="/whugu/Admin/User/allUser">所有用户</a></li>
            <li class="sidebar_list_level2"><a href="/whugu/Admin/User/addUser">添加用户</a></li>
            <?php } ?>
        </ul>
        <li class="sidebar_list_level1"><a href="#">文章管理</a></li>
        <ul>
            <li class="sidebar_list_level2"><a href="/whugu/Admin/Article/addArticle">添加文章</a></li>
            <?php if(session('user.level')>1){ ?>
            <li class="sidebar_list_level2"><a href="/whugu/Admin/Article/allArticles/1">管理文章</a></li>
            <?php } ?>
        </ul>
        <?php if(session('user.level')>1){ ?>
        <li class="sidebar_list_level1"><a href="#">板块管理</a></li>
        <ul>
            <li class="sidebar_list_level2"><a href="/whugu/Admin/Banner/index">banner管理</a></li>
            <li class="sidebar_list_level2"><a href="/whugu/Admin/Page/index">页面管理</a></li>
        </ul>
        <li class="sidebar_list_level1"><a href="#">访问统计</a></li>
        <ul>
            <li class="sidebar_list_level2"><a href="#">本地统计数据</a></li>
            <li class="sidebar_list_level2"><a href="#">CNZZ统计数据</a></li>
        </ul>
        <?php } ?>

    </ul>
</div>
<div id="main">
    <div id="main_page_content">
        <div id="main_title"><h2>常见问题</h2></div>
        <div id="main_body">
            <!-- usingInfo_row start -->
            <div class="usingInfo_row">
                <div class="usingInfo_row_title">
                    <a>Q：如何获得更好的界面和功能体验？</a>
                </div>
                <div class="usingInfo_row_body">
                    <ul>
                        <li>拒绝使用猎豹、百度、QQ、360、IE等渣渣浏览器！</li>
                        <li>请使用chrome、firefox浏览器，改变生活，从浏览器做起！</li>
                    </ul>
                </div>
            </div>
            <!-- usingInfo_row start -->
            <!-- usingInfo_row start -->
            <div class="usingInfo_row">
                <div class="usingInfo_row_title">
                    <a>Q：为什么我有些界面进不去？</a>
                </div>
                <div class="usingInfo_row_body">
                    <ul>
                        <li>你的权限过低，无法访问</li>
                        <li>网站出了bug，请联系网站的维护人员</li>
                    </ul>
                </div>
            </div>
            <!-- usingInfo_row start -->
            <!-- usingInfo_row start -->
            <div class="usingInfo_row">
                <div class="usingInfo_row_title">
                    <a>Q：所有文章图片提交操作失败？</a>
                </div>
                <div class="usingInfo_row_body">
                    <ul>
                        <li>并未对内容进行修改就提交了</li>
                        <li>你的网络连接出了问题</li>
                        <li>网站出了bug，请联系网站的维护人员</li>
                    </ul>
                </div>
            </div>
            <!-- usingInfo_row start -->
            <!--<div class="usingInfo_row">
                <div class="usingInfo_row_title">
                    <a>Q：我图片上传不了是什么问题？</a>
                </div>
                <div class="usingInfo_row_body list_no_padding_left">
                    <ul>
                        <li>1、你的网络连接出现了问题</li>
                        <li>2、本网站使用的是百度的UEditor，可能是该网站连接不良，请重新刷新界面重新上传</li>
                    </ul>
                </div>
            </div>-->
            <!-- usingInfo_row start -->
            <!-- usingInfo_row start -->
            <div class="usingInfo_row">
                <div class="usingInfo_row_title">
                    <a>Q：后台管理系统出现问题了，怎么办？</a>
                </div>
                <div class="usingInfo_row_body">
                    <a>请迅速联系网站的维护人员！或者你可以发送email到...</a>
                </div>
            </div>
            <!-- usingInfo_row start -->
        </div>
    </div>
</div>
</body>
</html>