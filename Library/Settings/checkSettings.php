<?php
namespace one2build\Library\Settings;

/**
 * Interface checkSettingsInterface
 * @package one2build\Library\Settings
 */
interface checkSettingsInterface
{
    public function __construct( $settings );
    public function checkSettings();
}

/**
 * Class checkSettings
 * @package one2build\Library\Settings
 */
class checkSettings implements checkSettingsInterface
{
    protected $_settings = [];

    /**
     * checkSettings constructor.
     * @param array $settings
     */
    public function __construct($settings = [] )
    {
        if ( !isset( $settings ) ) throw new \Exception("No Settings Data Found " . PHP_EOL);

        $this->_settings = $settings;
    }

    /**
     * @throws \Exception
     */
    public function checkSettings()
    {
        $settingsItem = $this->_settings;

        if ( !property_exists( $settingsItem , 'projectname' ) || !isset( $settingsItem->projectname ) ) throw new \Exception ("projectname missing is settings file " . PHP_EOL);
        if ( !property_exists( $settingsItem , 'theme' ) || !isset( $settingsItem->theme ) ) throw new \Exception ("theme missing in settings file " . PHP_EOL);

    }
}