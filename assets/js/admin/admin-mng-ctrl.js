var MBJS = MBJS || {};
MBJS.AdminControlPanel = function (base_url) {
    this.base_url = base_url;
    this.initialize();
};

MBJS.AdminControlPanel.prototype = {
    initialize: function () {
        this.basicSetups();
        this.viewEbookList();
        this.viewCompositionList();
        this.viewAuthorsList();
        this.viewEventList();
        this.viewShowCaseList();
        this.addCategoryLanguage();
        this.eventUpload();
        this.termConditionUpload();
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
        $('#radio_about_ctrl').attr("checked","checked");
        $('#radio_event').click(function(){
            $('#section_event').removeClass('hidden');
            $('#section_language_category').addClass('hidden');
            $('#section_condition').addClass('hidden');
            $('#section_about_msg').addClass('hidden');
        });
        $('#radio_lang_category').click(function(){
            $('#section_event').addClass('hidden');
            $('#section_language_category').removeClass('hidden');
            $('#section_condition').addClass('hidden');
            $('#section_about_msg').addClass('hidden');
        });
        $('#radio_about_ctrl').click(function(){
            $('#section_event').addClass('hidden');
            $('#section_language_category').addClass('hidden');
            $('#section_condition').addClass('hidden');
            $('#section_about_msg').removeClass('hidden');
        });
        $('#radio_condition').click(function(){
            $('#section_event').addClass('hidden');
            $('#section_language_category').addClass('hidden');
            $('#section_about_msg').addClass('hidden');
            $('#section_condition').removeClass('hidden');
            $('#radio_add_condition').attr("checked","checked");
        });
        $('#radio_add_condition').click(function(){
            $('#section-add-new-condition').removeClass('hidden');
            $(".section-edit-condition").addClass('hidden');
        });
        $('#radio_edit_condition').click(function(){
            $('.section-edit-condition').removeClass('hidden');
            $('#section-add-new-condition').addClass('hidden');
        });

        $('.edit-about-english').click(function(){
            $('#message_english').removeAttr('disabled');
        });

        $('.edit-about-hindi').click(function(){
            $('#message_hindi').removeAttr('disabled');
        });
    },

    viewEbookList : function() {
        var self=this;
        var auth_token = $('#remember_token').val();
        var author_type= $('#author_type').val();
        var ebook_publish_date= $('#publish_date').val();
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
                    var s_no=i+1;
                    var published_date = results[i].published_at.split('-').reverse().join('-');
                    var adv_start_date = results[i].adv_start_date.split('-').reverse().join('-');
                    if(results[i].status=="Pending")
                    {
                        row="<tr><td>"+s_no+"</td><td>"+results[i].title+"</td><td>"+results[i].author_name+"</td><td class='td-status-blue'>"+results[i].status+"</td><td>"+published_date+"</td><td>"+adv_start_date+"</td><td>"+results[i].adv_req+"</td><td>"+results[i].adv_status+"</td><td>"+results[i].no_downloads+"</td><td>"+results[i].file+"</td><td>"+results[i].id+"</td><td>"+results[i].id+"</td></tr>";
                        $("#ebook_list_info").append(row);
                    }
                    else if(results[i].status=="Approved") {
                        row="<tr><td>"+s_no+"</td><td>"+results[i].title+"</td><td>"+results[i].author_name+"</td><td class='td-status-green'>"+results[i].status+"</td><td>"+published_date+"</td><td>"+adv_start_date+"</td><td>"+results[i].adv_req+"</td><td>"+results[i].adv_status+"</td><td>"+results[i].no_downloads+"</td><td>"+results[i].file+"</td><td>"+results[i].id+"</td><td>"+results[i].id+"</td></tr>";
                        $("#ebook_list_info").append(row);
                    }
                    else
                    {
                        row="<tr><td>"+s_no+"</td><td>"+results[i].title+"</td><td>"+results[i].author_name+"</td><td class='td-status-red'>"+results[i].status+"</td><td>"+published_date+"</td><td>"+adv_start_date+"</td><td>"+results[i].adv_req+"</td><td>"+results[i].adv_status+"</td><td>"+results[i].no_downloads+"</td><td>"+results[i].file+"</td><td>"+results[i].id+"</td><td>"+results[i].id+"</td></tr>";
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
                        //"downloads": function(column, row) {
                        //    return "<span class='div_no_download' text=\"" + row.file_downloads + "\"></span>";
                        //},
                        "links": function(column, row) {
                                //return "<div class='btn-link'><label><a href=\""+row.file_attachment+"\" target='_blank' class=\"btn btn-icon command-delete download-ebook waves-effect waves-circle\"><i class=\"fa fa-download fa-lg\"></i></a></label></div>";
                                return "<div class='btn-link'><label><a href=\"#\" data-row-download=\"" + row.file_downloads + "\" data-row-id=\"" + row.action + "\" class=\"btn btn-icon command-delete download-ebook waves-effect waves-circle\"><i class=\"fa fa-download fa-lg\"></i></a></label></div>";
                        },
                        "approvel": function(column, row) {
                            if(row.file_published_status==='Approved') {
                                console.log();
                                return "<div class='checkbox'><label><input type=\"checkbox\" checked class=\"btn btn-icon command-delete approve-ebook waves-effect waves-circle\"  data-row-id=\"" + row.action + "\"><i class=\"input-helper\"></i></input></label></div>";
                            }
                            else {
                                return "<div class='checkbox'><label><input type=\"checkbox\" class=\"btn btn-icon command-delete approve-ebook waves-effect waves-circle\"  data-row-id=\"" + row.action + "\"><i class=\"input-helper\"></i></input></label></div>";
                            }
                        },
                        "add_approvel": function(column, row) {
                            if(row.adv_status==='Approved') {
                                return "<div class='checkbox'><label><input type=\"checkbox\" checked class=\"btn btn-icon approve-advertisement waves-effect waves-circle\"  data-row-id=\"" + row.add_approve + "\"><i class=\"input-helper\"></i></input></label></div>";
                            }
                            else {
                                return "<div class='checkbox'><label><input type=\"checkbox\" class=\"btn btn-icon approve-advertisement waves-effect waves-circle\"  data-row-id=\"" + row.add_approve + "\"><i class=\"input-helper\"></i></input></label></div>";
                            }
                        }
                    }
                });
            }
        });
        //<<<------<< adv. approvel
        $('#ebook_list_info').on('change','.approve-advertisement',function() {
            var checkbox=$(this);
            var adv_aprove_id = $(this).attr('data-row-id');
            console.log(adv_aprove_id);
            var author_id = $('#author_id').val();
            var status;
            if(checkbox.is(':checked')) {
                status = 'Approved';
            }
            else {
                status = 'Pending';
            }
            swal({
                title: "Are you sure?",
                text: "You want to "+status+" !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#4caf50",
                confirmButtonText: "Yes, "+status+" it!",
                closeOnConfirm: true
            }, function() {
                var status;
                if(checkbox.is(':checked')) {
                    adv_status = 'Approved';
                }
                else {
                    adv_status = 'Pending';
                }
                $.ajax({
                    url: self.base_url+"ebook/"+adv_aprove_id,
                    type: 'PUT',
                    dataType: 'JSON',
                    headers:{Authorization : auth_token},
                    data: {
                        adv_status: adv_status,
                        //published_at: ebook_publish_date
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
        //<<<------<< ebook approvel functionality
        $('#ebook_list_info').on('click','.download-ebook',function() {
            var ebook_download = $(this).attr('data-row-download');
            var ebook_id = $(this).attr('data-row-id');
            ebook_download ++;
            var author_id = $('#author_id').val();
            var status;
            $.ajax({
                url: self.base_url+"ebook/"+ebook_id,
                type: 'PUT',
                dataType: 'JSON',
                headers:{Authorization : auth_token},
                data: {
                    no_downloads: ebook_download
                },
                success:function(data) {

                },
                error:function(data) {
                    console.log(data);
                }
            })
        });

        //<<<------<< ebook approvel functionality
        $('#ebook_list_info').on('change','.approve-ebook',function() {
            var checkbox=$(this);
            var ebook_table_id = $(this).attr('data-row-id');
            //console.log(ebook_table_id);
            var author_id = $('#author_id').val();
            var status;
            if(checkbox.is(':checked')) {
                status = 'Approved';
            }
            else {
                status = 'Pending';
            }
            //if($(this).is(':checked')) {
            //    console.log('Checked');
            //}
            //else {
            //    console.log('Unchecked');
            //}
            swal({
                title: "Are you sure?",
                text: "You want to "+status+" !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#4caf50",
                confirmButtonText: "Yes, "+status+" it!",
                closeOnConfirm: true
            }, function() {
                var status;
                if(checkbox.is(':checked')) {
                    status = 'Approved';
                }
                else {
                    status = 'Pending';
                }
                $.ajax({
                    url: self.base_url+"ebook/"+ebook_table_id,
                    type: 'PUT',
                    dataType: 'JSON',
                    headers:{Authorization : auth_token},
                    data: {
                        status: status,
                        published_at: ebook_publish_date
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

    viewCompositionList : function() {
        var self=this;
        var auth_token = $('#remember_token').val();
        var author_type= $('#author_type').val();
        $.ajax({
            url: self.base_url+"composition",
            type: 'GET',
            dataType: 'JSON',
            headers:{Authorization : auth_token},

            error: function(data) {
                console.log(data);
                console.log(auth_token);
            },
            success:function(data) {
                var results = data.result;
                var row;
                for(var i=0;i<results.length;i++) {
                    var s_no=i+1;
                    var published_date = results[i].published_at.split('-').reverse().join('-');
                    if(results[i].status=="Pending")
                    {
                        row="<tr><td>"+s_no+"</td><td>"+results[i].title+"</td><td>"+results[i].about+"</td><td>"+results[i].author_name+"</td><td>"+results[i].status+"</td><td>"+published_date+"</td><td>"+results[i].id+"</td></tr>";
                        $("#composition_list_info").append(row);
                    }
                    else if(results[i].status=="Approved") {
                        row="<tr><td>"+s_no+"</td><td>"+results[i].title+"</td><td>"+results[i].about+"</td><td>"+results[i].author_name+"</td><td>"+results[i].status+"</td><td>"+published_date+"</td><td>"+results[i].id+"</td></tr>";
                        $("#composition_list_info").append(row);
                    }
                    else
                    {
                        row="<tr><td>"+s_no+"</td><td>"+results[i].title+"</td><td>"+results[i].about+"</td><td>"+results[i].author_name+"</td><td>"+results[i].status+"</td><td>"+published_date+"</td><td>"+results[i].id+"</td></tr>";
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
                            return "<div class='btn-link'><label>"+row.about_composition.substring(0,30)+"...&nbsp;&nbsp;<span data-desctiption=\""+row.about_composition+"\" data-content=\""+row.about_composition+"\" data-trigger=\"hover\" data-toggle=\"popover\" data-placement=\"bottom\"  aria-describedby='popover288972' class=\"more-description dropdown open\" >more</span></label></div>";
                        },
                        "approvel": function(column, row) {
                            if(row.file_published_status==='Approved') {
                                console.log();
                                return "<div class='checkbox'><label><input type=\"checkbox\" checked class=\"btn btn-icon command-delete approve-ebook waves-effect waves-circle\"  data-row-id=\"" + row.action + "\"><i class=\"input-helper\"></i></input></label></div>";
                            }
                            else {
                                return "<div class='checkbox'><label><input type=\"checkbox\" class=\"btn btn-icon command-delete approve-ebook waves-effect waves-circle\"  data-row-id=\"" + row.action + "\"><i class=\"input-helper\"></i></input></label></div>";
                            }
                            $('[data-toggle="popover"]').popover();
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
        //<<<------<< composition approvel functionality
        $('#composition_list_info').on('change','.approve-ebook',function() {
            var checkbox=$(this);
            var composition_table_id = $(this).attr('data-row-id');
            //console.log(composition_table_id);
            var author_id = $('#author_id').val();
            var status;
            if(checkbox.is(':checked')) {
                status = 'Approved';
            }
            else {
                status = 'Pending';
            }
            swal({
                title: "Are you sure?",
                text: "You want to "+status+" !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#4caf50",
                confirmButtonText: "Yes, "+status+" it!",
                closeOnConfirm: true
            }, function() {

                $.ajax({
                    url: self.base_url+"composition/"+composition_table_id,
                    type: 'PUT',
                    dataType: 'JSON',
                    headers:{Authorization : auth_token},
                    data: {
                        status: status
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

    viewAuthorsList:function () {
        var self=this;
        var auth_token = $('#remember_token').val();
        var author_id = $('#author_id').val();
        $.ajax({
            url: self.base_url+"authors",
            type: 'GET',
            dataType: 'JSON',
            headers:{Authorization : auth_token},
            error: function(data) {
                console.log(data);
            },
            success:function(data) {
                //console.log(auth_token);
                var results = data.result;
                console.log(data.result);
                var row;
                for(var i=0;i<results.length;i++) {
                    var s_no=i+1;
                    var img='assets/uploads/authors-images/author-'+results[i].id+'.jpg';
                    //var img=self.base_url+'assets/uploads/authors-images/author-'+results[i].id+'.jpg';
                    var download;
                    var composition_seen;
                    if(results[i].ebook_download==null){
                        download="0";
                    }
                    else{
                        download=results[i].ebook_download;
                    }
                    if(results[i].composition_seen==null){
                        composition_seen="0";
                    }
                    else{
                        composition_seen=results[i].composition_seen;
                    }


                    row="<tr><td>"+s_no+"</td><td>"+img+"</td><td>"+results[i].name+"</td><td>"+results[i].address+"</td><td>"+results[i].city+"</td><td>"+results[i].mobile+"</td><td>"+results[i].no_ebooks+"</td><td>"+download+"</td><td>"+results[i].no_compositions+"</td><td>"+composition_seen+"</td><td>"+results[i].email.substring(0,15)+"</td><td>"+results[i].status+"</td><td>"+results[i].id+"</td><td>"+results[i].id+"</td></tr>";
                    $("#authors_list_info").append(row);

                }
                $("#data-table-authors").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    formatters: {
                        "links": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-delete delete-author waves-effect waves-circle\" data-row-id=\"" + row.action + "\"><span class=\"zmdi zmdi-delete\"></span></button>";
                        },
                        "author_image": function(column, row) {
                            return "<div class=\"tab-prev-img-div dropdown open\"><a href=\"#\" class=\"my_modal_test\" data-row-id=\"" + row.action + "\"><img class=\"img img-responsive pro-img-tab-list \" src=\"" + row.author_image + "\" /></a></div>";

                        },
                        "approvel": function(column, row) {
                            if(row.author_status==='Approved') {
                                console.log();
                                return "<div class='checkbox'><label><input type=\"checkbox\" checked class=\"btn btn-icon command-delete approve-author waves-effect waves-circle\"   data-row-id=\"" + row.approvel + "\"><i class=\"input-helper\"></i></input></label></div>";
                            }
                            else {
                                return "<div class='checkbox'><label><input type=\"checkbox\" class=\"btn btn-icon command-delete approve-author waves-effect waves-circle\"  data-row-id=\"" + row.approvel + "\"><i class=\"input-helper\"></i></input></label></div>";
                            }
                        }
                    }
                });
            }

        });
        //<<<------<< Author approvel functionality
        $('#authors_list_info').on('change','.approve-author',function() {
            var checkbox=$(this);
            var author_table_id = $(this).attr('data-row-id');
            console.log(author_table_id);
            var author_id = $('#author_id').val();
            var status;
            if(checkbox.is(':checked')) {
                status = 'Approved';
            }
            else {
                status = 'Pending';
            }
            swal({
                title: "Are you sure?",
                text: "You want to "+status+" !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#4caf50",
                confirmButtonText: "Yes, "+status+" it!",
                closeOnConfirm: true
            }, function() {

                $.ajax({
                    url: self.base_url+"authors/"+author_table_id,
                    type: 'PUT',
                    dataType: 'JSON',
                    headers:{Authorization : auth_token},
                    data: {
                        status: status
                    },
                    beforesend:function(data) {
                        console.log(auth_token);
                    },
                    success:function(data) {
                            self.notify("Author Status Updated Successfully",'inverse');
                    },
                    error:function(data) {
                        console.log(data);
                    }
                })
            });
        });
        //<<<------<< Delete author functionality
        $('#authors_list_info').on('click','.delete-author',function() {
            var author_id = $(this).attr('data-row-id');
            console.log(author_id);
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
                    url: self.base_url+"authors/"+author_id,
                    type: 'DELETE',
                    dataType: 'JSON',
                    headers:{Authorization : auth_token},
                    success:function(data) {
                        self.notify('Successfully deleted','inverse');
                    },
                    error:function(data) {
                        console.log(data);
                    }
                });
            });
        });

        $('#authors_list_info').on('click','.my_modal_test',function(e){
            e.preventDefault();
            $("#myModal").modal('show');
            var author_id=$(this).attr('data-row-id');
            console.log(author_id);
            $.ajax({
                url: self.base_url+"authors/"+author_id,
                type: 'GET',
                dataType: 'JSON',
                headers:{Authorization : auth_token},
                success:function(data) {
                    console.log(data);
                    $('#auth_pic_id').val(data.result.id);
                    $('#div_pro_img').html('<img height="230" width="200" src='+"assets/uploads/authors-images/author-"+data.result.id+".jpg"+'>');
                    $('#author_email').html(data.result.email);
                    $('#author_mobile').html(data.result.mobile);
                    $('.span-auth-name').html(data.result.name);
                    $('.span-auth-hindi-name').html(data.result.hindi_name);
                    $('#h2_name').html(data.result.name);
                    $('#span-auth-address').html(data.result.address);
                    $('#span-auth-city').html(data.result.city);
                    $('#span-auth-dob').html(data.result.dob.split('-').reverse().join('-'));
                    $('#span-auth-about').html(data.result.about);
                    $('#span_total_ebooks').html(data.result.no_ebooks);
                    $('#span_total_composition').html(data.result.no_compositions);
                    if(data.result.ebook_download!=null && data.result.composition_seen!=null) {
                        $('#span_ebooks_download').html(data.result.ebook_download);
                        $('#span_composition_seen').html(data.result.composition_seen);
                    }
                    else if(data.result.ebook_download!=null && data.result.composition_seen==null) {
                        $('#span_ebooks_download').html(data.result.ebook_download);
                        $('#span_composition_seen').html("0");
                    }
                    else if(data.result.ebook_download==null && data.result.composition_seen!=null) {
                        $('#span_ebooks_download').html("0");
                        $('#span_composition_seen').html(data.result.composition_seen);
                    }
                    else {
                        $('#span_ebooks_download').html("0");
                        $('#span_composition_seen').html("0");
                    }
                },
                error:function(data) {
                    console.log(data);
                }
            });
        })
    },

    viewEventList : function() {
        var self=this;
        var auth_token = $('#remember_token').val();
        var author_type= $('#author_type').val();
        $.ajax({
            url: self.base_url+"event",
            type: 'GET',
            dataType: 'JSON',
            headers:{Authorization : auth_token},
            error: function(data) {
                console.log(data);
            },
            success:function(data) {
                //console.log(data);
                var results= data.result;
                var row;
                for(var i=0;i<results.length;i++){
                    var event_date= results[i].event_date.split('-').reverse().join('-');
                    var s_no=i+1;
                    row = "<tr><td>" + s_no + "</td><td>"+results[i].event_pic + "</td><td>" + results[i].title + "</td><td>" + event_date + "</td><td>" + results[i].details + "</td><td>" + results[i].status + "</td><td>" + results[i].id + "</td><td>" + results[i].id + "</td></tr>";
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
                        "action": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon command-delete delete-event waves-effect waves-circle\" data-row-id=\"" + row.action + "\"><i class=\"zmdi zmdi-delete\"></i></button>";
                        },
                        "event_image": function(column, row) {
                            return "<div class=\"tab-prev-img-div dropdown open\"><a href=\"#\" class=\"my_modal_event\" data-row-id=\"" + row.action + "\"><img class=\"img img-responsive superbox-current-img \" src=\"" + row.event_image + "\" /></a></div>";
                            $('[data-toggle="popover"]').popover();
                        },
                        "event_more": function(column, row) {
                            return "<div class='btn-link'><label>"+row.event_details.substring(0,45)+"...&nbsp;&nbsp;<span data-desctiption=\""+row.event_details+"\" data-content=\""+row.event_details+"\" data-trigger=\"hover\" data-toggle=\"popover\" data-placement=\"bottom\"  aria-describedby='popover288982' class=\"more-description event-more-details dropdown open\" >more</span></label></div>";
                        },
                        "approvel": function(column, row) {
                            if(row.event_status==='Approved') {
                                console.log();
                                return "<div class='checkbox'><label><input type=\"checkbox\" checked class=\"btn btn-icon command-delete approve-event waves-effect waves-circle\"  data-row-id=\"" + row.approvel + "\"><i class=\"input-helper\"></i></input></label></div>";
                            }
                            else {
                                return "<div class='checkbox'><label><input type=\"checkbox\" class=\"btn btn-icon command-delete approve-event waves-effect waves-circle\"  data-row-id=\"" + row.approvel + "\"><i class=\"input-helper\"></i></input></label></div>";
                            }
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
        $('#event_list_info').on('hover','.event-more-details',function(){
            var event_details=$(this).attr('data-content');
            $('.event-details-popover').html(event_details);
        });
        //<<<------<< event approvel functionality
        $('#event_list_info').on('change','.approve-event',function() {
            var checkbox=$(this);
            var event_table_id = $(this).attr('data-row-id');
            console.log(event_table_id);
            var author_id = $('#author_id').val();
            var status;
            if(checkbox.is(':checked')) {
                status = 'Approved';
            }
            else {
                status = 'Pending';
            }
            swal({
                title: "Are you sure?",
                text: "You want to "+status+" !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#4caf50",
                confirmButtonText: "Yes, "+status+" it!",
                closeOnConfirm: true
            }, function() {

                $.ajax({
                    url: self.base_url+"event/"+event_table_id,
                    type: 'PUT',
                    dataType: 'JSON',
                    headers:{Authorization : auth_token},
                    data: {
                        status: status
                    },
                    beforesend:function(data) {
                        console.log(auth_token);
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
        $('#event_list_info').on('click','.delete-event',function() {
            var event_table_id = $(this).attr('data-row-id');
            var author_id = $('#author_id').val();
            console.log("Auth:" + auth_token);
            console.log(event_table_id);
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
                    url: self.base_url+"admin/"+event_table_id,
                    type: 'DELETE',
                    dataType: 'JSON',
                    headers:{Authorization : auth_token},
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
        $('#event_list_info').on('click','.my_modal_event',function(e){
            e.preventDefault();
            $("#myModalEvent").modal('show');
            var event_id=$(this).attr('data-row-id');
            console.log(event_id);
            $.ajax({
                url: self.base_url+"event/"+event_id,
                type: 'GET',
                dataType: 'JSON',
                headers:{Authorization : auth_token},
                success:function(data) {
                    console.log(data);
                    $('#div_event_img').html('<img height="230" width="200" src='+data.result.event_pic+'>');
                    $('.span-event-title').html(data.result.title);
                    $('#span-event-title').html(data.result.title+" on "+data.result.event_date.split('-').reverse().join('-'));
                    $('.span-event-date').html(data.result.event_date.split('-').reverse().join('-'));
                    $('#span-event-place').html(data.result.place);
                    $('#span-event-author-name').html(data.result.author_name);
                    $('#span-event-author-mobile').html("+91 "+data.result.author_contact);
                    $('#span-event-details').html(data.result.details);
                },
                error:function(data) {
                    console.log(data);
                }
            });
        })

    },

    viewShowCaseList : function() {
        var self=this;
        var auth_token = $('#remember_token').val();
        var author_type= $('#author_type').val();
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
                    var row;
                    for (var i = 0; i < results.length; i++) {
                        var s_no = i + 1;
                        row = "<tr><td>" + s_no + "</td><td>" + results[i].title + "</td><td>" + results[i].category + "</td><td>" + results[i].book_file + "</td><td>" + results[i].status + "</td><td>" + results[i].id + "</td><td>" + results[i].id + "</td></tr>";
                        $("#show_case_list_info").append(row);

                    }
                    $(".data-table-show-case").bootgrid({
                        css: {
                            icon: 'zmdi icon',
                            iconColumns: 'zmdi-view-module',
                            iconDown: 'zmdi-expand-more',
                            iconRefresh: 'zmdi-refresh',
                            iconUp: 'zmdi-expand-less'
                        },
                        formatters: {
                            "delete": function (column, row) {
                                return "<button type=\"button\" class=\"btn btn-icon command-delete delete-show-case waves-effect waves-circle\" data-row-id=\"" + row.book_show_case_delete + "\"><i class=\"zmdi zmdi-delete\"></i></button>";
                            },
                            "access": function (column, row) {

                                if (row.book_files_status === 'Approved') {
                                    console.log();
                                    return "<div class='checkbox'><label><input type=\"checkbox\" checked class=\"btn btn-icon command-delete access-show-case waves-effect waves-circle\"  data-row-id=\"" + row.access + "\"><i class=\"input-helper\"></i></input></label></div>";
                                }
                                else {
                                    return "<div class='checkbox'><label><input type=\"checkbox\" class=\"btn btn-icon command-delete access-show-case waves-effect waves-circle\"  data-row-id=\"" + row.access + "\"><i class=\"input-helper\"></i></input></label></div>";
                                }
                            }

                        }
                    });
                    for (var i = 0; i < results.length; i++) {
                        row = "<a href='#' class='btn-show-case-gallery' id="+results[i].id+" ><div data-src="+results[i].book_image+" class='col-md-2 col-sm-4 col-xs-6'><div class='lightbox-item'><img src="+results[i].book_image+" alt='' /></div></div></a>";
                        $("#div_book_show_case_gallery").append(row);
                    }
                }
            });
        $('.data-table-show-case').on('change','.access-show-case',function() {
            var checkbox=$(this);
            var access_show_case_table_id = $(this).attr('data-row-id');
            //console.log(access_show_case_table_id);
            var author_id = $('#author_id').val();
            var status;
            if(checkbox.is(':checked')) {
                status = 'Approved';
            }
            else {
                status = 'Pending';
            }
            swal({
                title: "Are you sure?",
                text: "You want to "+status+" !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#4caf50",
                confirmButtonText: "Yes, "+status+" it!",
                closeOnConfirm: true
            }, function() {

                $.ajax({
                    url: self.base_url+"showcase/"+access_show_case_table_id,
                    type: 'PUT',
                    dataType: 'JSON',
                    headers:{Authorization : auth_token},
                    data: {
                        status: status
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
        $('#show_case_list_info').on('click','.delete-show-case',function() {
            var show_case_table_id = $(this).attr('data-row-id');
            var author_id = $('#author_id').val();
            console.log("Auth:" + auth_token);
            console.log(show_case_table_id);
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
        $('#div_book_show_case_gallery').on('click','.btn-show-case-gallery',function(e){
            e.preventDefault();
            $("#show_case_modal").modal('show');
            var show_case_id=$(this).attr('id');
            console.log(show_case_id);
            $.ajax({
                url: self.base_url+"imageshowcase/"+show_case_id,
                type: 'GET',
                dataType: 'JSON',
                headers:{Authorization : auth_token},
                success:function(data) {
                    $('#div_show_case_img').html('<img height="220" width="200" src='+data.result.book_image+'>');
                    $('.span_show_case_title').html(data.result.title);
                    $('.span_show_case_author_name').html(data.result.author_name);
                    $('.span_show_case_author_contact').html("+91 "+data.result.author_contact);
                    $('.span_show_case_author_email').html(data.result.author_email);
                },
                error:function(data) {
                    console.log(data);
                }
            });
        })
    },

    addCategoryLanguage: function () {
        var self = this;
        $("#btn-save-lang").click(function(){
            var lang = $('#book_language').val();
            var language_save_button = $('#btn-save-lang');
            var author_id = $('#author_id').val();
            var remember_token = $('#remember_token').val();
            $.ajax({
                url: self.base_url + "admin",
                type: "POST",
                dataType: "JSON",
                data: {
                    lang: lang
                },
                headers: {Authorization: remember_token},
                beforeSend: function () {
                    language_save_button.html('Saving... &nbsp;<i class="zmdi zmdi-edit"></i>');
                },
                error: function (data) {
                    console.log(data);
                    var obj = jQuery.parseJSON(data.responseText);//<<----<< this object convert responseText into JSON
                    if (data.status == 422) {
                        self.notify(obj.error[0],'danger');
                    }
                    else if (data.status == 500) {
                        self.notify("Something went wrong on server",'danger');
                        language_save_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                    }
                },
                success: function (data, textStatus, jqXHR) {
                    self.notify("Language inserted successfully",'inverse');
                    language_save_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                }
            });
        });

        $("#btn-save-book-category").click(function(){
            var book_category = $('#book_category').val();
            var book_category_save_button = $('#btn-save-book-category');
            var author_id = $('#author_id').val();
            var remember_token = $('#remember_token').val();
            $.ajax({
                url: self.base_url + "admin",
                type: "POST",
                dataType: "JSON",
                data: {
                    book_category: book_category
                },
                headers: {Authorization: remember_token},
                beforeSend: function () {
                    book_category_save_button.html('Saving... &nbsp;<i class="zmdi zmdi-edit"></i>');
                },
                error: function (data) {
                    console.log(data);
                    var obj = jQuery.parseJSON(data.responseText);//<<----<< this object convert responseText into JSON
                    if (data.status == 422) {
                        self.notify(obj.error[0],'danger');
                    }
                    else if (data.status == 500) {
                        self.notify("Something went wrong on server",'danger');
                        book_category_save_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                    }
                },
                success: function (data, textStatus, jqXHR) {
                    self.notify("Book Category inserted successfully",'inverse');
                    book_category_save_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                }
            });
        });

        $("#btn-save-composition-category").click(function(){
            var composition_category = $('#composition_category').val();
            var composition_category_save_button = $('#btn-save-composition-category');
            var author_id = $('#author_id').val();
            var remember_token = $('#remember_token').val();
            $.ajax({
                url: self.base_url + "admin",
                type: "POST",
                dataType: "JSON",
                data: {
                    category: composition_category
                },
                headers: {Authorization: remember_token},
                beforeSend: function () {
                    composition_category_save_button.html('Saving... &nbsp;<i class="zmdi zmdi-edit"></i>');
                },
                error: function (data) {
                    console.log(data);
                    var obj = jQuery.parseJSON(data.responseText);//<<----<< this object convert responseText into JSON
                    if (data.status == 422) {
                        self.notify(obj.error[0],'danger');
                    }
                    else if (data.status == 500) {
                        self.notify("Something went wrong on server",'danger');
                        composition_category_save_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                    }
                },
                success: function (data, textStatus, jqXHR) {
                    self.notify("Composition Category inserted successfully",'inverse');
                    composition_category_save_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                }
            });
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
                        self.notify("Event add successfully",'inverse');
                        event_save_button.html('Save Event info');
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

    termConditionUpload: function () {
        var self=this;
        var auth_token = $('#remember_token').val();
        var author_type= $('#author_type').val();
        $.ajax({
            url: self.base_url+"terms_cond",
            type: 'GET',
            dataType: 'JSON',
            headers:{Authorization : auth_token},
            error: function(data) {
                console.log(data);
            },
            success:function(data) {
                console.log(data);
                var results= data.result;
                var row;
                for(var i=0;i<results.length;i++){
                    var s_no=i+1;
                    row = "<tr><td>" + s_no + "</td><td>"+results[i].terms_english + "</td><td>" + results[i].terms_hindi + "</td><td>" + results[i].id + "</td></tr>";
                    $("#terms_list_info").append(row);

                }
                $("#data-table-terms").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    formatters: {
                        "action": function(column, row) {
                            return "<button type=\"button\" class=\"btn btn-icon edit-terms-condition  waves-effect waves-circle\" title='Edit' data-eng-term=\"" +row.english_terms+ "\" data-hindi-term=\"" +row.hindi_terms+ "\" data-row-id=\"" + row.action + "\"><i class=\"zmdi zmdi-edit\"></i></button>";
                        }
                    }
                });
            }
        });
        var terms_table_id
        $('#terms_list_info').on('click','.edit-terms-condition',function() {
            var checkbox=$(this);
            terms_table_id = $(this).attr('data-row-id');
            $('#edit_eng_condition').val($(this).attr('data-eng-term'));
            $('#edit_hindi_condition').val($(this).attr('data-hindi-term'));
            console.log(terms_table_id);

            var author_id = $('#author_id').val();
        });

        $("#btn-update-condition").click(function() {
            var edit_term_english = $('#edit_eng_condition').val();
            var edit_term_hindi=$('#edit_hindi_condition').val();
            var terms_update_button = $('#btn-update-condition');
            var remember_token = $('#remember_token').val();
            //var id=17;
            $.ajax({
                url: self.base_url + "terms_cond/"+terms_table_id,
                type: "PUT",
                dataType: "JSON",
                data: {
                    terms_english: edit_term_english, terms_hindi:edit_term_hindi
                },
                headers: {Authorization: remember_token},
                beforeSend: function () {
                    terms_update_button.html('Updating... &nbsp;<i class="zmdi zmdi-edit"></i>');
                },
                error: function (data) {
                    console.log(data);
                    var obj = jQuery.parseJSON(data.responseText);
                    if (data.status == 422) {
                        self.notify(obj.error[0],'danger');
                    }
                    else if (data.status == 500) {
                        self.notify("Something went wrong on server",'danger');
                        terms_update_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                    }
                },
                success: function (data, textStatus, jqXHR) {
                    self.notify("Terms Updated successfully",'inverse');
                    terms_update_button.html('Update Codition');
                }
            });
        });

        $("#btn-save-condition").click(function(){
            var term_english = $('#txt_eng_condition').val();
            var term_hindi = $('#txt_hindi_condition').val();
            var terms_add_button = $('#btn-save-condition');
            var author_id = $('#author_id').val();
            var remember_token = $('#remember_token').val();
            $.ajax({
                url: self.base_url + "terms_cond",
                type: "POST",
                dataType: "JSON",
                data: {
                    terms_english: term_english,
                    terms_hindi: term_hindi
                },
                headers: {Authorization: remember_token},
                beforeSend: function () {
                    terms_add_button.html('Saving... &nbsp;<i class="zmdi zmdi-edit"></i>');
                },
                error: function (data) {
                    console.log(data);
                    var obj = jQuery.parseJSON(data.responseText);//<<----<< this object convert responseText into JSON
                    if (data.status == 422) {
                        self.notify(obj.error[0],'danger');
                    }
                    else if (data.status == 500) {
                        self.notify("Something went wrong on server",'danger');
                        terms_add_button.html('Save &nbsp;<i class="zmdi zmdi-edit"></i>');
                    }
                },
                success: function (data, textStatus, jqXHR) {
                    self.notify("New terms inserted successfully",'inverse');
                    terms_add_button.html('Save Codition');
                }
            });
        });
    }

}