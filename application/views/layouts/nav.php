<header class="header">
  <div class="container">
    <nav class="nav">
      <a href="/" class="svg-logo">
        <svg class="svg-icon">
          <use xlink:href="/assets/img/icons-pack.svg#svg-logo-site"></use>
        </svg>
      </a>
      <a href="/<?= $_this->user->USERNAME; ?>" class="nav__item nav__item--active">Публикации</a>
      <? if(!$_this->user->isGuest) : ?>
        <a href="/follow" class="nav__item">Подписки</a>
        <a href="/followers" class="nav__item">Подписчики</a>
      <? endif; ?>
      <a href="/forum" class="nav__item">Форум</a>
      <div>

      </div>
    </nav>
  </div>
</header>
