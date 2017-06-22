<?php
namespace one2build;

// xmlFileLoader for loading Xml (.one) files
use one2build\Library\xmlFileLoader;
use one2build\Library\getSettings as getSettings;

/**
 * one2build framework
 */

/**
 * Interface one2buildInterface
 */
interface one2buildInterface
{
    public function __construct();
    public function buildPage();
}

/**
 * Class one2build
 */
class one2build implements one2buildInterface
{
    public function __construct()
    {
       echo  __METHOD__ . PHP_EOL;
    }

    /**
     * @throws \Exception
     */
    public function buildPage()
    {
        echo  __METHOD__ . PHP_EOL;
        
        /**
         * lets get some settings
         */
        echo "step 1";
        try {
            $settings = new Library\getSettings();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        echo "step 1 - complete";
    }
}


