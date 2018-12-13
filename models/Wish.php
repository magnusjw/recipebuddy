<?php

/**
 * Created by PhpStorm.
 * Date: 11/11/2018
 * Time: 13:50
 */
class Wish
{
    private $id;
    private $title;
    private $description;

    /**
     * Wish constructor.
     * @param $id
     * @param $title
     * @param $description
     */
    public function __construct($id, $title, $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }



}