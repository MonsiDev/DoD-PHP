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
  }
