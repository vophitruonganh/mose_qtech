var mose = {};
mose.php = {
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
	}
}
mose.Core = {
    menuSide: function () {
		var jScrollOptions = {
			autoReinitialise: true,
			autoReinitialiseDelay: 100
		};
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
    test: function () {
    	
    	$('#newtags').tagsinput({
    		maxChars: 50,
    	});
    	//$('#newtags').tagsinput("add",{"value":1,"text":"Amsterdam","continent":"Europe"});
    	
    	$('#newtags').on('itemAdded', function(event) {
    		var tags = $("#newtags").tagsinput('items');
    		//document.getElementById('tagspost') = mose.php.urlencode(tags);
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
        mose.Core.menuSide();
        //mose.Core.test();
        //mose.Core.setColumns();
    }
}
mose.form = {
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
				text = 'Đã có lôi xảy ra trong quá trình xử lý!';
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
	}
}

mose.attachment = {
	getAttachment: function () {
		//$('#attachment-modal-edit').modal('show');
		$('.attachment').click( function() {
			var ajaxdata = {
                _token: $('#page_token').val(),
				id: $(this).find('.attachment-info').attr('data-id')
			}
			var ajaxurl = $('.media-frame-content').attr('data-action');
            var getAjax = mose.form.Ajax(ajaxdata,ajaxurl);
            if(typeof getAjax == 'undefined')
            	return false;
            getAjax.success(function(data){
                if(typeof data !== 'undefined' && data.length > 5 && mose.form.isJson(data)){
                	var jdata = $.parseJSON(data);
                	if(jdata.Response == 'True'){
                		$('#attachment-modal-edit').modal('show');
                		mose.form.Alert(jdata.Message,'success');
                		$('.btn-back.hidden').removeClass('hidden');
	                	$('#myModal').on('shown.bs.modal', function () {
						  	$('#myInput').focus();
						});
                	}else if(jdata.Response == 'False'){
                		mose.form.Alert(jdata.Message,'error');
                	}                    
                }else {
                    mose.form.Alert('default','error');                    
                }
            }).complete(function() {
					
            }).error(function() {
                mose.form.Alert('default','error');
            });
		});
	},
	uploadAttachment: function () {
		$('a.browser-upload').click( function() {
			$('#plupload-upload-ui').addClass('hidden');
			$('#html-upload-ui').removeClass('hidden');
		});
		$('a.plupload-upload').click( function() {
			$('#html-upload-ui').addClass('hidden');
			$('#plupload-upload-ui').removeClass('hidden');
		});
		var ajaxurl = $('.media-frame-content').attr('data-action');
		$('#drag-drop-area').pluploadQueue({
	        // General settings
	        runtimes : 'html5,flash,silverlight,html4',
			//browse_button : 'plupload-browse-button', // you can pass in id...
	        url : ajaxurl,
	        chunk_size : '2mb',
	        unique_names : true,
	        // Resize images on client-side if we can
	        resize : { quality : 100 },
        
	        filters : {
	            max_file_size : '2mb',

				// Specify what files to browse for
	            mime_types: [
	                {title : "Image files", extensions : "jpg,gif,png"},
	                {title : "Document files", extensions : "doc,dot,docx,docm,dotx,dotm,docb,xls,xlt,xlm,xlsx,xlsm,xltx,xltm,xlsb,xla,xlam,xll,xlw"}
	            ]
	        },
			flash_swf_url : '../plupload/script/Moxie.swf',
			silverlight_xap_url : '../plupload/script/Moxie.xap'
	    });
	    /*
		$('#upload-media').click( function() {
			var ajaxdata = {
                _token: $('#page_token').val(),
				id: $(this).find('.attachment-info').attr('data-id')
			}
			var ajaxurl = $('.media-frame-content').attr('data-action');
            var getAjax = mose.form.Ajax(ajaxdata,ajaxurl);
            if(typeof getAjax == 'undefined')
            	return false;
            getAjax.success(function(data){
                if(typeof data !== 'undefined' && data.length > 5 && mose.form.isJson(data)){
                	var jdata = $.parseJSON(data);
                	if(jdata.Response == 'True'){
                		$('#attachment-modal-edit').modal('show');
                		mose.form.Alert(jdata.Message,'success');
                		$('.btn-back.hidden').removeClass('hidden');
	                	$('#myModal').on('shown.bs.modal', function () {
						  	$('#myInput').focus();
						});
                	}else if(jdata.Response == 'False'){
                		mose.form.Alert(jdata.Message,'error');
                	}                    
                }else {
                    mose.form.Alert('default','error');                    
                }
            }).complete(function() {
					
            }).error(function() {
                mose.form.Alert('default','error');
            });
		});
		*/
	},
	searchAttachment: function () {
		$('#media-search').click( function() {
			var key = $('#media-search-input').val();
			keyurl = mose.php.urlencode(key);
			var ajaxurl = $('.media-frame-content').attr('data-action');
			var ajaxdata = {
                _token: $('#page_token').val(),
				search: keyurl
			}
			var getAjax = mose.form.Ajax(ajaxdata,ajaxurl);
            if(typeof getAjax == 'undefined')
            	return false;
            getAjax.success(function(data){
                if(typeof data !== 'undefined' && data.length > 5){
                	History.pushState({Search:keyurl}, 'Attachment', "?search="+keyurl);
                	var State = History.getState();
                	History.log('statechange:'+State.title, State.data, State.title, State.url);
                	$('.attachment-list').html(data);           
                }else {
                    mose.form.Alert('default','error');                    
                }
            }).complete(function() {
					
            }).error(function() {
                mose.form.Alert('default','error');
            });
		});
		$('#media-search-input').keypress(function(e){
	        if(e.which == 13){
	            $('#media-search').click();
	        }
	    });
	},
	filterAttachment: function () {
		var typeAttachment = mose.form.getUrlVars()["type"];
		var supportAttachment =  ['all','image','document'];
		var ajaxurl = $('.media-frame-content').attr('data-action');
		if(jQuery.inArray(typeAttachment, supportAttachment) !== -1){
        	$("#attachment-filter").val(typeAttachment);
        }
		$('#attachment-filter').change(function() {
			var modeAttachment = $.cookie('modeAttachment');
			if(modeAttachment == undefined || typeof modeAttachment == 'undefined'){
				modeAttachment = 'grid';
			}
			var str = "";
			$('#attachment-filter option:selected').each(function() {
      			str += $( this ).val();
    		});
			if(str){
				var ajaxdata = {
	                _token: $('#page_token').val(),
					type: str,
					mode: modeAttachment
				}
				//var ajaxurl = $('#attachment-filter').attr('data-action');
	            var getAjax = mose.form.Ajax(ajaxdata,ajaxurl);
	            if(typeof getAjax == 'undefined')
            		return false;
	            getAjax.success(function(data){
	                if(typeof data !== 'undefined' && data.length > 5){
		      			//var History = window.History;
		            	History.pushState({Type:str}, 'Attachment', "?type="+str);
		            	//var State = History.getState();
						//History.log('statechange:'+State.title, State.data, State.title, State.url);
	                	$('.attachment-list').html(data);            
	                }else {
	                    mose.form.Alert('default','error');                    
	                }
	            }).complete(function() {
						
	            }).error(function() {
	                mose.form.Alert('default','error');
	            });
			}
		});
	},
	modeAttachment: function () {
		$('.view-switch a.view-item').click( function() {
			var typeAttachment = mose.form.getUrlVars()["type"];
	        if(typeAttachment == undefined || typeof typeAttachment == 'undefined'){
	        	typeAttachment = 'all';
	        }
			var viewswitch = $(this);
	        var mode = viewswitch.attr('data-layout-switch');
			var ajaxdata = {
                _token: $('#page_token').val(),
                type: typeAttachment,
				mode: mode
			}
            var ajaxurl = $('.media-frame-content').attr('data-action');
            var getAjax = mose.form.Ajax(ajaxdata,ajaxurl);
            if(typeof getAjax == 'undefined')
            	return false;
            getAjax.success(function(data){
                if(typeof data !== 'undefined' && data.length > 5){
                	$.cookie('modeAttachment', mode,{ path: '/' });
                	$('.view-switch a').removeClass('current');
                	viewswitch.addClass('current');
                	$('.attachment-list').html(data);           
                }else {
                    mose.form.Alert('default','error');                    
                }
            }).complete(function() {
					
            }).error(function() {
                mose.form.Alert('default','error');
            });
		});
	},
    init: function () {
    	mose.attachment.uploadAttachment();
        mose.attachment.getAttachment();
        mose.attachment.searchAttachment();
        mose.attachment.filterAttachment();
        mose.attachment.modeAttachment();
    }
}
mose.post = {
	ListCheckall: function () {
	    $("#checkall").change(function(){
	    	$(".pcb").prop('checked', $(this).prop("checked"));
	    });
	},
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
            var getAjax = mose.form.Ajax(ajaxdata,ajaxurl);
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
                    mose.form.Alert('default','error');                    
                }
            }).complete(function() {
					
            }).error(function() {
                mose.form.Alert('default','error');
            });
	    });
	},
    init: function () {
    	mose.post.ListCheckall();
    	mose.post.EditorAddCategory();
    }
}
mose.recovery = {
	sendToken: function () {
		$('#recbtn').click( function(e) {
			e.preventDefault();
			var ajaxdata = {
                _token: $('#page_token').val(),
				email: $('#recEmail').val()
			}
            var ajaxurl = $('#recoveryForm').attr('action');
            var getAjax = mose.form.Ajax(ajaxdata,ajaxurl);
            if(typeof getAjax == 'undefined')
            	return false;
            getAjax.success(function(data){
                if(typeof data !== 'undefined' && data.length > 5 && mose.form.isJson(data)){
                	var jdata = $.parseJSON(data);
                	if(jdata.Response == 'True'){
                		$('#recoveryForm').remove();
                		mose.form.Alert(jdata.Message,'success');
                		$('.btn-back.hidden').removeClass('hidden');
                	}else if(jdata.Response == 'False'){
                		mose.form.Alert(jdata.Message,'error');
                	}                    
                }else {
                    mose.form.Alert('default','error');                    
                }
            }).complete(function() {
					
            }).error(function() {
                mose.form.Alert('default','error');
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
            var getAjax = mose.form.Ajax(ajaxdata,ajaxurl);
            if(typeof getAjax == 'undefined')
            	return false;
            getAjax.success(function(data){
                if(typeof data !== 'undefined' && data.length > 5 && mose.form.isJson(data)){
                	var jdata = $.parseJSON(data);
                	if(jdata.Response == 'True'){
                		$('#resetpassForm').remove();
                		mose.form.Alert(jdata.Message,'success');
                		$('.btn-back.hidden').removeClass('hidden');
                	}else if(jdata.Response == 'False'){
                		mose.form.Alert(jdata.Message,'error');
                	}                    
                }else {
                    mose.form.Alert('default','error');                    
                }
            }).complete(function() {
					
            }).error(function() {
                mose.form.Alert('default','error');
            });
		});
	},
    init: function () {
        mose.recovery.sendToken();
        mose.recovery.setPass();
    }
}
mose.term = {

}
mose.editor = {
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
        mose.editor.sortable();
        mose.editor.editorTinymce();
    }
}
mose.init = function () {
    mose.Core.init();
    mose.editor.init();
    mose.post.init();
    //mose.attachment.init();
    mose.recovery.init();
};
$(document).ready(function() {
    mose.init();
});
