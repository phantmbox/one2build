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

    /**
     * router constructor.
     * @param array $settingsFile
     */
    public function __construct( $settingsFile = [] )
    {

        $this->settingsFile = $settingsFile;

    }

    /**
     * @return string
     */
    private function _findCurrentUrl()
    {
        $foundUsableUrlPage = "";

        if ( property_exists( $this->settingsFile , 'router'  ) )
        {

            $routerItems = json_decode( $this->settingsFile->router , true )  ;

            foreach( explode("/",URLARGUMENTS) as $argument ) {

                foreach ($routerItems as $url => $page) {

                    if ($url == $argument ) $foundUsableUrlPage .= $page;

                }

            }

        }

        return $foundUsableUrlPage ? $foundUsableUrlPage : "home";
    }

    /**
     * @return string
     */
    public function getCurrentPage()
    {
        $this->page = $this->_findCurrentUrl();

        return $this->page;
    }
}