<?php
/**
 *
 */
namespace one2build\Library\Template;
/**
 * Interface templateParserHeaderInterface
 * @package one2build\Library\Template
 */
interface templateParserHeaderInterface
{
    public function __construct();
    public function returnHeaderHtml();
}

/**
 * Class templateParserHeader
 * @package one2build\Library\Template
 */
class templateParserHeader implements templateParserHeaderInterface
{
    /**
     * templateParserHeader constructor.
     */
    private $_headerOutput;

    /**
     * templateParserHeader constructor.
     */
    public function __construct() {

        $this->_addFirstPart();

        $this->_addLastPart();

    }

    /**
     *  add first part of the head to $this->_headerOutput;
     */
    private function _addFirstPart()
    {
        $this->_headerOutput .= "<!DOCTYPE html>\n<html>\n<head>" . PHP_EOL;

    }

    /**
     * add last part of the head to $this->_headerOutput;
     */
    private function _addLastPart()
    {
        $this->_headerOutput .= "</head>" . PHP_EOL;
    }

    /**
     * @return string $this->_headerOutput containing the full head tag
     */
    public function returnHeaderHtml()
    {
        return $this->_headerOutput;
    }

}