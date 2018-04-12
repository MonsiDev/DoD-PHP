<?php
  defined('BASEPATH') or exit('Access Denied!');

  require(LIBS_PATH . 'Template.php');

  class C_site extends MY_Controller {

    function __construct() {
      parent::__construct();
    }

    public function action_index() {

      if($this->user->isGuest) {
        http_redirect('/login');
      }
      
      CTemplate::render('site/index', [
        '_this' => $this
      ]);
    }
  }
