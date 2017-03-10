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
$(document).ready(function() {
    module.Core.init();
});