<?php
  defined('BASEPATH') or exit('Access Denied!');

  require(LIBS_PATH . 'Template.php');

  class C_site extends MY_Controller {

    function __construct() {
      parent::__construct();
    }

    public function action_index() {

      // if($this->user->isGuest) {
      //   http_redirect('/login');
      // }

      CTemplate::render('site/index', [
        '_this' => $this
      ]);
    }

    public function action_profile($param) {
      CTemplate::render('site/profile');
    }

    public function action_post($param) {
      CTemplate::render('site/post');
    }

    public function action_follow() {
      CTemplate::render('site/post');
    }

    public function action_followers() {
      CTemplate::render('site/post');
    }

    public function action_forum() {
      echo('Forum');
    }

    public function action_forum_theme($param) {
      echo('Forum Theme');
    }
  }
