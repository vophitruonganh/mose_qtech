var module.php = {
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