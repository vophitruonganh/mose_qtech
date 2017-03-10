function isAlphaNum(event) {
	var regex = new RegExp("^[a-zA-Z0-9\\s]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
		event.preventDefault();
		return false;
	}
}
$(document).ready(function(){
	$( ".show_nav_bar" ).click(function() {
		$( ".list_item" ).toggle( "slow", function() {
		});
	});
	$( "a.msg" ).click(function() {
		$( ".account-msg-hidden" ).toggle( "slow", function() {
		});
	});
});