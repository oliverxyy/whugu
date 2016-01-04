<?php
/**
 * Created by PhpStorm.
 * User: oliver
 * Date: 2015/9/4
 * Time: 16:21
 */

namespace Admin\Controller;
use Home\Model\ArticleModel;
use Think\Controller;

class ArticleController extends Controller{
    //操作文章页面
    public function addArticle(){
        $this->user_deny(1);
        $user = session('user');
        $article['action'] = C("PROJECT_PATH")."Admin/Article/add";
        $this->assign('user',$user);
        $this->assign("article",$article);
        $this->display('Admin/addArticle');
    }
    //ueditor
    public function ueditor(){
        $this->user_deny(1);
        $data = new \Org\Util\Ueditor();
        echo $data->output();
    }
    public function allArticles($id){
        $this->user_deny(1);
        $Article = M('Article');
        if($id == null||$id == 0 ) $id = 1;
        if(session('user.level')==1) $data['pid'] = session('user.id');//部委权限只能编辑自己添加的文章
        $data['cid'] = array('elt',6);
        $list = $Article->table('article a,category c')->field('a.id as id,cid,c.id as cid2,title,content,author,publisher,pubdate,hit,state,hasimg,name')->where($data)->where('a.cid = c.id ')->order('pubdate desc')->page($id,10)->select();
        //处理pagination
        $pagination = $this->getPagination($id);
        $paginationPointer = array_slice($pagination,-2,2);
        //删除pagination最后两个元素
        unset($pagination['last']);
        unset($pagination['next']);
        $this->assign('paginationPointer',$paginationPointer);
        $this->assign('pagination',$pagination);
        $this->assign('list',$this->transform($list));
        $this->display('Admin/manageArticle');

    }
    //操作文章页面
    public function add(){
        $this->user_deny(1);
        $Article = new ArticleModel();
        $data['cid'] = $_POST['cid'];
        $data['title'] = $_POST['title'];
        $data['author'] = $_POST['author'];
        $data['publisher'] = $_POST['publisher'];
        $data['content'] = $_POST['editorValue'];
        $data['pubdate']= date('Y-m-d H:i:s',time());
        preg_match('/<img[^>]*src=[\'"]?([^>\'"\s]*)[\'"]?[^>]*>/i', $data['content']) > 0 ? $data['hasImg'] = 1:$data['hasImg'] = 0;
        $data['pid']= session('user.id');
        $Article->add($data)!=null ? $this->success("操作成功！") : $this->success("操作失败！");
    }
    public function verify($id){
        $Article = new ArticleModel();
        $data['id'] = $id;
        $data['state'] = 1;
        if(session('user.level')==null||session('user.level')<2){
            $MSG['state'] = -1;
        }
        else{
            $Article->save($data) == 1 ? $MSG["state"] = 1 : $MSG["state"] = 0;
        }
        $this->ajaxReturn($MSG);

    }
    //预留 撤销审核方法
    public function unverify($id){
        $this->user_deny(2);
        $Article = new ArticleModel();
        $data['id'] = $id;
        $data['state'] = 0;
        $Article->save($data) == 1 ? $MSG["state"] = 1 : $MSG["state"] = 0;
        $this->ajaxReturn($MSG);
    }
    public function updatePage($id){
        $this->user_deny(1);
        $Article = new ArticleModel();
        $article = $Article->find($id);
        $article['action'] = C("PROJECT_PATH")."Admin/Article/update/".$id;
        $article['cid'] = $article['cid'] - 1;
        $this->assign('article',$article);
        $this->display('Admin/addArticle');
    }
    public function update($id){
        $this->user_deny(1);
        $Article = new ArticleModel();
        $data['id'] = $id;
        $data['cid'] = $_POST['cid'];
        $data['title'] = $_POST['title'];
        $data['author'] = $_POST['author'];
        $data['publisher'] = $_POST['publisher'];
        $data['content'] = $_POST['editorValue'];
        //$data['pubdate']= date('Y-m-d H:i:s',time());//更新文章不更新发布时间
        preg_match('/<img[^>]*src=[\'"]?([^>\'"\s]*)[\'"]?[^>]*>/i', $data['content']) > 0 ? $data['hasImg'] = 1:$data['hasImg'] = 0;
        $Article->save($data) == 1 ? $this->success("操作成功！") : $this->success("操作失败！");
    }
    public function delete($id){
        $Article = new ArticleModel();
        if(session('user.level')==null||session('user.level')<2){
            $MSG['state'] = -1;
        }
        else{
            $Article->delete($id) == 1 ? $MSG['state'] = 1 : $MSG['state'] = 0;
        }
        $this->ajaxReturn($MSG);
    }
    //
    private function transform($articles){
        for($i=0;$i<count($articles);$i++){
            if($articles[$i]['state']=="0"){
                $articles[$i]['state'] = "未审核";
            }
            else if($articles[$i]['state']=="1"){
                $articles[$i]['state'] = "已审核";
            }
            if($articles[$i]['hasimg']=="0"){
                $articles[$i]['hasimg'] = "无";
            }
            else if($articles[$i]['hasimg']=="1"){
                $articles[$i]['hasimg'] = "有";
            }
        }
        return $articles;
    }
    //获取pagination
    private function getPagination($id){
        $Article = new ArticleModel();
        $listNumber = 10;//列表数据数量
        $pageNumber = 10;//分页页码数量
        if(session('user.level')==1) $data['pid'] = session('user.id');//部委权限只能编辑自己添加的文章
        $data['cid'] = array('elt',6);
        $sum = ceil($Article->where($data)->count('id')/$listNumber);
        //获取pagination数据
        if($id<=5){
            if($sum<=10){
                for($i=0;$i<$sum;$i++){
                    $pagination[$i] = $i+1;
                }
            }
            else{
                for($i=0;$i<$pageNumber;$i++){
                    $pagination[$i] = $i+1;
                }
            }
        }
        else if($sum-$id<=5){
            for($i=0;$i<$pageNumber;$i++){
                $pagination[$i] = $sum-$pageNumber+1+$i;
            }
        }
        else{
            for($i=0;$i<$pageNumber;$i++){
                $pagination[$i] = $id+$i-4;
            }
        }
        //
        if($id==1){
            $pagination['last'] = 1;
            $pagination['next'] = $id+1;
        }
        else if($id==$sum){
            $pagination['last'] = $id-1;
            $pagination['next'] = $id;
        }
        else{
            $pagination['last'] = $id-1;
            $pagination['next'] = $id+1;
        }
        return $pagination;
    }

    /**
     * @param $level
     * $level及以上权限可以访问
     */
    private function user_deny($level){
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