jQuery(document).ready(function($){
	



	//on mobile - open submenu
	
	$('.has-children').children('a').on('click', function(event){
		//prevent default clicking on direct children of .has-children 
		event.preventDefault();
	});



	//on desktop - differentiate between a user trying to hover over a dropdown item vs trying to navigate into a submenu's contents
	

	if ($(window).width() > 991) {		
	var submenuDirection = ( !$('.cd-dropdown-wrapper').hasClass('open-to-left') ) ? 'right' : 'left';
	$('.cd-dropdown-content').menuAim({
        activate: function(row) {
        	$(row).children().addClass('is-active').removeClass('fade-out');
        	if( $('.cd-dropdown-content .fade-in').length == 0 ) $(row).children('ul').addClass('fade-in');
        },
        deactivate: function(row) {
        	$(row).children().removeClass('is-active');
        	if( $('li.has-children:hover').length == 0 || $('li.has-children:hover').is($(row)) ) {
        		$('.cd-dropdown-content').find('.fade-in').removeClass('fade-in');
        		$(row).children('ul').addClass('fade-out')
        	}
        },
        exitMenu: function() {
        	$('.cd-dropdown-content').find('.is-active').removeClass('is-active');
        	return true;
        },
        submenuDirection: submenuDirection,
    });
	}
	else
	{
		$(".mobile-menu-click").click(function() {

			if( $(this).parent().find(".cd-dropdown-icons").is(":visible"))
			{
			  $(this).parent().find(".cd-dropdown-icons").hide();
			}
			else
			{
				$(this).parent().find(".cd-dropdown-icons").show();
			}

			});
	}

	
	
	//IE9 placeholder fallback
	//credits http://www.hagenburger.net/BLOG/HTML5-Input-Placeholder-Fix-With-jQuery.html
	if(!Modernizr.input.placeholder){
		$('[placeholder]').focus(function() {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
				input.val('');
		  	}
		}).blur(function() {
		 	var input = $(this);
		  	if (input.val() == '' || input.val() == input.attr('placeholder')) {
				input.val(input.attr('placeholder'));
		  	}
		}).blur();
		$('[placeholder]').parents('form').submit(function() {
		  	$(this).find('[placeholder]').each(function() {
				var input = $(this);
				if (input.val() == input.attr('placeholder')) {
			 		input.val('');
				}
		  	})
		});
	}
});

















	
	$(window).resize(function() {
		
			//on mobile - open submenu

			$('.has-children').children('a').on('click', function(event){
				//prevent default clicking on direct children of .has-children 
				event.preventDefault();
			});

		
		
		if ($(window).width() > 991) {
		var submenuDirection = ( !$('.cd-dropdown-wrapper').hasClass('open-to-left') ) ? 'right' : 'left';
			$(this).parent().find(".cd-dropdown-icons").show();
		$('.cd-dropdown-content').menuAim({
			activate: function(row) {
				$(row).children().addClass('is-active').removeClass('fade-out');
				if( $('.cd-dropdown-content .fade-in').length == 0 ) $(row).children('ul').addClass('fade-in');
			},
			deactivate: function(row) {
				$(row).children().removeClass('is-active');
				if( $('li.has-children:hover').length == 0 || $('li.has-children:hover').is($(row)) ) {
					$('.cd-dropdown-content').find('.fade-in').removeClass('fade-in');
					$(row).children('ul').addClass('fade-out')
				}
			},
			exitMenu: function() {
				$('.cd-dropdown-content').find('.is-active').removeClass('is-active');
				return true;
			},
			submenuDirection: submenuDirection,
		});
		}
		
		
		
		if ($(window).width() < 991) {
				$(".mobile-menu-click").parent().find(".cd-dropdown-icons").hide();
			
				$(".mobile-menu-click").click(function() {
				if( $(this).parent().find(".cd-dropdown-icons").is(":visible"))
				{
				  $(this).parent().find(".cd-dropdown-icons").hide();
				}
				else
				{
					$(this).parent().find(".cd-dropdown-icons").show();
					
				}

				});

		}
		else
		{
				$(".mobile-menu-click").parent().find(".cd-dropdown-icons").show();
		}
		
	
	});