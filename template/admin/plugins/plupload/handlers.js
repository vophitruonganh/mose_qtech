/* global plupload, pluploadL10n, ajaxurl, post_id, mUploaderInit, deleteUserSetting, setUserSetting, shortform */
var topWin = window.dialogArguments || parent || top, uploader, uploader_init;
var pluploadL10n = {"queue_limit_exceeded":"You have attempted to queue too many files.","file_exceeds_size_limit":"%s exceeds the maximum upload size for this site.","zero_byte_file":"This file is empty. Please try another.","invalid_filetype":"This file type is not allowed. Please try another.","not_an_image":"This file is not an image. Please try another.","image_memory_exceeded":"Memory exceeded. Please try another smaller file.","image_dimensions_exceeded":"This is larger than the maximum size. Please try another.","default_error":"An error occurred in the upload. Please try again later.","missing_upload_url":"There was a configuration error. Please contact the server administrator.","upload_limit_exceeded":"You may only upload 1 file.","http_error":"HTTP error.","upload_failed":"Upload failed.","big_upload_failed":"Please try uploading this file with the %1$sbrowser uploader%2$s.","big_upload_queued":"%s exceeds the maximum upload size for the multi-file uploader when used in your browser.","io_error":"IO error.","security_error":"Security error.","file_cancelled":"File canceled.","upload_stopped":"Upload stopped.","dismiss":"Dismiss","crunching":"Đang xử lý","deleted":"moved to the trash.","error_uploading":"\u201c%s\u201d has failed to upload."};

// progress and success handlers for media multi uploads
function fileQueued(fileObj) {

	var items = jQuery('#media-items').children();

	// Create a progress bar containing the filename
	jQuery('<div class="media-item">')
		.attr( 'id', 'media-item-' + fileObj.id )
		//.addClass('child-of-' + postid)
		.append('<div class="progress"><div class="percent">0%</div><div class="bar"></div></div>',
			jQuery('<div class="filename original">').text( ' ' + fileObj.name ))
		.appendTo( jQuery('#media-items' ) );
}

function uploadProgress(up, file) {
	var item = jQuery('#media-item-' + file.id);
	jQuery('.bar', item).width( (200 * file.loaded) / file.size );
	jQuery('.percent', item).html( file.percent + '%' );
}

