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
    public function __construct( $settings );
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
    public function __construct( $settings = [] ) {

        // add first part of the header
        $this->_headerOutput .= $this->_addHeaderStart();

        // add meta tags to the header
        if ( property_exists( $settings , 'meta'  ) ) $this->_headerOutput .= $this->_addMetaTags( $settings->meta );

        // add settings -> defaultHeaderInclude
        if ( property_exists( $settings , 'defaultHeaderInclude'  ) ) $this->_addHeadersFromSettings( $settings->defaultHeaderInclude );



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
           $addType .= "<meta name='" . $metaType . " content='" . $metaValue . "'>" . PHP_EOL;
        }

        return $addType;

    }

    /**
     * @param $settingsHeaders
     */
    private function _addHeadersFromSettings($settingsHeaders = [])
    {

        foreach($settingsHeaders as $includeType=>$includeItems)
        {
            $addType = "<!-- header includes -->\n<head>" . PHP_EOL;
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
                    foreach($includeItems as $item) $addType = "<link href='" . $item . "' rel='stylesheet'/>" .PHP_EOL;
                    break;
            }
            $addType .= "</head>" .PHP_EOL;
            // add items to the headerOutput var
            $this->_headerOutput .= $addType;
        }

    }

    /**
     * @return string $this->_headerOutput containing the full head tag
     */
    public function returnHeaderHtml()
    {
        return $this->_headerOutput;
    }

}