;(function(){
  'use strict';

  var i = 0;

  window.addEventListener("load", function(_e) {
    document.getElementById('auth-btn').addEventListener("click", function(_e) {
      var indexOf = [].indexOf.call(this.children, (_e ? _e.target : event.srcElement) );
      var callTab = document.getElementById(_e.target.getAttribute("data-tab-id"));
      var oldTab =  document.getElementById(this.children[ (indexOf - 1) * (indexOf - 1) ].getAttribute("data-tab-id"));

      _e.target.classList.add("active");
      this.children[ (indexOf - 1) * (indexOf - 1) ].classList.remove("active");

      callTab.removeAttribute("hidden");
      oldTab.setAttribute("hidden", true);
    });
    document.querySelectorAll('.auth-tab__input input').forEach(function(_each) {
      _each.addEventListener('focus', function(_e) {
        if(this.parentNode.classList.contains('error')) {
          this.parentNode.classList.remove('error');
        }
      });
      _each.addEventListener('blur', function(_e) {
        if(this.value == '' ||
          (this.getAttribute('name') == 'email' &&
          /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/.test(this.value) == false)) {
          this.parentNode.classList.add('error');
        }
      });
    });
    function validForm(_e) {
      var msgText = this.querySelector('#msg-error');
      var $This = this;
      var postData = '';
      this.querySelectorAll('input').forEach(function(_each) {
        postData += _each.getAttribute('name') + '=' + _each.value + '&';
      });
      Ajax({
        type: 'POST',
        url: '/login',
        data: postData.replace(/&+$/,''),
        onSuccess: function(json) {
          json = JSON.parse(json);
          if(json.status == 'error') {
            msgText.innerHTML = json.msg;
            for(var field in json.fields) {
              if(json.fields[field] == 'error') {
                if(/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/.test($This.querySelector('input[name="email"]').value) == false
                  && $This.querySelector('input[name="email"]').value != '') {
                  msgText.innerHTML = 'Не корректный email';
                }
                $This.querySelector('input[name="' + field + '"]').parentNode.classList.add('error');
              }
            }
          } else {
            window.location.reload();
          }
        },
        onError: function(data) {
          msgText.innerHTML = '<p>Произошла внутренняя ошибка!</p><p>Попробуйте ещё раз</p>';
        }
      });
      _e.preventDefault();
    }

    document.getElementById('form-reg').addEventListener('submit', validForm);
    document.getElementById('form-auth').addEventListener('submit', validForm);
  });
})();
