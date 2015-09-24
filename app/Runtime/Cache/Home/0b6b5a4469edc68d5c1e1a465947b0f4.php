<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>武汉大学研究生会</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="oliverxyy@gmail.com">
    <link href="/whugu/Public/static/css/style.css" rel="stylesheet">
    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="/whugu/Public/static/img/logo.png">
    <script type="text/javascript" src="/whugu/Public/static/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/whugu/Public/static/js/jquery.tools.min.js"></script>
    <script type="text/javascript" src="/whugu/Public/static/js/scripts.js"></script>
    <script type="text/javascript">
        $(function(){

            $("ul.tab").tabs(".banner .pan > a", {
                effect:'fade',
                rotate: true,
                tabs:"li"
            }).slideshow({
                next:".arr_r",
                prev:".arr_l",
                autoplay:true,
                autopause:true,
                interval:3000
            });
        })
    </script>
</head>
<body>
	<!--header begin-->
	<div id="header">
    <div id="slider" class="banner">
        <div class="wrap">
            <div class="pan">
                <?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "暂时没有Banner图片" ;else: foreach($__LIST__ as $key=>$var): $mod = ($i % 2 );++$i;?><a href="<?php echo ($var["href"]); ?>" style="display:none;"><img src="<?php echo ($var["src"]); ?>" width="1000" height="320" alt="<?php echo ($var["title"]); ?>"></a><?php endforeach; endif; else: echo "暂时没有Banner图片" ;endif; ?>
            </div>
            <a class="arr_l rf png"></a>
            <a class="arr_r rf png"></a>
            <!--缩略图,这里取消显示，需要可以向li标签里面添加img，并且display属性改为block-->
            <ul class="tab lifl">
                <li class="current"></li>
                <?php if(is_array($banner)): $i = 0; $__LIST__ = array_slice($banner,1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$var): $mod = ($i % 2 );++$i;?><li class=""></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <!--menu 栏开始-->
    <div id="menu_bar">
        <ul>
            <li>
                <a class="menu_content" href="/whugu/Home/category/">研会介绍</a>
                <div class="down_icon"></div>
            </li>
            <li>
                <a class="menu_content" href="/whugu/Home/category/">研会活动</a>
                <div class="down_icon"></div>
            </li>
            <li>
                <a class="menu_content">生活服务</a>
                <div class="down_icon"></div>
            </li>
            <li>
                <a class="menu_content">通知公告</a>
                <div class="down_icon"></div>
            </li>
            <li>
                <a class="menu_content">资源共享</a>
                <div class="down_icon"></div>
            </li>
        </ul>
    </div>
    <!--menu 栏结束-->
</div>
	<!--header end-->
	<div id="content">
        <!-- 第一行 -->
		<div class="content_row index">
            <!--活动预告板块开始-->
            <div class="block1">
                <div class="block_menu">
                    <div class="block_menu_content">
                        <img src="/whugu/Public/static/img/category/activity.png" height="48" width="48" class="menu_icon">
                        <div class="menu_name">活动预告</div>
                        <a class="menu_more" href="/whugu/Home/category/activity/1">更多</a>
                    </div>
                </div>
                <!--文章列表 begin-->
                <div class="block_content">
                    <ul>
                        <?php if(is_array($activity)): $i = 0; $__LIST__ = $activity;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$var): $mod = ($i % 2 );++$i;?><li>
                                <a href="/whugu/Home/article/<?php echo ($var["id"]); ?>" title="<?php echo ($var["title"]); ?>">
                                    <div class="list_text"><?php echo ($var["title"]); ?></div>
                                    <div class="list_date"><?php echo (substr($var["pubdate"],0,10)); ?></div>
                                </a>
                            </li><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
