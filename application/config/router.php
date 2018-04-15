<?php
  defined('BASEPATH') or exit('Access Denied!');
  return [
    ['GET|POST', '/', 'site#index'],
    ['GET|POST', '/login', 'auth#login'],
    ['GET|POST', '/logout', 'auth#logout'],
    ['GET|POST', '/follow', 'site#follow'],
    ['GET|POST', '/followers', 'site#followers'],
    ['GET|POST', '/forum', 'site#forum'],
    ['GET|POST', '/forum/[a:theme]', 'site#forum_theme'],
    ['GET|POST', '/[a:username]', 'site#profile'],
    ['GET|POST', '/[a:username]/[a:post_name]', 'site#post'],
  ];
