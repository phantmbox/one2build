<?php
namespace one2build;

require_once(ROOT . "/Library/Settings/getSettings.php");
require_once(ROOT . "/Library/Settings/checkSettings.php");
require_once(ROOT . "/Library/Template/templateLoader.php");
require_once(ROOT . "/Library/Template/templateParser.php");

use one2build\Library\Settings\getSettings as getSettings;
use one2build\Library\Settings\checkSettings as checkSettings;
use one2build\Library\Template\templateLoader as templateLoader;
use one2build\Library\Template\templateParser as templateParser;


/**
 * one2build framework
 */

/**
 * Interface one2buildInterface
 * @package one2build
 */
interface one2buildInterface
{
    public function __construct();
    public function buildPage();
}

/**
 * Class one2build
 * @package one2build
 * @var array $_settings contains array of settings file
 */
class one2build implements one2buildInterface
{
    protected $_settings = null;
    protected $_template = null;
    protected $_currentPage = "home";
    protected $_headerOutput = "";
    protected $_bodyOutput = "";

    /**
     * one2build constructor.
     */
    public function __construct()
    {

    }

    /**
     * start building the page
     */
    public function buildPage()
    {

        try {

            // load settings file ( /settings/settings.one )
            $this->_settings = $this->_getSettings();

            // check for all necessary settings information
            // settings file needs ( projectname, theme tag );
            $checkSettings = new checkSettings( $this->_settings );
            $checkSettings->checkSettings();

            // loading currentPage template (/themes/<theme>/<page>.one)
            $this->_template = $this->_loadTemplate();
            
            // parsing the template to html
            $parser = new templateParser( $this->_template );
            
            echo "OK";

        } catch (\Exception $e) {

            echo $e->getMessage() . "Terminated!".PHP_EOL;

        }
        
    }

    /**
     * @return bool|false if no settings file cant be loaded and converted in array
     * @return array $result contains array of settings file
     * @throws \Exception if settings file cant be loaded and converted into array
     */
    private function _getSettings()
    {
        try {

            $settings =  new getSettings();
            if ( !$result = $settings->loadSettingsFile() ) throw new \Exception ("error | " . __METHOD__ . PHP_EOL);

            return $result;

        } catch (\Exception $e) {

            echo $e->getMessage();

        }
        return null;

    }


    /**
     * @return null
     */
    private function _loadTemplate()
    {
        try {

            $currentTheme = $this->_settings;
            $templateLoader =  new templateLoader();
            $templateLoader->setTemplateUrl( "/themes/" . trim($currentTheme->theme) . "/layout/" . $this->_currentPage . ".one" );

            if ( !$result = $templateLoader->loadTemplateFile() ) throw new \Exception("Can load template !" . __METHOD__ . PHP_EOL);

            return $result;

        } catch (\Exception $e) {

            echo $e->getMessage();

        }
        return null;
    }
}


