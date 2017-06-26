<?php

/**
 * Created by PhpStorm.
 * User: phantmbox
 * Date: 26-6-2017
 * Time: 0:06
 */
class page
{
    protected $type;

    public function __construct( $type )
    {
        $this->type = $type;
    }
    public function output() {
        if ($this->type == "open" || $this->type == "complete") {
            return "<!-- PAGE START -->" ;
        }else {
            return "<!-- PAGE END -->" ;
        }
    }
}