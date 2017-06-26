<?php
/**
 * convert array to attributes
 *
 */
namespace one2build\Library\Template;

/**
 * Class attributesToString
 * @package one2build\Library\Template
 */
class attributesToString
{
    protected $attribute;

    /**
     * attributesToString constructor.
     * @param array $attribute
     */
    public function __construct( $attribute = [] )
    {
        $this->attribute = $attribute;

    }

    /**
     * @return string $string containing attributes
     */
    public function __toString()
    {
        $string = "";
        foreach ($this->attribute as $attr => $value) $string .= $attr . "='" . $value . "' ";
        return $string;

    }
}