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
    public function __construct(  );
    public function setTemplateUrl( $file );
    public function loadTemplateFile();

}

/**
 * Class templateLoader
 * @package one2build\Library\Template
 */
class templateLoader implements templateLoaderInterface
{
    protected $_templateFile = null;

    /**
     * templateLoader constructor.
     */
    public function __construct( ){ }

    /**
     * @param $file
     */
    public function setTemplateUrl( $file )
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
            $templateFileLoader = new xmlFileLoader(ROOT . $this->_templateFile);

            if ( $templateFileLoaderResult = $templateFileLoader->loadResult() ) {

                try {

                    // initiate xmlToArrayStructure
                    $xmlToArray = new xmlToArrayStructure($templateFileLoaderResult);
                    // get converted xml and return array structure (open/close/complete tags)
                    if ( !$convertedXml = $xmlToArray->convert() ) throw new \Exception ("No array created " . __METHOD__);

                    // return array
                    return $convertedXml;

                } catch (\Exception $e) {

                    echo $e->getMessage();

                }
            } else {
                throw new \Exception("No template file loaded. " . __METHOD__ . PHP_EOL);
            }



        } catch (\Exception $e) {

            echo $e->getMessage();

        }
    }
}