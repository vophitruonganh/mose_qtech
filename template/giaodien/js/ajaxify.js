//if ((typeof Haravan) === 'undefined') { Haravan = {}; }
//function urlParams (name) {
//    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
//    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
//        results = regex.exec(location.search);
//    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
//}
//function attributeToString(attribute) {
//    if ((typeof attribute) !== 'string') {
//        attribute += '';
//        if (attribute === 'undefined') {
//            attribute = '';
//        }
//    }
//    return jQuery.trim(attribute);
//};
//if (!Haravan.formatMoney) {
//    Haravan.formatMoney = function(cents, format) {
//        var value = '',
//            placeholderRegex = /\{\{\s*(\w+)\s*\}\}/,
//            formatString = (format || this.money_format);
//        if (typeof cents == 'string') {
//            cents = cents.replace('.','');
//        }
//        function defaultOption(opt, def) {
//            return (typeof opt == 'undefined' ? def : opt);
//        }
//        function formatWithDelimiters(number, precision, thousands, decimal) {
//            precision = defaultOption(precision, 2);
//            thousands = defaultOption(thousands, ',');
//            decimal   = defaultOption(decimal, '.');
//            if (isNaN(number) || number == null) {
//                return 0;
//            }
//            number = (number/100.0).toFixed(precision);
//            var parts   = number.split('.'),
//                dollars = parts[0].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1' + thousands),
//                cents   = parts[1] ? (decimal + parts[1]) : '';
//            return dollars + cents;
//        }
//        switch(formatString.match(placeholderRegex)[1]) {
//            case 'amount':
//                value = formatWithDelimiters(cents, 2);
//                break;
//            case 'amount_no_decimals':
//                value = formatWithDelimiters(cents, 0);
//                break;
//            case 'amount_with_comma_separator':
//                value = formatWithDelimiters(cents, 2, '.', ',');
//                break;
//            case 'amount_no_decimals_with_comma_separator':
//                value = formatWithDelimiters(cents, 0, '.', ',');
//                break;
//        }
//        return formatString.replace(placeholderRegex, value);
//    };
//}
//Haravan.onProduct = function(product) {
//    // alert('Received everything we ever wanted to know about ' + product.title);
//};
//Haravan.onCartUpdate = function(cart) {
//    // alert('There are now ' + cart.item_count + ' items in the cart.');
//};
//Haravan.updateCartNote = function(note, callback) {
//    var params = {
//        type: 'POST',
//        url: '/cart/update.js',
//        data: 'note=' + attributeToString(note),
//        dataType: 'json',
//        success: function(cart) {
//            if ((typeof callback) === 'function') {
//                callback(cart);
//            }
//            else {
//                Haravan.onCartUpdate(cart);
//            }
//        },
//        error: function(XMLHttpRequest, textStatus) {
//            Haravan.onError(XMLHttpRequest, textStatus);
//        }
//    };
//    jQuery.ajax(params);
//};
//Haravan.onError = function(XMLHttpRequest, textStatus) {
//    var data = eval('(' + XMLHttpRequest.responseText + ')');
//    if (!!data.message) {
//        alert(data.message + '(' + data.status  + '): ' + data.description);
//    } else {
//        alert('Error : ' + Haravan.fullMessagesFromErrors(data).join('; ') + '.');
//    }
//};
//Haravan.addItem = function(variant_id, quantity, callback) {
//    var quantity = quantity || 1,
//        params = {
//            type: 'POST',
//            url: '/cart/add.js',
//            data: 'quantity=' + quantity + '&id=' + variant_id,
//            dataType: 'json',
//            success: function(line_item) {
//                if ((typeof callback) === 'function') {
//                    callback(line_item);
//                }
//                else {
//                    Haravan.onItemAdded(line_item);
//                }
//            },
//            error: function(XMLHttpRequest, textStatus) {
//                Haravan.onError(XMLHttpRequest, textStatus);
//            }
//        };
//        jQuery.ajax(params);
//};
//Haravan.addItemFromForm = function(form, callback, errorCallback) {
//    var params = {
//        type: 'POST',
//        url: '/cart/add.js',
//        data: jQuery(form).serialize(),
//        dataType: 'json',
//        success: function(line_item) {
//            if ((typeof callback) === 'function') {
//                callback(line_item, form);
//            }
//            else {
//                Haravan.onItemAdded(line_item, form);
//            }
//        },
//        error: function(XMLHttpRequest, textStatus) {
//            if ((typeof errorCallback) === 'function') {
//                errorCallback(XMLHttpRequest, textStatus);
//            }
//            else {
//                Haravan.onError(XMLHttpRequest, textStatus);
//            }
//        }
//    };
//    jQuery.ajax(params);
//};
//Haravan.getCart = function(callback) {
//    jQuery.getJSON('/cart.js', function (cart, textStatus) {
//        if ((typeof callback) === 'function') {
//            callback(cart);
//        }
//        else {
//            Haravan.onCartUpdate(cart);
//        }
//    });
//};
//Haravan.getProduct = function(handle, callback) {
//    jQuery.getJSON('/products/' + handle + '.js', function (product, textStatus) {
//        if ((typeof callback) === 'function') {
//            callback(product);
//        }
//        else {
//            Haravan.onProduct(product);
//        }
//    });
//};
//Haravan.changeItem = function(variant_id, quantity, callback) {
//    var params = {
//        type: 'POST',
//        url: '/cart/change.js',
//        data:  'quantity='+quantity+'&id='+variant_id,
//        dataType: 'json',
//        success: function(cart) {
//            if ((typeof callback) === 'function') {
//                callback(cart);
//            }
//            else {
//                Haravan.onCartUpdate(cart);
//            }
//        },
//        error: function(XMLHttpRequest, textStatus) {
//            Haravan.onError(XMLHttpRequest, textStatus);
//        }
//    };
//    jQuery.ajax(params);
//};
//var ajaxifyHaravan = (function(module, $) {
//    'use strict';
//    var init;
//    var settings, cartInit, $drawerHeight, $cssTransforms, $cssTransforms3d, $nojQueryLoad, $w, $body, $html;
//    var $formContainer, $btnClass, $wrapperClass, $addToCart, $flipClose, $flipCart, $flipContainer, $cartCountSelector, $cartCostSelector, $toggleCartButton, $modal, $cartContainer, $drawerCaret, $modalContainer, $modalOverlay, $closeCart, $drawerContainer, $prependDrawerTo, $callbackData={};
//    var updateCountPrice, flipSetup, revertFlipButton, modalSetup, showModal, sizeModal, hideModal, drawerSetup, showDrawer, hideDrawer, sizeDrawer, loadCartImages, formOverride, itemAddedCallback, itemErrorCallback, cartUpdateCallback, setToggleButtons, flipCartUpdateCallback, buildCart, cartTemplate, adjustCart, adjustCartCallback, createQtySelectors, qtySelectors, validateQty, scrollTop, toggleCallback;
//    init = function (options) {
//        settings = {
//            method: 'drawer', // Method options are drawer, modal, and flip. Default is drawer.
//            formSelector: 'form[action^="/cart/add"]',
//            addToCartSelector: 'input[type="submit"]',
//            cartCountSelector: null,
//            cartCostSelector: null,
//            toggleCartButton: null,
//            btnClass: null,
//            wrapperClass: null,
//            useCartTemplate: true,
//            moneyFormat: '$',
//            disableAjaxCart: false,
//            enableQtySelectors: true,
//            prependDrawerTo: 'body',
//            onToggleCallback: null
//        };
//        $.extend(settings, options);
//        if (urlParams('method')) {
//            settings.method = urlParams('method');
//        }
//        settings.method = settings.method.toLowerCase();
//        $formContainer     = $(settings.formSelector);
//        $btnClass          = settings.btnClass;
//        $wrapperClass      = settings.wrapperClass;
//        $addToCart         = $formContainer.find(settings.addToCartSelector);
//        $flipContainer     = null;
//        $flipClose         = null;
//        $cartCountSelector = $(settings.cartCountSelector);
//        $cartCostSelector  = $(settings.cartCostSelector);
//        $toggleCartButton  = $(settings.toggleCartButton);
//        $modal             = null;
//        $prependDrawerTo   = $(settings.prependDrawerTo);
//        $cssTransforms   = Modernizr.csstransforms;
//        $cssTransforms3d = Modernizr.csstransforms3d;
//        $w    = $(window);
//        $body = $('body');
//        $html = $('html');
//        $nojQueryLoad = $html.hasClass('lt-ie9');
//        if ($nojQueryLoad) {
//            settings.useCartTemplate = false;
//        }
//        if (settings.enableQtySelectors) {
//            qtySelectors();
//        }
//        if (!settings.disableAjaxCart) {
//            switch (settings.method) {
//                case 'flip':
//                    flipSetup();
//                    break;
//                case 'modal':
//                    modalSetup();
//                    break;
//                case 'drawer':
//                    drawerSetup();
//                    break;
//            }
//            $(document).keyup(function (evt) {
//                if (evt.keyCode == 27) {
//                    switch (settings.method) {
//                        case 'flip':
//                        case 'drawer':
//                            hideDrawer();
//                            break;
//                        case 'modal':
//                            hideModal();
//                            break;
//                    }
//                }
//            });
//
//            if ($addToCart.length) {
//                formOverride();
//            }
//        }
//        adjustCart();
//    };
//    updateCountPrice = function (cart) {
//        if ($cartCountSelector) {
//            $cartCountSelector.html(cart.item_count).removeClass('hidden-count');
//            if (cart.item_count === 0) {
//                $cartCountSelector.addClass('hidden-count');
//            }
//        }
//        if ($cartCostSelector) {
//            $cartCostSelector.html(Haravan.formatMoney(cart.total_price, settings.moneyFormat));
//        }
//    };
//    flipSetup = function () {
//        drawerSetup();
//        if (!$addToCart.length) {
//            return
//        }
//        $addToCart.addClass('flip__front').wrap('<div class="flip"></div>');
//        var checkoutBtn = $('<a href="/cart" class="flip__back" style="background-color: #C00; color: #fff;" class="flip__checkout">Thanh toán </a>').addClass($btnClass),
//            flipLoader = $('<span class="ajaxcart__flip-loader"></span>'),
//            flipExtra = $('<div class="flip__extra"><a href="#" class="flip__cart">Xem giỏ hàng (<span></span>)</a></div>');
//        checkoutBtn.insertAfter($addToCart);
//        flipLoader.insertAfter(checkoutBtn);
//        $flipContainer = $('.flip');
//        if (!$cssTransforms3d) {
//            $flipContainer.addClass('no-transforms')
//        }
//        flipExtra.insertAfter($flipContainer);
//        $flipCart = $('.flip__cart');
//        $flipCart.on('click', function(e) {
//            e.preventDefault();
//            showDrawer(true);
//        });
//        $('input[type="checkbox"], input[type="radio"], select', $formContainer).on('click', function() {
//            revertFlipButton();
//        })
//    };
//    revertFlipButton = function () {
//        $flipContainer.removeClass('is-flipped');
//    };
//    modalSetup = function () {
//        var source   = $("#ModalTemplate").html(),
//            template = Handlebars.compile(source);
//        $body.append(template).append('<div class="ajaxcart__overlay"></div>');
//        $modalContainer = $('#AjaxifyModal');
//        $modalOverlay   = $('.ajaxcart__overlay');
//        $cartContainer  = $('#AjaxifyCart');
//        $modalOverlay.on('click', hideModal);
//        $modalContainer.prepend('<button type="button" class="ajaxcart__close" title="' + Đóng giỏ hàng + '">' + Đóng giỏ hàng + '</button>');
//        $closeCart = $('.ajaxcart__close');
//        $closeCart.on('click', hideModal);
//        if (!$cssTransforms) {
//            $modalContainer.addClass('no-transforms')
//        }
//        $(window).on({
//            orientationchange: function(e) {
//                if ($modalContainer.hasClass('is-visible')) {
//                    sizeModal('resize');
//                }
//            }, resize: function(e) {
//                if (!$nojQueryLoad && $modalContainer.hasClass('is-visible')) {
//                    sizeModal('resize');
//                }
//            }
//        });
//        setToggleButtons();
//    };
//    showModal = function (toggle) {
//        $body.addClass('ajaxcart--is-visible');
//        if (!cartInit && toggle) {
//            Haravan.getCart(cartUpdateCallback);
//        } else {
//            sizeModal();
//        }
//    };
//    sizeModal = function(isResizing) {
//        if (!isResizing) {
//            $modalContainer.css('opacity', 0);
//        }
//        $modalContainer.css({
//            'margin-left': - ($modalContainer.outerWidth() / 2),
//            'opacity': 1
//        });
//        $closeCart.css({
//            'top': 10 + ($cartContainer.find('h1').height() / 2)
//        })
//        $modalContainer.addClass('is-visible');
//        scrollTop();
//        toggleCallback({
//            'is_visible': true
//        });
//    };
//    hideModal = function (e) {
//        $body.removeClass('ajaxcart--is-visible');
//        if (e) {
//            e.preventDefault();
//        }
//        if ($modalContainer) {
//            $modalContainer.removeClass('is-visible');
//            $body.removeClass('ajaxify-lock');
//        }
//        toggleCallback({
//            'is_visible': false
//        });
//    };
//    drawerSetup = function () {
//        var source   = $("#DrawerTemplate").html(),
//            template = Handlebars.compile(source),
//            data = {
//                wrapperClass: $wrapperClass
//            };
//        $prependDrawerTo.prepend(template(data));
//        $drawerContainer = $('#AjaxifyDrawer');
//        $cartContainer   = $('#AjaxifyCart');
//        $drawerCaret     = $('.ajaxcart__caret > span');
//        setToggleButtons();
//        var timeout;
//        $(window).resize(function() {
//            clearTimeout(timeout);
//            timeout = setTimeout(function(){
//                if ($drawerContainer.hasClass('is-visible')) {
//                    positionCaret();
//                    sizeDrawer();
//                }
//            }, 500);
//        });
//        positionCaret();
//        function positionCaret() {
//            if ($toggleCartButton.offset()) {
//                var togglePos = $toggleCartButton.offset(),
//                    toggleWidth = $toggleCartButton.outerWidth(),
//                    toggleMiddle = togglePos.left + toggleWidth/2;
//                $drawerCaret.css('left', toggleMiddle + 'px');
//            }
//        }
//    };
//    showDrawer = function (toggle) {
//        if (settings.method == 'flip') {
//            Haravan.getCart(flipCartUpdateCallback);
//        }
//        else if (!cartInit && toggle) {
//            Haravan.getCart(cartUpdateCallback);
//        }
//        else if (cartInit && toggle) {
//            sizeDrawer();
//        }
//        $drawerContainer.addClass('is-visible');
//        scrollTop();
//        toggleCallback({
//            'is_visible': true
//        });
//    };
//    hideDrawer = function () {
//        $drawerContainer.removeAttr('style').removeClass('is-visible');
//        scrollTop();
//        toggleCallback({
//            'is_visible': false
//        });
//    };
//    sizeDrawer = function ($empty) {
//        if ($empty) {
//            $drawerContainer.css('height', '0px');
//        } else {
//            $drawerHeight = $cartContainer.outerHeight();
//            $('.cart__row img').css('width', 'auto'); // fix Chrome image size bug
//            $drawerContainer.css('height',  $drawerHeight + 'px');
//        }
//    };
//    loadCartImages = function () {
//        var cartImages = $('img', $cartContainer),
//            count = cartImages.length,
//            index = 0;
//        cartImages.on('load', function() {
//            index++;
//            if (index==count) {
//                switch (settings.method) {
//                    case 'modal':
//                        sizeModal();
//                        break;
//                    case 'flip':
//                    case 'drawer':
//                        sizeDrawer();
//                    break;
//                }
//            }
//        });
//    };
//    formOverride = function () {
//        $formContainer.submit(function(e) {
//            e.preventDefault();
//            $addToCart.removeClass('is-added').addClass('is-adding');
//            $('.qty-error').remove();
//            Haravan.addItemFromForm(e.target, itemAddedCallback, itemErrorCallback);
//            switch (settings.method) {
//                case 'flip':
//                    $flipContainer.addClass('flip--is-loading');
//                    break;
//            }
//        });
//    };
//    itemAddedCallback = function (product) {
//        $addToCart.removeClass('is-adding').addClass('is-added');
//        switch (settings.method) {
//            case 'flip':
//                setTimeout(function () {
//                    $flipContainer.removeClass('flip--is-loading').addClass('is-flipped');
//                }, 600);
//                break;
//        }
//        Haravan.getCart(cartUpdateCallback);
//    };
//    itemErrorCallback = function (XMLHttpRequest, textStatus) {
//        var data = eval('(' + XMLHttpRequest.responseText + ')');
//        switch (settings.method) {
//            case 'flip':
//                $flipContainer.removeClass('flip--is-loading');
//                break;
//        }
//        if (!!data.message) {
//            if (data.status == 422) {
//                if (!!$.prototype.fancybox)
//                    $.fancybox.open([
//                        {
//                            type: 'inline',
//                            autoScale: true,
//                            minHeight: 30,
//                            content:    '<div class="errors qty-error">'+ data.description +'</div>'
//                        }
//                    ]);
//                else
//                    $formContainer.after('<div class="errors qty-error">'+ data.description +'</div>')
//            }
//        }
//    };
//
//    cartUpdateCallback = function (cart) {
//        // Update quantity and price
//        updateCountPrice(cart);
//        switch (settings.method) {
//            case 'flip':
//                $('.flip__cart span').html(cart.item_count);
//                break;
//            case 'modal':
//                buildCart(cart);
//                break;
//            case 'drawer':
//                buildCart(cart);
//                if (!$drawerContainer.hasClass('is-visible')) {
//                    showDrawer();
//                } else {
//                    scrollTop();
//                }
//                break;
//        }
//    };
//    setToggleButtons = function () {
//        // Reselect the element in case it just loaded
//        $toggleCartButton  = $(settings.toggleCartButton);
//        if ($toggleCartButton) {
//            // Turn it off by default, in case it's initialized twice
//            $toggleCartButton.off('click');
//            // Toggle the cart, based on the method
//            $toggleCartButton.on('click', function(e) {
//                e.preventDefault();
//                switch (settings.method) {
//                    case 'modal':
//                        if ($modalContainer.hasClass('is-visible')) {
//                            hideModal();
//                        } else {
//                            showModal(true);
//                        }
//                        break;
//                    case 'drawer':
//                    case 'flip':
//                        if ($drawerContainer.hasClass('is-visible')) {
//                            hideDrawer();
//                        } else {
//                            showDrawer(true);
//                        }
//                        break;
//                }
//            });
//        }
//    };
//    flipCartUpdateCallback = function (cart) {
//        buildCart(cart);
//    };
//    buildCart = function (cart) {
//        if (!settings.useCartTemplate || cart.item_count === 0) {
//            $cartContainer.empty();
//        }
//        if (cart.item_count === 0) {
//            $cartContainer
//                .append('<h2>' + Giỏ hàng của bạn đang trống. + '</h2>')
//                .append('<p class="text-center">' + Tiếp tục <a href="/collections/all">mua hàng</a>. + '</p>');
//            switch (settings.method) {
//                case 'modal':
//                    sizeModal('resize');
//                    break;
//                case 'flip':
//                case 'drawer':
//                    sizeDrawer();
//                    if (!$drawerContainer.hasClass('is-visible') && cartInit) {
//                        sizeDrawer(true);
//                    }
//                    break;
//            }
//            return;
//        }
//        if (settings.useCartTemplate) {
//            cartTemplate(cart);
//            return;
//        }
//        var items = [],
//            item = {},
//            data = {},
//            source = $("#CartTemplate").html(),
//            template = Handlebars.compile(source);
//        $.each(cart.items, function(index, cartItem) {
//            var itemAdd = cartItem.quantity + 1,
//                itemMinus = cartItem.quantity - 1,
//                itemQty = cartItem.quantity;
//            if (cartItem.image != null){
//                var prodImg = cartItem.image.replace(/(\.[^.]*)$/, "_small$1").replace('http:', '');
//            } else {
//                var prodImg = "http://cdn.haravan.com/s/assets/admin/no-image-medium-cc9732cb976dd349a0df1d39816fbcc7.gif";
//            }
//            var prodName = cartItem.title.replace(/(\-[^-]*)$/, ""),
//                prodVariation = cartItem.title.replace(/^[^\-]*/, "").replace(/-/, "");
//            item = {
//                id: cartItem.variant_id,
//                url: cartItem.url,
//                img: prodImg,
//                name: prodName,
//                variation: prodVariation,
//                itemAdd: itemAdd,
//                itemMinus: itemMinus,
//                itemQty: itemQty,
//                price: Haravan.formatMoney(cartItem.price, settings.moneyFormat)
//            };
//            items.push(item);
//        });
//        data = {
//            items: items,
//            totalPrice: Haravan.formatMoney(cart.total_price, settings.moneyFormat),
//            btnClass: $btnClass
//        }
//        $cartContainer.append(template(data));
//        adjustCart();
//        switch (settings.method) {
//            case 'modal':
//                loadCartImages();
//                break;
//            case 'flip':
//            case 'drawer':
//                if (cart.item_count > 0) {
//                    loadCartImages();
//                } else {
//                    sizeDrawer(true);
//                }
//                break;
//            default:
//                break;
//        }
//        cartInit = true;
//    };
//    cartTemplate = function (cart) {
//        var url = '/cart?' + Date.now() + ' form[action="/cart"]';
//        $cartContainer.load(url, function() {
//            adjustCart();
//            switch (settings.method) {
//                case 'modal':
//                    loadCartImages();
//                    break;
//                case 'flip':
//                case 'drawer':
//                    if (cart.item_count > 0) {
//                        loadCartImages();
//                    } else {
//                        sizeDrawer(true);
//                    }
//                    $cartContainer.prepend('<button type="button" class="ajaxcart__close" title="' + Đóng giỏ hàng + '">' + Đóng giỏ hàng + '</button>');
//                    $closeCart = $('.ajaxcart__close');
//                    $closeCart.on('click', hideDrawer);
//                    break;
//                default:
//                    break;
//            }
//            cartInit = true;
//        });
//    }
//    adjustCart = function () {
//        if (settings.useCartTemplate) {
//            createQtySelectors();
//        }
//        var qtyAdjust = $('.ajaxcart__qty-adjust');
//            qtyAdjust.off('click');
//            qtyAdjust.on('click', function() {
//                var el = $(this),
//                    id = el.data('id'),
//                    qtySelector = el.siblings('.ajaxcart__qty-num'),
//                    qty = parseInt(qtySelector.val().replace(/\D/g, ''));
//                var qty = validateQty(qty);
//                if (el.hasClass('ajaxcart__qty--plus')) {
//                    qty = qty + 1;
//                } else {
//                    qty = qty - 1;
//                    if (qty <= 0) qty = 0;
//                }
//                if (id) {
//                    updateQuantity(id, qty);
//                } else {
//                    qtySelector.val(qty);
//                }
//            });
//        var qtyInput = $('.ajaxcart__qty-num');
//            qtyInput.off('change');
//            qtyInput.on('change', function() {
//                var el = $(this),
//                    id = el.data('id'),
//                    qty = parseInt(el.val().replace(/\D/g, ''));
//                var qty = validateQty(qty);
//                if (id) {
//                    updateQuantity(id, qty);
//                }
//            });
//        qtyInput.off('focus');
//        qtyInput.on('focus', function() {
//            var el = $(this);
//            setTimeout(function() {
//                el.select();
//            }, 50);
//        });
//        $('.ajaxcart__remove').on('click', function(e) {
//            var el = $(this),
//                id = el.data('id') || null,
//                qty = 0;
//            if (!id) {
//                return;
//            }
//            e.preventDefault();
//            updateQuantity(id, qty);
//        });
//        function updateQuantity(id, qty) {
//            if (!settings.useCartTemplate) {
//                var row = $('.ajaxcart__row[data-id="' + id + '"]').addClass('is-loading');
//            } else {
//                var row = $('.cart__row[data-id="' + id + '"]').addClass('is-loading');
//            }
//            if (qty === 0) {
//                row.addClass('is-removed');
//            }
//            setTimeout(function() {
//                Haravan.changeItem(id, qty, adjustCartCallback);
//            }, 250);
//        }
//        var noteArea = $('textarea[name="note"]');
//            noteArea.off('change');
//            noteArea.on('change', function() {
//                var newNote = $(this).val();
//                Haravan.updateCartNote(newNote, function(cart) {});
//            });
//    };
//    adjustCartCallback = function (cart) {
//        updateCountPrice(cart);
//        if (cart.item_count === 0) {
//            switch (settings.method) {
//                case 'modal':
//                    break;
//                case 'flip':
//                case 'drawer':
//                    hideDrawer();
//                    break;
//            }
//        }
//        setTimeout(function() {
//            Haravan.getCart(buildCart);
//        }, 150)
//    };
//    createQtySelectors = function() {
//        if ($('input[type="number"]', $cartContainer).length) {
//            $('input[type="number"]', $cartContainer).each(function() {
//                var el = $(this),
//                    currentQty = el.val();
//                var itemAdd = currentQty + 1,
//                    itemMinus = currentQty - 1,
//                    itemQty = currentQty;
//                var source   = $("#AjaxifyQty").html(),
//                    template = Handlebars.compile(source),
//                    data = {
//                        id: el.data('id'),
//                        itemQty: itemQty,
//                        itemAdd: itemAdd,
//                        itemMinus: itemMinus
//                    };
//                el.after(template(data)).remove();
//            });
//        }
//        if ($('a[href^="/cart/change"]', $cartContainer).length) {
//            $('a[href^="/cart/change"]', $cartContainer).each(function() {
//                var el = $(this).addClass('ajaxcart__remove');
//            });
//        }
//    };
//    qtySelectors = function() {
//        var numInputs = $('input[type="number"]');
//        if (numInputs.length) {
//            numInputs.each(function() {
//                var el = $(this),
//                    currentQty = el.val(),
//                    inputName = el.attr('name'),
//                    inputId = el.attr('id');
//                var itemAdd = currentQty + 1,
//                    itemMinus = currentQty - 1,
//                    itemQty = currentQty;
//                var source   = $("#JsQty").html(),
//                    template = Handlebars.compile(source),
//                    data = {
//                        id: el.data('id'),
//                        itemQty: itemQty,
//                        itemAdd: itemAdd,
//                        itemMinus: itemMinus,
//                        inputName: inputName,
//                        inputId: inputId
//                    };
//                el.after(template(data)).remove();
//            });
//            $('.js-qty__adjust').on('click', function() {
//                var el = $(this),
//                    id = el.data('id'),
//                    qtySelector = el.siblings('.js-qty__num'),
//                    qty = parseInt(qtySelector.val().replace(/\D/g, ''));
//                var qty = validateQty(qty);
//                if (el.hasClass('js-qty__adjust--plus')) {
//                    qty = qty + 1;
//                } else {
//                    qty = qty - 1;
//                    if (qty <= 1) qty = 1;
//                }
//                qtySelector.val(qty);
//                updatePricing();
//            });
//            $(".js-qty__num").on("change", function() {
//                updatePricing();
//            });
//        }
//    };
//    validateQty = function (qty) {
//        if((parseFloat(qty) == parseInt(qty)) && !isNaN(qty)) {
//            // We have a number!
//        } else {
//            // Not a number. Default to 1.
//            qty = 1;
//        }
//        return qty;
//    };
//    scrollTop = function () {
//        if ($body.scrollTop() > 0 || $html.scrollTop() > 0) {
//            $('html, body').animate({
//                scrollTop: 0
//            }, 250, 'swing');
//        }
//    };
//    toggleCallback = function (data) {
//        data.method = settings.method;
//        if (typeof settings.onToggleCallback == 'function') {
//            settings.onToggleCallback.call(this, data);
//        }
//    };
//    module = {
//        init: init
//    };
//    return module;
//}(ajaxifyHaravan || {}, jQuery));