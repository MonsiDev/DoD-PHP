<?php
  defined('BASEPATH') or exit('Access Denied!');

  require(LIBS_PATH . 'Template.php');

  class C_site extends MY_Controller {

    function __construct() {
      parent::__construct();
      $this->loadModel('post');
    }

    public function action_index() {
    }

    public function action_profile($param) {
      CTemplate::render('site/profile', [
        '_this' => $this,
        'posts' => $this->model->findPosts()
      ]);
    }

    public function action_post($param) {
      CTemplate::render('site/post');
    }
  }
