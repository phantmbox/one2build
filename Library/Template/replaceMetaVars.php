<?php
/**
 * Created by PhpStorm.
 * User: phantmbox
 * Date: 25-6-2017
 * Time: 11:08
 */

namespace one2build\Library\Template;

/**
 * Interface replaceMetaVarsInterface
 * @package one2build\Library\Template
 */
interface replaceMetaVarsInterface
{
    public function __construct();
    public function replace( $metaValue );
}

/**
 * Class replaceMetaVars
 * @package one2build\Library\Template
 */
class replaceMetaVars implements replaceMetaVarsInterface
{

    public function __construct( /***/ ) {}

    /**
     * @param $metaValue
     * @return mixed
     */
    public function replace( $metaValue )
    {

        return preg_replace_callback("|{{(.*)}}|", array($this, '_checkTags') , $metaValue );

    }

    /**
     * @param $tag
     * @return string $returnTagValue - replaced var with new information
     */
    private function _checkTags( $tag )
    {
        // only {{url}} is active at this moment
        switch ($tag[1])
        {
            case "url": $returnTagValue = URLARGUMENTS; break;
            default : $returnTagValue = ""; break;
        }

        return $returnTagValue;
    }
}