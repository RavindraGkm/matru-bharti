var MBJS = MBJS ||{};
MBJS.Index=function(base_url){
    this.base_url=base_url;
    this.initialize();
};

MBJS.Index.prototype = {
    initialize:function() {
        this.basicSetup();
        this.registerUser();
        this.loginUser();
    },
    basicSetup: function() {
        Waves.attach('.waves', 'waves-light');
        Waves.init();
        console.log('hello');
    },
    registerUser:function() {
        var self=this;
        $("#form_register").validate({
            rules: {
                author_email: {
                    required: true,
                    email : true
                },
                author_password: {
                    required : true
                },
                author_mobile: {
                    required: true
                }
            },
            messages : {
                author_email: {
                    required : 'Enter your email',
                    email : 'Enter valid email'
                },
                author_password: {
                    required: 'Enter your password'
                },
                author_mobile: {
                    required: 'Enter mobile number'
                }
            },
            submitHandler: function(form) {
                var author_email = $('#author_email').val();
                var author_password = $('#author_password').val();
                var author_mobile = $('#author_mobile').val();
                var register_button = $('#register_button');
                $.ajax({
                    url: self.base_url+"register",
                    type: "POST",
                    dataType: "JSON",
                    data:{
                        author_email: author_email,
                        author_password: author_password,
                        author_mobile: author_mobile
                    },
                    beforeSend: function() {
                        register_button.html('Registering... &nbsp;<i class="zmdi zmdi-arrow-forward"></i>');
                    },
                    error:function(data){
                        console.log(data);
                    },
                    success: function (data, textStatus, jqXHR) {
                        console.log(data);
                        if(data.status=='ok') {
                            $.growl({ title: "Success", message: "Message has been sent !" });
                        }
                        else {
                            $.growl.error({ message: "Some error occured" });
                        }
                    },
                    complete: function (jqXHR, textStatus) {

                    }
                });
            },
            errorPlacement: function(error, element) {
                $( element ).closest( "form" ).find( "span[data-error-for='" + element.attr( "id" ) + "']").html(error[0].innerHTML).css('opacity',1);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('error');
                $(element).closest('li').find('.error-span').css('opacity',0);
            }
        });
    },
    loginUser:function() {
        var self=this;
        $("#form_login").validate({
            rules: {
                login_email: {
                    required: true,
                    email : true
                },
                login_password: {
                    required : true
                }
            },
            messages : {
                login_email: {
                    required : 'Enter your email',
                    email : 'Enter valid email'
                },
                login_password: {
                    required: 'Enter your password'
                }
            },
            submitHandler: function(form) {
                var login_email = $('#login_email').val();
                var login_password = $('#login_password').val();
                var login_button = $('#login_button');
                $.ajax({
                    url: self.base_url+"login",
                    type: "POST",
                    dataType: "JSON",
                    data:{
                        author_email: author_email,
                        author_password: author_password,
                        author_mobile: author_mobile
                    },
                    beforeSend: function() {
                        register_button.html('Registering... &nbsp;<i class="zmdi zmdi-arrow-forward"></i>');
                    },
                    success: function (data, textStatus, jqXHR) {
                        if(data.status=='ok') {
                            $.growl({ title: "Success", message: "Message has been sent !" });
                        }
                        else {
                            $.growl.error({ message: "Some error occured" });
                        }
                    },
                    complete: function (jqXHR, textStatus) {

                    }
                });
            },
            errorPlacement: function(error, element) {
                $( element ).closest( "form" ).find( "span[data-error-for='" + element.attr( "id" ) + "']").html(error[0].innerHTML).css('opacity',1);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('error');
                $(element).closest('li').find('.error-span').css('opacity',0);
            }
        });
    }
};