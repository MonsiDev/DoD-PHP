<?php
  defined('BASEPATH') or exit('Access Denied!');

  function http_error_404() {
    ob_end_clean();
    header("HTTP/1.0 404 Not Found");
    header('Status: 404 Not Found');
    header('HTTP/1.0 404 Not Found');
    exit;
  }

  function http_is_ajax() {
    return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
    !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
  }
