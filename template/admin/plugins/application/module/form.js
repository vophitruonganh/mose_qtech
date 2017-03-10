module.form = {
	submitDisable: function(selector) {
		// $(selector).on('keyup keypress', function(e) {
		// var keyCode = e.keyCode || e.which;
		// if (keyCode === 13) { 
		//     e.preventDefault();
		//     return false;
		//   }
		// });
		$(selector).submit(function(e) {
			e.preventDefault();
			return false;
		});
	},
	ListCheckall: function () {
	    $(".data-list").on('change', '#checkall', function(){
	    	$(".pcb").prop('checked', $(this).prop("checked"));
	    });
	},
	URLParameter: function(key, value) {
	    //var sep = (window.location.href.indexOf('?') > -1) ? '&' : '?';
	    //var newurl = window.location.href + sep + key + '=' + value;
	    var myUrl = window.location.href;
	    var re = new RegExp("([?&]" + key + "=)[^&]+", "");
	    if (myUrl.indexOf("?") === -1) {
	        myUrl += "?" + key + "=" + encodeURIComponent(value);
	    } else {
	        if (re.test(myUrl)) { myUrl = myUrl.replace(re, "$1" + encodeURIComponent(value)); } else { myUrl += "&" + key + "=" + encodeURIComponent(value); }
	    }
	    History.pushState({state:History.getStateId()+1},document.title,myUrl);
    	//var State = History.getState();
    	//History.log('statechange:'+State.title, State.data, State.title, State.url);
	    return myUrl;
	},
	getUrlVars: function() {
		var vars = [], hash;
	    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	    for(var i = 0; i < hashes.length; i++)
	    {
	        hash = hashes[i].split('=');
	        vars.push(hash[0]);
	        vars[hash[0]] = hash[1];
	    }
	    return vars;
	},
	Alert: function (type,text,title) {
		$('.form-alerts').empty();
		if(title !== undefined && title !== null){
			title = '<strong>'+title+'</strong> ';
		}else {
			title = '';
		}
		if(type== 'success'){
			if(text !== undefined && text !== null){
				$('.form-alerts').html('<div class="alert alert-success" role="alert">'+title+text+'</div>');
			}
		}else if(type== 'warning'){
			if(text !== undefined && text !== null){
				$('.form-alerts').html('<div class="alert alert-warning" role="alert">'+title+text+'</div>');
			}
		}else if(type== 'error'){
			if(text !== undefined && text !== null){
				$('.form-alerts').html('<div class="alert alert-danger" role="alert">'+title+text+'</div>');
			}else {
				$('.form-alerts').html('<div class="alert alert-danger" role="alert">Đã có lỗi xảy ra trong quá trình xử lý!</div>');
			}			
		}
	},
	Ajax: function (content,url,type) {
		var contenttype = 'application/x-www-form-urlencoded; charset=UTF-8';
		var processdata = true;
		if(type=='upload'){
			contenttype = false;
			processdata = false;
		}
        if(content !== undefined && content !== null && url !== undefined && url !== null){
 			var ajaxSubmit = $.ajax({
				type: 'POST',
				url: url,
				data: content,
				dataType: 'text',
                contentType: contenttype,
                processData: processdata,
				beforeSend: function() {
				    if ($("#pageload-bar").length === 0) {
  						$("body").append("<div id='pageload-bar'></div>")
  						$("#pageload-bar").addClass("waiting").append($("<dt/><dd/>"));
  						$("#pageload-bar").width((50 + Math.random() * 30) + "%"); 
   					}
				},          
				success: function(string){},
				complete: function() {},
				error: function() {}
            
 			}).always(function() {
				$("#pageload-bar").width("101%").delay(200).fadeOut(400, function() {
				    $(this).remove();
				});
 			}).done(function(data) {});
            return ajaxSubmit;
  		}
    },
    isJson: function (item) {
	    item = typeof item !== "string"
	        ? JSON.stringify(item)
	        : item;
	    try {
	        item = JSON.parse(item);
	    } catch (e) {
	        return false;
	    }
	    if (typeof item === "object" && item !== null) {
	        return true;
	    }
	    return false;
	},
	formatBytes: function(bytes,decimals) {
	   if(bytes == 0) return '0 Byte';
	   var k = 1000;
	   var dm = decimals + 1 || 3;
	   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
	   var i = Math.floor(Math.log(bytes) / Math.log(k));
	   return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
	},
	keyAction: function(type,elmGet,elmAction){
		$(elmGet).keypress(function(e){
			if(type=='enter'){
		        if(e.which == 13){
		            $(elmAction).click();
		        }
		    }
	    });
	},
	taxonomyCheckbox: function(){
		var selected = new Array();
		$(".taxonomy-checklist input:checkbox:checked").each(function(){
			selected.push($(this).val());
		});
		return selected;
	},
	tableAction: function(){
		var selected = new Array();
		$("input.pcb:checkbox:checked").each(function(){
			selected.push($(this).val());
		});
		return selected;
	},
	responseMessage: function (data,message,callback) {
		$('.form-alerts').empty();
		if(typeof data !== 'undefined' && data.length > 5 && module.form.isJson(data)){
			var objdata = $.parseJSON(data);
			if (typeof objdata.Redirect !=='undefined' && objdata.Redirect !== null){
        			window.location.href = objdata.Redirect;
        	}else if(objdata.Response == 'True'){
        		if(message !== undefined && message !== null && message !== ''){
        			module.form.Alert('success',message);
        		}else if (typeof objdata.Message !=='undefined' && objdata.Message !== null && objdata.Message !== ''){
        			module.form.Alert('success',objdata.Message);
        		}
        	}else if(objdata.Response == 'False'){
        		if(message !== undefined && message !== null){
        			module.form.Alert('error',message);
        		}else if (typeof objdata.Message !=='undefined' && objdata.Message !== null){
        			module.form.Alert('error',objdata.Message);
        		}else {
        			module.form.Alert('error');
        		}
        	}
        	if(typeof ocallback !=='undefined' && callback !== null){
        		callback
        	}
		}else {
			module.form.Alert('error');
		}
	},
	ListTableData: function (data,message) {
		$('.form-alerts').empty();
		if(typeof data !== 'undefined' && data.length > 5 && module.form.isJson(data)){
        	var objdata = $.parseJSON(data);
        	if(objdata.Response == 'True'){
        		if(message !== undefined && message !== null && message !== ''){
        			module.form.Alert(message,'success');
        		}else if (typeof objdata.Message !=='undefined' && objdata.Message !== null && objdata.Message !== ''){
        			module.form.Alert(objdata.Message,'success');
        		}
        		if (typeof objdata.Redirect !=='undefined' && objdata.Redirect !== null){
        			window.location.href = objdata.Redirect;
        		}else {
        			$('.data-list').html(module.php.urldecode(objdata.List));
	        		$('#pagination').html(module.php.urldecode(objdata.Page));
        		}
        		return true;
        	}else if(objdata.Response == 'False'){
        		if(message !== undefined && message !== null && message !== ''){
        			module.form.Alert(message,'error');
        		}else if (typeof objdata.Message !=='undefined' && objdata.Message !== null){
        			module.form.Alert(objdata.Message,'error');
        		}else {
        			module.form.Alert('error');
        		}
        	}                    
        }else {
            module.form.Alert('error');             
        }
        return false;
	},
	ListTable: function(ajaxdata,ajaxurl,stateobj,message){
        var getAjax = module.form.Ajax(ajaxdata,ajaxurl);
        if(typeof getAjax == 'undefined')
        	return false;
        getAjax.success(function(data){
        	if(stateobj !== undefined && stateobj !== null && stateobj !== '' && typeof stateobj !== 'undefined' && typeof stateobj === 'object')
	        	// History.pushState({Search:urlquery}, 'Attachment', "?search="+urlquery);
			    History.pushState(stateobj["StateName"], stateobj["Title"], stateobj["URL"]);
        	return module.form.ListTableData(data,message);
        }).complete(function() {
				
        }).error(function() {
            module.form.Alert('error');
        });
        return getAjax;
	},
    init: function () {
    	module.form.ListCheckall();
    	module.form.keyAction('enter','.list-search-input','.list-search-btn');
    }
}
$(document).ready(function() {
    module.form.init();
});