// check to see if a large file failed to upload
function fileUploading( up, file ) {
	var hundredmb = 100 * 1024 * 1024,
		max = parseInt( up.settings.max_file_size, 10 );

	if ( max > hundredmb && file.size > hundredmb ) {
		setTimeout( function() {
			if ( file.status < 3 && file.loaded === 0 ) { // not uploading
				wpFileError( file, pluploadL10n.big_upload_failed.replace( '%1$s', '<a class="uploader-html" href="#">' ).replace( '%2$s', '</a>' ) );
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
	if ( serverData.match(/form-alerts/) ) {
		item.html(serverData);
		return;
	} else {
		jQuery('.percent', item).html( pluploadL10n.crunching );
	}

	prepareMediaItem(fileObj, serverData);

	/*
	// Increment the counter.
	if ( post_id && item.hasClass('child-of-' + post_id) )
		jQuery('#attachments-count').text(1 * jQuery('#attachments-count').text() + 1);*/
}

function setResize( arg ) {
	if ( arg ) {
		if ( window.resize_width && window.resize_height ) {
			uploader.settings.resize = {
				enabled: true,
				//width: window.resize_width,
				//height: window.resize_height,
				quality: 100
			};
		} else {
			uploader.settings.multipart_params.image_resize = true;
		}
	} else {
		delete( uploader.settings.multipart_params.image_resize );
	}
}

function prepareMediaItem(fileObj, serverData) {
	var f = ( typeof shortform == 'undefined' ) ? 1 : 2, item = jQuery('#media-item-' + fileObj.id);
	if ( f == 2 && shortform > 2 )
		f = shortform;

	try {
		if ( typeof topWin.tb_remove != 'undefined' )
			topWin.jQuery('#TB_overlay').click(topWin.tb_remove);
	} catch(e){}

	if ( isNaN(serverData) || !serverData ) { // Old style: Append the HTML returned by the server -- thumbnail and form inputs
		item.append(serverData);
		prepareMediaItemInit(fileObj);
	} else { // New style: server data is just the attachment ID, fetch the thumbnail and form html from the server
		item.load('async-upload.php', {attachment_id:serverData, fetch:f}, function(){prepareMediaItemInit(fileObj);});
	}
}

function prepareMediaItemInit(fileObj) {
	var item = jQuery('#media-item-' + fileObj.id);
	// Clone the thumbnail as a "pinkynail" -- a tiny image to the left of the filename
	jQuery('.thumbnail', item).clone().attr('class', 'pinkynail toggle').prependTo(item);

	// Replace the original filename with the new (unique) one assigned during upload
	jQuery('.filename.original', item).replaceWith( jQuery('.filename.new', item) );

	// Open this item if it says to start open (e.g. to display an error)
	//jQuery('#media-item-' + fileObj.id + '.startopen').removeClass('startopen').addClass('open').find('slidetoggle').fadeIn();
}

// generic error message
function wpQueueError(message) {
	jQuery('.form-alerts').show().html( '<div class="alert alert-danger" role="alert">' + message + '</div>' );
}

// file-specific error messages
function wpFileError(fileObj, message) {
	itemAjaxError(fileObj.id, message);
}

function itemAjaxError(id, message) {
	var item = jQuery('#media-item-' + id), filename = item.find('.filename').text(), last_err = item.data('last-err');

	if ( last_err == id ) // prevent firing an error for the same file twice
		return;

	item.html('<div class="error-div">' +
				'<a class="dismiss" href="#">' + pluploadL10n.dismiss + '</a>' +
				'<strong>' + pluploadL10n.error_uploading.replace('%s', jQuery.trim(filename)) + '</strong> ' +
				message +
				'</div>').data('last-err', id);
}

function deleteError() {
	// TODO
}

function uploadComplete() {

}

function uploadError(fileObj, errorCode, message, uploader) {
	var hundredmb = 100 * 1024 * 1024, max;

	switch (errorCode) {
		case plupload.FAILED:
			wpFileError(fileObj, pluploadL10n.upload_failed);
			break;
		case plupload.FILE_EXTENSION_ERROR:
			wpFileError(fileObj, pluploadL10n.invalid_filetype);
			break;
		case plupload.FILE_SIZE_ERROR:
			uploadSizeError(uploader, fileObj);
			break;
		case plupload.IMAGE_FORMAT_ERROR:
			wpFileError(fileObj, pluploadL10n.not_an_image);
			break;
		case plupload.IMAGE_MEMORY_ERROR:
			wpFileError(fileObj, pluploadL10n.image_memory_exceeded);
			break;
		case plupload.IMAGE_DIMENSIONS_ERROR:
			wpFileError(fileObj, pluploadL10n.image_dimensions_exceeded);
			break;
		case plupload.GENERIC_ERROR:
			wpQueueError(pluploadL10n.upload_failed);
			break;
		case plupload.IO_ERROR:
			max = parseInt( uploader.settings.filters.max_file_size, 10 );

			if ( max > hundredmb && fileObj.size > hundredmb )
				wpFileError( fileObj, pluploadL10n.big_upload_failed.replace('%1$s', '<a class="uploader-html" href="#">').replace('%2$s', '</a>') );
			else
				wpQueueError(pluploadL10n.io_error);
			break;
		case plupload.HTTP_ERROR:
			wpQueueError(pluploadL10n.http_error);
			break;
		case plupload.INIT_ERROR:
			//jQuery('.media-upload-form').addClass('html-uploader');
			break;
		case plupload.SECURITY_ERROR:
			wpQueueError(pluploadL10n.security_error);
			break;
/*		case plupload.UPLOAD_ERROR.UPLOAD_STOPPED:
		case plupload.UPLOAD_ERROR.FILE_CANCELLED:
			jQuery('#media-item-' + fileObj.id).remove();
			break;*/
		default:
			wpFileError(fileObj, pluploadL10n.default_error);
	}
}

function uploadSizeError( up, file, over100mb ) {
	var message;

	if ( over100mb )
		message = pluploadL10n.big_upload_queued.replace('%s', file.name) + ' ' + pluploadL10n.big_upload_failed.replace('%1$s', '<a class="uploader-html" href="#">').replace('%2$s', '</a>');
	else
		message = pluploadL10n.file_exceeds_size_limit.replace('%s', file.name);

	jQuery('#media-items').append('<div id="media-item-' + file.id + '" class="media-item error"><p>' + message + '</p></div>');
	up.removeFile(file);
}

jQuery(document).ready(function($){
	$('.media-upload-form').bind('click.uploader', function(e) {
		var target = $(e.target);

		if ( target.is('.upload-flash-bypass a') ) { // switch uploader to html4

			$('#plupload-upload-ui').addClass('hidden');
			$('#html-upload-ui').removeClass('hidden');
			$('#media-items').css('display', 'none');
			e.preventDefault();
		} else if ( target.is('.upload-html-bypass a') ) { // switch uploader to multi-file
			$('#html-upload-ui').addClass('hidden');
			$('#plupload-upload-ui').removeClass('hidden');
			$('#media-items').css('display', '');
			e.preventDefault();
		}
	});

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
			if ( up.runtime === 'html4' ) {
				$('#plupload-upload-ui').addClass('hidden');
				$('.pload-html-bypass').hide();
			}
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

		uploader.bind('UploadComplete', function() {
			
		});
	};

	if ( typeof(mUploaderInit) == 'object' ) {
		uploader_init();
	}

});
