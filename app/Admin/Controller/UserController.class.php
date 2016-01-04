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
    /**
     * 权限设置：
     * 4：管理员
     * 3：主席团
     * 2：部长级
     * 1：部委
     */
    /**
     * 权限访问设置：
     * 1：使用须知、退出登录、修改密码、添加文章
     * 2：所有用户、添加用户、管理文章、banner管理、页面管理
     * 3：访问统计板块、日志板块
     */
    /**
     * 核心逻辑：高等级用户仅能查看和操作次一级权限用户
     */
    //登录页
    public function login(){
        $this->display('Admin/login');
    }
    //登录操作
    public function index(){
        $User = M('User');
        $data['name'] = $_POST['name'];
        $data['password'] = md5($_POST['password']);
        if($User->where($data)->find()!=null){
            session('user',$this->getUser($data['name']));
            $data2['login_time'] = date('Y-m-d H:i:s',time());
            $User->where($data)->save($data2);//更新登录时间
            $this->display('Admin/info');
        }
        else{
            $this->display('Admin/login');
        }
    }
    //用户使用须知
    public function info(){
        $this->user_deny(1);
        $this->display('Admin/info');
    }
    //注销
    public function logout(){
        session('user',null);
        $this->display('Admin/login');
    }
    //修改信息界面
    public function changePdPage(){
        $this->user_deny(1);
        $this->assign('username',session('user.name'));
        $this->display('Admin/changePd');
    }
    //修改信息操作
    public function changePd(){
        $this->user_deny(1);
        $User = M('User');
        $data['id'] = session('user.id');
        if($_POST['password']==$_POST['confirmPwd']){
            $data['name'] = $_POST['name'];
            $data['password'] = md5($_POST['password']);//md5加密
            $User->save($data);
            session('user',$this->getUser($data['name']));//重新设置session
            $this->success('修改成功！');
        }
        else{
            $this->error('两次密码不一致！');
        }
    }
    //查看所有用户
    public function allUser($id){
        $this->user_deny(2);
        $User = M('User');
        $data['level'] = array('elt',session('user.level'));
        $users = $User->field('id,name,organization,level,login_time')->where($data)->order('level desc')->page($id,15)->select();
        $pagination = $this->getPagination($id);
        $paginationPointer = array_slice($pagination,-2,2);
        //删除pagination最后两个元素
        unset($pagination['last']);
        unset($pagination['next']);
        $this->assign('paginationPointer',$paginationPointer);
        $this->assign('pagination',$pagination);
        $this->assign('users',$this->getLevelMSG($users));
        $this->display('Admin/manageUser');
    }
    //添加用户页面
    public function addUser(){
        $this->user_deny(2);
        $level = $this->getLevelSelect();
        $this->assign('level',$level);
        $this->display('Admin/addUser');
    }
    //添加用户操作
    public function add(){
        $this->user_deny(2);
        $User = M('User');
        $data['name'] = $_POST['name'];
        $data['password'] = $_POST['password'];
        $data['organization'] = $_POST['organization'];
        $data['level'] = $_POST['level'];
        if($_POST['password']==$_POST['confirmPwd']){
            if($data['level']<session('user.level')){
                if($this->getUser($data['name'])==null){
                    $data['password'] = md5($_POST['password']);//md5加密
                    $User->add($data);
                    $this->success('添加成功！');
                }
                else{
                    $this->error('已存在相同用户名，请更换名称！');
                }
            }
            else{
                $this->error('不能赋予同级以上权限！');
            }
        }
        else{
            $this->error('两次密码不一致！');
        }
    }
    //授权界面
    public function changeLevel($id){
        $this->user_deny(2);
        $User = M('User');
        $user = $User->find($id);
        $this->assign('user',$user);
        $this->assign('level',$this->getLevelSelect());
        $this->display('Admin/changeLevel');
    }
    //授权操作
    public function addLevel($id){
        $this->user_deny(2);
        $User = M('User');
        $data['id'] = $id;
        $data['level'] = $_POST['level'];
        if($data['level']<session('user.level')){
            if($User->save($data)){
                $this->success('操作成功！');
            }
            else{
                $this->error('操作失败！');
            }
        }
        else{
            $this->error('操作错误，无法赋予同级以上权限！');
        }
    }

    /**
     * 删除用户，ajax操作
     * @param $id
     * @return json (-1,0,1)状态
     */
    public function deleteUser($id){
        $this->user_deny(2);
        $User = M('User');
        $user = $User->find($id);
        if($user['level']<session('user.level')){
            $User->delete($id) == 1 ? $MSG['state'] = 1 : $MSG['state'] = 0;
        }
        else{
            $MSG['state'] = -1;
        }
        $this->ajaxReturn($MSG);

    }


    //功能性方法
    //通过username获取user信息
    private function getUser($username){
        $User = M('User');
        $data['name'] = $username;
        return $User->field('id,name,organization,level')->where($data)->find();
    }
    //权限不足
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
    private function getLevelSelect(){
        switch(session('user.level')){
            case "2":
                $level[0]['name'] = "部委级";
                $level[0]['value'] = 1;
                break;
            case "3":
                $level[0]['name'] = "部委级";
                $level[0]['value'] = 1;
                $level[1]['name'] = "部长级";
                $level[1]['value'] = 2;
                break;
            case "4":
                $level[0]['name'] = "部委级";
                $level[0]['value'] = 1;
                $level[1]['name'] = "部长级";
                $level[1]['value'] = 2;
                $level[2]['name'] = "主席团";
                $level[2]['value'] = 3;
                break;
            default:
                $level = null;
                break;
        }
        return $level;
    }
    private function getLevelMSG($users){
        for($i=0;$i<count($users);$i++){
            switch($users[$i]['level']){
                case "1":
                    $users[$i]['level'] = "部委级";
                    break;
                case "2":
                    $users[$i]['level'] = "部长级";
                    break;
                case "3":
                    $users[$i]['level'] = "主席团";
                    break;
                case "4":
                    $users[$i]['level'] = "管理员";
                    break;
                default:
                    $users[$i]['level'] = "不合法用户";
                    break;
            }
        }
        return $users;
    }
    //获取pagination
    private function getPagination($id){
        $User = M('User');
        $data['level'] = array('elt',session('user.level'));
        $listNumber = 15;//列表数据数量
        $pageNumber = 10;//分页页码数量
        $sum = ceil($User->where($data)->count('id')/$listNumber);
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
}