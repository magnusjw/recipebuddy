<?php

/**
 * Created by PhpStorm.
 * Date: 11/11/2018
 * Time: 13:39
 */
class Ingredient
{
    private $id;
    private $name;
    private $category;
    private $picture;

    /**
     * Ingredient constructor.
     * @param $id
     * @param $name
     * @param $category
     * @param $picture
     */
    public function __construct($id, $name, $category, $picture)
    {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->picture = $picture;
    }


}