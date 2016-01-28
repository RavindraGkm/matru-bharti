var MBJS = MBJS ||{};
MBJS.RegisterUser=function(base_url){
    this.base_url=base_url;
    this.initialize();
}

MBJS.RegisterUser.prototype={
    initialize:function(){
        this.profileUpdate();
    },
    profileUpdate:function(){
        var self=this;
        $('#btn-update-profile').click(function(){
            alert("hello");
            $.ajax({
                url: self.base_url+"profile",
                type: "PUT",
                dataType: 'JSON',
                data:{
                    name:$('#txt_name'),
                    email:$('#txt_email').val(),
                    mobile: $('#txt_mobile').val(),
                    address: $('#txt_address').val(),
                    city: $('#txt_city').val(),
                    dob:$('#txt_dob'),
                    about_yourself: $('#txt_about_yourself').val(),
                    token:$('#txt_token_no')
                },
                before:function (data){
                  $('#btn-update-profile').html('Updating...');
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
                        alert("Updation Failed...");
                    }
                },
                complete: function() {

                }
            });

        });
    }
}