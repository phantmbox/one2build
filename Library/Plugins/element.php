<?php
require_once ( ROOT . "/Library/Template/attributesToString.php");
use one2build\Library\Template\attributesToString as attrToStr;

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

    /**
     * element constructor.
     * @param $type
     * @param array $attributes
     */
    public function __construct( $type , $attributes = [] )
    {

        $this->type = $type;
        $this->attributes = $attributes;
        
    }

    /**
     * @return string $output containing new html tag
     */
    public function output() {
        $output = "";
        switch ($this->type) {
            case "open":
                $output .= "<div ";
                $output .= new attrToStr( $this->attributes );
                $output .= ">";
                break;
            case "close":
                $output  .= "</div>";
                break;
            case "complete":
                $output  .= "<div ";
                $output .= new attrToStr( $this->attributes );
                $output .= "></div>";
                break;
        }

        return $output;
    }

    
}