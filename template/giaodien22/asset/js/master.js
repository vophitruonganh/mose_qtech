//(function($) {
//  var getHash = function () {
//    return window.location.hash;
//  };
//  var updateHash = function (hash) {
//    window.location.hash = '#' + hash;
//    $('#' + hash).attr('tabindex', -1).focus();
//  };
//  $(function(){
//    $('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { 
//      e.stopPropagation(); 
//    });
//    $(document.body).on('click', '[data-toggle="dropdown"]' ,function(){
//      if(!$(this).parent().hasClass('open') && this.href && this.href != '#'){
//        window.location.href = this.href;
//      }
//    });
//  })
//  $(document).ready(function() {
//        apollo.init();
//        
//        AP_Search.init();
//         
//    });
//    var AP_Search = {
//      init : function(){
//        this.ajaxSearch();
//      },
//      ajaxProductItems : function(){
//        var result = new Array();
//        var search_url = '/collections/all?view=ajax';
//
//        $.ajax({
//          type: 'GET',
//          url: search_url,
//          success: function (data) {
//
//            data = '<div>' + data + '</div>';
//            data = data.trim();
//
//            var elements = $(data).find('.aps-ajax');
//
//            if( 0 < elements.length ){
//              elements.each(function() {
//
//                var title = $.trim(this.getAttribute('data-title'));
//                var price = $.trim(this.getAttribute('data-price'));
//                var handle = $.trim(this.getAttribute('data-handle'));
//                var image = $.trim(this.getAttribute('data-img'));
//
//                var item = new Object();
//                item.title = title;
//                item.price = price;
//                item.handle = handle;
//                item.featured_image = image;
//
//                result.push(item);
//              });
//            }else{
//              //todo : return not found here
//            }  
//
//          },
//          dataType: 'html'
//        });
//
//        return result;
//      }
//    
//      ,ajaxSearch : function(){
//        var products = AP_Search.ajaxProductItems();
//        $( "#search_query_top" ).keyup(function() {
//          var $this = $(this);
//          var keyword = $this.val().toLowerCase();
//          $('#ap-ajax-search').hide();          
//          console.log(keyword);
//          if(keyword.length >= 2){
//            $(this).removeClass('error warning valid').addClass('valid');
//
//            var result = $('#ap-ajax-search .aps-results').empty();
//
//            var j = 0;
//
//            for (var i = 0; i < products.length; i++) {
//
//              var item = products[i];
//
//              var title = item.title;
//              var price = item.price;
//              var handle = item.handle;
//              var image = item.featured_image;
//
//              if(title.toLowerCase().indexOf(keyword) > -1){
//
//                var j = j + 1;
//
//                var markedString = title.replace(new RegExp('(' + keyword + ')', 'gi'), '<span class="marked">$1</span>');
//
//                var template = '<li class="product-block"><a class="product_img_link" href="/products/'+ handle +'">'+ '<img style="max-width: 80px; float: left;margin-right: 5px" src="' + image + '" />' 
//                +'</a><a class="product-name" href="/products/'+ handle +'">'+ markedString +'</a><div class="content_price"><span class="price product-price">'+ price + '</span></div></li>';
//
//                if(j <= 10 ){
//                  result.append(template);
//                }
//
//              }
//            }
//
//            if($('#ap-ajax-search .aps-results li').length < 1){
//              result.append('<li><p>Không tìm thấy sản phẩm</p></li>')
//            }
//
//            if($('#ap-ajax-search .aps-results li').length){
//              $('#ap-ajax-search').show();              
//            }
//
//          }else{
//
//            if(keyword.length == 1){
//              $(this).removeClass('error warning valid').addClass('error');
//              //todo : change the place holder to notice customer
//
//              var text = '<li><p>Cần nhập 2 ký tự trở lên.</p></li>';
//              var result = $('#ap-ajax-search .aps-results').empty();
//              result.append(text);
//              $('#ap-ajax-search').show();
//            }
//            else{
//              $('#ap-ajax-search').hide();
//            }
//          }
//        });
//
//        $(document).on('click','#page_content',function(e){
//          $('#ap-ajax-search').hide();
//        });
//      }
//    }
//    var apollo = {
//        isFilterAjaxClick: false,
//        init: function() {
//          this.loginForms();
//            //this.initFilter();
//        },
//        loginForms: function() {
//            function showRecoverPasswordForm() {
//                $('#RecoverPasswordForm').show();
//                $('#CustomerLoginForm').hide();
//            }
//            function hideRecoverPasswordForm() {
//                $('#RecoverPasswordForm').hide();
//                $('#CustomerLoginForm').show();
//            }
//            $('#RecoverPassword').on('click', function(evt) {
//                evt.preventDefault();
//                showRecoverPasswordForm();
//            });
//            $('#HideRecoverPasswordLink').on('click', function(evt) {
//                evt.preventDefault();
//                hideRecoverPasswordForm();
//            });
//            if (getHash() == '#recover') {
//                showRecoverPasswordForm();
//            }
//        },
//        resetPasswordSuccess: function() {
//            $('#ResetSuccess').show();
//        },
//        showLoading: function() {
//            $('#loading').show();
//        },
//        hideLoading: function() {
//            $('#loading').hide();
//        },
//        initFilter: function() {
//            apollo.filterMapSidebar();
//        }
//    }
//    
//})(jQuery);