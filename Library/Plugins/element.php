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
    protected $content;

    /**
     * element constructor.
     * @param string $type
     * @param array $attributes
     * @param string $content
     */
    public function __construct( $type , $attributes = [] , $content = "" )
    {

        $this->type = $type;
        $this->attributes = $attributes;
        $this->content = $content;

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
                $output .= $this->content;
                break;
            case "close":
                $output  .= "</div>";
                break;
            case "complete":
                $output  .= "<div ";
                $output .= new attrToStr( $this->attributes );
                $output .= ">". $this->content . "</div>";
                break;
        }

        return $output;
    }

    
}