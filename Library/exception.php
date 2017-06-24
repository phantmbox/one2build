<?php
namespace one2build\Library;
/**
 * Created by PhpStorm.
 * User: phantmbox
 * Date: 23-6-2017
 * Time: 9:49
 */
class MyException extends \Exception {

    protected $fault;

    public function __construct($message)
    {

        $this->faults .= $message;
        parent::__construct($message);

    }
    public function message()
    {
        $exc = "<div style='position:relative; overflow:hidden; border-bottom:1px dotted #ccc;padding:5px 0px'>" .
            $this->faults . "</div>" .PHP_EOL;
        return $exc;
    }

}