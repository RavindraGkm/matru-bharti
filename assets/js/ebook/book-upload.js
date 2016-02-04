var MBJS = MBJS || {};
MBJS.AuthorBook = function (base_url) {
    this.base_url = base_url;
    this.initialize();
    this.last_class = "p0";
};

MBJS.AuthorBook.prototype = {
    initialize: function () {
        this.ebookUpload();
    },

    ebookUpload: function () {
        var self = this;
        $("#btn-save-book-info").validate({
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
                ebook_file: {
                    required: true
                },
                ebook_cover: {
                    required: true
                }
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
                ebook_file: {
                    required: 'Select file'
                },
                ebook_cover: {
                    required: 'Select cover page'
                }
            },
            submitHandler: function (form) {
                var book_language = $('#book_language').val();
                var book_category = $('#book_category').val();
                var file_title = $('#file_title').val();
                var about_book = $('#about_book').val();
                var book_tag = $('#book_tag').val();
                var ebook_file = $('#ebook_file').val();
                var ebook_cover = $('#ebook_cover').val();
                var book_save_button = $('#btn-save-book-info');
                var author_id = $('#author_id').val();
                $.ajax({
                    url: self.base_url + "authors/" + author_id,
                    type: "PUT",
                    dataType: "JSON",
                    data: {
                        language: book_language, category: book_category,
                        title: file_title, about: about_book,
                        tag: book_tag, file: ebook_file, cover: ebook_cover
                    },
                    headers: {Authorization: remember_token},
                    beforeSend: function () {
                        book_save_button.html('Updating... &nbsp;<i class="zmdi zmdi-edit"></i>');
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
    }
}