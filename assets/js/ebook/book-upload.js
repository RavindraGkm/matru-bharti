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
        this.compositionUpload();
        this.viewEbookList();
        this.viewCompositionList();
    },

    basicSetups : function () {
        // Active tabs
        var active_tab = $("#active_tab_val").val();
        $('#tab_'+active_tab).addClass('active');
        $('#'+active_tab).addClass('active');

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

    ebookUpload: function () {
        var self = this;
        $("#form_ebook_upload").validate({
            rules: {
                book_language: {
                    required: true
                },
                book_category: {
                    required: true
                },
                file_title: {
                    required: true
                },
                about_book: {
                    required: true
                },
                book_tag: {
                    required: true
                },
                //ebook_file: {
                //    required: true
                //},
                //ebook_cover: {
                //    required: true
                //}
            },
            messages: {
                book_language: {
                    required: 'Select language'
                },
                book_category: {
                    required: 'Select Category'
                },
                file_title: {
                    required: 'Enter file title'

                },
                about_book: {
                    required: 'Enter about this book'
                },
                book_tag: {
                    required: 'Enter Tag'
                },
                //ebook_file: {
                //    required: 'Select file'
                //},
                //ebook_cover: {
                //    required: 'Select cover page'
                //}
            },
            submitHandler: function (form) {
                var book_language = $('#book_language').val();
                var book_category = $('#book_category').val();
                var file_title = $('#file_title').val();
                var about_book = $('#about_book').val();
                var book_tag = $('#book_tag').val();
                var ebook_file = "Abc_file";
                var ebook_cover = "Abc_cover";
                var book_save_button = $('#btn-save-book-info');
                var author_id = $('#author_id').val();
                var remember_token = $('#remember_token').val();
                $.ajax({
                    url: self.base_url + "ebook",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        language: book_language, category: book_category,
                        title: file_title, about: about_book,
                        tag: book_tag,author_id:author_id,
                        file: ebook_file, cover: ebook_cover
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
                        book_save_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                    }
                });
            },
            errorPlacement: function (error, element) {
                $(element).closest("form").find("span[data-error-for='" + element.attr("id") + "']").html(error[0].innerHTML).css('opacity', 1);
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('error');
                $(element).closest('li').find('.error-span').css('opacity', 0);
            }
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
                var author_id = $('#author_id').val();
                var remember_token = $('#remember_token').val();
                $.ajax({
                    url: self.base_url + "composition",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        language: composition_language, category: composition_category,
                        title: composition_title, about: about_composition,author_id:author_id
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
                $(element).closest('li').find('.error-span').css('opacity', 0);
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
                console.log(data);
                var results = data.result;
                var row;
                for(var i=0;i<results.length;i++) {
                    row="<tr><td>"+results[i].title+"</td><td>asaksj</td><td>aksjas</td><td>"+results[i].title+"</td><td><a href='http://www.google.co.in/'>Edit</a></td></tr>";
                    $("#ebook_list_info").append(row);
                }
                $("#data-table-basic").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    }
                });
            }
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
                console.log(data);
                var results= data.result;
                var row;
                for(var i=0;i<results.length;i++){
                    row="<tr><td>"+results[i].title+"</td><td>asaksj</td><td>aksjas</td><td>"+results[i].title+"</td><td><a href='http://www.google.co.in/'>Edit</a></td></tr>";
                    $("#composition_list_info").append(row);
                }
                $("#data-table-composition").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    }
                });
            }
        });
    }
}