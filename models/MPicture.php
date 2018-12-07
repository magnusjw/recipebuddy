<?php

/**
 * Created by PhpStorm.
 * User: Antoine Croisille
 * Date: 07/12/2018
 * Time: 11:21
 */
class Picture
{
    private $id;
    private $name;
    private $path;

    function __construct($id,$name,$path)
    {
        $this->$id = $id;
        $this->$name = $name;
        $this->$path = $path;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }


}