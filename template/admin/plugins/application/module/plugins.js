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
		module.plugins.SEOSnippetPreview();
		module.plugins.sortable();
        module.plugins.editorTinymce();
	}
}
$(document).ready(function() {
    module.plugins.init();
});