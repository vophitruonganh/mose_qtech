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