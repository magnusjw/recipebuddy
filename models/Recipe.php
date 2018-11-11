<?php

/**
 * Created by PhpStorm.
 * Date: 11/11/2018
 * Time: 13:30
 */
class Recipe
{
    private $id;
    private $name;
    private $description;
    private $difficulty;
    private $time;
    private $rating = [];

    private $ingredients = [];
    private $steps = [];
    private $pictures = [];

    /**
     * Recipe constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $difficulty
     * @param $time
     * @param array $rating
     * @param array $ingredients
     * @param array $steps
     * @param array $pictures
     */
    public function __construct($id, $name, $description, $difficulty, $time, array $rating, array $ingredients, array $steps, array $pictures)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->difficulty = $difficulty;
        $this->time = $time;
        $this->rating = $rating;
        $this->ingredients = $ingredients;
        $this->steps = $steps;
        $this->pictures = $pictures;
    }


}