<?php
namespace one2build;

// xmlFileLoader for loading Xml (.one) files
use one2build\Library\xmlFileLoader;

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
    public function buildPage()
    {
        echo  __METHOD__ . PHP_EOL;
        
    }
}


