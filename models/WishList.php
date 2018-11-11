<?php

/**
 * Created by PhpStorm.
 * Date: 11/11/2018
 * Time: 13:49
 */
class WishList
{
    private $wishs = [];

    /**
     * WishList constructor.
     * @param array $wishs
     */
    public function __construct(array $wishs)
    {
        $this->wishs = $wishs;
    }


}