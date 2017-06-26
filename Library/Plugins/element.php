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

    public function __construct( $type )
    {
        $this->type = $type;
    }
    public function output() {

        switch ($this->type) {
            case "open":
                return "<div>";

            case "close":
                return "</div>";

            case "complete":
                return "<div></div>";

        }
    }
}