<?php
namespace one2build;
/**
 * Created by PhpStorm.
 * User: phantmbox
 * Date: 22-6-2017
 * Time: 20:05
 */

define("ROOT", __DIR__);

include "one2build.php";

$data = new one2build();
$data->buildPage();
