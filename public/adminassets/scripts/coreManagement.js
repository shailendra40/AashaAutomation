var Login = (function(login, $){
    "use strict";
    login.userLogin = function(){
        var config = {
            base_url: null,
            file_url: "/",
            img_url: "/img/",
            state: {

            }
        };
        var viewModel = {
        };
        return({
            renderInit: function () {
                $("#coreLogin").validate({
                    rules: {
                        UserName: "required",
                        Password: "required"
                    },
                    messages: {
                        UserName: "Please enter your username",
                        Password: "Please enter your password"
                    },
                    errorPlacement: function (error, element) {
                        var attrName = $(element).attr("name");
                        error.appendTo($("#" + attrName + "_jserror"));
                    }
                });
            }
        });
    };
    return login;
}(Login || {}, jQuery));