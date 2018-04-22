<?php
  defined('BASEPATH') or exit('Access Denied!');

  class CTemplate {

    public static $siteTitle = '';
    public static $siteKeywords = [];
    public static $siteDescription = '';
    private static $vars = [];

    public static function render($name, $vars = []) {
      $path = V_PATH . $name . '.php';
      if(file_exists($path)) {;
        if(empty($vars) == false) {
          CTemplate::$vars = $vars;
        }
        extract(CTemplate::$vars);
        return include($path);
      }
    }

    public static function cropText($string, $length = 250, $etc = '...')
    {
      if(!$length) {
        return;
      }
      $string = str_replace("\n", ' ', strip_tags($string));
      if(mb_strlen($string) > $length){
        $length -= min($length, mb_strlen($etc));
        $string = preg_replace('/\s+?(\S+)?$/u', '', mb_substr($string, 0, $length+1));
        return mb_substr($string, 0, $length) . $etc;
      }
      return $string;
    }
  }
