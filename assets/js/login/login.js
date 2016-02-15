var MBJS = MBJS || {};

MBJS.Login = function (base_url) {
    this.base_url=base_url;
    this.initialize();
}
MBJS.Login.prototype={
    initialize:function(){
        this.login();
        this.registerUser();
    },
    login:function() {
        var self=this;
        $('#btn-login').click(function(){
            $.ajax({
                url: self.base_url+"login",
                type: "POST",
                dataType: "JSON",
                data:{
                    email: $("#txt_email").val(),
                    password: $("#txt_password").val()
                },
                beforeSend: function(data) {
                    $("#btn-login").html('...');
                },
                error: function(data){
                    if(data.status==401) {
                        console.log('unauth');
                    }
                    else if(data.status==422){
                        alert("Email or Password can not be blanked");
                    }
                    console.log(data);
                },
                success: function (data) {
                    //console.log(data);
                    //if(data.status==200) {
                    //    window.location = self.base_url+"register";
                    //}
                    //else if(data.status==401) {
                    //    alert(data.status+"Some went wrong");
                    //}
                    //$("#btn-login").html('');
                    console.log(data);
                }

            });
        });
    },
    registerUser:function(){
        var self=this;
        $('#btn-register').click(function(){
            $.ajax({
                url: self.base_url+"registration",
                type: "POST",
                dataType: 'JSON',
                data:{
                    email:$('#txt_reg_email').val(),
                    password: $('#txt_reg_pass').val(),
                    mobile: $('#txt_mobile').val()
                },
                error: function (data) {
                    console.log(data.status);
                    if(data.status==401) {
                        console.log('unauth');
                    }
                    else if(data.status==422){
                        console.log("Email, Password or Mobile Number can not be blanked");
                    }

                },
                success: function (data) {
                    console.log(data);
                    if(data.status == 200) {

                        alert(data.status);
                    }
                    else {
                        console.log(data);
                        alert("Registration Failed");
                    }
                }
            });

        });
    }
}
