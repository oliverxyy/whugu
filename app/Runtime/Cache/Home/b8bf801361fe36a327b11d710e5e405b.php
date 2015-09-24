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
                    <!--<a href="#" style="display:inline;"><img src="static/img/slide_big/1.jpg" width="1348" height="261" alt=""></a>
                    <a href="#" style="display:none;"><img src="static/img/slide_big/2.jpg" width="1348" height="261" alt=""></a>
                    <a href="#" style="display:none;"><img src="static/img/slide_big/3.jpg" width="1348" height="261" alt=""></a>-->
                    <a href="#" style="display:none;"><img src="/whugu/Public/static/img/slider/1.png" width="1000" height="320" alt=""></a>
                    <a href="#" style="display:none;"><img src="/whugu/Public/static/img/slider/1.png" width="1000" height="320" alt=""></a>
                </div>
                <a class="arr_l rf png"></a>
                <a class="arr_r rf png"></a>
                <!--缩略图,这里取消显示，需要可以向li标签里面添加img，并且display属性改为block-->
                <ul class="tab lifl">
                    <li class="current"></li>
                    <li class=""></li>
                </ul>
            </div>
        </div>
        <!--menu 栏开始-->
		<div id="menu_bar">
			<ul>
				<li>
					<a class="menu_content" href="">研会介绍</a>
					<div class="down_icon"></div>
				</li>
				<li>
					<a class="menu_content">研会活动</a>
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
        <div class="category_bar"><a href="<?php echo U('Home/index/');?>" class="category_bar_name">首页</a><a>&gt;</a><a class="category_bar_name"><?php echo ($category["name"]); ?></a></div>
		<div class="content_row list">
            <ul>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$var): $mod = ($i % 2 );++$i;?><li>
                        <a href="/whugu/Home/article/<?php echo ($var["id"]); ?>">
                            <div class="list_text"><?php echo ($var["title"]); ?></div>
                            <div class="list_date"><?php echo (substr($var["pubdate"],0,10)); ?></div>
                        </a>
                    </li><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
            </ul>
		</div>
        <div class="content_division"></div>
        <div class="pagination">
                <span><a href="/whugu/Home/category/<?php echo ($category["ename"]); ?>/<?php echo ($paginationPointer["last"]); ?>">上一页</a></span>
                <?php if(is_array($pagination)): $i = 0; $__LIST__ = $pagination;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$var): $mod = ($i % 2 );++$i;?><span><a href="/whugu/Home/category/<?php echo ($category["ename"]); ?>/<?php echo ($var); ?>"><?php echo ($var); ?></a></span><?php endforeach; endif; else: echo "" ;endif; ?>
                <span><a href="/whugu/Home/category/<?php echo ($category["ename"]); ?>/<?php echo ($paginationPointer["next"]); ?>">下一页</a></span>
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