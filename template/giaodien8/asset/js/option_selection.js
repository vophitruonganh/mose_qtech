if ((typeof QMTECH) == 'undefined') {
    var QMTECH = {};
}

QMTECH.cultures = [
    {
        code: 'vi-VN',
        thousands: ',',
        decimal: '.',
        numberdecimal: 0,
        money_format: '{{amount}}'
    },
    {
        code: 'en-US',
        thousands: ',',
        decimal: '.',
        numberdecimal: 2,
        money_format: '{{amount}}'
    }
]

QMTECH.getCulture = function (code) {
    var culture;
    for (n = 0; n < QMTECH.cultures.length; n++) {
        if (QMTECH.cultures[n].code == code) {
            culture = QMTECH.cultures[n];
            break;
        }
    }
    if (!culture) {
        culture = QMTECH.cultures[0];
    }
    return culture;
}

QMTECH.format = QMTECH.getCulture(QMTECH.culture)
QMTECH.money_format = "{{amount}}";

// ---------------------------------------------------------------------------
// QMTECH generic helper methods
// ---------------------------------------------------------------------------
QMTECH.each = function (ary, callback) {
    for (var i = 0; i < ary.length; i++) {
        callback(ary[i], i);
    }
};

QMTECH.map = function (ary, callback) {
    var result = [];
    for (var i = 0; i < ary.length; i++) {
        result.push(callback(ary[i], i));
    }
    return result;
};

QMTECH.arrayIncludes = function (ary, obj) {
    for (var i = 0; i < ary.length; i++) {
        if (ary[i] == obj) {
            return true;
        }
    }
    return false;
};

QMTECH.uniq = function (ary) {
    var result = [];
    for (var i = 0; i < ary.length; i++) {
        if (!QMTECH.arrayIncludes(result, ary[i])) { result.push(ary[i]); }
    }
    return result;
};

QMTECH.isDefined = function (obj) {
    return ((typeof obj == 'undefined') ? false : true);
};

QMTECH.getClass = function (obj) {
    return Object.prototype.toString.call(obj).slice(8, -1);
};

QMTECH.extend = function (subClass, baseClass) {
    function inheritance() { }
    inheritance.prototype = baseClass.prototype;

    subClass.prototype = new inheritance();
    subClass.prototype.constructor = subClass;
    subClass.baseConstructor = baseClass;
    subClass.superClass = baseClass.prototype;
};

QMTECH.urlParam = function (name) {
    var match = RegExp('[?&]' + name + '=([^&]*)').exec(window.location.search);
    return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
}



// ---------------------------------------------------------------------------
// QMTECH Product object
// JS representation of Product
// ---------------------------------------------------------------------------
QMTECH.Product = function (json) {
    if (QMTECH.isDefined(json)) { this.update(json); }
};

QMTECH.Product.prototype.update = function (json) {
    for (property in json) {
        this[property] = json[property];
    }
};

// returns array of option names for product
QMTECH.Product.prototype.optionNames = function () {
    if (QMTECH.getClass(this.options) == 'Array') {
        return this.options;
    } else {
        return [];
    }
};

// returns array of all option values (in order) for a given option name index
QMTECH.Product.prototype.optionValues = function (index) {
    if (!QMTECH.isDefined(this.variants)) { return null; }
    var results = QMTECH.map(this.variants, function (e) {
        var option_col = "option" + (index + 1);
        return (e[option_col] == undefined) ? null : e[option_col];
    });
    return (results[0] == null ? null : QMTECH.uniq(results));
};

// return the variant object if exists with given values, otherwise return null
QMTECH.Product.prototype.getVariant = function (selectedValues) {
    var found = null;
    if (selectedValues.length != this.options.length) { return found; }

    QMTECH.each(this.variants, function (variant) {
        var satisfied = true;
        for (var j = 0; j < selectedValues.length; j++) {
            var option_col = "option" + (j + 1);
            if (variant[option_col] != selectedValues[j]) {
                satisfied = false;
            }
        }
        if (satisfied == true) {
            found = variant;
            return;
        }
    });
    return found;
};

QMTECH.Product.prototype.getVariantById = function (id) {
    for (var i = 0; i < this.variants.length; i++) {
        var variant = this.variants[i];

        if (id == variant.id) {
            return variant;
        }
    }

    return null;
}

// ---------------------------------------------------------------------------
// Money format handler
// ---------------------------------------------------------------------------

