<form method=POST action="login" class="auth-tab__form" id="form-reg">
  <div class="auth-tab__input <? if($_this->typeRequest == 'signup'): echo($_this->fieldClass->name); endif; ?>">
    <div class="auth-tab__icon auth-tab__icon--user">
      <svg class="svg-icon">
        <use xlink:href="/assets/img/icons-pack.svg#svg-icon-user"></use>
      </svg>
    </div>
    <input type="text" placeholder="Имя латинскими буквами" name="name" value="<? if($_this->typeRequest == 'signup'): echo($_this->fieldValue->name); endif; ?>">
  </div>
  <div class="auth-tab__input <? if($_this->typeRequest == 'signup'): echo($_this->fieldClass->email); endif;?>">
    <div class="auth-tab__icon auth-tab__icon--mail">
      <svg class="svg-icon">
        <use xlink:href="/assets/img/icons-pack.svg#svg-icon-mail"></use>
      </svg>
    </div>
    <input type="text" placeholder="E-mail" name="email" value="<? if($_this->typeRequest == 'signup'): echo($_this->fieldValue->email); endif; ?>">
  </div>
  <div class="auth-tab__input <? if($_this->typeRequest == 'signup'): echo($_this->fieldClass->password); endif; ?>">
    <div class="auth-tab__icon auth-tab__icon--key">
      <svg class="svg-icon">
        <use xlink:href="/assets/img/icons-pack.svg#svg-icon-key"></use>
      </svg>
    </div>
    <input type="password" placeholder="Пароль" name="password">
  </div>
  <input type="hidden" name="type" value="signup">
  <button class="auth-tab__form-submit">Присоединиться</button>
  <div class="auth-form-msg-error" id="msg-error">
    <? if($_this->typeRequest == 'signup'): ?>
      <?= $_this->msg ?>
    <? endif; ?>
  </div>
</form>
