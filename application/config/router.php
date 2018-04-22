<?php
  defined('BASEPATH') or exit('Access Denied!');
  return [
    ['GET|POST', '/', 'auth#login'],
    ['GET|POST', '/logout', 'auth#logout'],
    ['GET|POST', '/forum', 'forum#index'],
    ['GET|POST', '/[a:username]', 'site#profile'],
    ['GET|POST', '/[a:username]/[a:post]', 'site#post'],
  ];
