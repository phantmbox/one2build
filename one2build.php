<?php
namespace one2build;

require_once(ROOT . "/Library/Settings/getSettings.php");

use one2build\Library\Settings\getSettings as getSettings;


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
        /**
         * lets get some settings
         */
        try {

            $this->_settings = $this->_getSettings();

            // check for all necessary settings otherwise throw exception
            $this->_checkSettingsInformation();
            
            // loading currentPage template
            $this->_template = $this->_loadTemplate();


        } catch (\Exception $e) {

            echo $e->getMessage();

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
            echo __METHOD__ .PHP_EOL;
            $settings =  new getSettings();
            $result = $settings->loadSettingsFile();
            print_r($result);
            return $result;

        } catch (\Exception $e) {

            echo $e->getMessage();

        }
        return null;

    }
    private function _checkSettingsInformation()
    {
        echo __METHOD__ .PHP_EOL;


        $settingsItem = $this->_settings;

        if ( !property_exists( $settingsItem , 'projectname' ) || !isset( $settingsItem->projectname ) ) throw new \Exception ("projectname missing is settings file");
        if ( !property_exists( $settingsItem , 'theme' ) || !isset( $settingsItem->theme ) ) throw new \Exception ("theme missing in settings file");


        return true;
    }
    private function _loadTemplate()
    {
        
    }
}


