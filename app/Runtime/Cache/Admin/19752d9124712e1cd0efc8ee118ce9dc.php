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
    <script type="text/javascript" charset="utf-8" src="/whugu/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/whugu/Public/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/whugu/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script>
        $(document).ready(function(){
            var ue = UE.getEditor('editor',{
                serverUrl :"<?php echo U('Admin/Article/ueditor');?>",
            });
            $("#addArticle #type-choose").find("a:eq(<?php echo ($article["cid"]); ?>)").click();
        });
    </script>
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
        <div id="main_title"><h2>添加文章</h2></div>
        <div id="main_body">
            <div id="addArticle">
                <form action="<?php echo ($article["action"]); ?>" method="post">
                    <div class="addArticle_row"><input type="text" name="title" placeholder="这里输入标题" value="<?php echo ($article["title"]); ?>" autofocus></div>
                    <div class="addArticle_row"><input type="text" name="author" placeholder="这里输入作者" value="<?php echo ($article["author"]); ?>"></div>
                    <div class="addArticle_row"><input type="text" name="publisher" placeholder="这里输入发布者" value="<?php echo ($article["publisher"]); ?>"><br></div>
                    <script id="editor" type="text/plain" style="width:1075px;height:300px;"></script>
                    <div id="type-choose">
                        <input type="hidden" name="cid" />
                        <a cid="1">活动预告</a>
                        <a cid="2">研会动态</a>
                        <a cid="3">通知公告</a>
                        <a cid="4">生活权益</a>
                        <a cid="5">院系风采</a>
                        <a cid="6">常用下载</a>
                        <a cid="7">部门链接</a>
                    </div>
                    <script>
                        UE.getEditor('editor',{
                            initialContent : '<?php echo ($article["content"]); ?>',
                        });
                    </script>
                    <div class="addArticle_row">
                        <button type="submit">确认提交</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>