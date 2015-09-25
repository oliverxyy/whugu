<?php
return array(
    'URL_ROUTE_RULES'=>array(
        'User/changeLevel/:id\d$' => 'User/changeLevel',
        'User/addLevel/:id\d$' => 'User/addLevel',
        'User/deleteUser/:id\d$' => 'User/deleteUser',
        'User/allUser/:id\d$' => 'User/allUser',
        'Article/allArticles/:id\d$' => 'Article/allArticles',//管理文章url重新定义
        'Article/verify/:id\d$' => 'Article/verify',
        'Article/updatePage/:id\d$' => 'Article/updatePage',
        'Article/update/:id\d$' => 'Article/update',
        'Article/delete/:id\d$' => 'Article/delete',
        'Banner/update/:id\d$' => 'Banner/update',
        'Banner/upload/:id\d$' => 'Banner/upload',
        'Banner/enable/:id\d$' => 'Banner/enable',
        'Page/preview/:id\d$' => 'Page/preview',
        'Page/update/:id\d$' => 'Page/update',
        'Page/save/:id\d$' => 'Page/save',
        'Page/verify/:id\d$' => 'Page/verify',
        'Page/delete/:id\d$' => 'Page/delete',
    ),
);