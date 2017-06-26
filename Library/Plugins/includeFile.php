<?php


/**
 * Created by PhpStorm.
 * User: phantmbox
 * Date: 25-6-2017
 * Time: 23:57
 */

/**
 * Interface includeFileInterface
 * @package one2build\Libraray\Plugins
 */
interface includeFileInterface
{
    public function __construct( $type , $arg);
    public function output();
}

/**
 * Class includeFile
 * @package one2build\Libraray\Plugins
 */
class includeFile implements includeFileInterface
{
    protected $type;
    protected $file;
    protected $attributes;

    /**
     * includeFile constructor.
     * @param $type
     * @param null $file
     * @param array $arg
     */
    public function __construct( $type , $attributes = [])
    {

        $this->type = $type;
        $this->attributes = $attributes;

    }
    /*
     * load file and return content
     * @return string/html file content
     */
    public function check()
    {
        try{
            if ( !$fileContent = file_get_contents( ROOT . $this->attributes['file'] ) ) throw new \Exception("Cant load plugin include content : " . __METHOD__);
            return $fileContent;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return true;
    }
    public function output()
    {
        return "Includes " . $this->attributes['file'];
    }
}