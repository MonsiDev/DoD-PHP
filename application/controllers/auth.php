<?php
  defined('BASEPATH') or exit('Access Denied!');

  require(LIBS_PATH . 'Template.php');

  class C_auth extends MY_Controller {

    public $error = false;
    public $emptyField = [
      'name' => '',
      'email' => '',
      'password' => ''
    ];
    public $fieldValue = [
      'name' => '',
      'email' => '',
      'password' => ''
    ];
    public $msg = '';
    public $typeRequest = '';

    function __construct() {
      parent::__construct();
    }

    public function action_logout() {
      $this->user->userLogout();
      http_redirect('/');
    }

    public function action_login() {
      if(!$this->user->isGuest) {
        http_redirect($this->user->USERNAME);
      }
      if(http_request(INPUT_POST, 'type')) {
        $this->typeRequest = http_request(INPUT_POST, 'type');
        $req = http_request(INPUT_POST, [
          'name' => FILTER_SANITIZE_SPECIAL_CHARS,
          'email' => FILTER_VALIDATE_EMAIL,
          'password' => FILTER_SANITIZE_SPECIAL_CHARS ]);
        $req['name'] = strtolower($req['name']);
        $this->fieldValue = (object)$req;
        $this->loadModel('auth');

        if(http_request(INPUT_POST, 'type') == 'signup') {
          if(!empty($req['email']) &&
             !empty($req['name']) &&
             !empty($req['password'])) {
               if(preg_match("/^[a-zA-Z0-9]+$/i", $req['name'])) {
                 if(empty($user = $this->model->find($req['email'], $req['name']))) {
                   $this->user->userAuth( $this->model->insertUser([
                     'user_name' => $req['name'],
                     'user_email' => $req['email'],
                     'user_password' => $this->user->hash($req['email'], $req['password'])
                   ]) );
                   if(http_is_ajax()) {
                     http_json_send([ 'status' => 'ok' ]);
                   }
                   http_redirect('/');
                 } else {
                   $this->error = true;
                   $this->fieldClass = (object)[
                     'email' => ($user['user_email'] == $req['email']) ? 'error' : '',
                     'name' => ($user['user_name'] == $req['name']) ? 'error' : ''
                   ];
                   $this->msg = '<p>Такой пользователь уже существует!</p><p>Введите другой email и/или имя</p>';
                 }
               } else {
                 $this->error = true;
                 $this->fieldClass['name'] = 'error';
                 $this->msg = 'Имя должно быть на латинском';
               }
          } else {
            $this->error = true;
            $this->fieldClass = (object)[
              'name' => empty($req['name']) ? 'error' : '',
              'email' => empty($req['email']) ? 'error' : '',
              'password' => empty($req['password']) ? 'error' : ''
            ];
            $this->msg = 'Введите все данные';
          }
        }

        if(http_request(INPUT_POST, 'type') == 'signin') {
          if(!empty($req['email']) &&
             !empty($req['password'])) {
             if($user = $this->model->find($req['email'])) {
               if($user['user_password'] == $this->user->hash($req['email'], $req['password'])) {
                 $this->user->userAuth( $user['user_id'] );
                 if(http_is_ajax()) {
                   http_json_send([ 'status' => 'ok' ]);
                 }
                 http_redirect('/');
               } else {
                 $this->error = true;
                 $this->fieldClass = [ 'password' => 'error' ];
                 $this->msg = 'Не верно введёный пароль';
               }
             } else {
               $this->error = true;
               $this->fieldClass = [ 'email' => 'error' ];
               $this->msg = 'Пользователь с таким email не найден';
             }
          } else {
            $this->error = true;
            $this->fieldClass = (object)[
              'email' => empty($req['email']) ? 'error' : '',
              'password' => empty($req['password']) ? 'error' : ''
            ];
            $this->msg = 'Введите все данные';
          }
        }
      }
      if(http_is_ajax()) {
        http_json_send([
          'status' => $this->error ? 'error' : 'ok',
          'msg' => $this->msg,
          'fields' => $this->fieldClass
        ]);
      }
      CTemplate::$siteTitle = 'Присоединяйся к нам';
      CTemplate::render('auth/login', [
        '_this' => $this,
      ]);
    }
  }
