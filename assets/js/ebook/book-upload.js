var MBJS = MBJS || {};
MBJS.AuthorBook = function (base_url) {
    this.base_url = base_url;
    this.initialize();
    this.last_class = "p0";
};

MBJS.AuthorBook.prototype = {
    initialize: function () {
        this.basicSetups();
        this.viewProfileInfo();
        this.ebookUpload();
        //this.ebookFileUpload();
        this.compositionUpload();
        this.eventUpload();
        this.viewEbookList();
        this.viewCompositionList();
        this.viewEventList();
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
    basicSetups : function () {
        // Active tabs
        var active_tab = $("#active_tab_val").val();
        $('#a_'+active_tab).addClass('active');
        $('#tab_'+active_tab).addClass('active');
        $('#'+active_tab).addClass('active');

        if($("#active_tab_val").val()=="event") {
            $('#tab_'+active_tab+'_create').addClass('active');
            $('#'+active_tab+'_create').addClass('active');
        }
        $('#tab_event').click(function(){
            //$('#event').addClass('active');
            $('#tab_event_create').addClass('active');
            $('#event_create').addClass('active');
            $('#tab_event_list').removeClass('active');
            $('#event_list').removeClass('active');
        });

        // Uploading setups
        var author_id=$('#author_id').val();
        var remember_token = $('#remember_token').val();

        var options = {
            target:'#output',
            beforeSubmit:beforeSubmit,
            uploadProgress:OnProgress,
            success:afterSuccess,
            resetForm: true,
            data: {author_id : author_id},
            headers:{Authorization : remember_token}
        };


        $("#ebook_file").change(function() {
            $('#ebook_upload_form').submit();
            return false;
        });

        $('#ebook_upload_form').submit(function() {
            $(this).ajaxSubmit(options);
            return false;
        });


        function OnProgress(event, position, total, percentComplete) {
            //progressbar.removeClass(self.last_class).addClass("p"+percentComplete);
            //self.last_class = "p"+percentComplete;
            //statustxt.html(percentComplete + '%');
        }

        function afterSuccess() {
            //uploadingprogressdiv.addClass('hidden');
        }

//function to check file size before uploading.
        function beforeSubmit() {
            uploadingprogressdiv.removeClass('hidden');
            if (window.File && window.FileReader && window.FileList && window.Blob) {
                if( !$('#ebook_file').val()) {
                    $("#output").html("Are you kidding me?");
                    return false
                }
                var fsize = $('#ebook_file')[0].files[0].size; //get file size
                var ftype = $('#ebook_file')[0].files[0].type; // get file type


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
    //this function for retriving user data from any page just like "user name"
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
                $('.span-auth-name').html(data.result.name);
            }
        });
    },

    ebookFileUpload: function() {

        $("#ebook_file").change(function() {
            $('#ebook_upload_form').submit();
            return false;
        });

        var self = this;
        var remember_token = $('#remember_token').val();
        var statustxt = $('.custom-progress span');
        var author_id=$('#author_id').val();
        var options = {
            beforeSubmit:beforeSubmit,
            uploadProgress:OnProgress,
            success:afterSuccess,
            resetForm: true,
            data: {author_id : author_id},
            headers:{Authorization : remember_token}
        };


        $('#ebook_cover_upload_form').submit(function() {
            $(this).ajaxSubmit(options);
            return false;
        });


        function OnProgress(event, position, total, percentComplete) {
            //progressbar.removeClass(self.last_class).addClass("p"+percentComplete);
            //self.last_class = "p"+percentComplete;
            //statustxt.html(percentComplete + '%');
        }

        function afterSuccess() {
            //uploadingprogressdiv.addClass('hidden');
            //var new_source = self.base_url+"image/upload/"+author_id + "?timestamp="  + new Date().getTime();
            //$('#profile_image').attr('src',new_source);
        }

        function beforeSubmit() {
            if (window.File && window.FileReader && window.FileList && window.Blob) {
                if( !$('#profileImage').val()) {
                    self.notify("No File selected",'danger');
                    return false
                }
                var fsize = $('#profileImage')[0].files[0].size; //get file size
                console.log(fsize);
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

    profileImageUpload: function() {

        $("#ebook_cover").change(function() {
            $('#ebook_cover_upload_form').submit();
            return false;
        });

        var self = this;
        var remember_token = $('#remember_token').val();
        var progressbox = $('#progressbox');
        var progressbar = $('.custom-progress');
        var statustxt = $('.custom-progress span');
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


        $('#ebook_cover_upload_form').submit(function() {
            $(this).ajaxSubmit(options);
            return false;
        });

        function OnProgress(event, position, total, percentComplete) {
            progressbar.removeClass(self.last_class).addClass("p"+percentComplete);
            self.last_class = "p"+percentComplete;
            statustxt.html(percentComplete + '%');
        }

        function afterSuccess() {
            uploadingprogressdiv.addClass('hidden');
            var new_source = self.base_url+"image/upload/"+author_id + "?timestamp="  + new Date().getTime();
            $('#profile_image').attr('src',new_source);
        }

        function beforeSubmit() {
            if (window.File && window.FileReader && window.FileList && window.Blob) {
                if( !$('#ebook_cover').val()) {
                    self.notify("No File selected",'danger');
                    return false
                }
                var fsize = $('#ebook_cover')[0].files[0].size; //get file size
                console.log(fsize);
                var ftype = $('#ebook_cover')[0].files[0].type; // get file type
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

    ebookUpload: function () {
        var self = this;
        //$('#form_ebook_upload').validate({
        //    rules:{
        //        book_language: {
        //            required:true
        //        },
        //        book_category: {
        //            required:true
        //        },
        //        file_title: {
        //            required:true
        //        },
        //        book_tag: {
        //            required:true
        //        },
        //        about_book: {
        //            required:true
        //        }
        //    },
        //    message:{
        //        book_language: {
        //            required: "Select Language"
        //        },
        //        book_category: {
        //            required: "Select Category"
        //        },
        //        file_title: {
        //            required: "Enter file title"
        //        },
        //        book_tag: {
        //            required: "Enter book tag"
        //        },
        //        about_book: {
        //            required: "Enter about book"
        //        }
        //    },
        //    submitHandler: function(form) {
        //        var book_language = $('#book_language').val();
        //        var book_category = $('#book_category').val();
        //        var file_title = $('#file_title').val();
        //        var about_book = $('#about_book').val();
        //        var book_tag = $('#book_tag').val();
        //        var ebook_file = "Abc_file";
        //        var ebook_cover = "Abc_cover";
        //        var ebook_status="Panding";
        //        var book_save_button = $('#btn-save-book-info');
        //        var author_id = $('#author_id').val();
        //        var remember_token = $('#remember_token').val();
        //        $.ajax({
        //            url: self.base_url + "ebook",
        //            type: "POST",
        //            dataType: "JSON",
        //            data: {
        //                language: book_language, category: book_category,
        //                title: file_title, about: about_book,
        //                tag: book_tag,author_id:author_id,
        //                file: ebook_file, cover: ebook_cover,status:ebook_status
        //            },
        //            headers: {Authorization: remember_token},
        //            beforeSend: function () {
        //                book_save_button.html('Uploading... &nbsp;<i class="zmdi zmdi-edit"></i>');
        //
        //            },
        //            error: function (data) {
        //                var obj = jQuery.parseJSON(data.responseText);//<<----<< this object convert responseText into JSON
        //                if (data.status == 422) {
        //                    swal({
        //                        title: "Error!",
        //                        text: obj.error[0],
        //                        timer: 2000,
        //                        showConfirmButton: false,
        //                        showCancelButton: false
        //                    });
        //                }
        //                else if (data.status == 500) {
        //                    swal({
        //                        title: "Opps!",
        //                        text: 'Something went wrong on server !',
        //                        timer: 2000,
        //                        showConfirmButton: false,
        //                        showCancelButton: false
        //                    });
        //                    book_save_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
        //                }
        //            },
        //            success: function (data, textStatus, jqXHR) {
        //                swal({
        //                    title: "Success",
        //                    text: "Book info saved successfully",
        //                    timer: 2000,
        //                    showConfirmButton: false,
        //                    showCancelButton: false,
        //                });
        //                $('.sweet-alert h2').addClass('h2_success');
        //                book_save_button.html('Save Book Info');
        //            }
        //        });
        //    },
        //    errorPlacement: function (error, element) {
        //        $(element).closest("form").find("span[data-error-for='" + element.attr("id") + "']").html(error[0].innerHTML).css('opacity', 1);
        //    },
        //    unhighlight: function (element, errorClass, validClass) {
        //        $(element).removeClass('error');
        //        $(element).closest('.pos-relative').find('.error-span').css('opacity', 0);
        //    }
        //});

        $("#btn-save-book-info").click(function(){
            var book_language = $('#book_language').val();
            var book_category = $('#book_category').val();
            var file_title = $('#file_title').val();
            var about_book = $('#about_book').val();
            var book_tag = $('#book_tag').val();
            var ebook_file = "Abc_file";
            var ebook_cover = "Abc_cover";
            var ebook_status="Panding";
            var book_save_button = $('#btn-save-book-info');
            var author_id = $('#author_id').val();
            var remember_token = $('#remember_token').val();
            var ebook_created_at=$('#ebook_creation_date').val();


            $.ajax({
                url: self.base_url + "ebook",
                type: "POST",
                dataType: "JSON",
                data: {
                    language: book_language, category: book_category,
                    title: file_title, about: about_book,
                    tag: book_tag,author_id:author_id,
                    file: ebook_file, cover: ebook_cover,status:ebook_status,created_at:ebook_created_at
                },
                headers: {Authorization: remember_token},
                beforeSend: function () {
                    book_save_button.html('Uploading... &nbsp;<i class="zmdi zmdi-edit"></i>');

                },
                error: function (data) {
                    var obj = jQuery.parseJSON(data.responseText);//<<----<< this object convert responseText into JSON
                    if (data.status == 422) {
                        swal({
                            title: "Error!",
                            text: obj.error[0],
                            timer: 2000,
                            showConfirmButton: false,
                            showCancelButton: false
                        });
                    }
                    else if (data.status == 500) {
                        swal({
                            title: "Opps!",
                            text: 'Something went wrong on server !',
                            timer: 2000,
                            showConfirmButton: false,
                            showCancelButton: false
                        });
                        book_save_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                    }
                },
                success: function (data, textStatus, jqXHR) {
                    swal({
                        title: "Success",
                        text: "Book info saved successfully",
                        timer: 2000,
                        showConfirmButton: false,
                        showCancelButton: false,
                    });
                    $('.sweet-alert h2').addClass('h2_success');
                    book_save_button.html('Save Book Info');
                }
            });
        });
    },

    compositionUpload: function () {
        var self = this;
        $("#form_composition_upload").validate({
            rules: {
                composition_language: {
                    required: true
                },
                composition_category: {
                    required: true
                },
                composition_title: {
                    required: true
                },
                about_composition: {
                    required: true
                }
            },
            messages: {
                composition_language: {
                    required: 'Select language'
                },
                composition_category: {
                    required: 'Select Category'
                },
                composition_title: {
                    required: 'Enter composition title'

                },
                about_composition: {
                    required: 'Enter about this composition'
                }
            },
            submitHandler: function (form) {
                var composition_language = $('#composition_language').val();
                var composition_category = $('#composition_category').val();
                var composition_title = $('#composition_title').val();
                var about_composition = $('#about_composition').val();
                var composition_save_button = $('#btn-save-composition-info');
                var composition_status="Panding";
                var author_id = $('#author_id').val();
                var remember_token = $('#remember_token').val();
                $.ajax({
                    url: self.base_url + "composition",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        language: composition_language, category: composition_category,
                        title: composition_title, about: about_composition,author_id:author_id,
                        status:composition_status
                    },
                    headers: {Authorization: remember_token},
                    beforeSend: function () {
                        composition_save_button.html('Uploading... &nbsp;<i class="zmdi zmdi-edit"></i>');
                    },
                    error: function (data) {
                        console.log(data);
                        var obj = jQuery.parseJSON(data.responseText);//<<----<< this object convert responseText into JSON
                        if (data.status == 422) {
                            swal({
                                title: "Error!",
                                text: obj.error[0],
                                timer: 2000,
                                showConfirmButton: false,
                                showCancelButton: false
                            });
                        }
                        else if (data.status == 500) {
                            swal({
                                title: "Opps!",
                                text: 'Something went wrong on server !',
                                timer: 2000,
                                showConfirmButton: false,
                                showCancelButton: false
                            });
                            composition_save_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                        }
                    },
                    success: function (data, textStatus, jqXHR) {
                        swal({
                            title: "Success",
                            text: "Composition info saved successfully",
                            timer: 2000,
                            showConfirmButton: false,
                            showCancelButton: false,
                        });
                        $('.sweet-alert h2').addClass('h2_success');
                        composition_save_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                    }
                });
            },
            errorPlacement: function (error, element) {
                $(element).closest("form").find("span[data-error-for='" + element.attr("id") + "']").html(error[0].innerHTML).css('opacity', 1);
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('error');
                $(element).closest('.pos-relative').find('.error-span').css('opacity', 0);
            }
        });
    },

    eventUpload: function () {
        var self = this;
        $("#form_event_upload").validate({
            rules: {
                event_title: {
                    required: true
                },
                event_date: {
                    required: true
                }
            },
            messages: {
                event_title: {
                    required: 'Enter event title'

                },
                event_date: {
                    required: 'Enter Event date'
                }
            },
            submitHandler: function (form) {
                var event_title = $('#event_title').val();
                var event_date = $('#event_date').val().split('-').reverse().join('-');
                var event_image= "event.jpg";
                var event_save_button = $('#btn-save-event-info');
                var author_id = $('#author_id').val();
                var remember_token = $('#remember_token').val();
                $.ajax({
                    url: self.base_url + "event",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        title: event_title, event_date:event_date,
                        event_pic: event_image, author_id:author_id
                    },
                    headers: {Authorization: remember_token},
                    beforeSend: function () {
                        event_save_button.html('Saving... &nbsp;<i class="zmdi zmdi-edit"></i>');
                    },
                    error: function (data) {
                        console.log(data);
                        var obj = jQuery.parseJSON(data.responseText);//<<----<< this object convert responseText into JSON
                        if (data.status == 422) {
                            swal({
                                title: "Error!",
                                text: obj.error[0],
                                timer: 2000,
                                showConfirmButton: false,
                                showCancelButton: false
                            });
                        }
                        else if (data.status == 500) {
                            swal({
                                title: "Opps!",
                                text: 'Something went wrong on server !',
                                timer: 2000,
                                showConfirmButton: false,
                                showCancelButton: false
                            });
                            event_save_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                        }
                    },
                    success: function (data, textStatus, jqXHR) {
                        swal({
                            title: "Success",
                            text: "Event info saved successfully",
                            timer: 2000,
                            showConfirmButton: false,
                            showCancelButton: false,
                        });
                        $('.sweet-alert h2').addClass('h2_success');
                        event_save_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                    }
                });
            },
            errorPlacement: function (error, element) {
                $(element).closest("form").find("span[data-error-for='" + element.attr("id") + "']").html(error[0].innerHTML).css('opacity', 1);
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('error');
                $(element).closest('.pos-relative').find('.error-span').css('opacity', 0);
            }
        });
    },

    viewEbookList : function() {
        var self=this;
        var auth_token = $('#remember_token').val();
        var author_id = $('#author_id').val();
        $.ajax({
            url: self.base_url+"ebook/"+author_id,
            type: 'GET',
            dataType: 'JSON',
            headers:{Authorization : auth_token},
            success:function(data) {
                var results = data.result;
                var row;
                for(var i=0;i<results.length;i++) {
                    var published_date = results[i].published_at.split('-').reverse().join('-');
                    var s_no=i+1;
                    if(results[i].status=="Panding")
                    {
                        row="<tr><td>"+s_no+"</td><td>"+results[i].title+"</td><td class='td-status-blue'>"+results[i].status+"</td><td>"+published_date+"</td><td><a href="+results[i].file+"></a></td><td>"+results[i].id+"</td></tr>";
                        $("#ebook_list_info").append(row);
                    }
                    else if(results[i].status=="Approved")
                    {
                        row="<tr><td>"+s_no+"</td><td>"+results[i].title+"</td><td class='td-status-green'>"+results[i].status+"</td><td>"+published_date+"</td><td><a href="+results[i].file+"></a></td><td>"+results[i].id+"</td></tr>";
                        $("#ebook_list_info").append(row);
                    }
                    else
                    {
                        row="<tr><td>"+s_no+"</td><td>"+results[i].title+"</td><td class='td-status-red'>"+results[i].status+"</td><td>"+published_date+"</td><td><a href="+results[i].file+"></a></td><td>"+results[i].id+"</td></tr>";
                        $("#ebook_list_info").append(row);
                    }

                }
                $("#data-table-basic").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    formatters: {
                        "links": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-delete delete-ebook waves-effect waves-circle\" data-row-id=\"" + row.action + "\"><span class=\"zmdi zmdi-delete\"></span></button>";
                        }
                    }
                });
            }
        });
        //<<<------<< Delete ebook functionality
        $('#ebook_list_info').on('click','.delete-ebook',function() {
            var ebook_table_id = $(this).attr('data-row-id');
            //console.log(ebook_table_id);
            var author_id = $('#author_id').val();
            swal({
                title: "Are you sure?",
                text: "You will not be able to undo this action !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: true
            }, function() {
                $.ajax({
                    url: self.base_url+"ebook/"+ebook_table_id,
                    type: 'DELETE',
                    dataType: 'JSON',
                    headers:{Authorization : auth_token},
                    data: {
                        author_id : author_id
                    },
                    success:function(data) {
                        console.log(ebook_table_id);
                        self.notify('Successfully deleted','inverse');
                    },
                    error:function(data) {
                        console.log(data);
                    }
                });
            });
        });

    },

    viewCompositionList : function() {
        var self=this;
        var auth_token = $('#remember_token').val();
        var author_id = $('#author_id').val();
        $.ajax({
            url: self.base_url+"composition/"+author_id,
            type: 'GET',
            dataType: 'JSON',
            headers:{Authorization : auth_token},
            success:function(data){
                //console.log(data);
                var results= data.result;
                var row;
                for(var i=0;i<results.length;i++){
                    var published_date= results[i].published_at.split('-').reverse().join('-');
                    var s_no=i+1;
                    if(results[i].status=="Panding")
                    {
                        row = "<tr><td>" + s_no + "</td><td>" + results[i].title + "</td><td class='td-status-blue'>" + results[i].status + "</td><td>" + published_date + "</td><td>" + results[i].title + "</td><td>" + results[i].id + "</td></tr>";
                        $("#composition_list_info").append(row);
                    }
                    else if(results[i].status=="Approved")
                    {
                        row = "<tr><td>" + s_no + "</td><td>" + results[i].title + "</td><td class='td-status-green'>" + results[i].status + "</td><td>" + published_date + "</td><td>" + results[i].title + "</td><td>" + results[i].id + "</td></tr>";
                        $("#composition_list_info").append(row);
                    }
                    else
                    {
                        row = "<tr><td>" + s_no + "</td><td>" + results[i].title + "</td><td class='td-status-red'>" + results[i].status + "</td><td>" + published_date + "</td><td>" + results[i].title + "</td><td>" + results[i].id + "</td></tr>";
                        $("#composition_list_info").append(row);
                    }
                }
                $("#data-table-composition").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    formatters: {
                        "links": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-delete delete-composition waves-effect waves-circle\" data-row-id=\"" + row.action + "\"><span class=\"zmdi zmdi-delete\"></span></button>";
                        }
                    }
                });
            }
        });
        $('#composition_list_info').on('click','.delete-composition',function() {
            var composition_table_id = $(this).attr('data-row-id');
            var author_id = $('#author_id').val();
            swal({
                title: "Are you sure?",
                text: "You will not be able to undo this action !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: true
            }, function() {
                $.ajax({
                    url: self.base_url+"composition/"+composition_table_id,
                    type: 'DELETE',
                    dataType: 'JSON',
                    headers:{Authorization : auth_token},
                    data: {
                        author_id : author_id
                    },
                    success:function(data) {
                        self.notify('Successfully deleted','inverse');
                        if(data.status=="success")
                        {

                        }
                    },
                    error:function(data) {
                        console.log(data);
                    }
                });
            });
        });
    },

    viewEventList : function() {
        var self=this;
        var auth_token = $('#remember_token').val();
        var author_id = $('#author_id').val();
        $.ajax({
            url: self.base_url+"event/"+author_id,
            type: 'GET',
            dataType: 'JSON',
            headers:{Authorization : auth_token},
            error:function(data) {
                console.log(auth_token)
                console.log(data);
            },
            success:function(data) {
                //console.log(data);

                var results= data.result;
                var row;
                for(var i=0;i<results.length;i++){
                    var event_date= results[i].event_date.split('-').reverse().join('-');
                    var s_no=i+1;
                    row = "<tr><td>" + s_no + "</td><td>"+ results[i].event_pic +"</td><td>" + results[i].title + "</td><td>" + event_date + "</td><td>" + results[i].id + "</td></tr>";
                    $("#event_list_info").append(row);


                }
                $("#data-table-event").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    formatters: {
                        "links": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-delete delete-event waves-effect waves-circle\" data-row-id=\"" + row.action + "\"><span class=\"zmdi zmdi-delete\"></span></button>";
                        }
                    }
                });
            }
        });
        $('#event_list_info').on('click','.delete-event',function() {
            var event_table_id = $(this).attr('data-row-id');
            var author_id = $('#author_id').val();
            console.log("Auth:" + auth_token);
            swal({
                title: "Are you sure?",
                text: "You will not be able to undo this action !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: true
            }, function() {
                $.ajax({
                    url: self.base_url+"event/"+event_table_id,
                    type: 'DELETE',
                    dataType: 'JSON',
                    headers:{Authorization : auth_token},
                    data: {
                        author_id : author_id
                    },
                    success:function(data) {
                        self.notify('Successfully deleted','inverse');
                    },
                    error:function(data) {
                        //console.log('came in error');
                        console.log(data);
                    }
                });
            });
        });
    }
}