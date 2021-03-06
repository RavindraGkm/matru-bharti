var MBJS = MBJS ||{};
MBJS.UserProfile=function(base_url){
    this.base_url=base_url;
    this.initialize();
    this.last_class = "p0";
};

MBJS.UserProfile.prototype = {

    initialize:function() {
        this.viewProfileInfo();
        this.profileUpdate();
        this.profileImageUpload();
        this.privacySetting();
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

    profileImageUpload: function() {

        $("#profileImage").change(function() {
            $('#MyUploadForm').submit();
            return false;
        });

        var self = this;
        var remember_token = $('#remember_token').val();
        var progressbox = $('#progressbox');
        var progressbar = $('.custom-progress');
        var statusauthor = $('.custom-progress span');
        var completed = '0%';
        var uploadingprogressdiv = $('.uploading-progress-div');
        var author_id=$('#author_id').val();

        var options = {
            beforeSubmit:beforeSubmit,
            uploadProgress:OnProgress,
            success:afterSuccess,
            resetForm: true,
            data: {author_id : author_id},
            headers:{Authorization : remember_token}
        };


        $('#MyUploadForm').submit(function() {
            $(this).ajaxSubmit(options);
            return false;
        });

        function OnProgress(event, position, total, percentComplete) {
            progressbar.removeClass(self.last_class).addClass("p"+percentComplete);
            self.last_class = "p"+percentComplete;
            statusauthor.html(percentComplete + '%');
        }

        function afterSuccess() {
            uploadingprogressdiv.addClass('hidden');
            var new_source = self.base_url+"image/upload/"+author_id + "?timestamp="  + new Date().getTime();
            $('#profile_image').attr('src',new_source);
        }

        function beforeSubmit() {
            if (window.File && window.FileReader && window.FileList && window.Blob) {
                if( !$('#profileImage').val()) {
                    self.notify("No File selected",'danger');
                    return false
                }
                var fsize = $('#profileImage')[0].files[0].size; //get file size
                //console.log(fsize);
                var ftype = $('#profileImage')[0].files[0].type; // get file type
                //allow only valid image file types
                switch(ftype) {
                    case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                    break;
                    default:
                        self.notify("Please select image file",'danger');
                        return false
                }
                //Allowed file size is less than 1 MB (1048576)
                if(fsize>1048576) {
                    $("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
                    return false
                }
                //Progress bar
                uploadingprogressdiv.removeClass('hidden');
            }
            else {
                self.notify("Please upgrade your browser, because your current browser lacks some new features we need!",'danger');
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
                $('.span-auth-hindi-name').html(data.result.hindi_name);
                $('#h2_name').html(data.result.name);
                $('#span-auth-address').html(data.result.address);
                $('#span-auth-city').html(data.result.city);
                $('#span-auth-dob').html(data.result.dob.split('-').reverse().join('-'));
                $('#span-auth-pan').html(data.result.pan);
                $('#span-auth-about').html(data.result.about);
                if(data.result.img_status=='Hidden') {
                    $('#hide_img_chk').selected(true);
                }
                if(data.result.phn_status=='Hidden') {
                    $('#hide_phn_chk').selected(true);
                }
                if(data.result.email_status=='Hidden') {
                    $('#hide_email_chk').selected(true);
                }
                if(data.result.add_status=='Hidden') {
                    $('#hide_add_chk').selected(true);
                }
                var profile_view = $('#profile_view');
                var profile_editable=$('#profile_editable');
                if(data.result.name=="") {
                    //console.log("Registration");
                    profile_view.removeClass('pmbb-view');
                    profile_view.addClass('pmbb-edit');
                    profile_editable.removeClass('pmbb-edit');
                    profile_editable.addClass('pmbb-view');
                }
                else {
                    //console.log("Login");
                    profile_view.removeClass('pmbb-edit');
                    profile_view.addClass('pmbb-view');
                    profile_editable.removeClass('pmbb-view');
                    profile_editable.addClass('pmbb-edit');
                }

                $('#edit-auth-profile').click(function(){
                    $('#author_name').val(data.result.name);
                    $('#author_hindi_name').val(data.result.hindi_name);
                    $('#author_address').val(data.result.address);
                    $('#author_city').val(data.result.city);
                    $('#author_dob').val(data.result.dob.split('-').reverse().join('-'));
                    $('#author_pan_card').val(data.result.pan);
                    $('#author_about_yourself').val(data.result.about);
                    $('.pmbb-body div.pmbb-header ul.actions ').hide();
                });
                $('#btn-cancel-edit-pro').click(function(){
                    $('.pmbb-body div.pmbb-header ul.actions ').show();
                });
            }
        });
    },

    profileUpdate:function() {
        $('#author_name').keyup(function(){
            $('#h2_name').html($('#author_name').val());
        });


        $("#form_profile_update").validate({
            rules: {
                author_name: {
                    required: true
                },
                author_hindi_name: {
                    required: true
                },
                author_address: {
                    required: true
                },
                author_city: {
                    required: true
                },
                author_dob: {
                    required: true
                },
                author_pan_card: {
                    required: true,
                    minlength:10,
                    maxlength:10
                },
                author_about_yourself: {
                    required: true
                }
            },
            messages : {
                author_name: {
                    required : 'Enter your name'
                },
                author_hindi_name: {
                    required: 'Enter your name in hindi'
                },
                author_address: {
                    required : 'Enter your Address'
                },
                author_city: {
                    required : 'Enter your city'
                },
                author_dob: {
                    required : 'Enter your Date of birth'
                },
                author_pan_card: {
                    required: "Enter your PAN Card number",
                    minlength:"Enter Valid PAN number",
                    maxlength:"Enter Valid PAN number"
                },
                author_about_yourself: {
                    required: 'Enter about your self'
                }
            },
            submitHandler: function(form) {
                var author_name = $('#author_name').val();
                var author_hindi_name=$('#author_hindi_name').val();
                var author_address = $('#author_address').val();
                var author_city = $('#author_city').val();
                var author_dob = $('#author_dob').val().split('-').reverse().join('-');
                var author_pan = $('#author_pan_card').val();
                var about = $('#author_about_yourself').val();
                var remember_token = $('#remember_token').val();
                var update_button = $('#btn-update-profile');
                var author_id=$('#author_id').val();
                var profile_view = $('#profile_view');
                var profile_editable=$('#profile_editable');
                $.ajax({
                    url: self.base_url+"authors/"+author_id,
                    type: "PUT",
                    dataType: "JSON",
                    data:{
                        name: author_name,hindi_name:author_hindi_name,address: author_address,
                        city: author_city,dob: author_dob,pan: author_pan,
                        about: about,img_status:status_img
                    },
                    headers:{Authorization : remember_token},
                    beforeSend: function() {
                        update_button.html('Updating... &nbsp;<i class="zmdi zmdi-edit"></i>');
                    },
                    error:function(data) {
                        console.log(data);
                        var obj = jQuery.parseJSON(data.responseText);//<<----<< this object convert responseText into JSON
                        if(data.status==422) {
                            self.notify(obj.error[0],'danger');
                        }
                        else if(data.status==500) {
                            self.notify("Something went wrong on server",'danger');
                            update_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                        }
                    },
                    success: function (data, textStatus, jqXHR) {
                        console.log(data);
                        self.notify("Profile Updated successfully",'inverse');
                        update_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                        $('.span-auth-name').html(author_name);
                        $('#span-auth-address').html(author_address);
                        $('#span-auth-city').html(author_city);
                        $('#span-auth-dob').html(author_dob);
                        $('#span-auth-pan').html(author_pan);
                        $('#span-auth-about').html(about);
                        $('.pmbb-body div.pmbb-header ul.actions ').show();
                    },
                    complete:function(data) {
                        if(data.status=="success"){
                            profile_view.removeClass('pmbb-view');
                            profile_view.addClass('pmbb-edit');
                            profile_editable.removeClass('pmbb-edit');
                            profile_editable.addClass('pmbb-view');
                            $('.pmbb-body div.pmbb-header ul.actions ').show();
                        }
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

    privacySetting:function() {
        var author_id=$('#author_id').val();
        var auth_token = $('#remember_token').val();
        var self=this;
        var status_img;
        var status_phn;
        var status_email;
        var status_add;
        $('#hide_img_chk').change(function() {
            var checkbox=$(this);
            if(checkbox.is(':checked')) {
                status_img = 'Hidden';
            }
            else {
                status_img = 'View';
            }
            $.ajax({
                url: self.base_url+"authors/"+author_id,
                type: "PUT",
                dataType: "JSON",
                data:{
                    img_status:status_img
                },
                headers:{Authorization : auth_token},
                error:function(data) {
                    console.log(data);
                    var obj = jQuery.parseJSON(data.responseText);//<<----<< this object convert responseText into JSON
                    if(data.status==422) {
                        self.notify(obj.error[0],'danger');
                    }
                    else if(data.status==500) {
                        self.notify("Something went wrong on server",'danger');
                    }
                },
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                    self.notify("Profile Updated successfully",'inverse');
                }
            });
        });
        $('#hide_phn_chk').change(function() {
            var checkbox=$(this);
            if(checkbox.is(':checked')) {
                status_phn = 'Hidden';
            }
            else {
                status_phn = 'View';
            }
            $.ajax({
                url: self.base_url+"authors/"+author_id,
                type: "PUT",
                dataType: "JSON",
                data:{
                    phn_status:status_phn
                },
                headers:{Authorization : auth_token},
                error:function(data) {
                    console.log(data);
                    var obj = jQuery.parseJSON(data.responseText);//<<----<< this object convert responseText into JSON
                    if(data.status==422) {
                        self.notify(obj.error[0],'danger');
                    }
                    else if(data.status==500) {
                        self.notify("Something went wrong on server",'danger');
                    }
                },
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                    self.notify("Profile Updated successfully",'inverse');
                }
            });
        });
        $('#hide_email_chk').change(function() {
            var checkbox=$(this);
            if(checkbox.is(':checked')) {
                status_email = 'Hidden';
            }
            else {
                status_email = 'View';
            }
            $.ajax({
                url: self.base_url+"authors/"+author_id,
                type: "PUT",
                dataType: "JSON",
                data:{
                    email_status:status_email
                },
                headers:{Authorization : auth_token},
                error:function(data) {
                    console.log(data);
                    var obj = jQuery.parseJSON(data.responseText);//<<----<< this object convert responseText into JSON
                    if(data.status==422) {
                        self.notify(obj.error[0],'danger');
                    }
                    else if(data.status==500) {
                        self.notify("Something went wrong on server",'danger');
                    }
                },
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                    self.notify("Profile Updated successfully",'inverse');
                }
            });
        });
        $('#hide_add_chk').change(function() {
            var checkbox=$(this);
            if(checkbox.is(':checked')) {
                status_add = 'Hidden';
            }
            else {
                status_add = 'View';
            }
            $.ajax({
                url: self.base_url+"authors/"+author_id,
                type: "PUT",
                dataType: "JSON",
                data:{
                    add_status:status_add
                },
                headers:{Authorization : auth_token},
                error:function(data) {
                    console.log(data);
                    var obj = jQuery.parseJSON(data.responseText);//<<----<< this object convert responseText into JSON
                    if(data.status==422) {
                        self.notify(obj.error[0],'danger');
                    }
                    else if(data.status==500) {
                        self.notify("Something went wrong on server",'danger');
                    }
                },
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                    self.notify("Profile Updated successfully",'inverse');
                }
            });
        });
    }
};