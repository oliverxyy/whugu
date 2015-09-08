<?php
/**
 * Created by PhpStorm.
 * User: oliver
 * Date: 2015/9/4
 * Time: 16:21
 */

namespace Home\Controller;


class ArticleController {
    public function article($id){
        echo "id is:".$id.'<br />';


    }
    public function category(){
        /*$article = M('Article');
        var_dump($article->select());*/
        $article = M('Article');
        var_dump($article->limit(10)->select());
    }

}