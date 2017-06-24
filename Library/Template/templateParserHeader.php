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
        $this->_addFirstPart();

        // add settings -> defaultHeaderInclude
        if ( property_exists( $settings , 'defaultHeaderInclude'  ) ) $this->_addHeadersFromSettings( $settings->defaultHeaderInclude );

        // add last part of the header
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
     * @param $settingsHeaders
     */
    private function _addHeadersFromSettings($settingsHeaders = [])
    {

        foreach($settingsHeaders as $includeType=>$includeItems)
        {
            $addType = "";
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
            // add items to the headerOutput var
            $this->_headerOutput .= $addType;
        }

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