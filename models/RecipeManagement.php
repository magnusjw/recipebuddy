<?php
/**
 * Created by PhpStorm.
 * Date: 11/11/2018
 * Time: 13:57
 */
interface RecipeManagement
{
    public function addRecipe($recipe);
    public function updateRecipe($recipe);
    public function removeRecipe($recipe);
    public function searchRecipe($search);
}