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
interface includeClassInterface
{
    public function __construct( $type , $arg);
    public function output();
}

/**
 * Class includeFile
 * @package one2build\Libraray\Plugins
 */
class includeClass implements includeClassInterface
{
     /**
     * includeFile constructor.
     * @param $type
     * @param array $attributes
     */
    public function __construct( $type , $attributes = [])
    {
        $this->type = $type;
        $this->attributes = $attributes;
        $this->include = $this->check();
    }
    /*
     * load file and return content
     * @return string/html file content
     */
    public function check()
    {
        try{
            $themeIncludePath = ROOT .  one2build\one2build::$currentThemeDirectory .  $this->attributes['file'];
            //echo $themeIncludePath;
            
            if ( !$fileContent = file_get_contents( $themeIncludePath , FILE_USE_INCLUDE_PATH ) ) throw new \Exception("Cant load plugin include content : " . __METHOD__);
            return $fileContent;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return null;
    }

    /**
     * @return string $this->include contains include output
     */
    public function output()
    {
        return $this->include;
    }
}