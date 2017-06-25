<?php
/**
 * 
 */
namespace one2build\Library\Template;

require_once ( ROOT . "/Library/Template/replaceMetaVars.php");

use one2build\Library\Template\replaceMetaVars as replaceMetaVars;

/**
 * Interface templateParserHeaderInterface
 * @package one2build\Library\Template
 */
interface templateParserHeaderInterface
{
    public function __construct( $settings );
    public function returnHeaderHtml();
}

/**
 * Class templateParserHeader
 * @package one2build\Library\Template
 * @return string headerOutput
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
    public function __construct( $settings = [] ) {

        // add first part of the header
        $this->_headerOutput .= $this->_addHeaderStart();

        // add meta tags to the header
        if ( property_exists( $settings , 'meta'  ) ) $this->_headerOutput .= $this->_addMetaTags( $settings->meta );
        $this->_headerOutput .= "<meta name='copyright' content='One2Build Easy WebSite Builder' />" .PHP_EOL;
        // add settings -> defaultHeaderInclude
        if ( property_exists( $settings , 'defaultHeaderInclude'  ) ) $this->_headerOutput .= $this->_addHeadersFromSettings( $settings->defaultHeaderInclude );



    }

    /**
     *  add first part of the head to $this->_headerOutput;
     */
    private function _addHeaderStart()
    {
       return "<!DOCTYPE html>\n<html>" . PHP_EOL;

    }
    /**
     *  add meta part of the head to $this->_headerOutput;
     * @param array $metaTags
     * @return string $addtype ( meta data )
     */
    private function _addMetaTags( $metaTags = [] )
    {
        $addType = "<!-- meta includes -->" . PHP_EOL;

        foreach($metaTags as $metaType=>$metaValue) {
            
            $replaceMetaVars = new replaceMetaVars();
            $metaValue = $replaceMetaVars->replace( $metaValue );
            $addType .= "<meta name='" . $metaType . "' content='" . $metaValue . "' />" . PHP_EOL;
        }

        return $addType;

    }
    
    
    /**
     * @param $settingsHeaders
     * @return string $addType containing head block
     */
    private function _addHeadersFromSettings($settingsHeaders = [])
    {
        $addType = "<!-- header includes -->\n<head>" . PHP_EOL;

        foreach($settingsHeaders as $includeType=>$includeItems)
        {

            switch ($includeType)
            {
                // include javascript file
                case "js":
                    // include all js items
                    foreach($includeItems as $item) $addType .= "<script src='" . $item . "'></script>" .PHP_EOL;
                    break;
                // include stylesheet file
                case "css":
                    // include all css items
                    foreach($includeItems as $item) $addType .= "<link href='" . $item . "' rel='stylesheet'/>" .PHP_EOL;
                    break;
            }

        }
        $addType .= "</head>" .PHP_EOL;

        return $addType;

    }

    /**
     * @return string $this->_headerOutput containing the full head tag
     */
    public function returnHeaderHtml()
    {
        return $this->_headerOutput;
    }

}