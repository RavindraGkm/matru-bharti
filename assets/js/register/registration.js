var MBJS = MBJS ||{};
MBJS.RegisterUser=function(base_url){
    this.base_url=base_url;
    this.initialize();
}

MBJS.RegisterUser.prototype={
    initialize:function(){
        this.registerUser();
    },
    registerUser:function(){
        var self=this;
        $('#btn-register').click(function(){
            //var token_no="egf323gh32h";
            $.ajax({
                url: self.base_url+"registration",
                type: "POST",
                dataType: 'JSON',
                data:{
                    email:$('#txt_reg_email').val(),
                    password: $('#txt_reg_pass').val(),
                    mobile: $('#txt_mobile').val(),
                    //token:token_no
                },
                error: function (data) {
                    console.log(data.status);
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
                },
                complete: function() {

                }
            });

        });
    }
}