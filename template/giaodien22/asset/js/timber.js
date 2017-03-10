// Helper functions
function replaceUrlParam(url, paramName, paramValue) {
    var pattern = new RegExp('('+paramName+'=).*?(&|$)'),
        newUrl = url.replace(pattern,'$1' + paramValue + '$2');
    if ( newUrl == url ) {
        newUrl = newUrl + (newUrl.indexOf('?')>0 ? '&' : '?') + paramName + '=' + paramValue;
    }
    return newUrl;
}

// Timber functions
window.timber = window.timber || {};

timber.cacheSelectors = function () {
    timber.cache = {
        // General
        $html                    : $('html'),
        $body                    : $('body'),
        // Navigation
        $navigation              : $('#AccessibleNav'),
        // Collection Pages
        $changeView              : $('.change-view'),
        // Product Page
        $productImage            : $('#ProductPhotoImg'),
        $thumbImages             : $('#ProductThumbs').find('a.product-single__thumbnail'),
        // Customer Pages
        $recoverPasswordLink     : $('#RecoverPassword'),
        $hideRecoverPasswordLink : $('#HideRecoverPasswordLink'),
        $recoverPasswordForm     : $('#RecoverPasswordForm'),
        $customerLoginForm       : $('#CustomerLoginForm'),
        $passwordResetSuccess    : $('#ResetSuccess')
    }
};

timber.init = function () {
    timber.cacheSelectors();
    timber.accessibleNav();
    timber.productImageSwitch();
    timber.responsiveVideos();
//    timber.collectionViews();
    timber.loginForms();
};

timber.accessibleNav = function () {
    var $nav = timber.cache.$navigation,
        $allLinks = $nav.find('a'),
        $topLevel = $nav.children('li').find('a'),
        $parents = $nav.find('.site-nav--has-dropdown'),
        $subMenuLinks = $nav.find('.site-nav__dropdown').find('a'),
        activeClass = 'nav-hover',
        focusClass = 'nav-focus';

    // Mouseenter
    $parents.on('mouseenter touchstart', function(evt) {
        var $el = $(this);
        if (!$el.hasClass(activeClass)) {
            evt.preventDefault();
        }
        showDropdown($el);
    });

    // Mouseout
    $parents.on('mouseleave', function() {
        hideDropdown($(this));
    });

    $subMenuLinks.on('touchstart', function(evt) {
        // Prevent touchstart on body from firing instead of link
        evt.stopImmediatePropagation();
    });

    $allLinks.focus(function() {
        handleFocus($(this));
    });

    $allLinks.blur(function() {
        removeFocus($topLevel);
    });

    // accessibleNav private methods
    function handleFocus ($el) {
        var $subMenu = $el.next('ul'),
            hasSubMenu = $subMenu.hasClass('sub-nav') ? true : false,
            isSubItem = $('.site-nav__dropdown').has($el).length,
            $newFocus = null;
        // Add focus class for top level items, or keep menu shown
        if (!isSubItem) {
            removeFocus($topLevel);
            addFocus($el);
        } else {
            $newFocus = $el.closest('.site-nav--has-dropdown').find('a');
            addFocus($newFocus);
        }
    }
    function showDropdown ($el) {
        $el.addClass(activeClass);
        setTimeout(function() {
            timber.cache.$body.on('touchstart', function() {
                hideDropdown($el);
            });
        }, 250);
    }
    function hideDropdown ($el) {
        $el.removeClass(activeClass);
        timber.cache.$body.off('touchstart');
    }

    function addFocus ($el) {
        $el.addClass(focusClass);
    }

    function removeFocus ($el) {
        $el.removeClass(focusClass);
    }
};

timber.getHash = function () {
    return window.location.hash;
};

timber.updateHash = function (hash) {
    window.location.hash = '#' + hash;
    $('#' + hash).attr('tabindex', -1).focus();
};