QMTECH.formatMoney = function (cents, format) {
    cents = cents / 100;
    if (typeof cents == 'string') cents = cents.replace(QMTECH.format.thousands, '');
    var value = '';
    var patt = /\{\{\s*(\w+)\s*\}\}/;
    var formatString = (format || this.money_format);

    function addCommas(moneyString) {
        return moneyString.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1' + QMTECH.format.thousands);
    }
    switch (formatString.match(patt)[1]) {
        case 'amount':
            value = addCommas(floatToString(cents, QMTECH.format.numberdecimal));
            break;
        case 'amount_no_decimals':
            value = addCommas(floatToString(cents, 0));
            break;
        case 'amount_with_comma_separator':
            value = floatToString(cents, QMTECH.format.numberdecimal).replace(/\./, ',');
            break;
        case 'amount_no_decimals_with_comma_separator':
            value = addCommas(floatToString(cents, 0)).replace(/\./, ',');
            break;
    }
    return formatString.replace(patt, value);
};

function floatToString(numeric, decimals) {
    var amount = numeric.toFixed(decimals).toString();
    amount.replace('.', QMTECH.decimal);
    if (amount.match('^[\.' + QMTECH.decimal + ']\d+')) { return "0" + amount; }
    else { return amount; }
}
// ---------------------------------------------------------------------------
// OptionSelectors(domid, options)
//
// ---------------------------------------------------------------------------
QMTECH.OptionSelectors = function (existingSelectorId, options) {
    this.selectorDivClass = 'selector-wrapper';
    this.selectorClass = 'single-option-selector';
    this.variantIdFieldIdSuffix = '-variant-id';

    this.variantIdField = null;
    this.historyState = null;
    this.selectors = [];
    this.domIdPrefix = existingSelectorId;
    this.product = new QMTECH.Product(options.product);
    this.onVariantSelected = QMTECH.isDefined(options.onVariantSelected) ? options.onVariantSelected : function () { };

    this.replaceSelector(existingSelectorId); // create the dropdowns
    this.initDropdown();

    if (options.enableHistoryState) {
        this.historyState = new QMTECH.OptionSelectors.HistoryState(this);
    }

    return true;
};

QMTECH.OptionSelectors.prototype.initDropdown = function () {
    var options = { initialLoad: true };
    var successDropdownSelection = this.selectVariantFromDropdown(options);

    if (!successDropdownSelection) {
        var self = this;
        setTimeout(function () {
            if (!self.selectVariantFromParams(options)) {
                self.fireOnChangeForFirstDropdown.call(self, options);
            }
        });
    }
};

QMTECH.OptionSelectors.prototype.fireOnChangeForFirstDropdown = function (options) {
    if (!this.selectors && !this.selectors.length && this.selectors.length > 0) {
        this.selectors[0].element.onchange(options);
    }
};

QMTECH.OptionSelectors.prototype.selectVariantFromParamsOrDropdown = function (options) {
    var success = this.selectVariantFromParams(options)

    if (!success) {
        this.selectVariantFromDropdown(options);
    }
};

// insert new multi-selectors and hide original selector
QMTECH.OptionSelectors.prototype.replaceSelector = function (domId) {
    var oldSelector = document.getElementById(domId);
    if (oldSelector != null) {
        var parent = oldSelector.parentNode;
        QMTECH.each(this.buildSelectors(), function (el) {
            parent.insertBefore(el, oldSelector);
        });
        oldSelector.style.display = 'none';
        this.variantIdField = oldSelector;
    }
};

QMTECH.OptionSelectors.prototype.selectVariantFromDropdown = function (options) {
    var option = document.getElementById(this.domIdPrefix);
    if (!option) {
        return false;
    }
    option = option.querySelector("[selected]");
    if (option != null) {
        var variantId = option.value;
        return this.selectVariant(variantId, options);
    }
    return false;
};

QMTECH.OptionSelectors.prototype.selectVariantFromParams = function (options) {
    var variantId = QMTECH.urlParam("variant");
    return this.selectVariant(variantId, options);
};

QMTECH.OptionSelectors.prototype.selectVariant = function (variantId, options) {
    var variant = this.product.getVariantById(variantId);

    if (variant == null) {
        return false;
    }

    for (var i = 0; i < this.selectors.length; i++) {
        var element = this.selectors[i].element;
        var optionName = element.getAttribute("data-option")
        var value = variant[optionName];
        if (value == null || !this.optionExistInSelect(element, value)) {
            continue;
        }

        element.value = value;
    }


    if (typeof jQuery !== 'undefined') {
        jQuery(this.selectors[0].element).trigger('change', options);
    } else {
        this.selectors[0].element.onchange(options);
    }
    return true;
};

