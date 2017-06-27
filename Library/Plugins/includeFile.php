<?php
require_once ( ROOT . "/Library/Template/attributesToString.php");
use one2build\Library\Template\attributesToString as attrToStr;

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
    protected $include = "";
    protected $themeIncludePath;
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
            $this->themeIncludePath = ROOT . one2build\one2build::$currentThemeDirectory .  $this->attributes['file'];

            ob_start();
            include( $this->themeIncludePath );
            $output = ob_get_clean();
            return $output;

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
