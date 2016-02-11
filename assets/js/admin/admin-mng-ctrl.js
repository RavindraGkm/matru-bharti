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

    },


    viewEbookList : function() {
        var self=this;
        var auth_token = $('#remember_token').val();
        var author_type= $('#author_type').val();
        var ebook_publish_date= $('#publish_date').val();
        //console.log(auth_token);
        $.ajax({
            url: self.base_url+"ebook",
            type: 'GET',
            dataType: 'JSON',
            headers:{Authorization : auth_token},
            error: function(data) {
                console.log(data);
            },
            success:function(data) {
                //console.log(data);
                var results = data.result;
                var row;
                for(var i=0;i<results.length;i++) {
                    var published_date = results[i].published_at.split('-').reverse().join('-');
                    if(results[i].status=="Pending")
                    {
                        row="<tr><td>"+results[i].title+"</td><td class='td-status-blue'>"+results[i].status+"</td><td>"+published_date+"</td><td>"+results[i].file+"</td><td>"+results[i].id+"</td></tr>";
                        $("#ebook_list_info").append(row);
                    }
                    else if(results[i].status=="Approved") {
                        row="<tr><td>"+results[i].title+"</td><td class='td-status-green'>"+results[i].status+"</td><td>"+published_date+"</td><td>"+results[i].file+"</td><td>"+results[i].id+"</td></tr>";
                        $("#ebook_list_info").append(row);
                    }
                    else
                    {
                        row="<tr><td>"+results[i].title+"</td><td class='td-status-red'>"+results[i].status+"</td><td>"+published_date+"</td><td>"+results[i].file+"</td><td>"+results[i].id+"</td></tr>";
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
                                return "<div class='btn-link'><label><a href=\""+row.file_attachment+"\" class=\"btn btn-icon command-delete approve-ebook waves-effect waves-circle\"><i class=\"fa fa-download fa-lg\"></i></a></label></div>";
                        },
                        "approvel": function(column, row) {
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
            var checkbox=$(this);
            var ebook_table_id = $(this).attr('data-row-id');
            //console.log(ebook_table_id);
            var author_id = $('#author_id').val();

            //if($(this).is(':checked')) {
            //    console.log('Checked');
            //}
            //else {
            //    console.log('Unchecked');
            //}
            swal({
                title: "Are you sure?",
                text: "You want to approve !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#4caf50",
                confirmButtonText: "Yes, Approved it!",
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
        var composition_publish_date=$('#publish_date').val();
        console.log(auth_token);
        $.ajax({
            url: self.base_url+"composition",
            type: 'GET',
            dataType: 'JSON',
            headers:{Authorization : auth_token},
            error: function(data) {
               console.log(data);
            },
            success:function(data){
                //console.log(data);
                var results= data.result;
                var row;
                for(var i=0;i<results.length;i++){
                    var published_date= results[i].published_at.split('-').reverse().join('-');
                    if(results[i].status=="Pending")
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

            console.log(composition_table_id);
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
                    var composition_publish_at= $("#publish_date");
                    $.ajax({
                        url: self.base_url+"admin/"+composition_table_id,
                        type: 'PUT',
                        dataType: 'JSON',
                        headers:{Authorization : auth_token},
                        data: {
                            status: "Approved",
                            published_at:composition_publish_at
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