QMTECH.OptionSelectors.prototype.optionExistInSelect = function (select, value) {
    for (var i = 0; i < select.options.length; i++) {
        if (select.options[i].value == value) {
            return true;
        }
    }
}

// insertSelectors(domId, msgDomId)
// create multi-selectors in the given domId, and use msgDomId to show messages
QMTECH.OptionSelectors.prototype.insertSelectors = function (domId, messageElementId) {
    if (QMTECH.isDefined(messageElementId)) { this.setMessageElement(messageElementId); }

    this.domIdPrefix = "product-" + this.product.id + "-variant-selector";

    var parent = document.getElementById(domId);
    if (!parent) { return false };
    QMTECH.each(this.buildSelectors(), function (el) {
        parent.appendChild(el);
    });
};

// buildSelectors(index)
// create and return new selector element for given option
QMTECH.OptionSelectors.prototype.buildSelectors = function () {
    // build selectors
    for (var i = 0; i < this.product.optionNames().length; i++) {
        var sel = new QMTECH.SingleOptionSelector(this, i, this.product.optionNames()[i], this.product.optionValues(i));
        sel.element.disabled = false;
        this.selectors.push(sel);
    }

    // replace existing selector with new selectors, new hidden input field, new hidden messageElement
    var divClass = this.selectorDivClass;
    var optionNames = this.product.optionNames();
    var elements = QMTECH.map(this.selectors, function (selector) {
        var div = document.createElement('div');
        div.setAttribute('class', divClass);
        // create label if more than 1 option (ie: more than one drop down)
        if (optionNames.length > 1) {
            // create and appened a label into div
            var label = document.createElement('label');
            label.htmlFor = selector.element.id;
            label.innerHTML = selector.name;
            div.appendChild(label);
        }
        div.appendChild(selector.element);
        return div;
    });

    return elements;
};

// returns array of currently selected values from all multiselectors
QMTECH.OptionSelectors.prototype.selectedValues = function () {
    var currValues = [];
    for (var i = 0; i < this.selectors.length; i++) {
        var thisValue = this.selectors[i].element.value;
        currValues.push(thisValue);
    }
    return currValues;
};

// callback when a selector is updated.
QMTECH.OptionSelectors.prototype.updateSelectors = function (index, options) {
    var currValues = this.selectedValues(); // get current values
    var variant = this.product.getVariant(currValues);
    if (variant) {
        this.variantIdField.disabled = false;
        this.variantIdField.value = variant.id; // update hidden selector with new variant id
    } else {
        this.variantIdField.disabled = true;
    }

    this.onVariantSelected(variant, this, options);  // callback

    if (this.historyState != null) {
        this.historyState.onVariantChange(variant, this, options);
    }
};
// ---------------------------------------------------------------------------
// OptionSelectorsFromDOM(domid, options)
//
// ---------------------------------------------------------------------------

QMTECH.OptionSelectorsFromDOM = function (existingSelectorId, options) {
    // build product json from selectors
    // create new options hash
    var optionNames = options.optionNames || [];
    var priceFieldExists = options.priceFieldExists || true;
    var delimiter = options.delimiter || '/';
    var productObj = this.createProductFromSelector(existingSelectorId, optionNames, priceFieldExists, delimiter);
    options.product = productObj;
    QMTECH.OptionSelectorsFromDOM.baseConstructor.call(this, existingSelectorId, options);
};

QMTECH.extend(QMTECH.OptionSelectorsFromDOM, QMTECH.OptionSelectors);

