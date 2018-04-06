<?php
  ob_start();
  session_start();
  header('X-Powered-By: '. $_SERVER['HTTP_HOST']);
  define('BASEPATH', dirname(__FILE__));
  define('LIBS_PATH', BASEPATH . '/application/libs/');
  define('CFG_PATH', BASEPATH . '/application/config/');
  define('C_PATH', BASEPATH . '/application/controllers/');
  define('M_PATH', BASEPATH . '/application/models/');
  define('V_PATH', BASEPATH . '/application/views/');

  require(LIBS_PATH . 'Http.php');
  require(LIBS_PATH . 'AltoRouter.php');

  ($AltoRouter = new AltoRouter)->addRoutes(require(CFG_PATH . 'router.php'));
  if( ($match = $AltoRouter->match()) ) {

    $c_path = C_PATH . $match['controller'] . '.php';
    $c_class = 'C_' . $match['controller'];
    if(file_exists($c_path)) {
      require($c_path);
      if(class_exists($c_class)) {
        $in_class = new $c_class;
        if(method_exists($in_class, 'action_' . $match['action'])) {
          call_user_func([ new $in_class, 'action_' . $match['action'] ]);
          return true;
        }
      }
    }
  }
  http_error_404();
