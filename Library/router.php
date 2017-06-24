<?php
/**
 *
 */
namespace one2build\Library;
/**
 * Interface routerInterface
 * @package one2build\Library
 */
interface routerInterface
{
    public function __construct( $settingsFile = [] );
    public function getCurrentPage();
}

/**
 * Class router
 * @package one2build\Library
 */
class router implements routerInterface
{
    protected $settingsFile = [];
    protected $page = "";

    public function __construct( $settingsFile = [] )
    {
        if ( !isset( $settingsFile ) ) throw new \Exception("no settings file given to router");

        $this->settingsFile = $settingsFile;

        if (!$this->page = $this->_findCurrentUrl() ) throw new \Exception("cant route");

    }

    private function _findCurrentUrl()
    {
        if ( property_exists( $this->settingsFile , 'router'  ) )
        {
            $routerItems = explode("\n", trim( $this->settingsFile->router ) ) ;
            foreach( $routerItems as $item )
            {
                list( $url , $page ) = explode( ":" , $item );
                $url  = trim( $url );
                $page = trim( $page );

            }

            return "home";
        }

        return false;
    }

    public function getCurrentPage()
    {
        return $this->page;
    }
}