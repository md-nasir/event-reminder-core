(function($) {
    'use strict';
    $(function() {
        var body = $('body');
        var contentWrapper = $('.content-wrapper');
        var scroller = $('.container-scroller');
        var footer = $('.footer');
        var sidebar = $('.sidebar');

        //Add active class to nav-link based on url dynamically
        //Active class can be hard coded directly in html file also as required

        function addActiveClass(element) {
            try {
                const originalUrl = new URL(element.attr('href'));
                if(typeof(originalUrl) == 'undefined'){
                    return;
                }
                let currentPath = window.location.pathname;
                let originalUrlPath = originalUrl.pathname;
                
                if(currentPath[currentPath.length-1] == '/') {
                    originalUrlPath = originalUrlPath + '/';
                }
                let currentPathParent = currentPath.split('/').slice(0,3).join('/')
                let originalUrlPathParent = originalUrlPath.split('/').slice(0,3).join('/')
                
                if(currentPathParent == originalUrlPathParent){
                    element.parents('.nav-item').last().addClass('active');
            
                    if (element.parents('.sub-menu').length) {
                        element.closest('.collapse').addClass('show');
                        if (currentPath == originalUrlPath || currentPath.indexOf(originalUrlPath+'/') !== -1) {
                            element.addClass('active'); 
                        }
                    }

                    if (currentPath == originalUrlPath || currentPath.indexOf(originalUrlPath+'/') !== -1) {
                        if (currentPath == originalUrlPath) {
                            if (element.parents('.submenu-item').length) {
                                element.addClass('active');
                            }
                        }
                    }
                } 
            
            } catch (error) {
                return ;
            }
            
            return;
        }

        $('.nav li a', sidebar).each(function() {
            var $this = $(this);
            addActiveClass($this);
        })

        //Close other submenu in sidebar on opening any

        sidebar.on('show.bs.collapse', '.collapse', function() {
            sidebar.find('.collapse.show').collapse('hide');
        });

        //Change sidebar

        $('[data-toggle="minimize"]').on("click", function() {
            body.toggleClass('sidebar-icon-only');
        });

        //checkbox and radios
        $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');
    });

    $(document).on('click', '.delete', function(e){
        e.preventDefault();

        var csrf = $('meta[name="csrf-token"]').attr('content');

        var deleteForm = $('<form>', {
            'action' : $(this).attr('href'),
            'method' : 'POST'
        })
        .append('<input type="hidden" name="_method" value="DELETE" />')
        .append('<input type="hidden" name="_token" value="' + csrf + '" />');

        $(document.body).append(deleteForm);

        deleteForm.submit();
    });

    $(document).on('click', 'a#export', function(e){
        e.preventDefault();

        var csrf = $('meta[name="csrf-token"]').attr('content');

        var exportForm = $('<form>', {
            'action' : $(this).attr('href'),
            'method' : 'POST',
            'target' : '_blank'
        })
        .append('<input type="hidden" name="_token" value="' + csrf + '" />');

        $(document.body).append(exportForm);

        exportForm.submit();
    });
})(jQuery);

function previewImage(input, ele) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(ele).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
