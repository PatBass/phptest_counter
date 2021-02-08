<?php

function auto_chargement($classname)
{

	
	if (file_exists($file = dirname (__FILE__) . '/' . $classname .'.class.php'))
	include $file;
}

spl_autoload_register('auto_chargement');