module.account = {
	RecoverySendToken: function () {
		$('#recbtn').click( function(e) {
			e.preventDefault();
			var ajaxdata = {
                _token: $('#page_token').val(),
				email: $('#recEmail').val()
			}
            var ajaxurl = $('#recoveryForm').attr('action');
            var getAjax = module.form.Ajax(ajaxdata,ajaxurl);
            if(typeof getAjax == 'undefined')
            	return false;
            getAjax.success(function(data){
                if(typeof data !== 'undefined' && data.length > 5 && module.form.isJson(data)){
                	var objdata = $.parseJSON(data);
                	if(objdata.Response == 'True'){
                		$('#recoveryForm').remove();
                		module.form.Alert(objdata.Message,'success');
                		$('.btn-back.hidden').removeClass('hidden');
                	}else if(objdata.Response == 'False'){
                		module.form.Alert(objdata.Message,'error');
                	}                    
                }else {
                    module.form.Alert('default','error');                    
                }
            }).complete(function() {
					
            }).error(function() {
                module.form.Alert('default','error');
            });
		});
	},
	RecoverySetPass: function () {
		$('#respassbtn').click( function(e) {
			e.preventDefault();
			var ajaxdata = {
                _token: $('#page_token').val(),
				password: $('#pass').val(),
				password_confirmation: $('#cpass').val()
			}
            var ajaxurl = $('#resetpassForm').attr('action');
            var getAjax = module.form.Ajax(ajaxdata,ajaxurl);
            if(typeof getAjax == 'undefined')
            	return false;
            getAjax.success(function(data){
                if(typeof data !== 'undefined' && data.length > 5 && module.form.isJson(data)){
                	var objdata = $.parseJSON(data);
                	if(objdata.Response == 'True'){
                		$('#resetpassForm').remove();
                		module.form.Alert(objdata.Message,'success');
                		$('.btn-back.hidden').removeClass('hidden');
                	}else if(objdata.Response == 'False'){
                		module.form.Alert(objdata.Message,'error');
                	}                    
                }else {
                    module.form.Alert('default','error');                    
                }
            }).complete(function() {
					
            }).error(function() {
                module.form.Alert('default','error');
            });
		});
	},
    init: function () {
        module.account.RecoverySendToken();
        module.account.RecoverySetPass();
    }
}
$(document).ready(function() {
    module.account.init();
});