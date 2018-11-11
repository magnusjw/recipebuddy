<?php

/**
 * Created by PhpStorm.
 * Date: 11/11/2018
 * Time: 13:46
 */
class ListRecipes implements RecipeManagement
{
    private $recipes = [];

    /**
     * ListRecipes constructor.
     * @param array $recipes
     */
    public function __construct(array $recipes)
    {
        $this->recipes = $recipes;
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