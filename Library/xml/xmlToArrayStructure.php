<?php
namespace one2build\Library\Xml;

interface xmlToArrayStructureInterface
{
    public function __construct($xml);
    public function convert();
}
class xmlToArrayStructure implements xmlToArrayStructureInterface
{
    private $_xmlData;
    
    public function __construct($xml = null)
    {
        $this->_xmlData = $xml;
    }
    
    public function convert()
    {
        if (isset( $this->_xmlData )) {
            
        }  
    }
}