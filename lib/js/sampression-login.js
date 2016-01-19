jQuery(document).ready(function($) {

    if($('body.login-action-login').length > 0) {
        $('#nav').prepend('<a href="/sign-up-login">Register</a> | ')
    }

});

//
//theParent = document.getElementById("nav");
//theKid = document.createElement("a");
//theKid.innerHTML = 'Register';
//theKid.href = '/sign-up-login';
//
//// append theKid to the end of theParent
////theParent.appendChild(theKid);
////prepend
//theParent.insertBefore(theKid, theParent.firstChild);