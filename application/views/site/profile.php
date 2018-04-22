<? CTemplate::render('layouts/header'); ?>
<? CTemplate::render('layouts/nav'); ?>
<main class="homepage">
  <div class="container">
    <div class="row">
      <aside class="aside-hor">
        <div class="avatar">
          <img class="avatar__img" src="<?= htmlspecialchars(empty($_this->user->USER_PHOTO)) ? '/assets/img/no-photo.jpg' : $_this->user->USER_PHOTO ?>" alt="<?= empty($_this->user->USERPHOTO) ? 'Arida, нет фото' : 'Фотография пользователя ' . htmlspecialchars((empty($_this->user->USER_FIRSTNAME) && empty($_this->user->USER_LASTNAME)) ? '@' . $_this->user->USERNAME : $_this->user->USER_FIRSTNAME . ' ' . $_this->user->USER_LASTNAME)  ?>">
        </div>
      </aside>
      <section class="main-section">
        <h1 class="user-name">
          <?= htmlspecialchars((empty($_this->user->USER_FIRSTNAME) && empty($_this->user->USER_LASTNAME)) ? '@' . $_this->user->USERNAME : $_this->user->USER_FIRSTNAME . ' ' . $_this->user->USER_LASTNAME) ?>
        </h1>
        <h2 class="user-description">
          <?= $_this->user->USER_DESCRIPTION ?>
        </h2>
      </section>
    </div>
    <div class="row row--indent">
      <aside class="aside-hor">
        <div class="card">
          <div class="card__title">Вам будет интересно</div>
          <div class="card__text">
            Пока нет ничего
          </div>
        </div>
      </aside>
      <section class="main-section">
        <?
          if(!$_this->user->isGuest) {
            CTemplate::render('site/forms/add-post');
          }
        ?>
        <? foreach($posts as $post): ?>
          <article class="article" style="background-image: url('<?= empty($post['post_photo']) ? '/assets/img/empty-post.jpg' : $post['post_photo'] ?>')">
            <div class="article__info">
              <div class="article__date">
                <svg>
                  <use xlink:href="/assets/img/icons-pack.svg#svg-clock-icon"></use>
                </svg>
                <?= $post['post_time'] ?>
              </div>
              <a href="/<?= $post['user_name'] . '/' . $post['post_name'] ?>" title="Статья <?= $post['post_title'] ?>">
                <h1 class="article__title"><?= htmlspecialchars(CTemplate::cropText($post['post_title'])) ?></h1>
              </a>
              <div class="article__text"><?= CTemplate::cropText($post['post_description']) ?></div>
              <a href="/<?= $post['user_name'] ?>" target="_blank" title="Профиль пользователя @<?= $post['user_name'] ?>" class="article__avatar">
                <img src="<?= htmlspecialchars(empty($post['user_photo'])) ? '/assets/img/no-photo.jpg' : $post['user_photo'] ?>">
              </a>
              <div class="article__lcrn">
                <a href="javascript:void(0)" class="article__comment">
                  <svg>
                    <use xlink:href="/assets/img/icons-pack.svg#svg-comment-icon"></use>
                  </svg>
                  <?= $post['post_comment_count'] ?>
                </a>
                <a href="javascript:void(0)" class="article__like article__comment--event">
                  <svg>
                    <use xlink:href="/assets/img/icons-pack.svg#svg-like-icon"></use>
                  </svg>
                  <?= $post['post_like_count'] ?>
                </a>
                <a href="javascript:void(0)" class="article__resend">
                  <svg>
                    <use xlink:href="/assets/img/icons-pack.svg#svg-resend-icon"></use>
                  </svg>
                  <?= $post['post_resend_count'] ?>
                </a>
                <a class="article__next" href="/<?= $post['user_name'] . '/' . $post['post_name'] ?>" title="Читать статью <?= $post['post_title'] ?>">
                  <svg class="svg-icon">
                    <use xlink:href="/assets/img/icons-pack.svg#svg-arrow-right"></use>
                  </svg>
                </a>
              </div>
            </div>
          </article>
        <? endforeach; ?>
      </section>
    </div>
  </div>
</main>
<? CTemplate::render('layouts/footer'); ?>
