<?php
namespace one2build\Library\Xml;

/**
 * Interface xmlToArrayInterface
 * @package one2build\Library\Xml
 */
interface xmlToArrayInterface
{
    public function __construct($xml);
    public function convert();
}

/**
 * Class xmlToArray
 * @package one2build\Library\Xml
 */
class xmlToArray implements xmlToArrayInterface
{
    private $_xmlData;

    /**
     * xmlToArray constructor.
     * @param null $xml
     */
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

                $tempXml = simplexml_load_string($this->_xmlData , "SimpleXMLElement" , LIBXML_NOCDATA);

                if (!$tempXml) {
                    throw new \UnexpectedValueException ("error creating xml data: " . __METHOD__ . PHP_EOL);
                }

                $xmlToArray = json_decode ( json_encode($tempXml) );

                return $xmlToArray;

            } catch (\Exception $e) {

                echo $e->getMessage();

            }

            return false;

        }  else {

            return false;

        }
    }
}