var MBJS = MBJS ||{};
MBJS.Index=function(base_url){
    this.base_url=base_url;
    this.initialize();
};

MBJS.Index.prototype = {
    initialize:function() {
        this.basicSetup();
        //this.userDuplicacy();
        this.registerUser();
        this.loginUser();
    },
    notify: function(message,type) {
        $.growl({
            message: message
        },{
            type: type,
            allow_dismiss: false,
            label: 'Cancel',
            className: 'btn-xs btn-inverse',
            placement: {
                from: 'top',
                align: 'right'
            },
            timer:4000,
            animate: {
                enter: 'animated fadeIn',
                exit: 'animated fadeOut'
            },
            offset: {
                x: 20,
                y: 85
            }
        });
    },
    basicSetup: function() {
        Waves.attach('.waves', 'waves-light');
        Waves.init();
    },

    //userDuplicacy:function() {
    //    var self=this;
    //    $('#author_email').blur(function(){
    //        var author_email = $('#author_email').val();
    //        $.ajax({
    //            url: self.base_url+"authors",
    //            type: "POST",
    //            dataType: "JSON",
    //            data: {
    //                email:author_email
    //            },
    //            error:function(data) {
    //                console.log(data);
    //                var obj = jQuery.parseJSON(data.responseText);
    //                if(data.status==422) {
    //                    swal({
    //                        title: "Error!",
    //                        text: obj.msg,
    //                        timer: 200000,
    //                        showConfirmButton: false,
    //                        showCancelButton: false
    //                    });
    //                }
    //            }
    //        })
    //    })
    //},

    registerUser:function() {
        var self=this;
        $("#form_register").validate({
            rules: {
                author_email: {
                    required: true,
                    email : true
                },
                author_password: {
                    required : true,
                    minlength:5
                },
                author_confirm_password: {
                    required:true,
                    minlength:5,
                    equalTo : "#author_password"
                },
                author_mobile: {
                    required : true,
                    number:true,
                    minlength:10,
                    maxlength:10
                }
            },
            messages : {
                author_email: {
                    required : 'Enter your email',
                    email : 'Enter valid email'
                },
                author_password: {
                    required: 'Enter your password',
                    minlength: "Your password must be at least 5 characters long"
                },
                author_confirm_password: {
                    required: "Confirm your password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                author_mobile: {
                    required: 'Enter mobile number',
                    number: "Characters not allowed",
                    minlength: 'Enter 10 digits mobile number',
                    maxlength: 'Enter 10 digits mobile number'
                }
            },


            submitHandler: function(form) {
                var author_email = $('#author_email').val();
                var author_password = $('#author_password').val();
                var author_mobile = $('#author_mobile').val();
                var register_button = $('#register_button');
                $.ajax({
                    url: self.base_url+"authors",
                    type: "POST",
                    dataType: "JSON",
                    data:{
                        email: author_email,
                        password: author_password,
                        mobile: author_mobile
                    },
                    beforeSend: function() {
                        register_button.html('Registering... &nbsp;<i class="zmdi zmdi-arrow-forward"></i>');
                    },
                    error:function(data) {
                        var obj = jQuery.parseJSON(data.responseText);
                        if(data.status==422) {
                            self.notify(obj.msg,'inverse');
                        }
                        else if(data.status==500) {
                            swal({
                                title: "Opps!",
                                text: 'Something went wrong on server !',
                                timer: 2000,
                                showConfirmButton: false,
                                showCancelButton: false
                            });
                            register_button.html('Register &nbsp;<i class="zmdi zmdi-arrow-forward"></i>');
                        }
                    },
                    success: function (data) {
                        console.log(data);
                        $.ajax({
                            url: self.base_url+"profile_info",
                            type: "POST",
                            dataType: "JSON",
                            data:{
                                token: data.token,
                                id: data.id
                            },
                            success: function (data) {
                                console.log(data);
                                window.location= self.base_url+"profile"
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });

                        //window.location = self.base_url+"profile/?rt="+data.token; // sending token value on another page by url
                    }
                });
            },
            errorPlacement: function(error, element) {
                $( element ).closest( "form" ).find( "span[data-error-for='" + element.attr( "id" ) + "']").html(error[0].innerHTML).css('opacity',1);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('error');
                $(element).closest('.pos-relative').find('.error-span').css('opacity',0);
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
                        email: login_email,
                        password: login_password
                    },
                    beforeSend: function() {
                        login_button.html('Processing... &nbsp;<i class="zmdi zmdi-arrow-forward"></i>');
                    },
                    error: function(data) {
                        console.log(data);
                        if(data.status==401) {
                            self.notify('Unauthorized access !','inverse');
                        }
                    },
                    success: function (data) {
                        var type = data.results.type;
                        $.ajax({
                            url: self.base_url+"profile_info",
                            type: "POST",
                            dataType: "JSON",
                            data:{
                                token: data.results.token,
                                id: data.results.id
                            },
                            success: function (data) {
                                if(type=='admin') {
                                    window.location= self.base_url+"admin-book-mng?tab=ebook_list";
                                }
                                else {
                                    window.location= self.base_url+"profile";
                                }
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
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
                $(element).closest('.pos-relative').find('.error-span').css('opacity',0);
            }
        });
    }
};