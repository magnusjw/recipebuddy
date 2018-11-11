<?php

/**
 * Created by PhpStorm.
 * Date: 11/11/2018
 * Time: 13:46
 */
class ShoppingList implements RecipeManagement, IngredientsManagement
{
    private $recipes = [];
    private $ingredients = [];

    /**
     * ShoppingList constructor.
     * @param array $recipes
     * @param array $ingredients
     */
    public function __construct(array $recipes, array $ingredients)
    {
        $this->recipes = $recipes;
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

    public function addRecipe($recipe)
    {
        // TODO: Implement addRecipe() method.
    }

    public function updateRecipe($recipe)
    {
        // TODO: Implement updateRecipe() method.
    }

    public function removeRecipe($recipe)
    {
        // TODO: Implement removeRecipe() method.
    }

    public function searchRecipe($search)
    {
        // TODO: Implement searchRecipe() method.
    }


}