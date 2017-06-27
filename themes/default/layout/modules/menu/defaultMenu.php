<?php
require_once ( ROOT . "/Library/Xml/xmlFileLoader.php");
require_once ( ROOT . "/Library/Xml/xmlToArrayStructure.php");


use one2build\Library\Xml\xmlFileLoader as xmlFileLoader;

$dir = ROOT . "/themes/default/layout/modules/menu/mymenu.one";

try
{
    $menuloader = new xmlFileLoader($dir);
    $xml = $menuloader->loadResult();
    $menuStructureLoader = new \one2build\Library\Xml\xmlToArrayStructure($xml);
    $menuStructure = $menuStructureLoader->convert();
    foreach( $menuStructure as $menuItem ) {
        $id="";$class="";
        $level = str_repeat("\t",$menuItem['level']);
        if ($menuItem['attributes']['id']) $id = "id='" . $menuItem['attributes']['id'] . "'";
        if ($menuItem['attributes']['class']) $class = "class='" . $menuItem['attributes']['class'] . "'";
        //if ($menuItem['tag'] == "menu" && $menuItem['type'] == "open") echo $level . "<div {$id} {$class}>" .PHP_EOL;
        //if ($menuItem['tag'] == "menu" && $menuItem['type'] == "close") echo $level . "</div>" .PHP_EOL;
        if ($menuItem['tag'] == "group" && $menuItem['type'] == "open") echo $level . "<ul {$id} {$class}>" .PHP_EOL;
        if ($menuItem['tag'] == "item" && $menuItem['type'] == "open") echo $level . "<li {$id} {$class}><a href='".$menuItem['attributes']['url']."'>".$menuItem['attributes']['text']."</a>" .PHP_EOL;
        if ($menuItem['tag'] == "item" && $menuItem['type'] == "clode") echo $level . "</li>" .PHP_EOL;
        //if ($menuItem['tag'] == "item" && $menuItem['type'] == "complete") echo $level . "<li {$id} {$class}><a href='". WORKDIR . $menuItem['attributes']['url']."'>".$menuItem['attributes']['text']."</a></li>" .PHP_EOL;
        if ($menuItem['tag'] == "item" && $menuItem['type'] == "complete") echo $level . "<li {$id} {$class}><div data-link='". WORKDIR . $menuItem['attributes']['url']."'>".$menuItem['attributes']['text']."</div></li>" .PHP_EOL;
        if ($menuItem['tag'] == "group" && $menuItem['type'] == "close") echo $level . "</ul>" .PHP_EOL;
    }
} catch (Exception $e){
    echo $e->getMessage();
}


