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
    <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1256439335'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1256439335' type='text/javascript'%3E%3C/script%3E"));</script>
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
                <a class="menu_content" href="/whugu/Admin/Page/preview/16">研会介绍</a>
                <div class="down_icon"></div>
            </li>
            <li>
                <a class="menu_content" href="/whugu/Home/category/activity/1">研会活动</a>
                <div class="down_icon"></div>
            </li>
            <li>
                <a class="menu_content" href="/whugu/Home/category/rihgts/1">生活服务</a>
                <div class="down_icon"></div>
            </li>
            <li>
                <a class="menu_content" href="/whugu/Home/category/inform/1">通知公告</a>
                <div class="down_icon"></div>
            </li>
            <li>
                <a class="menu_content" href="/whugu/Home/category/download/1">资源共享</a>
                <div class="down_icon"></div>
            </li>
        </ul>
    </div>
    <!--menu 栏结束-->
</div>
	<!--header end-->
	<div id="content">
        <!-- 第一行 -->
        <div class="category_bar"><a href="/whugu/Home/index/" class="category_bar_name">首页</a><a>&gt;</a><a href="/whugu/Home/category/<?php echo ($category["ename"]); ?>/1" class="category_bar_name"><?php echo ($category["name"]); ?></a><a>&gt;</a><a class="category_bar_name">正文</a></div>
		<div class="content_row article">
            <div class="context_header">
                <div class="context_header_title"><?php echo ($article["title"]); ?></div>
                <span>发布者：【 <?php echo ($article["publisher"]); ?> 】</span>
                <span>发布时间：【<?php echo ($article["pubdate"]); ?>】</span>
                <br />
                <span>作者：【<?php echo ($article["author"]); ?>】</span>
                <span>点击量：【<?php echo ($article["hit"]); ?>】</span>
            </div>
            <div class="content_division"></div>
            <div class="context_body">
                <?php echo ($article["content"]); ?>
            </div>
		</div>
        <div class="content_division"></div>
        <div class="content_row">
            <!-- 多说评论框 start -->
            <div class="ds-thread" data-thread-key="<?php echo ($article["id"]); ?>" data-title="<?php echo ($article["title"]); ?>" data-url="/whugu/Home/article/<?php echo ($article["id"]); ?>"></div>
            <!-- 多说评论框 end -->
            <!-- 多说公共JS代码 start (一个网页只需插入一次) -->
            <script type="text/javascript">
                var duoshuoQuery = {short_name:"whugu"};
                (function() {
                    var ds = document.createElement('script');
                    ds.type = 'text/javascript';ds.async = true;
                    ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
                    ds.charset = 'UTF-8';
                    (document.getElementsByTagName('head')[0]
                    || document.getElementsByTagName('body')[0]).appendChild(ds);
                })();
            </script>
            <!-- 多说公共JS代码 end -->

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