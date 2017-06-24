<?php
namespace one2build;

// include necessary classes - will be autoload soon
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
 * the easy to build website framework
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
 * @var array $_template contains template structure
 * @var string $_currentPage contains page name file
 * @var string $_headerOutput contains html of header
 * @var string $_bodyOutput contains html of body
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
    public function __construct() { /***/ }

    /**
     * buildpage
     * load setting file, check settingsfile
     * load template file, parse file to html
     *
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

            // parsing the template array to html
            $parser = new templateParser( $this->_settings , $this->_template );
            $parser->buildHtmlOutput();

            echo "<!-- finished successfully -->" . PHP_EOL; // echo remark if there are no errors

        } catch (\Exception $e) {

            echo $e->getMessage() . "<!-- Terminated! -->" . PHP_EOL; // echo terminated if there is one or more errors

        }
        
    }
}


