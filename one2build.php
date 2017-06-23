<?php
namespace one2build;

require_once(ROOT . "/Library/Settings/getSettings.php");
require_once(ROOT . "/Library/Template/templateLoader.php");

use one2build\Library\Settings\getSettings as getSettings;
use one2build\Library\Template\templateLoader;


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
    private $_settings = null;
    private $_template = null;
    private $_currentPage = "home";
    private $_headerOutput = "";
    private $_bodyOutpur = "";

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
            $this->_checkSettingsInformation();

            // loading currentPage template (/themes/<theme>/<page>.one)
            $this->_template = $this->_loadTemplate();
           

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
     * @return bool
     * @throws \Exception
     */
    private function _checkSettingsInformation()
    {
        $settingsItem = $this->_settings;

        if ( !property_exists( $settingsItem , 'projectname' ) || !isset( $settingsItem->projectname ) ) throw new \Exception ("projectname missing is settings file " . PHP_EOL);
        if ( !property_exists( $settingsItem , 'theme' ) || !isset( $settingsItem->theme ) ) throw new \Exception ("theme missing in settings file " . PHP_EOL);


        return true;
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


