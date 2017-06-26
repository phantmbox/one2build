<?php
/**
 * 
 */
namespace one2build\Library\Template;

require_once ( ROOT . "/Library/Template/parser.php");

use one2build\Library\Template\parser as parser;

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
    private $_template;
    /**
     * templateParserBody constructor.
     */
    public function __construct( $template = []) {

        $this->_template = $template;
        
        $this->_addFirstPart();
        $this->_convertTemplateToHtml();
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
     *
     */
    private function _convertTemplateToHtml()
    {
        try 
        {
            foreach( $this->_template as $key=>$templateItem )
            {
                $toParse = new parser( $templateItem );
                if ( $toParse->getParseElements() ) $this->_bodyOutput .= $toParse->getParseElements() . PHP_EOL;
            }
        } catch (\Exception $e) {
            
            echo $e->getMessage();
            
        }
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