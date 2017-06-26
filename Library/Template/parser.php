<?php
/**
 * Created by PhpStorm.
 * User: phantmbox
 * Date: 25-6-2017
 * Time: 17:48
 */

namespace one2build\Library\Template;

interface parserInterface
{
    public function __construct( $parseItem );
    public function getParseElements( );
}
class parser implements  parserInterface
{
    protected $parseItem;

    public function __construct( $parseItem )
    {
        $this->parseItem = $parseItem;
        //print_r($this->parseItem);
    }
    public function getParseElements()
    {
        try
        {
            require_once ( ROOT . "/Library/Plugins/" . $this->parseItem['tag'] . ".php" );
            if ( !class_exists( $this->parseItem['tag'] ) ) throw new \Exception("Plugin Class <".$this->parseItem['tag']."> does not exists : " . __METHOD__);
            
            $plugin = new $this->parseItem['tag']( $this->parseItem['type'] , $this->parseItem['attributes'] );
            return $plugin->output();

        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }
    }
    
}