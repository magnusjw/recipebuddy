<?php
include 'Wish.php'
/**
 * Created by PhpStorm.
 * Date: 11/11/2018
 * Time: 13:49
 */
class WishList
{
    private $wishes = [];

    /**
     * WishList constructor.
     * @param array $wishs
     */
    public function __construct(array $wishes)
    {
        $this->wishes = $wishes;
    }
    public function add(Wish $wish)
    {
        array_push($this->wishes,$wish);    
    }

}