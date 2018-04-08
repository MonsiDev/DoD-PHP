<?
  defined('BASEPATH') or exit('ACCESS DENIED!');

  class MY_Model {

    function __construct() {
      $this->db = PDODb::getInstance();
    }
  }
