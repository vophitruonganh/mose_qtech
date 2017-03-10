"use strict";
var module = {};
module.php = {
	urlencode: function (str) {
		str = (str + '');
		return encodeURIComponent(str)
		.replace(/!/g, '%21')
		.replace(/'/g, '%27')
		.replace(/\(/g, '%28')
		.replace(/\)/g, '%29')
		.replace(/\*/g, '%2A')
		.replace(/%20/g, '+');
	},
	urldecode: function (str) {
  		return decodeURIComponent((str + '')
    	.replace(/%(?![\da-f]{2})/gi, function () {
      		// PHP tolerates poorly formed escape sequences
      		return '%25'
    	})
    	.replace(/\+/g, '%20'));
	},
	json_encode: function (mixedVal) { 
		// eslint-disable-line camelcase
		var $global = (typeof window !== 'undefined' ? window : GLOBAL);
		$global.$locutus = $global.$locutus || {};
		var $locutus = $global.$locutus;
		$locutus.php = $locutus.php || {};

		var json = $global.JSON;
		var retVal;
		try {
			if (typeof json === 'object' && typeof json.stringify === 'function') {
				// Errors will not be caught here if our own equivalent to resource
				retVal = json.stringify(mixedVal);
				if (retVal === undefined) {
					throw new SyntaxError('json_encode');
				}
				return retVal;
			}
			var value = mixedVal;
			var quote = function (string) {
				var escapeChars = [
					'\u0000-\u001f',
					'\u007f-\u009f',
					'\u00ad',
					'\u0600-\u0604',
					'\u070f',
					'\u17b4',
					'\u17b5',
					'\u200c-\u200f',
					'\u2028-\u202f',
					'\u2060-\u206f',
					'\ufeff',
					'\ufff0-\uffff'
				].join('');
				var escapable = new RegExp('[\\"' + escapeChars + ']', 'g');
				var meta = {
					// table of character substitutions
					'\b': '\\b',
					'\t': '\\t',
					'\n': '\\n',
					'\f': '\\f',
					'\r': '\\r',
					'"': '\\"',
					'\\': '\\\\'
				}
				escapable.lastIndex = 0;
				return escapable.test(string) ? '"' + string.replace(escapable, function (a) {
					var c = meta[a]
					return typeof c === 'string' ? c : '\\u' + ('0000' + a.charCodeAt(0).toString(16)).slice(-4)
				}) + '"' : '"' + string + '"';
			}

			var _str = function (key, holder) {
				var gap = ''
				var indent = '    '
				// The loop counter.
				var i = 0
				// The member key.
				var k = ''
				// The member value.
				var v = ''
				var length = 0
				var mind = gap
				var partial = []
				var value = holder[key]

				// If the value has a toJSON method, call it to obtain a replacement value.
				if (value && typeof value === 'object' && typeof value.toJSON === 'function') {
					value = value.toJSON(key)
				}

				// What happens next depends on the value's type.
				switch (typeof value) {
					case 'string':
						return quote(value)
					case 'number':
						// JSON numbers must be finite. Encode non-finite numbers as null.
						return isFinite(value) ? String(value) : 'null'

					case 'boolean':
					case 'null':
						// If the value is a boolean or null, convert it to a string. Note:
						// typeof null does not produce 'null'. The case is included here in
						// the remote chance that this gets fixed someday.
						return String(value)

					case 'object':
						// If the type is 'object', we might be dealing with an object or an array or
						// null.
						// Due to a specification blunder in ECMAScript, typeof null is 'object',
						// so watch out for that case.
						if (!value) {
							return 'null'
						}

						// Make an array to hold the partial results of stringifying this object value.
						gap += indent;
						partial = []

						// Is the value an array?
						if (Object.prototype.toString.apply(value) === '[object Array]') {
							// The value is an array. Stringify every element. Use null as a placeholder
							// for non-JSON values.
							length = value.length;
							for (i = 0; i < length; i += 1) {
								partial[i] = _str(i, value) || 'null';
							}

							// Join all of the elements together, separated with commas, and wrap them in
							// brackets.
							v = partial.length === 0 ? '[]' : gap ? '[\n' + gap + partial.join(',\n' + gap) + '\n' + mind + ']' : '[' + partial.join(',') + ']';
							gap = mind;
							return v;
						}

						// Iterate through all of the keys in the object.
						for (k in value) {
							if (Object.hasOwnProperty.call(value, k)) {
								v = _str(k, value);
								if (v) {
									partial.push(quote(k) + (gap ? ': ' : ':') + v);
								}
							}
						}

						// Join all of the member texts together, separated with commas,
						// and wrap them in braces.
						v = partial.length === 0 ? '{}' : gap ? '{\n' + gap + partial.join(',\n' + gap) + '\n' + mind + '}' : '{' + partial.join(',') + '}';
						gap = mind;
						return v;
					case 'undefined':
					case 'function':
					default:
					throw new SyntaxError('json_encode');
				}
			}

			// Make a fake root object containing our value under the key of ''.
			// Return the result of stringifying the value.
			return _str('', {
				'': value
			})
		} catch (err) {
			// @todo: ensure error handling above throws a SyntaxError in all cases where it could
			// (i.e., when the JSON global is not available and there is an error)
			if (!(err instanceof SyntaxError)) {
				throw new Error('Unexpected error type in json_encode()');
			}
			// usable by json_last_error()
			$locutus.php.last_error_json = 4
			return null;
		}
	},
	json_decode: function (strJson) { 
		var $global = (typeof window !== 'undefined' ? window : GLOBAL);
		$global.$locutus = $global.$locutus || {};
		var $locutus = $global.$locutus;
		$locutus.php = $locutus.php || {};

		var json = $global.JSON;
		if (typeof json === 'object' && typeof json.parse === 'function') {
			try {
				return json.parse(strJson);
			} 
			catch (err) {
				if (!(err instanceof SyntaxError)) {
					throw new Error('Unexpected error type in json_decode()');
				}

				// usable by json_last_error()
				$locutus.php.last_error_json = 4;
				return null;
			}
		}

		var chars = [
			'\u0000',
			'\u00ad',
			'\u0600-\u0604',
			'\u070f',
			'\u17b4',
			'\u17b5',
			'\u200c-\u200f',
			'\u2028-\u202f',
			'\u2060-\u206f',
			'\ufeff',
			'\ufff0-\uffff'
			].join('');
		var cx = new RegExp('[' + chars + ']', 'g');
		var j;
		var text = strJson;
		cx.lastIndex = 0;
		if (cx.test(text)) {
			text = text.replace(cx, function (a) {
				return '\\u' + ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
			})
		}

		var m = (/^[\],:{}\s]*$/).test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''));
		if (m) {
			j = eval('(' + text + ')');
			return j;
		}

		// usable by json_last_error()
		$locutus.php.last_error_json = 4;
		return null;
	}
}
module.Core = {
    menuSide: function () {
		var jScrollOptions = {
			autoReinitialise: true,
			autoReinitialiseDelay: 100
		};
		$('.side-menu').attr('style','');
		$('.side-menu').jScrollPane(jScrollOptions);
		$('.side-menu-list li.with-sub').each(function(){
			var parent = $(this),
				clickLink = parent.find('>a'),
				subMenu = parent.find('ul');

			clickLink.click(function(){
				if (parent.hasClass('opened')) {
					parent.removeClass('opened');
					subMenu.slideUp(350);
				} else {
					$('.side-menu-list li.with-sub').not(this).removeClass('opened').find('ul').slideUp(350);
					parent.addClass('opened');
					subMenu.slideDown(350);
				}
			});
		});
    },
    setColumns: function() {
		var prev = this.columns,
			width = $('.media-frame-content').width();

		if ( width ) {
			this.columns = Math.min( Math.round( width / 170 ), 12 ) || 1;

			if ( ! prev || prev !== this.columns ) {
				$('.media-frame-content' ).attr( 'data-columns', this.columns );
			}
		}
	},
    init: function () {
        module.Core.menuSide();
        //module.Core.setColumns();
    }
}
module.form = {
	submitDisable: function(selector) {
		$(selector).on('keyup keypress', function(e) {
		var keyCode = e.keyCode || e.which;
		if (keyCode === 13) { 
		    e.preventDefault();
		    return false;
		  }
		});
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
	Alert: function (text,type,title) {
		$('.form-alerts').empty();
		var htitle = '';
		if(title !== undefined && title !== null){
			htitle = '<strong>'+title+'</strong> ';
		}
		if(type== 'success' && text !== undefined && text !== null){
			$('.form-alerts').html('<div class="alert alert-success" role="alert">'+htitle+text+'</div>');;
		}else if(type== 'warning' && text !== undefined && text !== null){
			$('.form-alerts').html('<div class="alert alert-warning" role="alert">'+htitle+text+'</div>');;
		}else if(type== 'error' && text !== undefined && text !== null){
			if(text == 'default'){
				text = 'Đã có lỗi xảy ra trong quá trình xử lý!';
			}
			$('.form-alerts').html('<div class="alert alert-danger" role="alert">'+htitle+text+'</div>');;
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
	// tableCheckBox: function(){
	// 	var selected = new Array();
	// 	$("input.pcb:checkbox:checked").each(function(){
	// 	    selected.push($(this).val());
	// 	});
	// 	return selected;
	// },
	tableAction: function(){
		var selected = new Array();
		$("input.pcb:checkbox:checked").each(function(){
			selected.push($(this).val());
		});
		return selected;
	},
	responseMessage: function (data,message) {
		$('.form-alerts').empty();
		if(typeof data !== 'undefined' && data.length > 5 && module.form.isJson(data)){
			var objdata = $.parseJSON(data);
			if(objdata.Response == 'True'){
        		if(message !== undefined && message !== null && message !== ''){
        			module.form.Alert(message,'success');
        		}else if (typeof objdata.Message !=='undefined' && objdata.Message !== null && objdata.Message !== ''){
        			module.form.Alert(objdata.Message,'success');
        		}else if (typeof objdata.Redirect !=='undefined' && objdata.Redirect !== null){
        			window.location.href = objdata.Redirect;
        		}
        	}else if(objdata.Response == 'False'){
        		if(message !== undefined && message !== null){
        			module.form.Alert(message,'error');
        		}else if (typeof objdata.Message !=='undefined' && objdata.Message !== null){
        			module.form.Alert(objdata.Message,'error');
        		}else {
        			module.form.Alert('default','error');
        		}
        	}
		}else {
			module.form.Alert('default','error');
		}
	},
	// responseAjax: function (data,message) {
	// 	if(typeof data !== 'undefined' && data.length > 5 && module.form.isJson(data)){
 //        	var objdata = $.parseJSON(data);
 //        	if(objdata.Response == 'True'){
 //        		if(message !== undefined && message !== null)
 //        			module.form.Alert(message,'success');
 //        	}else if(objdata.Response == 'False'){
 //        		if(message !== undefined && message !== null)
 //        			module.form.Alert(objdata.Error,'error');
 //        		else
 //        			module.form.Alert(message,'error');
 //        	}                    
 //        }else {
 //            module.form.Alert('default','error');                    
 //        }
	// },
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
        			module.form.Alert('default','error');
        		}
        	}                    
        }else {
            module.form.Alert('default','error');                    
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
            module.form.Alert('default','error');
        });
        return getAjax;
	},
    init: function () {
    	module.form.ListCheckall();
    	module.form.keyAction('enter','.list-search-input','.list-search-btn');
    }
}
module.plugins = {
	tags: function(){
		$('#newtags').tagsinput({
    		maxChars: 50,
    	});
    	//$('#newtags').tagsinput("add",{"value":1,"text":"Amsterdam","continent":"Europe"});
    	
    	$('#newtags').on('itemAdded', function(event) {
    		var tags = $("#newtags").tagsinput('items');
    		//document.getElementById('tagspost') = module.php.urlencode(tags);
		});
	},
	SEOSnippetPreview: function(){
		function snippet_cutting(str){
			if($.trim(str).length > 160){
				str = $.trim(str).substring(0, 160);
			}
			return str;
		}
		var snippetTitle = $('.snippet-title');
		$( ".meta-title" ).keyup(function() {
			var previewTitle = $('#snippet-editor-meta-title').val();
			if(previewTitle == undefined || previewTitle == null || previewTitle == '' || typeof previewTitle == 'undefined'){
				var seoTitle = $(this).val();
				if(seoTitle !== undefined && seoTitle !== null && seoTitle !== '' && typeof seoTitle !== 'undefined'){
					snippetTitle.text(seoTitle);
				}else {
					snippetTitle.text('');
				}
			}
		});
		$( "#snippet-editor-meta-title" ).keyup(function() {
			var seoTitle = $( ".meta-title" ).val();
			var siteTitle = $('.site-title');
			var previewTitle = $(this).val();
			if(siteTitle.is(":visible") == true){
				siteTitle.hide();
			}
			if(previewTitle !== undefined && previewTitle !== null && previewTitle !== '' && typeof previewTitle !== 'undefined'){
				snippetTitle.text(previewTitle);
			}else {
				if(seoTitle !== undefined && seoTitle !== null && seoTitle !== '' && typeof seoTitle !== 'undefined'){
					snippetTitle.text(seoTitle);
				}else {
					snippetTitle.text('');
				}
				siteTitle.show();
			}
		});

		var snippetDescription = $('.snippet-desc');
		$( ".meta-description" ).keyup(function() {
			var previewDes = $('#snippet-editor-meta-description').val();
			if(previewDes == undefined || previewDes == null || previewDes == '' || typeof previewDes == 'undefined'){
				var seoDes = $(this).val();
				if(seoDes !== undefined && seoDes !== null && seoDes !== '' && typeof seoDes !== 'undefined'){
					if($.trim(seoDes).length > 160){
						snippetDescription.text($.trim(seoDes).substring(0, 160));
					}else {
						snippetDescription.text(seoDes)
					}
				}else {
					snippetDescription.text('');
				}
			}
		});
		$( "#snippet-editor-meta-description").keyup(function() {
			var seoDes = $( ".meta-description" ).val();
			var previewDes = $(this).val();
			if(previewDes !== undefined && previewDes !== null && previewDes !== '' && typeof previewDes !== 'undefined'){
				snippetDescription.text(previewDes);
			}else {
				if(seoDes !== undefined && seoDes !== null && seoDes !== '' && typeof seoDes !== 'undefined'){
					if($.trim(seoDes).length > 160){
						snippetDescription.text($.trim(seoDes).substring(0, 160));
					}else {
						snippetDescription.text(seoDes)
					}
				}else {
					snippetDescription.text('');
				}
			}
		});
	
	},
	init: function () {
		module.plugins.SEOSnippetPreview();
	}
}
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
module.web = {
	Menu: function () {
		
	},
    init: function () {
        module.account.RecoverySendToken();
    }
}
module.general = {
	ListAction: function (type,ajaxdata,ajaxurl,stateobj,message) {
		var search = module.form.getUrlVars()["search"];
		if(search == undefined || typeof search == 'undefined')
			search = '';
		var page = module.form.getUrlVars()["page"];
		if(page == undefined || typeof page == 'undefined')
			page = 1;
		if(type == 'list'){
			var check = module.form.tableAction();
			if(check == undefined || typeof check == 'undefined' || check == null || check == '')
				return false;
			ajaxdata.check = check;
			var select_action = $('.list-action-select').val();
			if(select_action == '0')
				return false;
			ajaxdata.select_action = select_action;
		}
        ajaxdata._token = $('#page_token').val();
        ajaxdata.page = page;
		ajaxdata.search = search;
		var stateobj = {}
		return module.form.ListTable(ajaxdata,ajaxurl,stateobj,message);

	},
	ListSearch: function (ajaxdata,ajaxurl) {	
		var searchInput = module.php.urlencode($('.list-search-input').val());
		if(typeof ajaxdata !== 'object')
			return false;
        ajaxdata._token = $('#page_token').val();
		ajaxdata.search = searchInput;
		ajaxdata.type = 'search';
		var stateobjtitle = $('.section-header').find('h1 span').text();
		var stateobj = {
			StateName: {
				"Search":searchInput
			},
			Title: stateobjtitle,
			URL: "?search="+searchInput
		}
        return module.form.ListTable(ajaxdata,ajaxurl,stateobj);
	}
}
module.taxonomy = {
	Create: function () {

	},
	Update: function () {

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
		module.taxonomy.Create();
		module.taxonomy.Update();
        module.taxonomy.ListAction();
        module.taxonomy.ListSearch();
    }
}

