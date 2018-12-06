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
    private $quantity;

    /**
     * Ingredient constructor.
     * @param $id
     * @param $name
     * @param $category
     * @param $picture
     */
    public function __construct($id, $name, $category, $picture,$quantity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->picture = $picture;
        $this->quantity = $quantity;
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
    public function getCategory()
    {
        return $this->category;
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
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }



}