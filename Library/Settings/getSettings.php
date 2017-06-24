<?php
namespace one2build\Library\Settings;
/**
 * include xmlFileLoader
 */
require_once(ROOT . "/Library/Xml/xmlFileLoader.php");
require_once(ROOT . "/Library/Xml/xmlToArray.php");

use one2build\Library\Xml\xmlFileLoader as xmlFileLoader;
use one2build\Library\Xml\xmlToArray as xmlToArray;



/**
 * Interface getSettingsInterface
 * @package one2build\Library
 */


interface getSettingsInterface
{
    public function __construct();
    public function loadSettingsFile();
}

/**
 * Class getSettings
 * @package one2build\Library
 */
class getSettings implements getSettingsInterface
{


    public function __construct(){ }

    /**
     * @throws \Exception if file cant be loaded
     */
    public function loadSettingsFile()
    {
        try {
            
            // initiate xmlFileLoader and load default setting file
            $settingsFileLoader = new xmlFileLoader(ROOT . "/settings/settings.one");
            
            if ( $settingFileLoaderResult = $settingsFileLoader->loadResult() ) {
                
                try {

                    // initiate xmlToArray
                    $xmlToArray = new xmlToArray($settingFileLoaderResult);
                    // get converted xml and return array
                    if ( !$convertedXml = $xmlToArray->convert() ) throw new \Exception( __METHOD__ . PHP_EOL);

                    return $convertedXml;
                            
                } catch (\Exception $e) {

                    echo $e->getMessage();

                }
            }

            //throw new MyException( __METHOD__ . PHP_EOL);

        } catch (\Exception $e) {

            echo $e->getMessage();

        }
        
    }
}