module.post = {
    ListSearch: function () {
        $('#post-search-btn').on( "click", function(e) {
            e.preventDefault();
            var ajaxdata = {
                type:'search'
            }
            var ajaxurl = $(this).parents('form').attr('action');
            module.general.ListSearch(ajaxdata,ajaxurl);
        });
    },
    GetImage: function () {
        function media_list(data){
            var list = $('#modal-attacment-list');
            if(typeof list !=='undefined' && list !== null && list.length > 0){
                list.html(data);
            }
        }
        $('.set-image').on( "click", function(e) {
            var ajaxurl = $(this).attr('data-action');
            var ajaxdata = {
                _token: $('#page_token').val(),
                type:'get'
            }
            var getAjax = module.form.Ajax(ajaxdata,ajaxurl);
            if(typeof getAjax == 'undefined')
                return false;
            getAjax.success(function(data){
                module.form.responseMessage(data,'',media_list(data));
            }).complete(function() {
                    
            }).error(function() {
                module.form.Alert('error');
            });
        });
    },
    EditorActions: function () {
        $("#action_status").change(function(){
           var post_status = $('#action_status').val();
           $('#post_status').val(post_status);
           $('#post-search-input').val('');
           $("#post-form").submit();
        });
    },
    EditorActions: function () {
        $('.change-comment-status').click( function() {
            var mymisc = $(this).parent().find("select option:selected");
            var text = mymisc.text();
            var status = mymisc.val();
            $('#hidden_post_comment').val(status);
            alert(text);
            console.log(text);
        });
    },
    EditorAddCategory: function () {
        $('#category-add-submit').click( function() {
            var ajaxdata = {
                _token: $('#page_token').val(),
                catName: $('#newcategory').val(),
                parentID: $('#newcategory-parent').val()
            }
            var ajaxurl = $('#posteditor').attr('action');
            var getAjax = module.form.Ajax(ajaxdata,ajaxurl);
            if(typeof getAjax == 'undefined')
                return false;
            getAjax.success(function(data){
                if(typeof data !== 'undefined' && data.length > 5){
                    $('ul.category-checklist').prepend(data);
                    //var History = window.History;
                    //History.pushState({Type:str}, 'Attachment', "?type="+str);
                    //var State = History.getState();
                    //History.log('statechange:'+State.title, State.data, State.title, State.url);
                    //$('.attachment-list').html(data);            
                }else {
                    module.form.Alert('error');                    
                }
            }).complete(function() {
                    
            }).error(function() {
                module.form.Alert('error');
            });
        });
    },
    init: function () {
        //module.form.submitDisable('#post-form');
        //module.post.ListSearch();
        module.post.GetImage();
        module.post.EditorActions();
        module.plugins.tags();
        module.post.EditorAddCategory();
    }
}
$(document).ready(function() {
    module.post.init();
});