.
                    </ul>
                </div>
                <!--文章列表 end-->
            </div>
            <!--活动预告板块开始-->
            <!--研会动态板块开始-->
            <div class="block1">
                <div class="block_menu">
                    <div class="block_menu_content">
                        <img src="/whugu/Public/static/img/category/news.png" height="48" width="48" class="menu_icon">
                        <div class="menu_name">研会动态</div>
                        <a class="menu_more" href="/whugu/Home/category/dongtai/1">更多</a>
                    </div>
                </div>
                <!--文章列表 begin-->
                <div class="block_content">
                    <ul>
                        <?php if(is_array($dongtai)): $i = 0; $__LIST__ = $dongtai;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$var): $mod = ($i % 2 );++$i;?><li>
                                <a href="/whugu/Home/article/<?php echo ($var["id"]); ?>" title="<?php echo ($var["title"]); ?>">
                                    <div class="list_text"><?php echo ($var["title"]); ?></div>
                                    <div class="list_date"><?php echo (substr($var["pubdate"],0,10)); ?></div>
                                </a>
                            </li><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                    </ul>
                </div>
                <!--文章列表 end-->
            </div>
            <!--研会动态板块结束-->
            <!--通知公告板块开始-->
            <div class="block2">
                <div class="block_menu">
                    <div class="block_menu_content">
                        <div class="menu_icon"><img src="/whugu/Public/static/img/category/notification.png" height="auto" width="48"></div>
                        <div class="menu_name">通知公告</div>
                        <a class="menu_more" href="/whugu/Home/category/inform/1">更多</a>
                    </div>
                </div>
                <!--文章列表 begin-->
                <div class="block_content">
                    <ul>
                        <?php if(is_array($inform)): $i = 0; $__LIST__ = $inform;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$var): $mod = ($i % 2 );++$i;?><li>
                                <a href="/whugu/Home/article/<?php echo ($var["id"]); ?>" title="<?php echo ($var["title"]); ?>">
                                    <div class="list_text"><?php echo ($var["title"]); ?></div>
                                    <div class="list_date"><?php echo (substr($var["pubdate"],0,10)); ?></div>
                                </a>
                            </li><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                    </ul>
                </div>
                <!--文章列表 end-->
            </div>
            <!--通知公告板块结束-->
		</div>

        <!-- 第二行 -->
        <div class="content_row index">
            <!--生活权益板块开始-->
            <div class="block1">
                <div class="block_menu">
                    <div class="block_menu_content">
                        <img src="/whugu/Public/static/img/category/life.png" height="48" width="48" class="menu_icon">
                        <div class="menu_name">生活权益</div>
                        <a class="menu_more" href="/whugu/Home/category/rights/1">更多</a>
                    </div>
                </div>
                <!--文章列表 begin-->
                <div class="block_content">
                    <ul>
                        <?php if(is_array($rights)): $i = 0; $__LIST__ = $rights;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$var): $mod = ($i % 2 );++$i;?><li>
                                <a href="/whugu/Home/article/<?php echo ($var["id"]); ?>" title="<?php echo ($var["title"]); ?>">
                                    <div class="list_text"><?php echo ($var["title"]); ?></div>
                                    <div class="list_date"><?php echo (substr($var["pubdate"],0,10)); ?></div>
                                </a>
                            </li><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                    </ul>
                </div>
                <!--文章列表 end-->
            </div>
            <!--生活权益板块开始-->
            <!--院系风采板块开始-->
            <div class="block1">
                <div class="block_menu">
                    <div class="block_menu_content">
                        <img src="/whugu/Public/static/img/category/college.png" height="48" width="48" class="menu_icon">
                        <div class="menu_name">院系风采</div>
                        <a class="menu_more" href="/whugu/Home/category/college/1">更多</a>
                    </div>
                </div>
                <!--文章列表 begin-->
                <div class="block_content">
                    <ul>
                        <?php if(is_array($college)): $i = 0; $__LIST__ = $college;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$var): $mod = ($i % 2 );++$i;?><li>
                                <a href="/whugu/Home/article/<?php echo ($var["id"]); ?>" title="<?php echo ($var["title"]); ?>">
                                    <div class="list_text"><?php echo ($var["title"]); ?></div>
                                    <div class="list_date"><?php echo (substr($var["pubdate"],0,10)); ?></div>
                                </a>
                            </li><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                    </ul>
                </div>
                <!--文章列表 end-->
            </div>
            <!--院系风采板块结束-->
            <!--常用下载板块开始-->
            <div class="block2">
                <div class="block_menu">
                    <div class="block_menu_content">
                        <div class="menu_icon"><img src="/whugu/Public/static/img/category/download.png" height="auto" width="48" /></div>
                        <div class="menu_name">常用下载</div>
                        <a class="menu_more" href="/whugu/Home/category/download/1">更多</a>
                    </div>
                </div>
                <!--文章列表 begin-->
                <div class="block_content">
                    <ul>
                        <?php if(is_array($download)): $i = 0; $__LIST__ = $download;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$var): $mod = ($i % 2 );++$i;?><li>
                                <a href="/whugu/Home/article/<?php echo ($var["id"]); ?>" title="<?php echo ($var["title"]); ?>">
                                    <div class="list_text"><?php echo ($var["title"]); ?></div>
                                    <div class="list_date"><?php echo (substr($var["pubdate"],0,10)); ?></div>
                                </a>
                            </li><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                    </ul>
                </div>
                <!--文章列表 end-->
            </div>
            <!--常用下载板块结束-->
        </div>
        <!-- 第三行 -->
        <div class="content_row index">
            <!--相关链接板块开始-->
            <div class="block3">
                <div class="related_link">
                    <div class="related_link_title">相关链接</div>
                    <div class="related_link_content">
                        <a href="http://www.ccyl.org.cn/" target="_blank">中国共青团</a>
                        <a href="http://www.hbgqt.org.cn/" target="_blank">湖北共青团</a>
                        <a href="http://www.univs.cn/" target="_blank">教育部大学生在线</a>
                        <a href="http://www.whu.edu.cn/" target="_blank">武汉大学</a>
                        <a href="http://news.future.org.cn/" target="_blank">武汉大学未来网</a>
                        <a href="http://xxzx.whu.edu.cn/" target="_blank">武汉大学信息中心</a>
                        <a href="http://www.aoff.whu.edu.cn/" target="_blank">武汉大学本科招生网</a>
                        <a href="http://info.whu.edu.cn/index.htm" target="_blank">武汉大学信息公开网</a>
                        <a href="http://my.whu.edu.cn/" target="_blank">武汉大学信息门户</a>
                    </div>
                </div>
                <div id="division1"></div>
                <div class="related_link">
                    <div class="related_link_title">信息服务</div>
                    <div class="related_link_content">
                        <a href="http://www.lib.whu.edu.cn/web/default.asp" target="_blank">武汉大学图书馆</a>
                        <a href="http://www.whu.edu.cn/yhtd/jg.htm" target="_blank">教工服务</a>
                        <a href="http://www.whu.edu.cn/yhtd/xs.htm" target="_blank">学生服务</a>
                        <a href="http://www.whu.edu.cn/yhtd/xy.htm" target="_blank">校友服务</a>
                        <a href="/whugu/Admin/User/login" target="_blank">研会管理系统</a>
                    </div>
                </div>
            </div>
            <!--相关链接板块开始-->
            <!--部门链接板块开始-->
            <div class="block4">
                <div class="block_menu">
                    <div class="block_menu_content">
                        <img src="/whugu/Public/static/img/category/department_link.png" height="48" width="48" class="menu_icon">
                        <div class="menu_name">部门链接</div>
                        <a class="menu_more" href="/whugu/Home/category/department/1">更多</a>
                    </div>
                </div>
                <!--图标列表 begin-->
                <div class="block_content">
                    <ul>
                        <!--<?php
 for($i=0;$i<15;$i++){ ?>
                        <li>
                            <img src="../../../Public/static/images/department_link/<?php?>.png" height="110" width="110" />
                        </li>
                        <?php
 } ?>-->
                        <li><img src="/whugu/Public/static/img/department_link/1.png" height="75" width="75" /><div class="department_link_item_info">研会办公室</div></li>
                        <li><img src="/whugu/Public/static/img/department_link/2.png" height="75" width="75" /><div class="department_link_item_info">常代会办公室</div></li>
                        <li><img src="/whugu/Public/static/img/department_link/3.png" height="75" width="75" /><div class="department_link_item_info">创意设计中心</div></li>
                        <li><img src="/whugu/Public/static/img/department_link/4.png" height="75" width="75" /><div class="department_link_item_info">新媒体运营部</div></li>
                        <li><img src="/whugu/Public/static/img/department_link/5.png" height="75" width="75" /><div class="department_link_item_info">人力资源部</div></li>

                        <li><img src="/whugu/Public/static/img/department_link/6.png" height="75" width="75" /><div class="department_link_item_info">调研部</div></li>
                        <li><img src="/whugu/Public/static/img/department_link/7.png" height="75" width="75" /><div class="department_link_item_info">外联部</div></li>
                        <li><img src="/whugu/Public/static/img/department_link/8.png" height="75" width="75" /><div class="department_link_item_info">文艺部</div></li>
                        <li><img src="/whugu/Public/static/img/department_link/9.png" height="75" width="75" /><div class="department_link_item_info">体育部</div></li>
                        <li><img src="/whugu/Public/static/img/department_link/10.png" height="75" width="75" /><div class="department_link_item_info">女生部</div></li>

                        <li><img src="/whugu/Public/static/img/department_link/11.png" height="75" width="75" /><div class="department_link_item_info">学术科技部</div></li>
                        <li><img src="/whugu/Public/static/img/department_link/12.png" height="75" width="75" /><div class="department_link_item_info">生活权益部</div></li>
                        <li><img src="/whugu/Public/static/img/department_link/13.png" height="75" width="75" /><div class="department_link_item_info">创意实践部</div></li>
                        <li><img src="/whugu/Public/static/img/department_link/14.png" height="75" width="75" /><div class="department_link_item_info">心理互助部</div></li>
                        <li><img src="/whugu/Public/static/img/department_link/15.png" height="75" width="75" /><div class="department_link_item_info">博士生分会</div></li>
                    </ul>
                </div>
                <!--图标列表 end-->
            </div>
            <!--部门链接板块结束-->
        </div>
	</div>
	<div id="footer">
    <div id="footer_content">
        <div id="footer_item_title">
            <div id="footer_item_text">微平台</div>
            <div id="footer_item_icon"><img src="/whugu/Public/static/img/icon_down.png" /><img src="/whugu/Public/static/img/icon_up.png" /></div>
        </div>
        <div id="footer_item">
            <!--copyright info -->
            <div id="footer_item_copyright">
                <p>地址：湖北武汉珞珈山枫园三舍&nbsp;&nbsp;邮编：430072</p>
                <p>联系电话：027-68752583&nbsp;&nbsp;电子邮箱：whugu@126.com</p>
                <p>Copyright&copy;2015 All Right Reserved 武汉大学研究生会 版权所有 | 备案号码</p>
            </div>
            <!--微平台 info-->
            <div id="footer_item_microPlatform">
                <div id="footer_item_microPlatform_content">
                    <div class="footer_item_microPlatform_item">
                        <div class="footer_item_microPlatform_item_img">
                            <img src="/whugu/Public/static/img/microPlatform1.png" />
                        </div>
                        <div class="footer_item_microPlatform_item_text">青媒手机客户端</div>
                    </div>
                    <div class="footer_item_microPlatform_item">
                        <div class="footer_item_microPlatform_item_img">
                            <img src="/whugu/Public/static/img/microPlatform2.png" />
                        </div>
                        <div class="footer_item_microPlatform_item_text">武大小青媒</div>
                    </div>
                    <div class="footer_item_microPlatform_item">
                        <div class="footer_item_microPlatform_item_img">
                            <img src="/whugu/Public/static/img/microPlatform3.png" />
                        </div>
                        <div class="footer_item_microPlatform_item_text">武大团委微博</div>
                    </div>
                    <div class="footer_item_microPlatform_item">
                        <div class="footer_item_microPlatform_item_img">
                            <img src="/whugu/Public/static/img/microPlatform4.png" />
                        </div>
                        <div class="footer_item_microPlatform_item_text">武大团委微信</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>