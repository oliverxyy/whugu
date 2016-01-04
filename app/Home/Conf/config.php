<?php
return array(
    'URL_ROUTE_RULES'=>array(
        'index' => 'Index/index',
        'article/:id\d$' => 'Index/article',
        'category/:name/:id\d$' => 'Index/category',
        'search/:id\d$' => 'Index/search',
    ),
);