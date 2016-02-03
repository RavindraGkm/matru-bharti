var MBJS = MBJS ||{};
MBJS.UserProfile=function(base_url){
    this.base_url=base_url;
    this.initialize();
}

MBJS.UserProfile.prototype={
    initialize:function(){
        this.viewProfileInfo();
        this.profileUpdate();
        this.profileImageUpload();
    },


    profileImageUpload: function() {

        $("#imageInput").change(function() {
            $('#MyUploadForm').submit();
            return false;
        });

        var self = this;
        var progressbox     = $('#progressbox');
        var progressbar     = $('.custom-progress');
        var statustxt       = $('.custom-progress span');
        var completed       = '0%';

        var options = {
            target:   '#output',   // target element(s) to be updated with server response
            beforeSubmit:  beforeSubmit,  // pre-submit callback
            uploadProgress: OnProgress,
            success:       afterSuccess,  // post-submit callback
            resetForm: true        // reset the form after successful submit
        };


        $('#MyUploadForm').submit(function() {
            $(this).ajaxSubmit(options);
            return false;
        });

        var last_class = "p0";

        function OnProgress(event, position, total, percentComplete) {
            progressbar.removeClass(last_class).addClass("p"+percentComplete); //update progressbar percent complete
            var last_class = "p"+percentComplete;
            statustxt.html(percentComplete + '%'); //update status text
        }

//after succesful upload
        function afterSuccess() {
            $('#submit-btn').show(); //hide submit button
            $('#loading-img').hide(); //hide submit button
        }

//function to check file size before uploading.
        function beforeSubmit() {
            //check whether browser fully supports all File API
            if (window.File && window.FileReader && window.FileList && window.Blob) {
                if( !$('#imageInput').val()) {
                    $("#output").html("Are you kidding me?");
                    return false
                }
                var fsize = $('#imageInput')[0].files[0].size; //get file size
                console.log(fsize);
                var ftype = $('#imageInput')[0].files[0].type; // get file type
                //allow only valid image file types
                switch(ftype) {
                    case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                    break;
                    default:
                        $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
                        return false
                }

                //Allowed file size is less than 1 MB (1048576)
                if(fsize>1048576) {
                    $("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
                    return false
                }

                //Progress bar
                progressbox.show(); //show progressbar
                statustxt.html(completed); //set status text
                statustxt.css('color','#000'); //initial color of status text

                $('#submit-btn').hide(); //hide submit button
                $('#loading-img').show(); //hide submit button
                $("#output").html("");
            }
            else
            {
                //Output error to older unsupported browsers that doesn't support HTML5 File API
                $("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
                return false;
            }
        }
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
                $('#author_email').html(data.result.email);
                $('#author_mobile').html(data.result.mobile);
                $('.span-auth-name').html(data.result.name);
                $('#h2_name').html(data.result.name);
                $('#span-auth-address').html(data.result.address);
                $('#span-auth-city').html(data.result.city);
                $('#span-auth-dob').html(data.result.dob.split('-').reverse().join('-'));
                $('#span-auth-about').html(data.result.about);
                console.log(data.result.dob);
                var profile_view = $('#profile_view');
                var profile_editable=$('#profile_editable');
                if(data.result.name=="") {
                    console.log("Registration");
                    profile_view.removeClass('pmbb-view');
                    profile_view.addClass('pmbb-edit');
                    profile_editable.removeClass('pmbb-edit');
                    profile_editable.addClass('pmbb-view');
                }
                else {
                    console.log("Login");
                    profile_view.removeClass('pmbb-edit');
                    profile_view.addClass('pmbb-view');
                    profile_editable.removeClass('pmbb-view');
                    profile_editable.addClass('pmbb-edit');
                }

                $('#edit-auth-profile').click(function(){
                    $('#txt_name').val(data.result.name);
                    $('#txt_address').val(data.result.address);
                    $('#txt_city').val(data.result.city);
                    $('#txt_dob').val(data.result.dob.split('-').reverse().join('-'));
                    $('#txt_about_yourself').val(data.result.about);
                    $('.pmbb-body div.pmbb-header ul.actions ').hide();
                });
                $('#btn-cancel-edit-pro').click(function(){
                    $('.pmbb-body div.pmbb-header ul.actions ').show();
                });
            }
        });
    },
    profileUpdate:function() {
        $('#txt_name').keyup(function(){
            $('#h2_name').html($('#txt_name').val());
        });
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
                        swal({
                            title: "Success",
                            text: "Profile updated successfully",
                            timer: 2000,
                            showConfirmButton: false,
                            showCancelButton: false,
                        });
                        $('.sweet-alert h2').addClass('h2_success');
                        update_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
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