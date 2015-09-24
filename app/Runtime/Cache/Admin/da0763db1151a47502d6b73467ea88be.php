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
        <div id="main_title"><h2>管理文章</h2></div>
        <div id="main_body">
            <div id="article_manage_table">
                <table id="article_manage" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="articleTable_id">文章id</th>
                        <th class="articleTable_title">标题</th>
                        <th class="articleTable_author">作者</th>
                        <th class="articleTable_publisher">发布者</th>
                        <th class="articleTable_pic">图片</th>
                        <th class="articleTable_category">分类</th>
                        <th class="articleTable_updateTime">更新时间</th>
                        <th class="articleTable_state">状态</th>
                        <th class="articleTable_hit">点击量</th>
                        <td class="articleTable_preview">预览</a>
                        <th class="articleTable_delete">审核</th>
                        <th class="articleTable_update">修改</th>
                        <th class="articleTable_delete">删除</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    </tr>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "没有数据" ;else: foreach($__LIST__ as $key=>$var): $mod = ($i % 2 );++$i;?><tr>
                            <td class="articleTable_id"><?php echo ($var["id"]); ?></td>
                            <td class="articleTable_title"><?php echo ($var["title"]); ?></td>
                            <td class="articleTable_author"><?php echo ($var["author"]); ?></td>
                            <td class="articleTable_publisher"><?php echo ($var["publisher"]); ?></td>
                            <th class="articleTable_pic"><?php echo ($var["hasimg"]); ?></th>
                            <td class="articleTable_category"><?php echo ($var["name"]); ?></td>
                            <td class="articleTable_updateTime"><?php echo ($var["pubdate"]); ?></td>
                            <td class="articleTable_state"><?php echo ($var["state"]); ?></td>
                            <th class="articleTable_hit"><?php echo ($var["hit"]); ?></th>
                            <td class="articleTable_preview"><a href="/whugu/Home/Article/<?php echo ($var["id"]); ?>" target="_blank">预览</a>
                            <td class="articleTable_verify"><a class="verify" val="/whugu/Admin/Article/verify/<?php echo ($var["id"]); ?>">审核</a>
                            <td class="articleTable_update"><a href="/whugu/Admin/Article/updatePage/<?php echo ($var["id"]); ?>" target="_blank">修改</a></td>
                            <td class="articleTable_delete">
                                <a class="delete_article" val="/whugu/Admin/Article/delete/<?php echo ($var["id"]); ?>">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "没有数据" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pagination">
            <span><a href="/whugu/Admin/Article/allArticles/<?php echo ($paginationPointer["last"]); ?>">上一页</a></span>
            <?php if(is_array($pagination)): $i = 0; $__LIST__ = $pagination;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$var): $mod = ($i % 2 );++$i;?><span><a href="/whugu/Admin/Article/allArticles/<?php echo ($var); ?>"><?php echo ($var); ?></a></span><?php endforeach; endif; else: echo "" ;endif; ?>
            <span><a href="/whugu/Admin/Article/allArticles/<?php echo ($paginationPointer["next"]); ?>">下一页</a></span>
        </div>
    </div>
</div>
</body>
</html>