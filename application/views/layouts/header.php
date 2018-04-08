<!DOCTYPE HTML>
<html lang="RU-ru">
  <head>
    <title><?= htmlspecialchars(trim(CTemplate::$siteTitle . ' - ' . CFG_SITE_NAME, ' - ')); ?></title>
    <? CTemplate::render('layouts/meta'); ?>
    <link rel="stylesheet" href="<?= '//' . $_SERVER['HTTP_HOST'] ?>/assets/css/build.min.css">
  </head>
  <body>
