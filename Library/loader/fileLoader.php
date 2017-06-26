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
 * @var string $fileToLoad contains filename
 */
class fileLoader implements fileLoaderInterface
{
    protected $fileToLoad;

    /**
     * fileLoader constructor.
     */
    public function __construct() {

    }

    /**
     * @param null $fileToLoad
     */
    public function setFile( $fileToLoad = null )
    {
        $this->fileToLoad = $fileToLoad;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function loadFile()
    {
        try
        {
            // load file and return content
            if ( !$loadedFile = file_get_contents( $this->fileToLoad , FILE_USE_INCLUDE_PATH ) )  throw new \Exception ( "failed to load Xml: " . __METHOD__ . PHP_EOL );
            return $loadedFile;

        } catch (\Exception $e) {

            echo $e->getMessage();

        }

        return false;
    }
}