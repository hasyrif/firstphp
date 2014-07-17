<?php
//AutoLoader.php

class AutoLoader
{
	//variable untuk menghandle folder path
	public static $path=array();
	//variable untuk extension
	public static $ext='.php';
	public static function load($className)
	{
		
		//loader function
		$allPath = static::$path;
		if(!class_exists($className))
		{
			foreach($allPath as $k=>$v)
			{
				if(file_exists($v.$className.static::$ext))
				{
					include($v.$className.static::$ext);
					break;
				}
			}
		}
		if(!class_exists($className))
		{
			die('<br/>Tidak dapat memanggil class '.$className.'<br/>');
		}
	}
	public static function addPath($path='')
	{
		$allPath =&static::$path;
		if(is_string($path))
		{
			if(!in_array($path, $allPath))
			{
				return $allPath[] = $path;
			}
		}
		if(is_array($path))
		{ 
			foreach($path as $v)
			{
				self::addPath($v);
			}
		}
	}
}

spl_autoload_register('AutoLoader::load');