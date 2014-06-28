<?php
// disable error reporting
error_reporting(0);
ini_set('display_errors', 'Off');

// directory separator shortcut
defined('DS') || define('DS', DIRECTORY_SEPARATOR);

defined('APP_PATH') || define('APP_PATH', realpath(dirname(__FILE__) . '/../..'));
defined('ASSETS_PATH') || define('ASSETS_PATH', '../assets');

set_include_path(implode(PATH_SEPARATOR, array( APP_PATH, get_include_path() )));

// default timezone
ini_set('date.timezone', 'UTC');

function getURL($query)
{
	$url = !isset($query[0]) ? "?" . http_build_query($query, '', '&amp;') . '&amp;lang=' . $locale : 'index.php?lang=' . $locale . '&page=' . $query[0];

    if (!isset($query['skin']) && isset($_GET['skin'])) 
        $url .= "&amp;skin=" . $_GET['skin'];

	return $url;
}

function in_array_r($needle, $haystack, $strict = false) 
{
    if (!is_array($haystack)) 
        return false;
    
    foreach ($haystack as $item) 
    {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) 
        {
            return true;
        }
    }
    return false;
}