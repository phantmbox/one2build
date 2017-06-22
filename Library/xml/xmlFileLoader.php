<?php
namespace one2build\Library\Xml;
use one2build\Library\Loader\fileLoader;
//use one2build\one2build\Library\xmlToArrayStructure;

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
    public function loader();
}
/**
 * Class xmlFileLoader
 */
class xmlFileLoader implements xmlFileLoaderInterface
{


    private $_xmlFileToLoad;
    private $_receivedXmlData = "";
    
    /**
     * xmlFileLoader constructor.
     * @param string $xmlFile
     */
    public function __construct($xmlFile = "")
    {
        //$this->_xmlFileToLoad = $xmlFile;
    }

    /**
     * @return string Xml file
     * @throws \Exception xmlLoad
     */
    public function loader()
    {
            //$loadXml = new fileLoader();
           // $loadXml->setFile( $this->_xmlFileToLoad );
            //return $loadXml->loadFile();

    }
}