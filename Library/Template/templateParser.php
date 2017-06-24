<?php
/**
 * 
 */
namespace one2build\Library\Template;

require_once(ROOT . "/Library/Template/templateParserHeader.php");
require_once(ROOT . "/Library/Template/templateParserBody.php");

use one2build\Library\Template\templateParserHeader as headerParser;
use one2build\Library\Template\templateParserBody as bodyParser;



/**
 * Interface templateParserInterface
 * @package one2build\Library\Template
 */
interface templateParserInterface
{
    public function __construct( $settings, $template );
    public function buildHtmlOutput();
}

/**
 * Class templateParser
 * @package one2build\Library\Template
 */
class templateParser
{
    protected $_htmlOutput = "";
    protected $_template = [];
    protected $_settings = [];
    /**
     * templateParser constructor.
     * @param array $settings contains settings array
     * @param array $template contains template page array
     */
    public function __construct( $settings = [], $template = [] )
    {

        $this->_settings = $settings;
        $this->_template = $template;
    }
    public function buildHtmlOutput()
    {
        try
        {
            $header = new headerParser();
            echo $header->returnHeaderHtml();
            $body = new bodyParser();
            echo $body->returnBodyHtml();

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    
}