<?php
/**
 * Created by PhpStorm.
 * User: oliver
 * Date: 2015/9/4
 * Time: 16:21
 */

namespace Admin\Controller;
use Think\Controller;

class BannerController extends Controller{
    /**
     * banner板块权限设置：
     * 1：无权限
     * 2+：有操作权限
     */
    public function index(){
        $this->user_deny(2);
        $Banner = M('Banner');
        $banner = $Banner->select();
        for($i=0;$i<count($banner);$i++){
            $banner[$i]['src'] = C('SLIDER_PATH').C("SLIDER_PIC_PREFIX").$banner[$i]['id'].".".$banner[$i]['suffix'];
            $banner[$i]['state'] == 0 ? $banner[$i]['state'] = "启用" : $banner[$i]['state'] = "禁用";
        }
        $this->assign('banner',$banner);
        $this->display('Admin/banner');
    }
    public function update($id){
        $this->user_deny(2);
        $Banner = M('Banner');
        $banner = $Banner->find($id);
        $banner['action'] = C('PROJECT_PATH')."Admin/Banner/upload/".$id;
        $this->assign('banner',$banner);
        $this->display('Admin/addBanner');
    }
    public function upload($id){
        $this->user_deny(2);
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 1024*1024*100 ;// 设置附件上传大小100M
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = 'Public/static/img/slider/'; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录
        $upload->replace = true;
        $upload->autoSub = false;//关闭子目录设置（默认按期）
        $upload->saveName = C('SLIDER_PIC_PREFIX').$id;//设置数字会解析错误（文件命名规则错误）
        // 上传文件
        $info = $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            foreach($info as $file){
                $banner['suffix'] = pathinfo($file['savename'], PATHINFO_EXTENSION);
                $banner['md5'] = $file['md5'];
            }
        }

        $Banner = M('Banner');
        $banner['id'] = $_GET['id'];
        $banner['title'] = $_POST['title'];
        $banner['href'] = $_POST['href'];
        $Banner->save($banner) == 1 ? $this->success('操作成功') : $this->error('操作失败');

    }
    public function enable($id){
        $Banner = M('Banner');
        $banner = $Banner->find($id);
        $banner['state'] = !$banner['state'];
        $MSG['state'] = $banner['state'];
        $Banner->save($banner);
        $this->ajaxReturn($MSG);
    }
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