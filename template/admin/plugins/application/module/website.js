module.website = {
    navigation_Setup: function () {
    	var ns = $('ol.menu-sortable').nestedSortable({
			forcePlaceholderSize: true,
			handle: '.item-title',
			helper:	'clone',
			items: 'li',
			opacity: .6,
			placeholder: 'placeholder',
			collapsedClass: '.menu-item-edit-active',
			revert: 250,
			tabSize: 25,
			tolerance: 'pointer',
			toleranceElement: '> div',
			maxLevels: 4,
			isTree: true,
			expandOnHover: 700,
			startCollapsed: false,
			change: function(){
				//console.log('Relocated item');
			}
		});
		
		$('.menu-sortable').on( "click",'.item-edit', function() {
			var id = $(this).attr('data-id');
			$('#menu-item-settings-'+id).toggle();
			$(this).toggleClass('icon-arrow-up').toggleClass('icon-arrow-down');
			$('#menu-item-'+id).toggleClass('menu-item-edit-inactive').toggleClass('menu-item-edit-active');
		});
		$('.menu-sortable').on( "click",'.item-delete', function() {
			var id = $(this).attr('data-id');
			$('#menu-item-'+id).remove();
		});
    },
    navigation_Add: function () {
    	$('.taxonomy-list-btn').on( "click", function(e) {
    		var taxonomy = $(this).parent().find('.taxonomy-checklist');
            var count = 0, type = '', item_html = '', item_id = '', item_url = '', item_text = '',input_url='';
    		if(taxonomy.length > 0){
	    		var check = module.form.taxonomyCheckbox();
	            if(check == undefined || typeof check == 'undefined' || check == null || check == '')
	                return false;
	            count = check.length;
	     		type = $(this).parent().find('.taxonomy-list').attr('data-type');
    		}else {
    			item_url = $(this).parent().find('.custom-url').val();
    			var RegExp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
    			if(item_url.length > 0 && RegExp.test(item_url)){
    				input_url = '<div class="form-group"><label class="sr-only">Đường dẫn</label><input type="text" placeholder="http://" class="form-control" data-type="url" value="'+item_url+'" /></div>';
    			}else {
    				return false;
    			}
    			item_text = $(this).parent().find('.custom-name').val();
    			count = 1;
    		}
	        var menu_html = $('.menu-sortable').html();
            if(count > 0){
            	for (var i = 0; i < count; i++) {
            		if(taxonomy.length > 0){
            			item_text = taxonomy.find('li[data-id='+check[i]+']').attr('data-text');
            			item_id = check[i];
	           		 	item_url = type+'-'+item_id;
            		}

    				//var menu_id = module.form.randomIntFromInterval(1,99999999);
    				var menu_id = module.php.mt_rand(1,99999999);
    				if(menu_html.indexOf(menu_id) > 0){
    					menu_id = module.php.mt_rand(1,99999999);
    				}
            		if(item_text !== undefined && typeof item_text !== 'undefined' && item_text !== null && item_text !== ''){
            			item_html += '<li id="menu-item-'+menu_id+'" data-url="'+item_url+'" data-title="'+item_text+'" class="menu-item-edit-inactive"><div class="menu-item-bar"><div class="menu-item-handle"><span class="item-title"><span data-id="'+menu_id+'" class="menu-item-title">'+item_text+'</span></span><span class="item-controls"><span data-id="'+menu_id+'" class="item-edit font-icon icon-arrow-up"></span></span><div id="menu-item-settings-'+menu_id+'" class="menu-item-settings" style="display: none;"><div class="form-group"><label class="sr-only">Tên đường dẫn</label><input type="text" placeholder="Tên đường dẫn" class="form-control" data-type="title" value="'+item_text+'" /></div>'+input_url+'<div class="settings-action"><span class="item-delete" data-id="'+menu_id+'"><span class="dashicons dashicons-trash"></span>Xóa mục</span></div></div></div></div></li>';
            		}
            		
            	}
            }
            $('.navigation-widget input:checkbox').removeAttr('checked');
            $('.navigation-widget input:text').val('');
           	$('.menu-sortable').append(item_html);
    	});
    	$('.menu-sortable').on('click','.form-control', function(e) {
	    	$(this).keyup(function() {
				var type = $(this).attr("data-type");
				var text = $(this).val();
				if(type == "url"){
					$(this).parents('li.menu-item-edit-active').attr("data-url",text)
	    		}else if(type == "title"){
	    			$(this).parents('li.menu-item-edit-active').attr("data-title",text)
	    		}
			});
    	});
    },
    // navigation_Data: function (item) {
    // 	var data = [];
    // 	var selector = item.find('> li');
    // 	for (var i = 0; i < selector.length; i++) {
    // 		data[i] = {};
    // 		data[i].url = $(selector[i]).attr('data-url');
    // 		data[i].title = $(selector[i]).attr('data-title');
    // 		if($(selector[i]).find('> ol').length > 0){
    // 			data[i].sub_menu = module.website.navigation_Data($(selector[i]).find('> ol'));
	   //  	}
    // 	}
    // 	return data;
    // },
    navigation_ListAction: function () {
		$('#menu-action-btn').on( "click", function(e) {
			e.preventDefault();
			var ajaxdata = {
		        type:'action'
			}
			var ajaxurl = $(this).parents('form').attr('action');
			module.general.ListAction('list',ajaxdata,ajaxurl);
		});
	},
	navigation_ListSearch: function () {
		$('#menu-search-btn').on( "click", function(e) {
			e.preventDefault();
			var ajaxdata = {
		        type:'search'
			}
			var ajaxurl = $(this).parents('form').attr('action');
			module.general.ListSearch(ajaxdata,ajaxurl);
		});
	},
    navigation_Submit: function () {
    	function navigation_data(item) {
	    	var data = [];
	    	var selector = item.find('> li');
	    	for (var i = 0; i < selector.length; i++) {
	    		data[i] = {};
	    		data[i].url = $(selector[i]).attr('data-url');
	    		data[i].title = $(selector[i]).attr('data-title');
	    		if($(selector[i]).find('> ol').length > 0){
	    			data[i].sub_menu = navigation_data($(selector[i]).find('> ol'));
		    	}
	    	}
	    	return data;
	    }
    	$('#navigation-submit-btn').on( "click", function(e) {
    		e.preventDefault();
    		var title = $('#menu-title').val();
    		if(title == undefined || typeof title == 'undefined' || title == null || title == ''){
    			return false;
    		}
    		var slug = $('#menu-slug').val();
    		if(slug == undefined || typeof slug == 'undefined' || slug == null || slug == ''){
    			slug = '';
    		}
    		var item = $('.menu-sortable');
    		var data_menu = navigation_data(item);
    		var menu = $('#select_index').val();
    		var ajaxurl = $(this).parents('form').attr('action');
    		var ajaxdata = {
    			_token: $('#page_token').val(),
    			title:title,
    			menu:menu,
    			slug:slug,
    			menu_data:module.php.json_encode(data_menu)
    		}
    		var getAjax = module.form.Ajax(ajaxdata,ajaxurl);
    		if(typeof getAjax == 'undefined')
                return false;
            getAjax.success(function(data){
                module.form.responseMessage(data);
            }).complete(function() {
                    
            }).error(function() {
                module.form.Alert('error');
            });
    	});
    },
    init: function () {
    	//module.form.submitDisable('#navigation-form');
        module.website.navigation_Setup();
        module.website.navigation_Add();
        module.website.navigation_Submit();
        //module.website.navigation_ListSearch();
        //module.website.navigation_ListAction();
    }
}
$(document).ready(function() {
    module.website.init();
});