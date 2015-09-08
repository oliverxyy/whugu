<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        /*$arr['name'] = "doubhhi";
        $arr['password'] = "heihei";
        $this->assign('arr',$arr);

        $this->display("index");*/

/*        $model = C('URL_MODEL');
        echo $model;
        echo U('Index/test',array('id'=>1),'html',false,'localhost')    ;*/
        echo C('URL_HTML_SUFFIX');
    }
    public function test(){
        echo "id is:".$_GET['id'].'<br />';
        echo "test";
    }

}