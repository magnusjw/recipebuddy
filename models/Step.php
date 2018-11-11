<?php

/**
 * Created by PhpStorm.
 * Date: 11/11/2018
 * Time: 13:35
 */
class Step
{
    private $id;
    private $name;
    private $description;

    /**
     * Step constructor.
     * @param $id
     * @param $name
     * @param $description
     */
    public function __construct($id, $name, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }


}