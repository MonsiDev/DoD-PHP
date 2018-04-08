<?
  defined('BASEPATH') or exit('ACCESS DENIED!');

  class MY_Controller {

    function __construct() {
      $this->user = new CUser;
    }

    public function loadModel($name, $ret = false) {
      $path = M_PATH . $name . '.php';
      if(file_exists($path)) {
        include_once(LIBS_PATH . 'Model.php');
        include_once($path);
        $class = 'M_' . $name;
        if(class_exists($class)) {
          if($ret) {
            return new $class;
          }
          $this->model = new $class;
          return true;
        }
      }
      http_redirect();
    }
  }
