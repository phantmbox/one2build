<?php
namespace one2build;

require_once(ROOT . "/Library/Settings/getSettings.php");
require_once(ROOT . "/Library/Settings/checkSettings.php");
require_once(ROOT . "/Library/Template/templateLoader.php");
require_once(ROOT . "/Library/Template/templateParser.php");


use one2build\Library\Settings\getSettings      as getSettings;
use one2build\Library\Settings\checkSettings    as checkSettings;
use one2build\Library\Template\templateLoader   as templateLoader;
use one2build\Library\Template\templateParser   as templateParser;


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
    protected $_settings        = null;
    protected $_template        = null;
    protected $_currentPage     = "home";
    protected $_headerOutput    = "";
    protected $_bodyOutput      = "";

    /**
     * one2build constructor.
     */
    public function __construct()
    {

    }

    /**
     * buildpage
     * load setting file, check settingsfile
     * load template file, parse file to html
     */
    public function buildPage()
    {
        
        try {

            // load settings file ( /settings/settings.one )
            $settings =  new getSettings();
            $this->_settings = $settings->loadSettingsFile();

            // check for all necessary settings information
            // settings file needs tags ( projectname, theme );
            $checkSettings = new checkSettings( $this->_settings );
            $checkSettings->checkSettings();

            // loading currentPage template (/themes/<theme>/layout/<page>.one)
            $currentTheme = $this->_settings;
            $templateLoader =  new templateLoader();
            $templateLoader->setTemplateUrl( "/themes/" . trim($currentTheme->theme) . "/layout/" . $this->_currentPage . ".one" );
            $this->_template = $templateLoader->loadTemplateFile();

            // parsing the template to html
            $parser = new templateParser( $this->_template );
            
            echo "OK";

        } catch (\Exception $e) {

            echo $e->getMessage() . "Terminated!".PHP_EOL;

        }
        
    }
}


