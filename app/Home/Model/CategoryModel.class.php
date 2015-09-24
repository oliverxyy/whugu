<?php
/**
 * Created by PhpStorm.
 * User: oliver
 * Date: 2015/9/4
 * Time: 23:22
 */
namespace Home\Model;
use Think\Model;

class CategoryModel extends Model{
    private $id;
    private $name;
    private $ename;



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
    public function getEname()
    {
        return $this->ename;
    }

    /**
     * @param mixed $ename
     */
    public function setEname($ename)
    {
        $this->ename = $ename;
    }

}