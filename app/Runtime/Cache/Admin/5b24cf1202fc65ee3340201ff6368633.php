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
    <link href="<?php echo ($PROJECT_NAME); ?>Public/static/css/style-admin.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo ($PROJECT_NAME); ?>Public/static/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php echo ($PROJECT_NAME); ?>Public/static/js/scripts.js"></script>
</head>
<body>
<div id="sidebar">
    <ul>
        <li class="sidebar_list_level1"><a href="#">使用</a></li>
        <ul>
            <li class="sidebar_list_level2"><a href="<?php echo ($PROJECT_NAME); ?>Admin/User/info">使用须知</a></li>
        </ul>
        <li class="sidebar_list_level1"><a href="#">用户管理</a></li>
        <ul>
            <li class="sidebar_list_level2"><a href="<?php echo ($PROJECT_NAME); ?>Admin/User/logout">退出登陆</a></li>
            <li class="sidebar_list_level2"><a href="<?php echo ($PROJECT_NAME); ?>Admin/User/changePdPage">修改密码</a></li>
            <li class="sidebar_list_level2"><a href="<?php echo ($PROJECT_NAME); ?>Admin/User/allUser">所有用户</a></li>
            <li class="sidebar_list_level2"><a href="<?php echo ($PROJECT_NAME); ?>Admin/User/addUserPage">添加用户</a></li>
        </ul>
        <li class="sidebar_list_level1"><a href="#">文章管理</a></li>
        <ul>
            <li class="sidebar_list_level2"><a href="addArticle.html">添加文章</a></li>
            <li class="sidebar_list_level2"><a href="manageArticle.html">管理文章</a></li>
        </ul>

        <li class="sidebar_list_level1"><a href="#">板块管理</a></li>
        <ul>
            <li class="sidebar_list_level2"><a href="addBlock.html">添加板块</a></li>
            <li class="sidebar_list_level2"><a href="manageBlock.html">管理板块</a></li>
        </ul>
        <li class="sidebar_list_level1"><a href="#">访问统计</a></li>
        <ul>
            <li class="sidebar_list_level2"><a href="">本地统计数据</a></li>
            <li class="sidebar_list_level2"><a href="">CNZZ统计数据</a></li>
        </ul>
    </ul>
</div>
<div id="main">
    <div id="main_page_content">
        <div id="main_title"><h2>添加用户</h2></div>
        <div id="main_body">
            <div id="addUser">
                <form action="<?php echo ($PROJECT_NAME); ?>Admin/User/changePd" method="post">
                    <div class="addUser_row">
                        <div class="addUser_leftRow">用户名</div>
                        <div class="addUser_rightRow"><input type="text" name="name" value="<?php echo ($username); ?>" readonly="readonly"/></div>
                    </div>
                    <div class="addUser_row">
                        <div class="addUser_leftRow">密码</div>
                        <div class="addUser_rightRow"><input type="password" name="password"/></div>
                    </div>
                    <div class="addUser_row">
                        <div class="addUser_leftRow">重复密码</div>
                        <div class="addUser_rightRow"><input type="password" name="confirmPwd"/></div>
                    </div>
                    <div class="addUser_row">
                        <div class="addUser_leftRow"></div>
                        <div class="addUser_rightRow">
                            <button type="submit">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>