<?php
/**
 *
 */
namespace one2build\Library\Template;

require_once ( ROOT . "/Library/Template/attributesToString.php");
use one2build\Library\Template\attributesToString as attributesToString;

/**
 * Interface parserInterface
 * @package one2build\Library\Template
 */
interface parserInterface
{
    public function __construct( $parseItem );
    public function getParseElements( );
    
}

/**
 * Class parser
 * @package one2build\Library\Template
 */
class parser implements  parserInterface
{
    protected $parseItem;

    /**
     * parser constructor.
     * @param $parseItem
     */
    public function __construct($parseItem)
    {
        $this->parseItem = $parseItem;

    }

    /**
     * @return string containing the replace tag with plugin html
     * @throws \Exception if class name does not exists
     */
    public function getParseElements()
    {
        try {
            // include plugin class
            require_once(ROOT . "/Library/Plugins/" . $this->parseItem[ 'tag' ] . ".php");
            // if class name does not exists, throw error
            if (!class_exists($this->parseItem[ 'tag' ])) throw new \Exception("Plugin Class <" . $this->parseItem[ 'tag' ] . "> does not exists : " . __METHOD__);
            $plugin = new $this->parseItem[ 'tag' ]($this->parseItem[ 'type' ], $this->parseItem[ 'attributes' ] , $this->parseItem['value'] );
            return $plugin->output();

        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
            return false;
        }

    }


}