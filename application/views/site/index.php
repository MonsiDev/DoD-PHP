<? CTemplate::render('layouts/header'); ?>
<? CTemplate::render('layouts/nav'); ?>
<main class="homepage">
  <div class="container">
    <div class="row">
      <div class="posts">
        <?
          if(!$_this->user->isGuest) {
            CTemplate::render('site/forms/add-post');
          }
        ?>
      </div>
      <div class="posts-info">
        info
      </div>
    </div>
  </div>
</main>
<? CTemplate::render('layouts/footer'); ?>
