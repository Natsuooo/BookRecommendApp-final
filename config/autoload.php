<?php

spl_autoload_register(function($class){
	$prefix='lib\\';
	if(strpos($class, $prefix)===0){
		$classFilePath=__DIR__.'/../'.str_replace('\\', '/', $class).'.php';
		if(file_exists($classFilePath)){
			require $classFilePath;
		}
	}
});