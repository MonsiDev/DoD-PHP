<?php
  defined('BASEPATH') or exit('Access Denied!');

  function http_error_404() {
    ob_end_clean();
    header("HTTP/1.0 404 Not Found");
    header('Status: 404 Not Found');
    header('HTTP/1.0 404 Not Found');
    include(BASEPATH . '/page/404.html');
    exit;
  }

  function http_is_ajax() {
    return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
  }

  function http_redirect($url = '/', $code = 303) {
    header("Location: {$url}", $code);
    exit;
  }

  function http_request($method, $args, $typeof = FILTER_DEFAULT) {
    if(is_array($args)) {
      return filter_input_array($method, $args);
    }
    return filter_input($method, $args, $typeof);
  }

  function http_json_send($data) {
    ob_end_clean();
    header('Content-type: application/json;charset=utf-8');
    echo json_encode($data);
    exit;
  }
