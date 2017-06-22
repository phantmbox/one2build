<?php
namespace one2build\Library;
use one2build\Library\Xml\xmlFileLoader;

/**
 * Created by PhpStorm.
 * User: phantmbox
 * Date: 22-6-2017
 * Time: 21:29
 */
interface getSettingsInterface
{
    public function __construct();
    public function loadSettingsFile();
}
class getSettings implements getSettingsInterface
{
    private $_settingsFileLoader = null;

    public function __construct(){
        echo "initiate getSettings";
    }

    public function loadSettingsFile()
    {
        echo "load settings";
        try {
            $_settingsFileLoader = new xmlFileLoader(ROOT . "/settings/settings.one");
        } catch (\Exception $e) {
            throw new \Exception ("cant initiate xmlFileLoader " . __METHOD__ );
        }
    }
}