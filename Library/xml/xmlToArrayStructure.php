<?php
namespace one2build\Library\Xml;

/**
 * Interface xmlToArrayStructureInterface
 * @package one2build\Library\Xml
 */
interface xmlToArrayStructureInterface
{
    public function __construct($xml);
    public function convert();
}

/**
 * Class xmlToArrayStructure
 * @package one2build\Library\Xml
 */
class xmlToArrayStructure implements xmlToArrayStructureInterface
{
    protected $_xmlData;
    
    public function __construct($xml = null)
    {
        $this->_xmlData = $xml;
    }

    /**
     * @return null
     * @throws \Exception
     */
    public function convert()
    {
        if (isset( $this->_xmlData )) {
            try {

                $tempXml = xml_parser_create();
                xml_parser_set_option($tempXml, XML_OPTION_SKIP_WHITE, 1);
                xml_parser_set_option($tempXml, XML_OPTION_CASE_FOLDING, 0);
                xml_parse_into_struct($tempXml, $this->_xmlData, $structure, $index);
                xml_parser_free($tempXml);

                if ( !$tempXml ) throw new \Exception ("Cant convert String to Xml " . __METHOD__ );

                return $structure;

            } catch (\Exception $e) {

                echo $e->getMessage() . PHP_EOL;
                
            }
        }  else {
            return null;
        }
    }
}