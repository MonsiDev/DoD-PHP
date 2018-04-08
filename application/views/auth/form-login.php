<form method=POST action="login" class="auth-tab__form" id="form-auth">
  <div class="auth-tab__input <? if($_this->typeRequest == 'signin'): echo($_this->fieldClass->email); endif; ?>">
    <div class="auth-tab__icon auth-tab__icon--mail">
      <svg class="svg-icon">
        <use xlink:href="/assets/img/icons-pack.svg#svg-icon-mail"></use>
      </svg>
    </div>
    <input type="text" placeholder="E-mail" name="email" value="<?  if($_this->typeRequest == 'signin'): echo($_this->fieldClass->email); endif; ?>">
  </div>
  <div class="auth-tab__input <? if($_this->typeRequest == 'signin'): echo($_this->fieldClass->pasword); endif; ?>">
    <div class="auth-tab__icon auth-tab__icon--key">
      <svg class="svg-icon">
        <use xlink:href="/assets/img/icons-pack.svg#svg-icon-key"></use>
      </svg>
    </div>
    <input type="password" placeholder="Пароль" name="password">
  </div>
  <input type="hidden" name="type" value="signin">
  <button class="auth-tab__form-submit">Войти</button>
  <div class="auth-form-msg-error" id="msg-error">
    <? if($_this->typeRequest == 'signin'): ?>
      <?= $_this->msg ?>
    <? endif; ?>
  </div>
</form>
