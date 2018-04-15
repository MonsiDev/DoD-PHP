<?php
  ob_start();
  session_start();
  define('BASEPATH', dirname(__FILE__));
  define('LIBS_PATH', BASEPATH . '/application/libs/');
  define('CFG_PATH', BASEPATH . '/application/config/');
  define('C_PATH', BASEPATH . '/application/controllers/');
  define('M_PATH', BASEPATH . '/application/models/');
  define('V_PATH', BASEPATH . '/application/views/');

  require(CFG_PATH . 'web.php');
  require(LIBS_PATH . 'Http.php');
  require(LIBS_PATH . 'PDODb.php');
  require(LIBS_PATH . 'AltoRouter.php');
  require(LIBS_PATH . 'User.php');
  require(LIBS_PATH . 'Controller.php');

  new PDOdb(require(CFG_PATH . 'db.php'));
  $AltoRouter = new AltoRouter;
  $AltoRouter->addRoutes(require(CFG_PATH . 'router.php'));
  if( ($match = $AltoRouter->match()) ) {
    $target = explode('#', $match['target']);
    $c_path = C_PATH . $target[0] . '.php';
    $c_class = 'C_' . $target[0];
    if(file_exists($c_path)) {
      require($c_path);
      if(class_exists($c_class)) {
        $in_class = new $c_class;
        if(method_exists($in_class, 'action_' . $target[1])) {
          call_user_func([ new $in_class, 'action_' . $target[1] ], $match['params']);
          return true;
        }
      }
    }
  }
  http_error_404();
