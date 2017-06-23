<?php
namespace one2build\Library\Xml;

require_once (ROOT . "/Library/Loader/fileLoader.php");

use one2build\Library\Loader\fileLoader;


/**
 * Created by PhpStorm.
 * User: phantmbox
 * Date: 22-6-2017
 * Time: 14:52
 * xmlFileLoader for loading Xml file into string
 */


interface xmlFileLoaderInterface
{
    public function __construct($xmlFile);
    public function loadResult();
}
/**
 * Class xmlFileLoader
 */
class xmlFileLoader implements xmlFileLoaderInterface
{


    private $_xmlFileToLoad;
    
    /**
     * xmlFileLoader constructor.
     * @param string $xmlFile
     */
    public function __construct($xmlFile = null)
    {

        $this->_xmlFileToLoad = $xmlFile;
        
    }

    /**
     * @return string Xml file
     * @throws \Exception xmlLoad
     */
    public function loadResult()
    {

        try {

            // initiate fileLoader
            $loadXml = new fileLoader();
            // set file to load
            $loadXml->setFile($this->_xmlFileToLoad);
            // return loaded xml file
            return $loadXml->loadFile();

        } catch (\Exception $e) {

            throw new \Exception ("error loading data " . __METHOD__);

        }

        
    }
}