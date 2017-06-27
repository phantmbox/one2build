<?php
namespace one2build\Library\Loader;
/**
 * Interface dir2arrayInterface
 * @package one2build\Library\Loader
 */
interface dir2arrayInterface
{
    public function __construct();
}

/**
 * Class dir2array
 * @package one2build\Library\Loader
 */
class dir2array
{
    protected $dir;
    protected $files =[];

    /**
     * dir2array constructor.
     * @param null $dir containing directory to fetch
     */
    public function __construct($dir = null)
    {
        try {
            if (!$dir) throw new \Exception("No directory given");
            $this->dir = $dir;
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @return array|bool
     */
    private function _readFiles()
    {
        $this->files = [];
        try {
            if ($handle = opendir(ROOT . $this->dir )) {
                while (($entry = readdir($handle)) !== false) {

                    $this->files[] = $entry ;

                }
                closedir($handle);
            } else {
                throw new \Exception("Cant open directory.");
            }
            return $this->files;
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
        return false;
    }
    public function getFiles()
    {
        if ( !$files = $this->_readFiles() ) throw new \Exception("Cant get files");
        return $files;
    }
}