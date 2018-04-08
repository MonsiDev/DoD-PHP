<? CTemplate::render('layouts/header'); ?>
<main class="main-auth">
  <div class="auth-tabs">
    <div class="auth-btn" id="auth-btn">
      <button class="auth-btn__item" data-tab-id="auth-tab-login">Войти</button>
      <button class="auth-btn__item active" data-tab-id="auth-tab-reg">Регистрация</button>
    </div>
    <div class="auth-tab" id="auth-tab-reg">
      <div class="auth-tab__title">Ещё не пользуетесь?</div>
      <div class="auth-tab__subtitle">Тогда зарегистрируйтесь - это бесплатно</div>
      <? CTemplate::render('auth/form-reg') ?>
    </div>
    <div class="auth-tab" id="auth-tab-login" hidden>
      <div class="auth-tab__title">Уже есть аккаунт?</div>
      <div class="auth-tab__subtitle">Просто введите e-mail и пароль</div>
      <? CTemplate::render('auth/form-login') ?>
    </div>
  </div>
  <? CTemplate::render('auth/copy'); ?>
</main>
<? CTemplate::render('layouts/footer'); ?>
