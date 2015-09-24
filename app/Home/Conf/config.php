<?php
return array(
    'URL_ROUTE_RULES'=>array(
        'index$' => 'Article/index',
        'article/:id\d$' => 'Article/article',
        'category/:name/:id\d$' => 'Article/category',
    ),
);