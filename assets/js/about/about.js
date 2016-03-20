var MBJS = MBJS ||{};
MBJS.About=function(base_url){
    this.base_url=base_url;
    this.initialize();
};

MBJS.About.prototype = {
    initialize:function() {
        this.basicSetup();
        this.getAboutUs();
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

    basicSetup: function() {
        Waves.attach('.waves', 'waves-light');
        Waves.init();
    },

    getAboutUs: function () {
        var self = this;
        //var about_id = 1;
        $.ajax({
            url: self.base_url + "aboutus",
            type: 'GET',
            dataType: 'JSON',
            error: function(data) {
                console.log(data);
            },
            success:function(data) {
                console.log(data);
                $('#image-auth').html("<div class='pull-right'><div style='border: 1px double #444; padding: 5px; border-radius: 3px'><img src="+data.result.image+" height="+160+" width="+135+"/></div><div>Mr.&nbsp;"+data.result.name+"</div><div style='font-size: 11px; font-weight: 600' >"+data.result.email+"</div><div style='font-weight: 400' >+91-"+data.result.contact+"</div></div>");
            }
        });
    }
};