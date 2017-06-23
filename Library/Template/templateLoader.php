<?php
/**
 * Created by PhpStorm.
 * User: phantmbox
 * Date: 23-6-2017
 * Time: 16:59
 */

namespace one2build\Library\Template;
/**
 * include xmlFileLoader, xmlToStructure
 */
require_once(ROOT . "/Library/Xml/xmlFileLoader.php");
require_once(ROOT . "/Library/Xml/xmlToArrayStructure.php");

use one2build\Library\Xml\xmlFileLoader as xmlFileLoader;
use one2build\Library\Xml\xmlToArrayStructure as xmlToArrayStructure;

/**
 * Interface templateLoaderInterface
 * @package one2build\Library\Template
 */
interface templateLoaderInterface
{
    public function __construct( $file );
    public function loadTemplateFile();

}

/**
 * Class templateLoader
 * @package one2build\Library\Template
 */
class templateLoader implements templateLoaderInterface
{
    private $_templateFile = null;

    /**
     * templateLoader constructor.
     * @param $file
     */
    public function __construct( $file )
    {
        $this->_templateFile = $file;
    }

    /**
     * @return null
     */
    public function loadTemplateFile( )
    {
        try {

            // initiate xmlFileLoader and load default setting file
            $settingsFileLoader = new xmlFileLoader(ROOT . $this->_templateFile);

            if ( $settingFileLoaderResult = $settingsFileLoader->loadResult() ) {

                try {

                    // initiate xmlToArrayStructure
                    $xmlToArray = new xmlToArrayStructure($settingFileLoaderResult);
                    // get converted xml and return array structure (open/close/complete tags)
                    if ( $convertedXml = $xmlToArray->convert() ) return $convertedXml;
                    // error, no array was created
                    return null;

                } catch (\Exception $e) {

                    echo $e->getMessage();
                    return null;
                }
            }

            return null;

        } catch (\Exception $e) {

            echo $e->getMessage();
            return null;
        }
    }
}