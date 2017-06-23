<?php
namespace one2build;

require_once(ROOT . "/Library/exception.php");
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
    protected $_settings = null;

    /**
     * one2build constructor.
     */
    public function __construct()
    {

    }

    /**
     *
     */
    public function buildPage()
    {
        /**
         * lets get some settings
         */
        try {

            $this->_settings = $this->_getSettings();
            if ( $this->_settings !== null ) {
                print_r ( $this->_settings );
            }

        } catch (\Exception $e) {

            throw new \Exception ("Error: loading settings file");

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
            $result = $settings->loadSettingsFile();
            return $result;

        } catch (\Exception $e) {

            throw new \Exception ( "cant load settings file " . __METHOD__ );

        }

        
    }
}


