<?php

/**
 * Created by PhpStorm.
 * Date: 11/11/2018
 * Time: 13:48
 */
class Pantry implements IngredientsManagement
{
    private $ingredients = [];

    /**
     * Pantry constructor.
     * @param array $ingredients
     */
    public function __construct(array $ingredients)
    {
        $this->ingredients = $ingredients;
    }


    public function addIngredient($ingredient, $quantity)
    {
        // TODO: Implement addIngredient() method.
    }

    public function updateIngredient($ingredient, $quantity)
    {
        // TODO: Implement updateIngredient() method.
    }

    public function removeIngredient($ingredient)
    {
        // TODO: Implement removeIngredient() method.
    }

    public function searchIngredient($search)
    {
        // TODO: Implement searchIngredient() method.
    }
}