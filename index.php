<?php
namespace one2build;
/**
 * Created by PhpStorm.
 * User: phantmbox
 * Date: 22-6-2017
 * Time: 20:05
 */

define("ROOT"    , __DIR__);
define("WORKDIR" , $_SERVER['REQUEST_URI'] );
define("URLARGUMENTS" ,  $_GET['url'] );

include "one2build.php";

$data = new one2build();
$data->buildPage();

