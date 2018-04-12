<? CTemplate::render('layouts/header'); ?>
<main>
  <div class="container">
    das
  </div>
  <? if(empty($_this->user->USER_FIRSTNAME) || empty($this->user->USER_LASTNAME)) {
    CTemplate::render('site/user_form');
  } ?>
</main>
<? CTemplate::render('layouts/footer'); ?>
