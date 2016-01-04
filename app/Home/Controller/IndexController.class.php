<?php
/**
 * Created by PhpStorm.
 * User: oliver
 * Date: 2015/9/4
 * Time: 16:21
 */

namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller{
    //首页
    public function index(){
        $Article = M('Article');
        //六大板块
        $data['state'] = 1;
        $activity = $Article->field('id,title,pubdate')->where($data)->where('cid=1')->order('pubdate desc')->limit(6)->select();
        $dongtai = $Article->field('id,title,pubdate')->where($data)->where('cid=2')->order('pubdate desc')->limit(6)->select();
        $inform = $Article->field('id,title,pubdate')->where($data)->where('cid=3')->order('pubdate desc')->limit(6)->select();
        $rights = $Article->field('id,title,pubdate')->where($data)->where('cid=4')->order('pubdate desc')->limit(6)->select();
        $college = $Article->field('id,title,pubdate')->where($data)->where('cid=5')->order('pubdate desc')->limit(6)->select();
        $download = $Article->field('id,title,pubdate')->where($data)->where('cid=6')->order('pubdate desc')->limit(6)->select();
        //变量
        $this->assign('banner',$this->addBanner());
        $this->assign('activity',$activity);
        $this->assign('dongtai',$dongtai);
        $this->assign('inform',$inform);
        $this->assign('rights',$rights);
        $this->assign('college',$college);
        $this->assign('download',$download);
        //部门链接
        $this->assign('department',$this->getDepartment());
        $this->display('index');
    }
    //文章正文页
    public function article($id){
        $Article = M('Article');
        $article = $Article->find($id);
        //更新点击量
        $this->addHit($Article,$article);
        //获取分类名称
        $category = $this->getCategoryById($article['cid']);
        //变量
        $this->assign('banner',$this->addBanner());
        $this->assign('category',$category);
        $this->assign('article',$article);
        $this->display('article');
    }
    //文章列表页
    public function category($name,$id){
        $Article = M('Article');
        $category = $this->getCategoryByName($name);
        if($id == null||$id == 0 ) $id = 1;
        $data['state'] = 1;
        $list = $Article->field('id,title,pubdate')->where($data)->where('cid='.$category['id'])->order('pubdate desc')->page($id,15)->select();
        //处理pagination
        $pagination = $this->getPagination($category['id'],$id);
        $paginationPointer = array_slice($pagination,-2,2);
        //删除pagination最后两个元素
        unset($pagination['last']);
        unset($pagination['next']);
        //变量
        $this->assign('banner',$this->addBanner());
        $this->assign('category',$category);
        $this->assign('list',$list);
        $this->assign('paginationPointer',$paginationPointer);
        $this->assign('pagination',$pagination);
        $this->display('list');
    }
    //搜索文章
    //设置cid==8，为搜索类别
    public function search($id){
        $Article = M('Article');
        $title = $_POST['title'];
        if($title!=null) session('search',$title);
        if($title==null&&session('search')==null) $this->error('输入内容为空，操作失败！');
        $data['title'] = array('like','%'.session('search').'%');
        $data['state'] = 1;
        $list = $Article->field('id,title,pubdate')->where($data)->order('pubdate desc')->page($id,15)->select();
        //处理pagination
        $pagination = $this->getPagination(8,$id);//
        $paginationPointer = array_slice($pagination,-2,2);
        //删除pagination最后两个元素
        unset($pagination['last']);
        unset($pagination['next']);
        //变量
        $this->assign('banner',$this->addBanner());
        $this->assign('list',$list);
        $this->assign('paginationPointer',$paginationPointer);
        $this->assign('pagination',$pagination);
        $this->display('search');
    }
    private function getDepartment(){
        $Department = M('Page');
        $department = $Department->field(true)->limit(0,15)->select();
        return $department;
    }
    //更新点击量数据
    private function addHit($Article,$article){
        $article['hit'] = $article['hit'] + 1;//增加点击量
        $Article->save($article);//更新数据
    }
    //获取category
    private function getCategoryByName($ename){
        $Category = M('Category');
        $data['ename'] = $ename;
        $category = $Category->where($data)->find();
        return $category;
    }
    //获取category
    private function getCategoryById($cid){
        $Category = M('Category');
        $data['id'] = $cid;
        $category = $Category->where($data)->find();
        return $category;
    }
    //获取pagination
    private function getPagination($cid,$id){
        $Article = M('Article');
        $listNumber = 15;//列表数据数量
        $pageNumber = 10;//分页页码数量
        $data['state'] = 1;
        if($cid<=7){
            $sum = ceil($Article->where($data)->where('cid='.$cid)->count('id')/$listNumber);
        }
        else if($cid==8){
            $title = session('search');
            $data['title'] = array('like','%'.$title.'%');
            $sum = ceil($Article->where($data)->count('id')/$listNumber);
        }
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
    private function addBanner(){
        $Banner = M('Banner');
        $data['state'] = 1;
        $banner = $Banner->where($data)->select();
        for($i=0;$i<count($banner);$i++){
            $banner[$i]['src'] = C('SLIDER_PATH').C('SLIDER_PIC_PREFIX').$banner[$i]['id'].".".$banner[$i]['suffix'];
        }
        return $banner;
    }


}