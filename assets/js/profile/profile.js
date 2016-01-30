var MBJS = MBJS ||{};
MBJS.UserProfile=function(base_url){
    this.base_url=base_url;
    this.initialize();
}

MBJS.UserProfile.prototype={
    initialize:function(){
        this.viewProfileInfo();
        this.profileUpdate();
    },
    viewProfileInfo:function () {
        var self=this;
        var auth_token = $('#remember_token').val();
        var author_id = $('#author_id').val();
        $.ajax({
            url: self.base_url+"authors/"+author_id,
            type: 'GET',
            dataType: 'JSON',
            headers:{Authorization : auth_token},
            success:function(data){
                console.log(data);
            }
        });
    },
    profileUpdate:function() {
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
                var txt_address = $('#txt_address').val();
                var txt_city = $('#txt_city').val();
                var txt_dob = $('#txt_dob').val().split('-').reverse().join('-');
                var about = $('#txt_about_yourself').val();
                var remember_token = $('#remember_token').val();
                var update_button = $('#btn-update-profile');
                var author_id=$('#author_id').val();
                $.ajax({
                    url: self.base_url+"authors/"+author_id,
                    type: "PUT",
                    dataType: "JSON",
                    data:{
                        name: txt_name,address: txt_address,
                        city: txt_city,dob: txt_dob,
                        about: about
                    },
                    headers:{Authorization : remember_token},
                    beforeSend: function() {
                        update_button.html('Updating... &nbsp;<i class="zmdi zmdi-edit"></i>');
                    },
                    error:function(data) {
                        console.log(data);
                        //var obj = jQuery.parseJSON(data.responseText);//<<----<< this object convert responseText into JSON
                        //if(data.status==422) {
                        //    swal({
                        //        title: "Error!",
                        //        text: obj.error[0],
                        //        timer: 2000,
                        //        showConfirmButton: false,
                        //        showCancelButton: false
                        //    });
                        //}
                        //else if(data.status==500) {
                        //    swal({
                        //        title: "Opps!",
                        //        text: 'Something went wrong on server !',
                        //        timer: 2000,
                        //        showConfirmButton: false,
                        //        showCancelButton: false
                        //    });
                        //    update_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                        //}
                    },
                    success: function (data, textStatus, jqXHR) {
                        console.log(data);
                        if(data.status==200) {
                            swal({
                                title: "Success",
                                text: "Profile updated successfully",
                                timer: 2000,
                                showConfirmButton: false,
                                showCancelButton: false
                            });
                        }
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
}