<?php
/**
 * Created by PhpStorm.
 * User: oliver
 * Date: 2015/9/4
 * Time: 16:21
 */

namespace Admin\Controller;
use Think\Controller;

class PageController extends Controller{
    /**
     * page板块权限设置：
     * 1：无权限
     * 2+：有操作权限
     */
    public function index(){
        $this->user_deny(1);
        $Page = M('Article');
        $data['cid'] = 7;
        $page = $Page->table("article a,page p")->field("p.id as id,a.id as aid2,title,content,author,publisher,pubdate,hit,state,name")->where("p.aid = a.id and cid = 7")->select();
        $this->assign('page',$this->transform($page));
        $this->display('Admin/managePage');
    }
    public function preview($id){
        $this->user_deny(1);
        $Page = M('Page');
        $page = $Page->find($id);
        $this->redirect('/Home/article/'.$page['aid']);
    }
    public function add(){}//预留添加页面方法
    public function update($id){
        $this->user_deny(1);
        $Page = M('Page');
        $Article = M('Article');
        $page = $Page->find($id);
        $article = $Article->find($page['aid']);
        $article['cid'] = $article['cid'] -1;
        $article['action'] = C("PROJECT_PATH")."Admin/Page/save/".$id;
        $this->assign('article',$article);
        $this->display('Admin/addArticle');
    }
    public function save($id){
        $this->user_deny(1);
        $Page = M('Page');
        $Article = M('Article');
        $data['id'] = $Page->find($id)['aid'];
        $data['cid'] = $_POST['cid'];
        $data['title'] = $_POST['title'];
        $data['author'] = $_POST['author'];
        $data['publisher'] = $_POST['publisher'];
        $data['content'] = $_POST['editorValue'];
        $data['pubdate']= date('Y-m-d H:i:s',time());
        $Article->save($data) == 1 ? $this->success("操作成功！") : $this->success("操作失败！");
    }
    public function verify($id){
        $this->user_deny(1);
        $Page = M('Page');
        $Article = M('Article');
        $page = $Page->find($id);
        $data['id'] = $page['aid'];
        $data['state'] = 1;
        $Article->save($data) == 1 ? $MSG['state'] = 1 : $MSG['state'] = 0;
        $this->ajaxReturn($MSG);
    }
    public function delete($id){}//预留删除页面方法
    //
    public function transform($articles){
        for($i=0;$i<count($articles);$i++){
            if($articles[$i]['state']=="0"){
                $articles[$i]['state'] = "未审核";
            }
            else if($articles[$i]['state']=="1"){
                $articles[$i]['state'] = "已审核";
            }
        }
        return $articles;
    }
    public function user_deny($level){
        if(session('user.level')==null){
            $this->error('尚未登录，无法访问！','login');
        }
        else if(session('user.level')<$level){
            $this->error('权限不足，无法访问！');
        }
        else if(session('user.level')>4){
            $this->error('权限出错，无法访问！');
        }
    }
}