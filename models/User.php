<?php

/**
 * Created by PhpStorm.
 * Date: 11/11/2018
 * Time: 13:21
 */
class User
{
    private $id;
    private $userName;
    private $lastName;
    private $firstName;
    private $password;
    private $birthdate;

    private $listRecipes;
    private $shoppingList;
    private $pantry;
    private $wishList;

    /**
     * User constructor.
     * @param $id
     * @param $userName
     * @param $lastName
     * @param $firstName
     * @param $password
     * @param $birthdate
     */
    public function __construct($id, $userName, $lastName, $firstName, $password, $birthdate)
    {
        $this->id = $id;
        $this->userName = $userName;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->password = $password;
        $this->birthdate = $birthdate;
    }



}