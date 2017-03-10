module.taxonomy = {
    Submit: function () {
        $('#taxonomy-submit-btn').on( "click", function(e) {
            e.preventDefault();
            var ajaxurl = $(this).parents('form').attr('action');
            var form_data = $($("#taxonomy-form")[0].elements).not("#page_token").serializeArray();
            var ajaxdata = {
                _token: $('#page_token').val(),
                type:'update',
            }
            $(form_data).each(function(index, obj){
                ajaxdata[obj.name] = obj.value;
            });
            var getAjax = module.form.Ajax(ajaxdata,ajaxurl);
            if(typeof getAjax == 'undefined')
                return false;
            getAjax.success(function(data){
                module.form.responseMessage(data);
            }).complete(function() {
                    
            }).error(function() {
                module.form.Alert('error');
            });
        });
    },
    ListAction: function () {
        $('#taxonomy-action-btn').on( "click", function(e) {
            e.preventDefault();
            var ajaxdata = {
                type:'action'
            }
            var ajaxurl = $(this).parents('form').attr('action');
            module.general.ListAction('list',ajaxdata,ajaxurl);
        });
    },
    ListSearch: function () {
        $('#taxonomy-search-btn').on( "click", function(e) {
            e.preventDefault();
            var ajaxdata = {}
            var ajaxurl = $(this).parents('form').attr('action');
            module.general.ListSearch(ajaxdata,ajaxurl);
        });
    },
    init: function () {
        module.form.submitDisable('#taxonomy-form');
        module.taxonomy.Submit();
        module.taxonomy.ListAction();
        module.taxonomy.ListSearch();
    }
}
$(document).ready(function() {
    module.taxonomy.init();
});