<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 *
 */

function autoload($classname)
{


    if (file_exists($file = dirname (__FILE__) . '/' . $classname .'.class.php'))
        require_once $file;
}

spl_autoload_register('autoload');