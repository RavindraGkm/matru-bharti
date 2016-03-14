var MBJS = MBJS || {};
MBJS.Home = function (base_url) {
    this.base_url = base_url;
    this.initialize();
};

MBJS.Home.prototype = {
    initialize: function () {
        this.basicSetups();
        this.viewShowBookGallery();
        this.viewShowCaseList();
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
        $('#tab_'+active_tab).addClass('active');
        $('#'+active_tab).addClass('active');

        // Uploading setups
        var author_id=$('#author_id').val();
        var remember_token = $('#remember_token').val();

        // Control Panel Radio button Setups
        $('#radio_lang_category').attr("checked","checked");
        $('#radio_event').click(function(){
            $('#section_event').removeClass('hidden');
            $('#section_language_category').addClass('hidden');
        });
        $('#radio_lang_category').click(function(){
            $('#section_event').addClass('hidden');
            $('#section_language_category').removeClass('hidden');
        });

    },
    viewShowBookGallery : function() {
        var self=this;
        var auth_token="32u2s3e4r53e7f9b2c9h0i8idsghdv655";
        $.ajax({
            url: self.base_url + "ebook",
            type: 'GET',
            dataType: 'JSON',
            headers: {Authorization: auth_token},
            error: function (data) {
                console.log(data);
            },
            success: function (data) {
                var results = data.result;
                console.log(data);
                var row;
                for (var i = 0; i < results.length; i++) {
                    row = "<div class='col-md-2 col-sm-4 col-xs-6 c-item' style='margin: 15px;' ><a href='#' class='btn-show-case-gallery' title="+results[i].title+" id="+results[i].id+" ><div class='lightbox-item'><img src="+results[i].cover+" height='120px' /></div></a><div class='c-info' style='text-align: center;padding-top: 6px;'><div><span>Title:&nbsp;&nbsp;</span><span>"+results[i].title.substring(0,14)+"</span></div><div><span>Author:&nbsp;</span><span>"+results[i].author_name+"</span></div></div><hr></div>";
                    $("#div_ebook_gallery").append(row);
                }
            }
        });
    },
    viewShowCaseList : function() {
        var self=this;
        var auth_token="32u2s3e4r53e7f9b2c9h0i8idsghdv655";
        $.ajax({
            url: self.base_url + "showcase",
            type: 'GET',
            dataType: 'JSON',
            headers: {Authorization: auth_token},
            error: function (data) {
                console.log(data);
            },
            success: function (data) {
                var results = data.result;
                console.log(data);
                var row;
                for (var i = 0; i < results.length; i++) {
                    row = "<div data-src="+results[i].book_image+" class='col-md-2 col-sm-4 col-xs-6 c-item' style='margin: 10px;' ><a href='#' class='btn-show-case-gallery' title="+results[i].title+" id="+results[i].id+" ><div class='lightbox-item'><img src="+results[i].book_image+" alt='' /></div></a><div class='c-info' style='text-align: center;padding-top: 6px;'><div><span>Title:&nbsp;&nbsp;</span><span>"+results[i].title.substring(0,14)+"...</span></div><div><span>Author:&nbsp;</span><span>"+results[i].author_name+"</span></div></div><hr></div>";
                    $("#div_book_show_case_gallery").append(row);
                }
            }
        });
    }

}