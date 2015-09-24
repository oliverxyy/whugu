<?php
/**
 * Created by PhpStorm.
 * User: oliver
 * Date: 2015/9/4
 * Time: 16:21
 */

namespace Admin\Controller;
use Think\Controller;

class UserController extends Controller{
    //登录页
    public function login(){
        //常量
        $this->assign('PROJECT_NAME',PROJECT_NAME);
        $this->display('Admin/login');
    }
    //登录操作
    public function index(){
        $User = M('User');
        $data['name'] = $_POST['name'];
        $data['password'] = $_POST['password'];
        $this->assign('PROJECT_NAME',PROJECT_NAME);
        if($User->where($data)->find()!=null){
                session('user',$this->getUser($data['name']));
            var_dump(session('user'));
            $data2['loginTime'] = date('Y-m-d H:i:s',time());
            $User->where($data)->data($data2)->save();//更新登录时间
            $this->display('Admin/info');
        }
        else{
            $this->display('Admin/login');
        }
    }
    //用户使用须知
    public function info(){
        $this->assign('PROJECT_NAME',PROJECT_NAME);
        $this->display('Admin/info');
    }
    //注销
    public function logout(){
        session('user',null);
        //常量
        $this->assign('PROJECT_NAME',PROJECT_NAME);
        $this->display('Admin/login');
    }
    //修改密码界面
    public function changePdPage(){
        $this->assign('username',session('user.name'));
        $this->assign('PROJECT_NAME',PROJECT_NAME);
        $this->display('Admin/changePd');
    }
    //修改密码操作
    public function changePd(){
        $User = M('User');
        $data['id'] = session('user.id');
        $data['password'] = $_POST['password'];
        if($_POST['password']==$_POST['confirmPwd']){
            $User->save($data);
            $this->assign('PROJECT_NAME',PROJECT_NAME);
            $this->success('修改成功！');
        }
        else{
            $this->error('两次密码不一致！');
        }
    }
    public function _before_allUser(){
        $this->user_deny();
    }
    //查看所有用户
    public function allUser(){
        $User = M('User');
        if(session('user.level')==1){
            $users = $User->field('id,name,organization,login_time')->select();
            $this->assign('users',$users);
            $this->assign('PROJECT_NAME',PROJECT_NAME);
            $this->display('Admin/manageUser');
        }
        else if(session('user.level')==2){

        }
        else if(session('user.level')==3){
            $this->error('权限不足，无法访问！');
        }
        else{
            /*$this->error('请先登录');*/
        }
    }
    public function _before_addUser(){
        $this->user_deny();
    }
    //添加用户页面
    public function addUser(){
        $this->assign('PROJECT_NAME',PROJECT_NAME);
        $this->display('Admin/addUser');
    }
    public function _before_add(){
        $this->user_deny();
    }
    //添加用户操作
    public function add(){
        $User = M('User');
        $data['name'] = $_POST['name'];
        $data['password'] = $_POST['password'];
        $data['organization'] = $_POST['organization'];
        $data['level'] = 3;
        if($_POST['password']==$_POST['confirmPwd']){
            if($this->getUser($data['name'])==null){
                $User->add($data);
                $this->assign('PROJECT_NAME',PROJECT_NAME);
                $this->success('添加成功！');
            }
            else{
                $this->assign('PROJECT_NAME',PROJECT_NAME);
                $this->error('已存在相同用户名，请更换名称！');
            }
        }
        else{
            $this->error('两次密码不一致！');
        }
    }
    public function deleteUser($id){
        $User = M('User');
        if(session('user.level')==1){
            $User->delete($id);
            $users = $User->field('id,name,organization,login_time')->select();
            $this->ajaxReturn($users);
        }
        else{
            $data['error'] = "权限不够！";
            $this->ajaxReturn($data);
        }

    }


    //功能性方法
    //通过username获取user信息
    public function getUser($username){
        $User = M('User');
        $data['name'] = $username;
        return $User->field('id,name,organization,level')->where($data)->find();
    }
    //权限不足
    public function user_deny(){
        if(session('user.level')==null){
            $this->error('尚未登录，无法访问！','login');
        }
        else if(session('user.level')==3){
            $this->error('权限不足，无法访问！');
        }
        else if(session('user.level')==2){
            $this->error('权限不足，无法访问！');
        }
    }
    //
}