module.attachment = {
	Create: function () {
		/* global plupload, pluploadL10n, ajaxurl, mUploaderInit */
		var topWin = window.dialogArguments, uploader, uploader_init;
		var pluploadL10n = {"queue_limit_exceeded":"You have attempted to queue too many files.","file_exceeds_size_limit":"%s exceeds the maximum upload size for this site.","zero_byte_file":"This file is empty. Please try another.","invalid_filetype":"This file type is not allowed. Please try another.","not_an_image":"This file is not an image. Please try another.","image_memory_exceeded":"Memory exceeded. Please try another smaller file.","image_dimensions_exceeded":"This is larger than the maximum size. Please try another.","default_error":"An error occurred in the upload. Please try again later.","missing_upload_url":"There was a configuration error. Please contact the server administrator.","upload_limit_exceeded":"You may only upload 1 file.","http_error":"HTTP error.","upload_failed":"Upload failed.","big_upload_queued":"%s exceeds the maximum upload size for the multi-file uploader when used in your browser.","io_error":"IO error.","security_error":"Security error.","file_cancelled":"File canceled.","upload_stopped":"Upload stopped.","dismiss":"Dismiss","crunching":"Completed","deleted":"moved to the trash.","error_uploading":"\u201c%s\u201d has failed to upload."};

		// progress and success handlers for media multi uploads
		function fileQueued(fileObj) {
			//var items = jQuery('#media-items').children();
			var uploadtitle = '<div class="uploading-item-wrapper"><div class="uploading-item-name clearfix"><span class="filename original">'+fileObj.name+'</span></div></div>';
			var uploadprocess = '<div class="progress"><div class="bar"></div></div>';
			var uploadinfo = '<div class="uploading-item-info clearfix"><div class="percent">0%</div><div class="filesize"></div></div>';
			// Create a progress bar containing the filename
			jQuery('<div class="uploading-item">').attr( 'id', 'media-item-' + fileObj.id ).append(uploadtitle+uploadprocess+uploadinfo).prependTo( jQuery('#media-items' ) );
		}

		function uploadProgress(up, file) {
			var item = jQuery('#media-item-' + file.id);
			var witem = jQuery('.media-upload-form').width();
			jQuery('.progress .bar', item).width( (file.loaded / file.size) * 100 +'%' );
			jQuery('.uploading-item-info .percent', item).html( file.percent + '%' );
			jQuery('.uploading-item-info .filesize', item).html( module.form.formatBytes(file.size));
		}

		// check to see if a large file failed to upload
		function fileUploading( up, file ) {
			var hundredmb = 5 * 1024 * 1024,
				max = parseInt( up.settings.filters.max_file_size, 10 );
			if (file.size > hundredmb ) {
				setTimeout( function() {
					if ( file.status < 3 && file.loaded === 0 ) { // not uploading
						//FileError( file, pluploadL10n.big_upload_failed.replace( '%1$s', '<a class="uploader-html" href="#">' ).replace( '%2$s', '</a>' ) );
						FileError( file, pluploadL10n.upload_failed);
						up.stop(); // stops the whole queue
						up.removeFile( file );
						up.start(); // restart the queue
					}
				}, 10000 ); // wait for 10 sec. for the file to start uploading
			}
		}

		function uploadSuccess(fileObj, serverData) {
			var item = jQuery('#media-item-' + fileObj.id);

			// on success serverData should be numeric, fix bug in html4 runtime returning the serverData wrapped in a <pre> tag
			serverData = serverData.replace(/^<pre>(\d+)<\/pre>$/, '$1');

			// if async-upload returned an error message, place it in the media item div and return
			if ( serverData.match(/uploading-error/) ) {
				jQuery('.form-alerts').html(serverData);
				item.attr( 'class', 'uploading-item error').html('<p>' + pluploadL10n.error_uploading.replace('%s', jQuery.trim(fileObj.name)) +'</p>');
				return;
			} else {
				item.find('.uploading-item-wrapper').html(serverData);
				item.find('.progress').addClass('completed');
				jQuery('.percent', item).html( pluploadL10n.crunching );
			}
			prepareMediaItem(fileObj, serverData);
		}

		function prepareMediaItem(fileObj, serverData) {
			var f = ( typeof shortform == 'undefined' ) ? 1 : 2, item = jQuery('#media-item-' + fileObj.id);
			if ( f == 2 && shortform > 2 )
				f = shortform;

			if ( isNaN(serverData) || !serverData ) { // Old style: Append the HTML returned by the server -- thumbnail and form inputs
				//item.find('#uploading-item-wrapper').append(serverData);
				item.find('.uploading-item-wrapper').html(serverData);
				//prepareMediaItemInit(fileObj);
			}
		}
		// generic error message
		function QueueError(message) {
			jQuery('.form-alerts').show().html( '<div class="alert alert-danger" role="alert">' + message + '</div>' );
		}

		// file-specific error messages
		function FileError(fileObj, message) {
			itemAjaxError(fileObj.id, message);
		}

		function itemAjaxError(id, message) {
			var item = jQuery('#media-item-' + id), filename = item.find('.filename').text();
			//item.html('<div class="error-div"><a class="dismiss" href="#">' + pluploadL10n.dismiss + '</a><strong>' + pluploadL10n.error_uploading.replace('%s', jQuery.trim(filename)) + '</strong> '+message+'</div>');
			item.prepend('<div id="media-item-' + id + '" class="uploading-item error"><p><strong>' + pluploadL10n.dismiss + '</strong>'+ pluploadL10n.error_uploading.replace('%s', jQuery.trim(filename)) + message + '</p></div>');
		}

		function deleteError() {}
		function uploadComplete() {}
		function uploadError(fileObj, errorCode, message, uploader) {
			var hundredmb = 5 * 1024 * 1024, max;

			switch (errorCode) {
				case plupload.FAILED:
					FileError(fileObj, pluploadL10n.upload_failed);
					break;
				case plupload.FILE_EXTENSION_ERROR:
					FileError(fileObj, pluploadL10n.invalid_filetype);
					break;
				case plupload.FILE_SIZE_ERROR:
					uploadSizeError(uploader, fileObj);
					break;
				case plupload.IMAGE_FORMAT_ERROR:
					FileError(fileObj, pluploadL10n.not_an_image);
					break;
				case plupload.IMAGE_MEMORY_ERROR:
					FileError(fileObj, pluploadL10n.image_memory_exceeded);
					break;
				case plupload.IMAGE_DIMENSIONS_ERROR:
					FileError(fileObj, pluploadL10n.image_dimensions_exceeded);
					break;
				case plupload.GENERIC_ERROR:
					QueueError(pluploadL10n.upload_failed);
					break;
				case plupload.IO_ERROR:
					max = parseInt( uploader.settings.filters.max_file_size, 10 );

					if (fileObj.size > hundredmb )
						//FileError( fileObj, pluploadL10n.big_upload_failed.replace('%1$s', '<a class="uploader-html" href="#">').replace('%2$s', '</a>') );
						FileError( fileObj, pluploadL10n.upload_failed);
					else
						QueueError(pluploadL10n.io_error);
					break;
				case plupload.HTTP_ERROR:
					QueueError(pluploadL10n.http_error);
					break;
				case plupload.INIT_ERROR:
					break;
				case plupload.SECURITY_ERROR:
					QueueError(pluploadL10n.security_error);
					break;
				// case plupload.UPLOAD_ERROR.UPLOAD_STOPPED:
				// case plupload.UPLOAD_ERROR.FILE_CANCELLED:
				// 	jQuery('#media-item-' + fileObj.id).remove();
				// 	break;
				default:
					FileError(fileObj, pluploadL10n.default_error);
			}
		}

		function uploadSizeError( up, file ) {
			var message;
			message = pluploadL10n.file_exceeds_size_limit.replace('%s', file.name);
			jQuery('#media-items').prepend('<div id="media-item-' + file.id + '" class="uploading-item error"><p>' + message + '</p></div>');
			up.removeFile(file);
		}


		//e.preventDefault();
		// init and set the uploader
		uploader_init = function() {
			var isIE = navigator.userAgent.indexOf('Trident/') != -1 || navigator.userAgent.indexOf('MSIE ') != -1;
			// Make sure flash sends cookies (seems in IE it does whitout switching to urlstream mode)
			if ( ! isIE && 'flash' === plupload.predictRuntime( mUploaderInit ) &&
				( ! mUploaderInit.required_features || ! mUploaderInit.required_features.hasOwnProperty( 'send_binary_string' ) ) ) {

				mUploaderInit.required_features = mUploaderInit.required_features || {};
				mUploaderInit.required_features.send_binary_string = true;
			}
			uploader = new plupload.Uploader(mUploaderInit);
			uploader.bind('Init', function(up) {
				var uploaddiv = $('#plupload-upload-ui');
			});
			uploader.init();
			uploader.bind('FilesAdded', function( up, files ) {
				$('.form-alerts').empty();

				plupload.each( files, function( file ) {
					fileQueued( file );
				});

				up.refresh();
				up.start();
			});
			uploader.bind('UploadFile', function(up, file) {
				fileUploading(up, file);
			});
			uploader.bind('UploadProgress', function(up, file) {
				uploadProgress(up, file);
			});
			uploader.bind('Error', function(up, err) {
				uploadError(err.file, err.code, err.message, up);
				up.refresh();
			});
			uploader.bind('FileUploaded', function(up, file, response) {
				uploadSuccess(file, response.response);
			});
			uploader.bind('UploadComplete', function() {});
		};

		if ( typeof(mUploaderInit) == 'object' ) {
			uploader_init();
		}
	},
	ListAction: function () {
		$('#attachment-action-btn').on( "click", function(e) {
			e.preventDefault();
			var mode = $.cookie('view_attachment');
			if(mode == undefined || typeof mode == 'undefined')
				mode = 'grid';
			var ajaxdata = {
		        mode: mode,
		        type:'action'
			}
			var ajaxurl = $(this).parents('form').attr('action');
			module.general.ListAction('list',ajaxdata,ajaxurl);
		});
	},
	ListSearch: function () {
		$('#attachment-search-btn').on( "click", function(e) {
			e.preventDefault();
			var mode = $.cookie('view_attachment');
			if(mode == undefined || typeof mode == 'undefined')
				mode = 'grid';
			var ajaxdata = {
		        mode: mode,
		        type:'search'
			}
			var ajaxurl = $(this).parents('form').attr('action');
			module.general.ListSearch(ajaxdata,ajaxurl);
		});
	},
	Update: function () {
		$('#attachment-update-btn').click( function(e) {
			e.preventDefault();
			var ajaxurl = $('#attachment-form').attr('action');
			var form_data = $($("#attachment-form")[0].elements).not("#page_token").serializeArray();
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
                module.form.responseMessage(data,'Cập nhật dữ liệu thành công');
            }).complete(function() {
					
            }).error(function() {
                module.form.Alert('default','error');
            });
		});
	},
	GridDelete: function () {
		$('.attachment-list').on( "click",".attacment-delete", function(e) {
			e.preventDefault();
			var mode = $.cookie('view_attachment');
			if(mode == undefined || typeof mode == 'undefined')
				mode = 'grid';
			var ajaxdata = {
		        mode: mode,
		        attachment_id: $(this).attr('data-id'),
		        select_action: 'delete',
		        type:'action'
			}
			var ajaxurl = $(this).parents('form').attr('action');
			module.general.ListAction('grid',ajaxdata,ajaxurl,'','Xóa tập tin thành công');
		});
	},
	Create_Delete: function () {
		$('#media-items').on( "click",".attacment-delete", function(e) {
			e.preventDefault();
			var item = $(this);
			var ajaxdata = {
		        attachment_id: item.attr('data-id'),
		        select_action: 'delete',
		        type:'action'
			}
			var ajaxurl = $(this).parents('form').attr('action');
			var responeAjax = module.general.ListAction('grid',ajaxdata,ajaxurl,'','');
			if(responeAjax == true || responeAjax || responeAjax == 1){
				item.parents('.uploading-item').remove();
			}
		});
	},
	ViewSwitchAction: function () {
		var mode = $.cookie('view_attachment');
		if(mode == undefined || typeof mode == 'undefined')
			mode = 'grid';
		if(mode == 'list'){
			$('.la-group').show();
		}else {
			$('.la-group').hide();
		}
	},
	ViewSwitch: function () {
		$('.view-switch a.view-item').click( function() {
			var viewswitch = $(this);
			var ajaxurl = $(this).parents('form').attr('action');
			var mode = viewswitch.attr('data-layout-switch');
			if(mode != 'list')
				mode = 'grid';
			var ajaxdata = {
				mode: mode,
				type:'view'
			}
			var responeAjax = module.general.ListAction('grid',ajaxdata,ajaxurl,'','');
			if(responeAjax == true || responeAjax || responeAjax == 1){
				$.cookie('view_attachment', mode,{ path: '/' });
            	$('.view-switch a').removeClass('current');
            	viewswitch.addClass('current');
            	var viewMode = $.cookie('view_attachment');
            	$('.form-alerts').empty();
            	module.attachment.ViewSwitchAction();
			}
		});
	},
    init: function () {
		var clipboard = new Clipboard('.clipboard');
		module.form.submitDisable('#attachment-form');
    	module.attachment.Create();
    	module.attachment.Create_Delete();
    	module.attachment.ListAction();
    	module.attachment.Update();
        module.attachment.ListSearch();
        module.attachment.GridDelete();
        module.attachment.ViewSwitch();
        module.attachment.ViewSwitchAction();
    }
}
module.post = {
	EditorActions: function () {
		$('.change-comment-status').click( function() {
			var mymisc = $(this);
			var text = mymisc.parent().fint("select option:selected").text();
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
                    module.form.Alert('default','error');                    
                }
            }).complete(function() {
					
            }).error(function() {
                module.form.Alert('default','error');
            });
	    });
	},
    init: function () {
    	module.plugins.tags();
    	module.post.EditorAddCategory();
    }
}
module.recovery = {
	sendToken: function () {
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
	setPass: function () {
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
        module.recovery.sendToken();
        module.recovery.setPass();
    }
}

module.editor = {
	sortable: function () {
		$( ".meta-box-sortables").sortable({
		    connectWith: ".meta-box-sortables",
		    handle: ".handle-title",
		    cancel: ".portlet-toggle",
		    placeholder: "sortable-placeholder",
		    start: function(e, ui){
		    	ui.placeholder.height(ui.item.height());
		    }
	    });
 
	    $( ".postbox" )
	    	//.addClass( "closed" )
	      	.find( ".hndle" )
	      	.addClass( "ui-widget-header ui-corner-all" );
	        //.prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
	 
	    $( ".handle-btn" ).click(function() {
	      	var icon = $( this );
	      	//icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
	      	icon.closest( ".postbox" ).toggleClass('closed');
	      	icon.closest( ".postbox" ).find( ".inside" ).toggle();
	    });
	},
	editorTinymce: function () {
    	tinymce.init({
		selector: 'textarea.editor-area',
		height: 300,
		skin : "mose",
		plugins: [
			'advlist autolink lists link image charmap print preview hr anchor pagebreak',
			'searchreplace wordcount visualblocks visualchars code fullscreen',
			'insertdatetime media nonbreaking save table contextmenu directionality',
			'emoticons template paste textcolor colorpicker textpattern imagetools'
		],
		toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		toolbar2: 'print preview media | forecolor backcolor emoticons',
		image_advtab: true,
		templates: [
			{ title: 'Test template 1', content: 'Test 1' },
			{ title: 'Test template 2', content: 'Test 2' }
		],
		/*content_css: [
			'//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
			'//www.tinymce.com/css/codepen.min.css'
		]*/
		});
    },
    init: function () {
        module.editor.sortable();
        module.editor.editorTinymce();
    }
}
module.init = function () {
    module.Core.init();
    module.form.init();
    module.plugins.init();
    module.editor.init();
    module.post.init();
    module.attachment.init();
    module.taxonomy.init();
    module.account.init();
};
$(document).ready(function() {
    module.init();
});