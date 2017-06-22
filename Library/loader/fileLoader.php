<?php
/**
 * Created by PhpStorm.
 * User: phantmbox
 * Date: 22-6-2017
 * Time: 15:15
 */
namespace one2build\Library\Loader;

/**
 * Interface xmlFileLoaderInterface
 */
interface fileLoaderInterface
{
    public function __construct();
    public function setFile( $fileToLoad = null );
}

/**
 * Class fileLoader
 * @package one2build\Library
 */
class fileLoader implements fileLoaderInterface
{
    protected $fileToLoad;
    
    public function __construct() { /**/ }

    public function setFile( $fileToLoad = null )
    {
        $this->fileToLoad = $fileToLoad;
    }
    public function loadFile()
    {
        try
        {
            if ( $loadedFile = file_get_contents( ROOT . $this->fileToLoad ) )return $loadedFile;
        } catch (Exception $e) {
            throw new Exception ( "failed to load Xml: " . $e );
        }
    }
}