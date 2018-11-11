<?php
/**
 * Created by PhpStorm.
 * Date: 11/11/2018
 * Time: 14:01
 */
interface IngredientsManagement
{
    public function addIngredient($ingredient,$quantity);
    public function updateIngredient($ingredient,$quantity);
    public function removeIngredient($ingredient);
    public function searchIngredient($search);
}