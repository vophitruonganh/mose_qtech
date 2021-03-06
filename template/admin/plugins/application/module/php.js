module.php = {
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
	},
	json_encode: function (mixedVal) { 
		// eslint-disable-line camelcase
		var $global = (typeof window !== 'undefined' ? window : GLOBAL);
		$global.$locutus = $global.$locutus || {};
		var $locutus = $global.$locutus;
		$locutus.php = $locutus.php || {};

		var json = $global.JSON;
		var retVal;
		try {
			if (typeof json === 'object' && typeof json.stringify === 'function') {
				// Errors will not be caught here if our own equivalent to resource
				retVal = json.stringify(mixedVal);
				if (retVal === undefined) {
					throw new SyntaxError('json_encode');
				}
				return retVal;
			}
			var value = mixedVal;
			var quote = function (string) {
				var escapeChars = [
					'\u0000-\u001f',
					'\u007f-\u009f',
					'\u00ad',
					'\u0600-\u0604',
					'\u070f',
					'\u17b4',
					'\u17b5',
					'\u200c-\u200f',
					'\u2028-\u202f',
					'\u2060-\u206f',
					'\ufeff',
					'\ufff0-\uffff'
				].join('');
				var escapable = new RegExp('[\\"' + escapeChars + ']', 'g');
				var meta = {
					// table of character substitutions
					'\b': '\\b',
					'\t': '\\t',
					'\n': '\\n',
					'\f': '\\f',
					'\r': '\\r',
					'"': '\\"',
					'\\': '\\\\'
				}
				escapable.lastIndex = 0;
				return escapable.test(string) ? '"' + string.replace(escapable, function (a) {
					var c = meta[a]
					return typeof c === 'string' ? c : '\\u' + ('0000' + a.charCodeAt(0).toString(16)).slice(-4)
				}) + '"' : '"' + string + '"';
			}

			var _str = function (key, holder) {
				var gap = ''
				var indent = '    '
				// The loop counter.
				var i = 0
				// The member key.
				var k = ''
				// The member value.
				var v = ''
				var length = 0
				var mind = gap
				var partial = []
				var value = holder[key]

				// If the value has a toJSON method, call it to obtain a replacement value.
				if (value && typeof value === 'object' && typeof value.toJSON === 'function') {
					value = value.toJSON(key)
				}

				// What happens next depends on the value's type.
				switch (typeof value) {
					case 'string':
						return quote(value)
					case 'number':
						// JSON numbers must be finite. Encode non-finite numbers as null.
						return isFinite(value) ? String(value) : 'null'

					case 'boolean':
					case 'null':
						// If the value is a boolean or null, convert it to a string. Note:
						// typeof null does not produce 'null'. The case is included here in
						// the remote chance that this gets fixed someday.
						return String(value)

					case 'object':
						// If the type is 'object', we might be dealing with an object or an array or
						// null.
						// Due to a specification blunder in ECMAScript, typeof null is 'object',
						// so watch out for that case.
						if (!value) {
							return 'null'
						}

						// Make an array to hold the partial results of stringifying this object value.
						gap += indent;
						partial = []

						// Is the value an array?
						if (Object.prototype.toString.apply(value) === '[object Array]') {
							// The value is an array. Stringify every element. Use null as a placeholder
							// for non-JSON values.
							length = value.length;
							for (i = 0; i < length; i += 1) {
								partial[i] = _str(i, value) || 'null';
							}

							// Join all of the elements together, separated with commas, and wrap them in
							// brackets.
							v = partial.length === 0 ? '[]' : gap ? '[\n' + gap + partial.join(',\n' + gap) + '\n' + mind + ']' : '[' + partial.join(',') + ']';
							gap = mind;
							return v;
						}

						// Iterate through all of the keys in the object.
						for (k in value) {
							if (Object.hasOwnProperty.call(value, k)) {
								v = _str(k, value);
								if (v) {
									partial.push(quote(k) + (gap ? ': ' : ':') + v);
								}
							}
						}

						// Join all of the member texts together, separated with commas,
						// and wrap them in braces.
						v = partial.length === 0 ? '{}' : gap ? '{\n' + gap + partial.join(',\n' + gap) + '\n' + mind + '}' : '{' + partial.join(',') + '}';
						gap = mind;
						return v;
					case 'undefined':
					case 'function':
					default:
					throw new SyntaxError('json_encode');
				}
			}

			// Make a fake root object containing our value under the key of ''.
			// Return the result of stringifying the value.
			return _str('', {
				'': value
			})
		} catch (err) {
			// @todo: ensure error handling above throws a SyntaxError in all cases where it could
			// (i.e., when the JSON global is not available and there is an error)
			if (!(err instanceof SyntaxError)) {
				throw new Error('Unexpected error type in json_encode()');
			}
			// usable by json_last_error()
			$locutus.php.last_error_json = 4
			return null;
		}
	},
	json_decode: function (strJson) { 
		var $global = (typeof window !== 'undefined' ? window : GLOBAL);
		$global.$locutus = $global.$locutus || {};
		var $locutus = $global.$locutus;
		$locutus.php = $locutus.php || {};

		var json = $global.JSON;
		if (typeof json === 'object' && typeof json.parse === 'function') {
			try {
				return json.parse(strJson);
			} 
			catch (err) {
				if (!(err instanceof SyntaxError)) {
					throw new Error('Unexpected error type in json_decode()');
				}

				// usable by json_last_error()
				$locutus.php.last_error_json = 4;
				return null;
			}
		}

		var chars = [
			'\u0000',
			'\u00ad',
			'\u0600-\u0604',
			'\u070f',
			'\u17b4',
			'\u17b5',
			'\u200c-\u200f',
			'\u2028-\u202f',
			'\u2060-\u206f',
			'\ufeff',
			'\ufff0-\uffff'
			].join('');
		var cx = new RegExp('[' + chars + ']', 'g');
		var j;
		var text = strJson;
		cx.lastIndex = 0;
		if (cx.test(text)) {
			text = text.replace(cx, function (a) {
				return '\\u' + ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
			})
		}

		var m = (/^[\],:{}\s]*$/).test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''));
		if (m) {
			j = eval('(' + text + ')');
			return j;
		}

		// usable by json_last_error()
		$locutus.php.last_error_json = 4;
		return null;
	},
	mt_rand: function (min, max) {
		var argc = arguments.length;
		if (argc === 0) {
    		min = 0;
    		max = 2147483647;
  		} else if (argc === 1) {
    		throw new Error('Warning: mt_rand() expects exactly 2 parameters, 1 given');
  		} else {
    		min = parseInt(min, 10)
    		max = parseInt(max, 10)
  		}
  		return Math.floor(Math.random() * (max - min + 1)) + min
	}
}