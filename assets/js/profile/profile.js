var MBJS = MBJS ||{};
MBJS.UserProfile=function(base_url){
    this.base_url=base_url;
    this.initialize();
}

MBJS.UserProfile.prototype={
    initialize:function(){
        this.profileUpdate();
    },
    registerUser:function() {
        var self=this;
        $("#form_profile_update").validate({
            rules: {
                txt_name: {
                    required: true
                },
                txt_email: {
                    required: true,
                    email : true
                },
                txt_mobile: {
                    required : true,
                    number:true,
                    minlength:10,
                    maxlength:10
                },
                txt_address: {
                    required: true
                },
                txt_city: {
                    required: true
                },
                txt_dob: {
                    required: true
                },
                txt_about_yourself: {
                    required: true
                }
            },
            messages : {
                txt_name: {
                    required : 'Enter your name',
                },
                txt_email: {
                    required : 'Enter your email',
                    email : 'Enter valid email'
                },
                txt_mobile: {
                    required: 'Enter your mobile number',
                    number: 'Enter Digits only',
                    minlength: 'Enter 10 digits mobile number',
                    maxlength: 'Enter 10 digits mobile number'
                },
                txt_address: {
                    required : 'Enter your Address'
                },
                txt_dob: {
                    required : 'Enter your Date of birth'
                },
                txt_about_yourself: {
                    required: 'Enter about your self'
                }
            },
            submitHandler: function(form) {
                var txt_name = $('#txt_name').val();
                var txt_email = $('#txt_email').val();
                var txt_mobile = $('#txt_mobile').val();
                var txt_address = $('#txt_address').val();
                var txt_city = $('#txt_city').val();
                var txt_dob = $('#txt_dob').val();
                var txt_about_yourself = $('#txt_about_yourself').val();
                var update_button = $('#btn-update-profile');
                $.ajax({
                    url: self.base_url+"authors",
                    //url: "http://192.168.1.101/matru-bharti/authors",
                    type: "PUT",
                    dataType: "JSON",
                    data:{
                        name: txt_name,
                        email: txt_email,
                        mobile: txt_mobile,
                        address: txt_address,
                        city: txt_city,
                        dob: txt_dob,
                        about_yourself: txt_about_yourself
                    },
                    beforeSend: function() {
                        update_button.html('Updating... &nbsp;<i class="zmdi zmdi-edit"></i>');
                    },
                    error:function(data) {
                        var obj = jQuery.parseJSON(data.responseText);//<<----<< this object convert responseText into JSON
                        if(data.status==422) {
                            swal({
                                title: "Error!",
                                text: obj.error[0],
                                timer: 2000,
                                showConfirmButton: false,
                                showCancelButton: false
                            });
                        }
                        else if(data.status==500) {
                            swal({
                                title: "Opps!",
                                text: 'Something went wrong on server !',
                                timer: 2000,
                                showConfirmButton: false,
                                showCancelButton: false
                            });
                            update_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                        }
                    },
                    success: function (data, textStatus, jqXHR) {
                        console.log(data);
                        window.location = self.base_url+"profile/?rt="+data.token; // sending token value on another page by url
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