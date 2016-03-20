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
        this.getEbookCategory();
        //this.ebookFileUpload();
        this.compositionUpload();
        this.eventUpload();
        this.showCaseUpload();
        this.viewEbookList();
        this.viewCompositionList();
        this.viewEventList();
        this.viewShowCaseList();
        this.viewTopAuthorsList();
        //this.viewEbookShowCase();
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

        if($("#active_tab_val").val()=="show_case") {
            $('#tab_'+active_tab+'_create').addClass('active');
            $('#'+active_tab+'_create').addClass('active');
        }
        $('#tab_show_case').click(function(){
            $('#tab_show_case_create').addClass('active');
            $('#show_case_create').addClass('active');
            $('#tab_show_case_list').removeClass('active');
            $('#show_case_list').removeClass('active');
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

    ebookUpload: function () {
        var self = this;

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
                        self.notify(obj.error[0],'inverse');
                    }
                    else if (data.status == 500) {
                        self.notify('Error! ','Something went wrong on server !','inverse');
                        book_save_button.html('Save Book Info &nbsp;<i class="zmdi zmdi-edit"></i>');
                    }
                },
                success: function (data, textStatus, jqXHR) {
                    self.notify('Book info saved successfully','inverse');
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
                            self.notify(obj.error[0],'inverse');
                        }
                        else if (data.status == 500) {
                            self.notify('Opps: Something went wrong on server !','inverse');
                            composition_save_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                        }
                    },
                    success: function (data, textStatus, jqXHR) {
                        self.notify('Composition info saved successfully','inverse');
                        $('.sweet-alert h2').addClass('h2_success');
                        composition_save_button.html('Save Composition Info');
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
                },
                event_place: {
                    required: true
                },
                event_details: {
                    required: true
                }
            },
            messages: {
                event_title: {
                    required: 'Enter event title'
                },
                event_date: {
                    required: 'Enter event date'
                },
                event_place: {
                    required: 'Enter event place'
                },
                event_details: {
                    required: 'Enter event details'
                }
            },
            submitHandler: function (form) {
                var event_title = $('#event_title').val();
                var event_date = $('#event_date').val().split('-').reverse().join('-');
                var event_place=$('#event_place').val();
                var event_details=$('#event_details').val();
                var event_image= "event.jpg";
                var event_status= "Pending";
                var event_save_button = $('#btn-save-event-info');
                var author_id = $('#author_id').val();
                var remember_token = $('#remember_token').val();
                $.ajax({
                    url: self.base_url + "event",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        title: event_title, event_date:event_date,
                        place: event_place,
                         details:event_details,
                        event_pic: event_image,status:event_status, author_id:author_id
                    },
                    headers: {Authorization: remember_token},
                    beforeSend: function () {
                        event_save_button.html('Saving... &nbsp;<i class="zmdi zmdi-edit"></i>');
                    },
                    error: function (data) {
                        console.log(data);
                        var obj = jQuery.parseJSON(data.responseText);//<<----<< this object convert responseText into JSON
                        if (data.status == 422) {
                            self.notify(obj.error[0],'danger');
                        }
                        else if (data.status == 500) {
                            self.notify("Something went wrong on server",'danger');
                            event_save_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                        }
                    },
                    success: function (data, textStatus, jqXHR) {
                        self.notify("Event info saved successfully",'inverse');
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

    showCaseUpload: function () {
        var self = this;
        $("#form_show_case_upload").validate({
            rules: {
                show_case_category: {
                    required: true
                },
                show_case_title: {
                    required: true
                }
            },
            messages: {
                show_case_category: {
                    required: 'Select Book Category'

                },
                show_case_title: {
                    required: 'Enter Book title'
                }
            },
            submitHandler: function (form) {
                var show_case_category = $('#show_case_category').val();
                var show_case_title = $('#show_case_title').val();
                var show_case_book_file= "show_book.pdf";
                var show_case_save_button = $('#btn-save-show-case-info');
                var author_id = $('#author_id').val();
                var remember_token = $('#remember_token').val();
                $.ajax({
                    url: self.base_url + "showcase",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        title: show_case_title, category:show_case_category,
                        book_file: show_case_book_file,status:"Visible", author_id:author_id
                    },
                    headers: {Authorization: remember_token},
                    beforeSend: function () {
                        show_case_save_button.html('Saving... &nbsp;<i class="zmdi zmdi-edit"></i>');
                    },
                    error: function (data) {
                        console.log(data);
                        var obj = jQuery.parseJSON(data.responseText);//<<----<< this object convert responseText into JSON
                        if (data.status == 422) {
                            self.notify(obj.error[0],'danger');
                        }
                        else if (data.status == 500) {
                            self.notify("Something went wrong on server",'danger');
                            show_case_save_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                        }
                    },

                    success: function (data, textStatus, jqXHR) {
                        self.notify("Show case info saved successfully",'inverse');
                        show_case_save_button.html('Save Show Case Info');
                    },

                    complete: function(data) {

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

    getEbookCategory : function() {
        var self=this;
        var auth_token = $('#remember_token').val();
        $.ajax({
            url: self.base_url+"ebook",
            type: 'GET',
            dataType: 'JSON',
            headers:{Authorization : auth_token},
            success:function(data) {
                var result = data.result;
                var results = data.results;
                console.log(data);
                var row;
                for(var i=0;i<results.length;i++) {
                    row="<option value="+results[i].lang+">"+results[i].lang+"</option>";
                    $("#book_language").append(row);
                }
                for(var i=0;i<result.length;i++) {
                    row="<option value="+result[i].book_category+">"+result[i].book_category+"</option>";
                    $("#book_category").append(row);
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
        //<<<---< Download Ebook Count
        var downloads=0;
        $('#ebook_list_info').on('click','.view-ebook',function() {
            downloads++;
            //console.log(downloads);
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
                        //console.log(ebook_table_id);
                        self.notify('Successfully deleted','inverse');
                    },
                    error:function(data) {
                        console.log(data);
                    }
                });
            });
        });

    },

    viewEbookList : function() {
        var self=this;
        var auth_token = $('#remember_token').val();
        var author_id = $('#author_id').val();
        //var ebook_publish_date= $('#publish_date').val();
        $.ajax({
            url: self.base_url+"ebook/"+author_id,
            type: 'GET',
            dataType: 'JSON',
            headers:{Authorization : auth_token},
            success:function(data) {
                var results = data.result;
                //console.log(data);
                var row;
                for(var i=0;i<results.length;i++) {
                    var published_date = results[i].published_at.split('-').reverse().join('-');
                    var s_no=i+1;
                    if(results[i].status=="Panding")
                    {
                        row="<tr><td>"+s_no+"</td><td>"+results[i].title+"</td><td>"+results[i].status+"</td><td>"+published_date+"</td><td>"+results[i].adv_req+"</td><td>"+results[i].file+"</td><td>"+results[i].id+"</td><td>"+results[i].id+"</td></tr>";
                        $("#ebook_list_info").append(row);
                    }
                    else if(results[i].status=="Approved")
                    {
                        row="<tr><td>"+s_no+"</td><td>"+results[i].title+"</td><td>"+results[i].status+"</td><td>"+published_date+"</td><td>"+results[i].adv_req+"</td><td>"+results[i].file+"</td><td>"+results[i].id+"</td><td>"+results[i].id+"</td></tr>";
                        $("#ebook_list_info").append(row);
                    }
                    else
                    {
                        row="<tr><td>"+s_no+"</td><td>"+results[i].title+"</td><td>"+results[i].status+"</td><td>"+published_date+"</td><td>"+results[i].adv_req+"</td><td>"+results[i].file+"</td><td>"+results[i].id+"</td><td>"+results[i].id+"</td></tr>";
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
                        "file_link": function(column, row) {
                            return "<a href=\"" + row.file_attachment + "\" class=\"btn btn-icon command-file view-ebook waves-effect waves-circle\" target='_blank'><i class=\"fa fa-download fa-lg\"></i></a>";
                        },
                        "links": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-delete delete-ebook waves-effect waves-circle\" data-row-id=\"" + row.action + "\"><span class=\"zmdi zmdi-delete\"></span></button>";
                        },
                        "req_approvel": function(column, row) {
                            if(row.advertisement_status==='Requested') {
                                console.log();
                                return "<div class='checkbox'><label><input type=\"checkbox\" checked class=\"btn btn-icon req-advertisement waves-effect waves-circle\"  data-row-id=\"" + row.approvel + "\"><i class=\"input-helper\"></i></input></label></div>";
                            }
                            else {
                                return "<div class='checkbox'><label><input type=\"checkbox\" class=\"btn btn-icon  req-advertisement waves-effect waves-circle\"  data-row-id=\"" + row.approvel + "\"><i class=\"input-helper\"></i></input></label></div>";
                            }
                        }
                    }
                });
            }
        });
        //<<<---< Download Ebook Count
        var downloads=0;
        $('#ebook_list_info').on('click','.view-ebook',function() {
            downloads++;
            //console.log(downloads);
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
                        //console.log(ebook_table_id);
                        self.notify('Successfully deleted','inverse');
                    },
                    error:function(data) {
                        console.log(data);
                    }
                });
            });
        });

        $('#ebook_list_info').on('change','.req-advertisement',function() {
            var checkbox=$(this);
            var ebook_table_id = $(this).attr('data-row-id');
            console.log(ebook_table_id);
            var author_id = $('#author_id').val();
            var status;
            if(checkbox.is(':checked')) {
                status = 'Requested';
            }
            else {
                status = 'Unrequested';
            }
            swal({
                title: "Are you sure?",
                text: "You want to "+status+" for Advertisement !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#4caf50",
                confirmButtonText: "Yes, "+status+" it!",
                closeOnConfirm: true
            }, function() {
                var status;
                if(checkbox.is(':checked')) {
                    status = 'Requested';
                }
                else {
                    status = 'Unrequested';
                }
                $.ajax({
                    url: self.base_url+"ebook/"+ebook_table_id,
                    type: 'PUT',
                    dataType: 'JSON',
                    headers:{Authorization : auth_token},
                    data: {
                        adv_req: status
                    },
                    success:function(data) {
                        self.notify(data.msg,'inverse');
                    },
                    error:function(data) {
                        console.log(data);
                    }
                })
            });
        });
    },

    viewEbookShowCase : function() {
        var self=this;
        var auth_token = $('#remember_token').val();
        $.ajax({
            url: self.base_url+"ebook",
            type: 'GET',
            dataType: 'JSON',
            headers:{Authorization : auth_token},
            success:function(data) {
                var results = data.result;
                //console.log(data);
                var row;
                for(var i=0;i<results.length;i++) {
                    var published_date = results[i].published_at.split('-').reverse().join('-');
                    var s_no=i+1;
                    if(results[i].status=="Panding")
                    {
                        row="<tr><td>"+s_no+"</td><td>"+results[i].title+"</td><td class='td-status-blue'>"+results[i].status+"</td><td>"+published_date+"</td><td>"+results[i].file+"</td><td>"+results[i].id+"</td></tr>";
                        $("#ebook_list_info").append(row);
                    }
                    else if(results[i].status=="Approved")
                    {
                        row="<tr><td>"+s_no+"</td><td>"+results[i].title+"</td><td class='td-status-blue'>"+results[i].status+"</td><td>"+published_date+"</td><td>"+results[i].file+"</td><td>"+results[i].id+"</td></tr>";
                        $("#ebook_list_info").append(row);
                    }
                    else
                    {
                        row="<tr><td>"+s_no+"</td><td>"+results[i].title+"</td><td class='td-status-blue'>"+results[i].status+"</td><td>"+published_date+"</td><td>"+results[i].file+"</td><td>"+results[i].id+"</td></tr>";
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
                        "file_link": function(column, row) {
                            return "<a href=\"" + row.file_attachment + "\" class=\"btn btn-icon command-file view-ebook waves-effect waves-circle\" target='_blank'><i class=\"fa fa-download fa-lg\"></i></a>";
                        },
                        "links": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-delete delete-ebook waves-effect waves-circle\" data-row-id=\"" + row.action + "\"><span class=\"zmdi zmdi-delete\"></span></button>";
                        }
                    }
                });
            }
        });
        //<<<---< Download Ebook Count
        var downloads=0;
        $('#ebook_list_info').on('click','.view-ebook',function() {
            downloads++;
            //console.log(downloads);
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
                        //console.log(ebook_table_id);
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
                        row = "<tr><td>" + s_no + "</td><td>" + results[i].title + "</td><td>" + results[i].about + "</td><td class='td-status-blue'>" + results[i].status + "</td><td>" + published_date + "</td><td>" + results[i].title + "</td><td>" + results[i].id + "</td></tr>";
                        $("#composition_list_info").append(row);
                    }
                    else if(results[i].status=="Approved")
                    {
                        row = "<tr><td>" + s_no + "</td><td>" + results[i].title + "</td><td>" + results[i].about + "</td><td class='td-status-green'>" + results[i].status + "</td><td>" + published_date + "</td><td>" + results[i].title + "</td><td>" + results[i].id + "</td></tr>";
                        $("#composition_list_info").append(row);
                    }
                    else
                    {
                        row = "<tr><td>" + s_no + "</td><td>" + results[i].title + "</td><td>" + results[i].about + "</td><td class='td-status-red'>" + results[i].status + "</td><td>" + published_date + "</td><td>" + results[i].id + "</td></tr>";
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
                        "composition_more": function(column, row) {
                            return "<div class='btn-link'><label>"+row.about_composition.substring(0,45)+"...&nbsp;&nbsp;<span data-desctiption=\""+row.about_composition+"\" data-content=\""+row.about_composition+"\" data-trigger=\"hover\" data-toggle=\"popover\" data-placement=\"bottom\"  aria-describedby='popover288972' class=\"more-description dropdown open\" >more</span></label></div>";
                        },
                        "composition_delete": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-delete delete-composition waves-effect waves-circle\" data-row-id=\"" + row.action + "\"><span class=\"zmdi zmdi-delete\"></span></button>";
                        }
                    }
                });
            },
            complete: function() {
                setTimeout(function() {
                    $('[data-toggle="popover"]').popover();
                },1000);
            }
        });
        $('#composition_list_info').on('hover','.more-description',function(){
            var composition_description=$(this).attr('data-content');
            $('.composition_more_desctiption').html(composition_description);
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
                    row = "<tr><td>" + s_no + "</td><td>"+ results[i].event_pic +"</td><td>" + results[i].title + "</td><td>" + event_date + "</td><td>" + results[i].place + "</td><td>" + results[i].details + "</td><td>" + results[i].status + "</td><td>" + results[i].id + "</td></tr>";
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
                        },
                        "event_image": function(column, row) {
                            return "<div class=\"tab-prev-img-div more-discription-img dropdown open\" data-desctiption=\""+row.event_pic+"\" data-content=\""+row.event_pic+"\" data-trigger=\"click\" data-toggle=\"popover\" data-placement=\"bottom\"  aria-describedby='popover288980' ><img class=\"img img-responsive superbox-current-img \" src=\"" + row.event_image + "\" /></div>";

                        },
                        "event_more": function(column, row) {
                            return "<div class='btn-link'><label>"+row.event_details.substring(0,45)+"...&nbsp;&nbsp;<span data-desctiption=\""+row.event_details+"\" data-content=\""+row.event_details+"\" data-trigger=\"hover\" data-toggle=\"popover\" data-placement=\"bottom\"  aria-describedby='popover288972' class=\"more-description dropdown open\" >more</span></label></div>";
                        }
                    }
                });
            }
        });
        $('#event_list_info').on('click','.delete-event',function() {
            var event_table_id = $(this).attr('data-row-id');
            var author_id = $('#author_id').val();
            //console.log("Auth:" + auth_token);
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
    },

    viewShowCaseList : function() {
        var self=this;
        var auth_token = $('#remember_token').val();
        var author_id = $('#author_id').val();
        var show_case_save_button = $('#btn-save-show-case-info');
            $.ajax({
            url: self.base_url + "showcase/" + author_id,
            type: 'GET',
            dataType: 'JSON',
            headers: {Authorization: auth_token},
            error: function (data) {
                //console.log(auth_token)
                console.log(data);
            },
            success: function (data) {
                //console.log(data);

                var results = data.result;
                //console.log(results[i].status);
                var row;

                 for (var i = 0; i < results.length; i++) {
                     var s_no=i+1;
                     row = "<tr><td>" + s_no + "</td><td>" + results[i].title + "</td><td>" + results[i].category + "</td><td>" + results[i].book_file + "</td><td>" + results[i].status + "</td><td>" + results[i].id + "</td></tr>";
                     $("#show_case_list_info").append(row);
                 }
                $("#data-table-show_case").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    formatters: {
                        "links": function (column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-delete delete-show-case waves-effect waves-circle\" data-row-id=\"" + row.action + "\"><span class=\"zmdi zmdi-delete\"></span></button>";
                        }
                    }
                });
            }
        });


        $('#show_case_list_info').on('click','.delete-show-case',function() {
            var show_case_table_id = $(this).attr('data-row-id');
            var author_id = $('#author_id').val();
            //console.log("Auth:" + auth_token);
            //console.log(show_case_table_id);
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
                    url: self.base_url+"showcase/"+show_case_table_id,
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
    },

    viewTopAuthorsList:function () {
        var self=this;
        var auth_token = $('#remember_token').val();
        $.ajax({
            url: self.base_url+"topauthors",
            type: 'GET',
            dataType: 'JSON',
            headers:{Authorization : auth_token},
            error: function(data) {
                console.log(data);
            },
            success:function(data) {
                //console.log(auth_token);
                var results = data.result;
                //console.log(data.result);
                var row;
                for(var i=0;i<results.length;i++) {
                    var s_no=i+1;
                    var img=self.base_url+'assets/uploads/authors-images/author-'+results[i].id+'.jpg';
                    //var img='assets/uploads/authors-images/author-'+results[i].id+'.jpg';
                    if(results[i].ebook_downloads!=null){
                        row="<tr><td>"+s_no+"</td><td>"+img+"</td><td>"+results[i].name+"</td><td>"+results[i].city+"</td><td>"+results[i].ebook_downloads+"</td></tr>";
                        $("#top_ebook_author_list").append(row);
                    }
                }
                $("#data-table-top-ebook-author").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    formatters: {
                        "author_image": function(column, row) {
                            return "<div class=\"tab-prev-img-div more-discription-author-img dropdown open\" data-desctiption=\""+row.author_pic+"\" data-content=\""+row.author_pic+"\" data-trigger=\"click\" data-toggle=\"popover\" data-placement=\"bottom\"  aria-describedby='popover288980' ><img class=\"img img-responsive pro-img-tab-list \" src=\"" + row.author_image + "\" /></div>";

                        }
                    }
                });
            }
        });
    }
}