timber.productPage = function (options) {
    var moneyFormat = options.money_format,
        variant = options.variant,
        selector = options.selector;

    // Selectors
    var $productImage = $('#ProductPhotoImg'),
        $addToCart = $('#AddToCart'),
        $productPrice = $('#ProductPrice'),
        $comparePrice = $('#ComparePrice'),
        $quantityElements = $('.quantity-selector, label + .js-qty'),
        $addToCartText = $('#AddToCartText');

    if (variant) {
        // Update variant image, if one is set
        if (variant.featured_image) {
            var newImg = variant.featured_image,
                el = $productImage[0];
            Haravan.Image.switchImage(newImg, el, timber.switchImage);
        }
        // Select a valid variant if available
        if (variant.available) {
            // Available, enable the submit button, change text, show quantity elements
            $addToCart.removeClass('disabled').prop('disabled', false);
            $addToCartText.html('Mua Ngay');
            $quantityElements.show();
        } else {
            // Sold out, disable the submit button, change text, hide quantity elements
            $addToCart.addClass('disabled').prop('disabled', true);
            $addToCartText.html('Hết Hàng');
            $quantityElements.hide();
        }
        // Regardless of stock, update the product price
        $productPrice.html( Haravan.formatMoney(variant.price, moneyFormat) );

        // Also update and show the product's compare price if necessary
        if (variant.compare_at_price > variant.price) {
            $comparePrice
                .html('So sánh' + ': ' + Haravan.formatMoney(variant.compare_at_price, moneyFormat))
                .show();
        } else {
            $comparePrice.hide();
        }

    } else {
        // The variant doesn't exist, disable submit button.
        // This may be an error or notice that a specific variant is not available.
        // To only show available variants, implement linked product options:
        //   - http://docs.haravan.com/manual/configuration/store-customization/advanced-navigation/linked-product-options
        $addToCart.addClass('disabled').prop('disabled', true);
        $addToCartText.html('Không có sẵn');
        $quantityElements.hide();
    }
};

timber.productImageSwitch = function () {
    if (timber.cache.$thumbImages.length) {
        // Switch the main image with one of the thumbnails
        // Note: this does not change the variant selected, just the image
        timber.cache.$thumbImages.on('click', function(evt) {
            evt.preventDefault();
            var newImage = $(this).attr('href');
            timber.switchImage(newImage, null, timber.cache.$productImage);
        });
    }
};

timber.switchImage = function (src, imgObject, el) {
    // Make sure element is a jquery object
    var $el = $(el);
    $el.attr('src', src);
};

timber.responsiveVideos = function () {
    $('iframe[src*="youtube.com/embed"]').wrap('<div class="video-wrapper"></div>');
    $('iframe[src*="player.vimeo"]').wrap('<div class="video-wrapper"></div>');
};

//timber.collectionViews = function () {
//    if(!$("#catalog_block").length || !$("#catalog_block").hasClass('ajax-filter')){
//        if (timber.cache.$changeView.length) {
//            timber.cache.$changeView.on('click', function() {
//                var view = $(this).data('view'),
//                    url = document.URL,
//                    hasParams = url.indexOf('?') > -1;
//                if (hasParams) {
//                    window.location = replaceUrlParam(url, 'view', view);
//                } else {
//                    window.location = url + '?view=' + view;
//                }
//            });
//        }
//    }
//};

timber.loginForms = function() {
    function showRecoverPasswordForm() {
        timber.cache.$recoverPasswordForm.show();
        timber.cache.$customerLoginForm.hide();
    }
    function hideRecoverPasswordForm() {
        timber.cache.$recoverPasswordForm.hide();
        timber.cache.$customerLoginForm.show();
    }
    timber.cache.$recoverPasswordLink.on('click', function(evt) {
        evt.preventDefault();
        showRecoverPasswordForm();
    });
    timber.cache.$hideRecoverPasswordLink.on('click', function(evt) {
        evt.preventDefault();
        hideRecoverPasswordForm();
    });
    // Allow deep linking to recover password form
    if (timber.getHash() == '#recover') {
        showRecoverPasswordForm();
    }
};
timber.resetPasswordSuccess = function() {
    timber.cache.$passwordResetSuccess.show();
};

// Initialize Timber's JS on docready
$(timber.init);
