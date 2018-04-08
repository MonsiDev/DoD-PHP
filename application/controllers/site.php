<?php
  defined('BASEPATH') or exit('Access Denied!');

  class C_site extends MY_Controller {

    function __construct() {
      parent::__construct();
    }

    public function action_index() {
      if($this->user->isGuest) {
        http_redirect('/login');
      }
      echo('<h1>Раздел в разработке</h1>');
    }
  }
