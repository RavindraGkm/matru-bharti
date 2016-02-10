var MBJS = MBJS || {};
MBJS.AdminControlPanel = function (base_url) {
    this.base_url = base_url;
    this.initialize();
    this.last_class = "p0";
};

MBJS.AdminControlPanel.prototype = {
    initialize: function () {
        this.basicSetups();
        this.viewProfileInfo();
        this.viewEbookList();
        this.viewCompositionList();
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
                $('#author_type').val(data.result.type);
            }
        });
    },

    viewEbookList : function() {
        var self=this;
        var auth_token = $('#remember_token').val();
        var author_type= $('#author_type').val();
        $.ajax({
            url: self.base_url+"ebook",
            type: 'GET',
            dataType: 'JSON',
            headers:{Authorization : auth_token},
            error: function(data) {
                console.log(data);
            },
            success:function(data) {
                console.log(data);
                var results = data.result;
                var row;
                for(var i=0;i<results.length;i++) {
                    var published_date = results[i].published_at.split('-').reverse().join('-');

                    if(results[i].status=="Panding")
                    {
                        row="<tr><td>"+results[i].title+"</td><td class='td-status-blue'>"+results[i].status+"</td><td>"+published_date+"</td><td><a href="+results[i].file+"></a></td><td>"+results[i].id+"</td></tr>";
                        $("#ebook_list_info").append(row);
                    }
                    else if(results[i].status=="Approved")
                    {
                        row="<tr><td>"+results[i].title+"</td><td class='td-status-green'>"+results[i].status+"</td><td>"+published_date+"</td><td><a href="+results[i].file+"></a></td><td>"+results[i].id+"</td></tr>";
                        $("#ebook_list_info").append(row);
                    }
                    else
                    {
                        row="<tr><td>"+results[i].title+"</td><td class='td-status-red'>"+results[i].status+"</td><td>"+published_date+"</td><td><a href="+results[i].file+"></a></td><td>"+results[i].id+"</td></tr>";
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
                            if(row.file_published_status==='Approved') {
                                console.log();
                                return "<div class='checkbox'><label><input type=\"checkbox\" checked class=\"btn btn-icon command-delete approve-ebook waves-effect waves-circle\"  data-row-id=\"" + row.action + "\"><i class=\"input-helper\"></i></input></label></div>";
                            }
                            else {
                                return "<div class='checkbox'><label><input type=\"checkbox\" class=\"btn btn-icon command-delete approve-ebook waves-effect waves-circle\"  data-row-id=\"" + row.action + "\"><i class=\"input-helper\"></i></input></label></div>";
                            }
                        }
                    }
                });
            }
        });
        //<<<------<< ebook approvel functionality
        $('#ebook_list_info').on('change','.approve-ebook',function() {
            var ebook_table_id = $(this).attr('data-row-id');
            console.log(ebook_table_id);
            var author_id = $('#author_id').val();
            swal({
                title: "Are you sure?",
                text: "You want to approve !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#4caf50",
                confirmButtonText: "Yes, Approved it!",
                closeOnConfirm: true
            }, function() {
                setTimeout(function(){
                    $.ajax({
                        url: self.base_url+"admin/"+ebook_table_id,
                        type: 'PUT',
                        dataType: 'JSON',
                        headers:{Authorization : auth_token},
                        data: {
                            status: "Approved"
                        },
                        success:function(data) {
                            self.notify('Successfully Approved','inverse');
                        },
                        error:function(data) {
                            console.log(data);
                        }
                    })
                });

            });
        });
    },

    viewCompositionList : function() {
        var self=this;
        var auth_token = $('#remember_token').val();
        $.ajax({
            url: self.base_url+"admin",
            type: 'GET',
            dataType: 'JSON',
            headers:{Authorization : auth_token},
            success:function(data){
                //console.log(data);
                var results= data.result;
                var row;
                for(var i=0;i<results.length;i++){
                    var published_date= results[i].published_at.split('-').reverse().join('-');
                    if(results[i].status=="Panding")
                    {
                        row = "<tr><td>" + results[i].title + "</td><td class='td-status-blue'>" + results[i].status + "</td><td>" + published_date + "</td><td>" + results[i].title + "</td><td>" + results[i].id + "</td></tr>";
                        $("#composition_list_info").append(row);
                    }
                    else if(results[i].status=="Approved")
                    {
                        row = "<tr><td>" + results[i].title + "</td><td class='td-status-green'>" + results[i].status + "</td><td>" + published_date + "</td><td>" + results[i].title + "</td><td>" + results[i].id + "</td></tr>";
                        $("#composition_list_info").append(row);
                    }
                    else
                    {
                        row = "<tr><td>" + results[i].title + "</td><td class='td-status-red'>" + results[i].status + "</td><td>" + published_date + "</td><td>" + results[i].title + "</td><td>" + results[i].id + "</td></tr>";
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
                            if(row.file_published_status==='Approved') {
                                console.log();
                                return "<div class='checkbox'><label><input type=\"checkbox\" checked class=\"btn btn-icon command-delete approve-composition waves-effect waves-circle\"  data-row-id=\"" + row.action + "\"><i class=\"input-helper\"></i></input></label></div>";
                            }
                            else {
                                return "<div class='checkbox'><label><input type=\"checkbox\" class=\"btn btn-icon command-delete aapprove-composition waves-effect waves-circle\"  data-row-id=\"" + row.action + "\"><i class=\"input-helper\"></i></input></label></div>";
                            }
                        }
                    }
                });
            }
        });
        //<<<------<< Composition approvel functionality
        $('#composition_list_info').on('change','.approve-composition',function() {
            var composition_table_id = $(this).attr('data-row-id');
            //console.log(composition_table_id);
            var author_id = $('#author_id').val();
            swal({
                title: "Are you sure?",
                text: "You want to approve !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#4caf50",
                confirmButtonText: "Yes, Approved it!",
                closeOnConfirm: true
            }, function() {
                setTimeout(function(){
                    $.ajax({
                        url: self.base_url+"admin/"+composition_table_id,
                        type: 'PUT',
                        dataType: 'JSON',
                        headers:{Authorization : auth_token},
                        data: {
                            status: "Approved"
                        },
                        success:function(data) {
                            self.notify('Successfully Approved','inverse');
                        },
                        error:function(data) {
                            console.log(data);
                        }
                    })
                });

            });
        });
    }
}