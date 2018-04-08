<?php
  defined('BASEPATH') or exit('Access Denied!');

  class M_auth extends MY_Model {

    function __construct() {
      parent::__construct();
    }

    public function find($email, $name = false) {
      $this->db->where('user_email', $email);
      $this->db->where('user_delete', false);
      if($name) {
        $this->db->orWhere('user_name', $name);
      }
      return $this->db->getOne('users');
    }

    public function insertUser($data) {
      return $this->db->insert('users', $data);
    }

    public function validate() {

    }

  }
