<?php
  defined('BASEPATH') or exit('Access Denied!');
  return [
    ['GET|POST', '/', 'site#index'],
    ['GET|POST', '/login', 'auth#login'],
    ['GET|POST', '/logout', 'auth#logout']
  ];
