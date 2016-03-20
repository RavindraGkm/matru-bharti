var MBJS = MBJS || {};
MBJS.Terms = function (base_url) {
    this.base_url = base_url;
    this.initialize();
    this.last_class = "p0";
};

MBJS.Terms.prototype = {
    initialize: function () {
        //this.ebookUpload();
        this.viewTermsMessage();
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
                },
                complete: function (data) {
                    //if(window.top==window) {
                    //    window.setTimeout('location.reload()', 5000);
                    //}
                }
            });
        });
    },

    viewTermsMessage : function() {
        var self=this;
        $.ajax({
            url: self.base_url+"terms",
            type: 'GET',
            dataType: 'JSON',
            success:function(data) {
                var results = data.result;
                console.log(data);
                var row;
                //for(var i=0;i<results.length;i++) {
                //    var s_no=i+1;
                //    row="<tr><td>"+s_no+"</td><td>"+results[i].title+"</td><td class='td-status-blue'>"+results[i].status+"</td><td>"+results[i].file+"</td><td>"+results[i].id+"</td></tr>";
                //    $("#ebook_list_info").append(row);
                //}
                //$("#data-table-basic").bootgrid({
                //
                //});
            }
        });
    }

}
