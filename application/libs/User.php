<?
  defined('BASEPATH') or exit('ACCESS DENIED!');
  class CUser {

    public $isGuest = true;

    function __construct() {
      $this->db = PDODb::getInstance();
      if($this->getSession('id')) {
        $user = $this->getUserId($this->getSession('id'));
        if($user) {
          $this->isGuest = false;
          $this->ID = $user['user_id'];
          $this->EMAIL = $user['user_email'];
          $this->USERNAME  = $user['user_name'];
          $this->USER_FIRSTNAME = $user['user_firstname'];
          $this->USER_LASTNAME = $user['user_lastname'];
          $this->USER_PHOTO = $user['user_photo'];
          $this->USER_DESCRIPTION = $user['user_description'];
        } else {
          $this->userLogout();
          http_redirect('/login');
        }
      }
    }

    public function userAuth($id) {
      $_SESSION['USER.ID'] = $id;
    }

    public function userLogout() {
      unset($_SESSION['USER.ID']);
    }

    public function getSession($key) {
      return $_SESSION['USER.' . strtoupper($key)];
    }

    public function getUserId($id) {
      $this->db->where('user_id', $id);
      $this->db->where('user_delete', false);
      return $this->db->getOne('users');
    }

    public function hash($email, $password) {
      return sha1(md5('Dev by Monsidev' . md5($password)) . $email);
    }
  }