// updates the product_json from existing select element
QMTECH.OptionSelectorsFromDOM.prototype.createProductFromSelector = function (domId, optionNames, priceFieldExists, delimiter) {
    if (!QMTECH.isDefined(priceFieldExists)) { var priceFieldExists = true; }
    if (!QMTECH.isDefined(delimiter)) { var delimiter = '/'; }

    var oldSelector = document.getElementById(domId);
    if (!oldSelector) { return false };
    var options = oldSelector.childNodes;
    var parent = oldSelector.parentNode;

    var optionCount = optionNames.length;

    // build product json + messages array
    var variants = [];
    var self = this;
    QMTECH.each(options, function (option, variantIndex) {
        if (option.nodeType == 1 && option.tagName.toLowerCase() == 'option') {
            var chunks = option.innerHTML.split(new RegExp('\\s*\\' + delimiter + '\\s*'));

            if (optionNames.length == 0) {
                optionCount = chunks.length - (priceFieldExists ? 1 : 0);
            }

            var optionOptionValues = chunks.slice(0, optionCount);
            var message = (priceFieldExists ? chunks[optionCount] : '');
            var variantId = option.getAttribute('value');

            var attributes = {
                available: (option.disabled ? false : true),
                id: parseFloat(option.value),
                price: message,
                option1: optionOptionValues[0],
                option2: optionOptionValues[1],
                option3: optionOptionValues[2]
            };
            variants.push(attributes);
        }
    });
    var updateObj = { variants: variants };
    if (optionNames.length == 0) {
        updateObj.options = [];
        for (var i = 0; i < optionCount; i++) { updateObj.options[i] = ('option ' + (i + 1)) }
    } else {
        updateObj.options = optionNames;
    }
    return updateObj;
};


// ---------------------------------------------------------------------------
// SingleOptionSelector
// takes option name and values and creates a option selector from them
// ---------------------------------------------------------------------------
QMTECH.SingleOptionSelector = function (multiSelector, index, name, values) {
    this.multiSelector = multiSelector;
    this.values = values;
    this.index = index;
    this.name = name;
    this.element = document.createElement('select');
    if (this.values != undefined) {
        for (var i = 0; i < this.values.length; i++) {
            var opt = document.createElement('option');
            opt.value = values[i];
            opt.innerHTML = values[i];
            this.element.appendChild(opt);
        }
    }
    this.element.setAttribute('class', this.multiSelector.selectorClass);
    this.element.setAttribute('data-option', 'option' + (index + 1));
    this.element.id = multiSelector.domIdPrefix + '-option-' + index;
    this.element.onchange = function (event, options) {
        options = options || {};

        multiSelector.updateSelectors(index, options);
    };

    return true;
};

// ---------------------------------------------------------------------------
// Image.switchImage
// helps to switch variant images on variant selection
// ---------------------------------------------------------------------------
QMTECH.Image = {

    preload: function (images, size) {
        for (var i = 0; i < images.length; i++) {
            var image = images[i];

            this.loadImage(this.getSizedImageUrl(image, size));
        }
    },

    loadImage: function (path) {
        new Image().src = path;
    },

    switchImage: function (image, element, callback) {
        if (!image) {
            return;
        }

        var size = this.imageSize(element.src)
        var imageUrl = this.getSizedImageUrl(image.src, size);

        if (callback) {
            callback(imageUrl, image, element);
        } else {
            element.src = imageUrl;
        }
    },

    imageSize: function (src) {
        var match = src.match(/(1024x1024|2048x2048|pico|icon|thumb|small|compact|medium|large|grande)\./);

        if (match != null) {
            return match[1];
        } else {
            return null;
        }
    },

    getSizedImageUrl: function (src, size) {
        if (size == null) {
            return src;
        }

        if (size == 'master') {
            return this.removeProtocol(src);
        }

        var match = src.match(/\.(jpg|jpeg|gif|png|bmp|bitmap|tiff|tif)(\?v=\d+)?/);

        if (match != null) {
            var prefix = src.split(match[0]);
            var suffix = match[0];

            return this.removeProtocol(prefix[0] + "_" + size + suffix);
        } else {
            return null;
        }
    },

    removeProtocol: function (path) {
        return path.replace(/http(s)?:/, "");
    }
};


// ---------------------------------------------------------------------------
// QMTECH.HistoryState
// Gets events from Push State
// ---------------------------------------------------------------------------

QMTECH.OptionSelectors.HistoryState = function (optionSelector) {
    if (this.browserSupports()) {
        this.register(optionSelector);
    }
};

QMTECH.OptionSelectors.HistoryState.prototype.register = function (optionSelector) {
    window.addEventListener("popstate", function (event) {
        optionSelector.selectVariantFromParamsOrDropdown({ popStateCall: true });
    });
};

QMTECH.OptionSelectors.HistoryState.prototype.onVariantChange = function (variant, selector, data) {
    if (this.browserSupports()) {
        if (variant && !data.initialLoad && !data.popStateCall) {
            window.history.pushState({}, document.title, "?variant=" + variant.id);
        }
    }
};

QMTECH.OptionSelectors.HistoryState.prototype.browserSupports = function () {
    return window.history && window.history.pushState;
};