(function(){
    var p = document.querySelector('.js-policy-popup');

    if (! isPolicyConfirmed()) {
        p.classList.add('showed');
    }

    function isPolicyConfirmed() {
        var results = document.cookie.match ( '(^|;) ?policy=([^;]*)(;|$)' );
        return results ? true : false;
    }

    window.confirmPolicy = function() {
        p.classList.remove('showed');
        var Dy = new Date();
        Dy.setDate(Dy.getDate() + 28);
        document.cookie = "policy='confirmed'; expires=" + Dy + "; path='/';";
    }
}());
