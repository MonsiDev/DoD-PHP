<?php
  defined('BASEPATH') or exit('Access Denied!');

  class M_post extends MY_Model {

    function __construct() {
      parent::__construct();
    }

    public function findPosts($page = 1, $limit = 10) {
      $this->db->setPageLimit($limit);
      $this->db->join('users u', 'u.user_id = p.post_user_id');
      return $this->db->paginate("posts p", $page);
    }

  }
