<?php
namespace one2build\Library\Loader;

/**
 * Interface xmlFileLoaderInterface
 */
interface fileLoaderInterface
{
    public function __construct();
    public function setFile( $fileToLoad = null );
    public function loadFile();
}

/**
 * Class fileLoader
 * @package one2build\Library
 */
class fileLoader implements fileLoaderInterface
{
    protected $fileToLoad;
    
    public function __construct() {

    }

    public function setFile( $fileToLoad = null )
    {
        $this->fileToLoad = $fileToLoad;
    }
    public function loadFile()
    {
        try
        {
            // load file and return content
            if ( $loadedFile = file_get_contents( $this->fileToLoad , FILE_USE_INCLUDE_PATH ) ) return $loadedFile;

        } catch (\Exception $e) {

            throw new \Exception ( "failed to load Xml: " . __METHOD__ );

        }

        return false;
    }
}