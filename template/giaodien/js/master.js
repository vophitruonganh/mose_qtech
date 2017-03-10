(function($) {
  	var getHash = function () {
    	return window.location.hash;
    };
    var updateHash = function (hash) {
        window.location.hash = '#' + hash;
        $('#' + hash).attr('tabindex', -1).focus();
    };
  	$(function(){
      	$('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { 
        	e.stopPropagation(); 
      	});
      	$(document.body).on('click', '[data-toggle="dropdown"]' ,function(){
        	if(!$(this).parent().hasClass('open') && this.href && this.href != '#'){
          		window.location.href = this.href;
        	}
      	});
    })
	$(document).ready(function() {
        apollo.init();
				
	AP_Search.init();
				
    });
		
  	var apollo = {
      	isFilterAjaxClick: false,
      	init: function() {
        	this.loginForms();
          	//this.initFilter();
        },
      	loginForms: function() {
            function showRecoverPasswordForm() {
                $('#RecoverPasswordForm').show();
                $('#CustomerLoginForm').hide();
            }
            function hideRecoverPasswordForm() {
                $('#RecoverPasswordForm').hide();
                $('#CustomerLoginForm').show();
            }
            $('#RecoverPassword').on('click', function(evt) {
                evt.preventDefault();
                showRecoverPasswordForm();
            });
            $('#HideRecoverPasswordLink').on('click', function(evt) {
                evt.preventDefault();
                hideRecoverPasswordForm();
            });
            if (getHash() == '#recover') {
                showRecoverPasswordForm();
            }
        },
      	resetPasswordSuccess: function() {
            $('#ResetSuccess').show();
        },
      	showLoading: function() {
            $('#loading').show();
        },
        hideLoading: function() {
            $('#loading').hide();
        },
      	initFilter: function() {
            apollo.filterMapSidebar();
        }
    }
    
})(jQuery);