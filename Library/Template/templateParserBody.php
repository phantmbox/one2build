<?php
/**
 *
 */
namespace one2build\Library\Template;

/**
 * Interface templateParserBodyInterface
 * @package one2build\Library\Template
 */
interface templateParserBodyInterface
{
    public function __construct( $template );
    public function returnBodyHtml();
}

/**
 * Class templateParserBody
 * @package one2build\Library\Template
 */
class templateParserBody implements templateParserBodyInterface
{
    /**
     * templateBodyHeader constructor.
     */
    private $_bodyOutput;

    /**
     * templateParserBody constructor.
     */
    public function __construct( $template) {

        $this->_addFirstPart();

        $this->_addLastPart();

    }

    /**
     * add first part of the body to $this->_bodyOutput;
     */
    private function _addFirstPart()
    {
        $this->_bodyOutput .= "<body>" . PHP_EOL;

    }

    /**
     * add last part of the body to $this->_bodyOutput;
     */
    private function _addLastPart()
    {
        $this->_bodyOutput .= "</body>\n</html>" . PHP_EOL;
    }

    /**
     * @return string $this->_bodyOutput containing the full page body
     */
    public function returnBodyHtml()
    {
        return $this->_bodyOutput;
    }
}