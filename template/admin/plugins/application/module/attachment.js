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
			var ajaxurl = $(this).parents('form').attr('action');
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
                module.form.Alert('error');
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
	MediaList: function(){
		$('#media-list').on( "click",".attachment-item", function(e) {
			var item = $(this);
			$("#media-list .attachment-item").not(item).removeClass('active');
			item.toggleClass('active');
		});

		$('#set-image-btn').on( "click", function(e) {
			var img = $("#media-list").find('.attachment-item.active').find('img').attr("src");
			$('#media-list').modal("hide");
			$('.set-image').hide();
			$('#fi-remove').removeClass('hidden');
			$('.featured-image').append('<img src="'+img+'" />');
			$("#media-list .attachment-item").removeClass('active');
		});
		$('#fi-remove').on( "click", function(e) {
			e.preventDefault();
			$("#media-list .attachment-item").removeClass('active');
			$('.set-image').show();
			$(this).addClass('hidden');
			$('.featured-image').find('img').remove();
		});
	},
    init: function () {
		var clipboard = new Clipboard('.clipboard');
		module.form.submitDisable('#attachment-form');
    	module.attachment.Create();
    	module.attachment.MediaList();
    	module.attachment.Create_Delete();
    	module.attachment.ListAction();
    	module.attachment.Update();
        module.attachment.ListSearch();
        module.attachment.GridDelete();
        module.attachment.ViewSwitch();
        module.attachment.ViewSwitchAction();
    }
}
$(document).ready(function() {
    module.attachment.init();
});