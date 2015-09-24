<?php
/**
 * Created by PhpStorm.
 * User: oliver
 * Date: 2015/9/14
 * Time: 16:09
 */
namespace Admin\Model;
use \Think\Model;
class UserModel extends Model{
    private $id;
    private $name;
    private $password;
    private $organization;
    private $level;
    private $login_time;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @param mixed $organization
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getLoginTime()
    {
        return $this->login_time;
    }

    /**
     * @param mixed $login_time
     */
    public function setLoginTime($login_time)
    {
        $this->login_time = $login_time;
    }

    /**
     * @return mixed
     */



}