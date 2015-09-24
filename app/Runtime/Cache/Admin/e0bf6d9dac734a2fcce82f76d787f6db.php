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
            <li class="sidebar_list_level2"><a href="/whugu/Admin/User/allUser">所有用户</a></li>
            <li class="sidebar_list_level2"><a href="/whugu/Admin/User/addUser">添加用户</a></li>
        </ul>
        <li class="sidebar_list_level1"><a href="#">文章管理</a></li>
        <ul>
            <li class="sidebar_list_level2"><a href="/whugu/Admin/Article/addArticle">添加文章</a></li>
            <li class="sidebar_list_level2"><a href="/whugu/Admin/Article/allArticles/1">管理文章</a></li>
        </ul>

        <li class="sidebar_list_level1"><a href="#">板块管理</a></li>
        <ul>
            <li class="sidebar_list_level2"><a href="/whugu/Admin/Banner/index">banner管理</a></li>
            <li class="sidebar_list_level2"><a href="/whugu/Admin/Page/index">页面管理</a></li>
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
        <div id="main_title"><h2>所有用户</h2></div>
        <div id="main_body">
            <table id="user_manage" class="user" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th>用户名</th>
                    <th>社团/组织</th>
                    <th>最后登录时间</th>
                    <th>最后登录ip</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody id="allUser">
                <?php if(is_array($users)): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "没有数据" ;else: foreach($__LIST__ as $key=>$var): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($var["name"]); ?></td>
                        <td><?php echo ($var["organization"]); ?></td>
                        <td><?php echo ($var["login_time"]); ?></td>
                        <td>....</td>
                        <td>
                            <a class="delete_user" val="/whugu/Admin/User/deleteUser/<?php echo ($var["id"]); ?>">删除</a>
                        </td>
                    </tr><?php endforeach; endif; else: echo "没有数据" ;endif; ?>


                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>