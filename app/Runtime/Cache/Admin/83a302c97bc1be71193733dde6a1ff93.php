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
<div id="login_page">
    <div id="login_container">
        <div id="login_title">后台系统登录</div>
        <div id="login_content">
            <form action="/whugu/Admin/User/index" method="post">
                <div class="login_row"><input type="text" name="name" placeholder="用户名"/></div>
                <div class="login_row"><input type="password" name="password" placeholder="密码"/></div>
                <div class="login_row">
                    <button type="submit">登录</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>