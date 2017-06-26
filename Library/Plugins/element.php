<?php

/**
 * Created by PhpStorm.
 * User: phantmbox
 * Date: 25-6-2017
 * Time: 23:57
 */
class element
{
    protected $type;
    protected $attributes;

    public function __construct( $type , $attributes = [] )
    {
        $this->type = $type;
        
    }
    public function output() {
        $output = "";
        switch ($this->type) {
            case "open":
                $output  .= "<div>";
                break;
            case "close":
                $output  .= "</div>";
                break;
            case "complete":
                $output  .= "<div></div>";
                break;
        }

        return $output;
    }
}