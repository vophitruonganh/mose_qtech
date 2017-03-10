<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/admin/install/signup','backend\install\InstallController@index');
Route::post('/admin/install/signup','backend\install\InstallController@save');

/*  General  */
Route::post('/admin/get-districts/','backend\GeneralController@GetDistricts');
/*  End General  */

/*-- Backend --*/
Route::get('/admin/','backend\DashboardController@index');
Route::get('/admin/dashboard','backend\DashboardController@index');
/*-- end --*/

/*-- Backend Login --*/
Route::get('/admin/login','backend\account\LoginController@index');
Route::post('/admin/login','backend\account\LoginController@login');
Route::get('/admin/logout','backend\account\LoginController@logout');
Route::get('/admin/forgot-password','backend\account\LoginController@indexForgotPassword');
Route::post('/admin/forgot-password','backend\account\LoginController@submitForgotPassword');
Route::get('/admin/reset-password/{token}','backend\account\LoginController@indexResetPassword');
Route::post('/admin/reset-password/{token}','backend\account\LoginController@submitResetPassword');
/*-- end --*/

/*-- Backend Attachment --*/
//Route::get('/admin/attachment.html','backend\AttachmentController@index');
Route::any('/admin/attachment','backend\attachment\AttachmentController@index');
Route::get('/admin/attachment/create','backend\attachment\AttachmentController@create');
Route::post('/admin/attachment/create','backend\attachment\AttachmentController@store');
Route::get('/admin/attachment/edit/{idAttachment}','backend\attachment\AttachmentController@edit');
Route::post('/admin/attachment/edit/{idAttachment}','backend\attachment\AttachmentController@update');
Route::get('/admin/attachment/delete/{idAttachment}','backend\attachment\AttachmentController@destroy');
Route::get('/admin/attachment/get-list-image','backend\attachment\AttachmentController@getListImage');
Route::post('/admin/attachment/quick-create','backend\attachment\AttachmentController@quickCreate');
/*-- end --*/

/*-- Backend Taxonomy --*/
//Route::any('/admin/taxonomy','backend\taxonomy\TaxonomyController@index');
//Route::get('/admin/taxonomy/{term_type}','backend\taxonomy\TaxonomyController@edit');

/*-- end --*/

/*-- Backend User --*/
//Route::get('/admin/user','backend\UserController@index');
Route::any('/admin/user','backend\account\UserController@index');
Route::get('/admin/user/create','backend\account\UserController@create');
Route::post('/admin/user/create','backend\account\UserController@store');
Route::get('/admin/user/edit/{idUser}','backend\account\UserController@edit');
Route::post('/admin/user/edit/{idUser}','backend\account\UserController@update');
Route::get('/admin/user/delete/{idUser}','backend\account\UserController@destroy');
/*-- end --*/

/*-- Backend Customer --*/
//Route::get('/admin/customer','backend\CustomerController@index');
Route::any('/admin/customer','backend\store\CustomerController@index');
Route::get('/admin/customer/create','backend\store\CustomerController@create');
Route::post('/admin/customer/create','backend\store\CustomerController@store');
Route::get('/admin/customer/edit/{idUser}','backend\store\CustomerController@edit');
Route::post('/admin/customer/edit/{idUser}','backend\store\CustomerController@update');
Route::get('/admin/customer/delete/{idUser}','backend\store\CustomerController@destroy');
// Route::post('/admin/customer/order-get','backend\store\CustomerController@GetUserListOrder');
/*-- end --*/

/*-- Backend Page --*/
Route::any('/admin/page','backend\website\PageController@index');
Route::get('/admin/page/create','backend\website\PageController@create');
Route::post('/admin/page/create','backend\website\PageController@store');
Route::get('/admin/page/edit/{ID}','backend\website\PageController@edit');
Route::post('/admin/page/edit/{ID}','backend\website\PageController@update');
Route::get('/admin/page/delete/{ID}','backend\website\PageController@destroy');
Route::get('/admin/page/trash/{ID}','backend\website\PageController@trash');
/*--end--*/

/*-- Backend Product --*/
Route::any('/admin/product','backend\store\ProductController@index');
Route::get('/admin/product/create','backend\store\ProductController@create');
Route::post('/admin/product/create','backend\store\ProductController@store');
Route::get('/admin/product/edit/{product_id}','backend\store\ProductController@edit');
Route::post('/admin/product/edit/{product_id}','backend\store\ProductController@update');
Route::get('/admin/product/delete/{product_id}','backend\store\ProductController@destroy');
Route::post('/admin/product/search-taxonomy','backend\store\ProductController@searchTaxonomy');

Route::get('/admin/product/variant/create/{product_id}','backend\store\VariantController@create');
Route::post('/admin/product/variant/create/{product_id}','backend\store\VariantController@store');
Route::get('/admin/product/variant/sort/{product_id}','backend\store\VariantController@VariantSort');
Route::post('/admin/product/variant/sort/{product_id}','backend\store\VariantController@VariantSortSubmit');
Route::get('admin/product/variant/option/{product_id}','backend\store\VariantController@VariantOption');
Route::post('admin/product/variant/option/{product_id}','backend\store\VariantController@VariantOptionSubmit');
Route::get('admin/product/variant/image/{product_id}','backend\store\VariantController@getVariantImageProduct');
Route::post('admin/product/variant/image/{product_id}','backend\store\VariantController@UpdateVariantImageProduct');
Route::post('admin/product/variant/delete/{product_id}','backend\store\VariantController@destroy');
Route::get('admin/product/variant/edit/{product_id}','backend\store\VariantController@edit');
Route::post('admin/product/variant/edit/{product_id}','backend\store\VariantController@update');

/*--end--*/

/*-- Backend Product Category --*/
Route::any('/admin/taxonomy/product-category','backend\store\taxonomy\ProductCategoryController@index');
Route::get('/admin/taxonomy/product-category/create','backend\store\taxonomy\ProductCategoryController@create');
Route::post('/admin/taxonomy/product-category/create','backend\store\taxonomy\ProductCategoryController@store');
Route::get('/admin/taxonomy/product-category/edit/{term_id}','backend\store\taxonomy\ProductCategoryController@edit');
Route::post('/admin/taxonomy/product-category/edit/{term_id}','backend\store\taxonomy\ProductCategoryController@update');
Route::get('/admin/taxonomy/product-category/delete/{term_id}','backend\store\taxonomy\ProductCategoryController@destroy');
/*-- end --*/

/*-- Backend Product Tag --*/
Route::any('/admin/taxonomy/product-tag','backend\store\taxonomy\ProductTagController@index');
Route::get('/admin/taxonomy/product-tag/create','backend\store\taxonomy\ProductTagController@create');
Route::post('/admin/taxonomy/product-tag/create','backend\store\taxonomy\ProductTagController@store');
Route::get('/admin/taxonomy/product-tag/edit/{term_id}','backend\store\taxonomy\ProductTagController@edit');
Route::post('/admin/taxonomy/product-tag/edit/{term_id}','backend\store\taxonomy\ProductTagController@update');
Route::get('/admin/taxonomy/product-tag/delete/{term_id}','backend\store\taxonomy\ProductTagController@destroy');
/*--end--*/

/*-- Backend Product Group--*/
Route::any('/admin/taxonomy/product-group','backend\store\taxonomy\ProductGroupController@index');
Route::get('/admin/taxonomy/product-group/create','backend\store\taxonomy\ProductGroupController@create');
Route::post('/admin/taxonomy/product-group/create','backend\store\taxonomy\ProductGroupController@store');
Route::get('/admin/taxonomy/product-group/edit/{term_id}','backend\store\taxonomy\ProductGroupController@edit');
Route::post('/admin/taxonomy/product-group/edit/{term_id}','backend\store\taxonomy\ProductGroupController@update');
Route::get('/admin/taxonomy/product-group/delete/{term_id}','backend\store\taxonomy\ProductGroupController@destroy');
/*-- end --*/

/*-- Backend Product Vendor --*/
Route::any('/admin/taxonomy/product-vendor','backend\store\taxonomy\ProductVendorController@index');
Route::get('/admin/taxonomy/product-vendor/create','backend\store\taxonomy\ProductVendorController@create');
Route::post('/admin/taxonomy/product-vendor/create','backend\store\taxonomy\ProductVendorController@store');
Route::get('/admin/taxonomy/product-vendor/edit/{term_id}','backend\store\taxonomy\ProductVendorController@edit');
Route::post('/admin/taxonomy/product-vendor/edit/{term_id}','backend\store\taxonomy\ProductVendorController@update');
Route::get('/admin/taxonomy/product-vendor/delete/{term_id}','backend\store\taxonomy\ProductVendorController@destroy');
/*-- end --*/

/*-- Backend Config Website --*/
Route::get('/admin/setting/general','backend\setting\GeneralSettingController@index');
Route::post('/admin/setting/general','backend\setting\GeneralSettingController@save');
Route::get('/admin/setting/website','backend\setting\WebsiteSettingController@index');
Route::post('/admin/setting/website','backend\setting\WebsiteSettingController@save');

Route::get('/admin/setting/seo','backend\setting\SEOSettingController@index');
Route::get('/admin/setting/store','backend\setting\StoreSettingController@index');
Route::post('/admin/setting/store','backend\setting\StoreSettingController@save');
Route::get('/admin/setting/image','backend\setting\ImageSettingController@index');
Route::post('/admin/setting/image','backend\setting\ImageSettingController@save');
Route::get('/admin/setting/account','backend\setting\AccountSettingController@index');
Route::post('/admin/setting/account','backend\setting\AccountSettingController@stopSessionAllUser');
Route::get('/admin/setting/account/create','backend\setting\AccountSettingController@create');
Route::post('/admin/setting/account/create','backend\setting\AccountSettingController@store');
Route::get('/admin/setting/account/edit/{user_id}','backend\setting\AccountSettingController@edit');
Route::post('/admin/setting/account/edit/{user_id}','backend\setting\AccountSettingController@update');
Route::get('/admin/setting/facebook','backend\setting\FacebookSettingController@index');


Route::get('/admin/setting/domains','backend\setting\DomainSettingController@index');
Route::get('/admin/setting/domains/CheckValidDomain','backend\setting\DomainSettingController@validDomain');
Route::get('/admin/setting/domain/create','backend\setting\DomainSettingController@create');
Route::post('/admin/setting/domain/create','backend\setting\DomainSettingController@store');
Route::get('/admin/setting/domain/setPrimaryDomain/{domain_name}','backend\setting\DomainSettingController@setPrimaryDomain');
Route::get('/admin/setting/domain/destroy/{domain_name}','backend\setting\DomainSettingController@destroyDomain');


Route::get('/admin/setting/storeinfo','backend\setting\StoreSettingController@update_info');
Route::post('/admin/setting/storeinfo','backend\setting\StoreSettingController@update_info_post');


//Route::get('/admin/setting/website','backend\website\setting\ConfigWebsiteController@edit');
//Route::post('/admin/setting/website','backend\website\setting\ConfigWebsiteController@update');
/*-- end --*/

/*-- Backend Order --*/
Route::any('/admin/order','backend\store\OrderController@index');
Route::get('/admin/order/create','backend\store\OrderController@create');
Route::post('/admin/order/create','backend\store\OrderController@store');
Route::get('/admin/order/draft/{order_code}','backend\store\OrderController@edit');
Route::post('/admin/order/draft/{order_code}', 'backend\store\OrderController@update');

// Route::get('/admin/order/edit/{order_code}', 'backend\store\OrderController@edit');
// Route::post('/admin/order/edit/{order_code}', 'backend\store\OrderController@update');
Route::get('/admin/order/delete/{order_code}', 'backend\store\OrderController@destroy');
Route::get('/admin/order/detail/{order_id}','backend\store\OrderController@orderdetail');
Route::post('/admin/order/update-status/{order_code}','backend\store\OrderController@updateStatus');
Route::get('/admin/order/active-order/{order_code}','backend\store\OrderController@activeOrder');
Route::get('/admin/order/shipping-info/{order_code}','backend\store\OrderController@editOrderShip');
Route::post('/admin/order/shipping-info/{order_code}','backend\store\OrderController@editOrderShipSubmit');
Route::post('/admin/order/GetPromotion','backend\store\OrderController@getPromotion');
Route::get('/admin/order/refuned/{order_code}','backend\store\OrderController@refunedOrder');
Route::post('/admin/order/refuned/{order_code}','backend\store\OrderController@refunedOrderSubmit');
Route::get('/admin/order/trash/{order_code}','backend\store\OrderController@trash');
Route::post('/admin/order/trash/{order_code}','backend\store\OrderController@trashSubmit');

Route::get('/admin/order/GetListProduct','backend\store\OrderController@GetProductList');
Route::get('/admin/order/GetInfoProduct/{variant_id}','backend\store\OrderController@GetProductInfo');
Route::get('/admin/order/GetListCustomer','backend\store\OrderController@GetCustomerList');
Route::get('/admin/order/GetInfoCustomer/{customer_id}','backend\store\OrderController@GetCustomerInfo');
Route::post('/admin/order/create-customer','backend\store\OrderController@CreateCustomer');
Route::post('/admin/order/create-product','backend\store\OrderController@CreateProduct');
Route::get('/admin/order/customer-group-discount','backend\store\OrderController@Customergroupdiscount');
Route::get('/admin/order/product-group-discount','backend\store\OrderController@Productgroupdiscount');
Route::get('/admin/order/GetShipping','backend\store\OrderController@GetShipping');

/*--end--*/


/*-- Backend Template --*/
Route::get('/admin/themes','backend\website\themes\ThemesController@index');
Route::get('/admin/themes/active/{name}','backend\website\themes\ThemesController@active');
Route::get('/admin/themes/install','backend\website\themes\ThemesController@install');
/*--end--*/


/*-- Backend Template --*/
Route::get('/admin/widget','backend\website\WidgetController@index');
//Route::post('/admin/widget','backend\website\WidgetController@widget_list');
Route::get('/admin/widget/{widget}/{plugin}/{order}','backend\website\WidgetController@widget_edit');
Route::post('/admin/widget/{widget}/{plugin}/{order}','backend\website\WidgetController@widget_save');
Route::post('/admin/widget/removeOrderAttribute','backend\website\WidgetController@removeOrderAttribute');
/*--end--*/

/*-- Backend Plugin --*/
Route::any('admin/plugin','backend\PluginController@index');
Route::get('admin/plugin/create','backend\PluginController@create');
Route::get('admin/plugin/activate/{folderPlugin}/{fileNamePlugin}','backend\PluginController@active');
Route::get('admin/plugin/deactivate/{folderPlugin}/{fileNamePlugin}','backend\PluginController@deactive');
Route::get('admin/plugin/delete/{folderPlugin}/{fileNamePlugin}/{deleteData?}','backend\PluginController@delete');
Route::get('admin/plugin/pdelete/{folderPlugin}/{fileNamePlugin}/{deleteData?}','backend\PluginController@destroy');
/*--end--*/

/*-- Backend Menu --*/
Route::any('admin/navigation','backend\website\MenuController@index');
Route::get('admin/navigation/create/','backend\website\MenuController@create');
Route::post('admin/navigation/create/','backend\website\MenuController@store');
Route::get('admin/navigation/edit/{slugMenuName}','backend\website\MenuController@edit');
Route::post('admin/navigation/edit/{slugMenuName}','backend\website\MenuController@update');
Route::get('admin/navigation/delete/{slugMenuName}','backend\website\MenuController@destroy');
/*--end--*/

/*-- Backend Menu --*/
//Route::get('/admin/menu.html','backend\MenuController@index');
/*--end--*/

/*-- Backend Post --*/
Route::any('/admin/post','backend\website\PostController@index');
Route::get('/admin/post/create','backend\website\PostController@create');
Route::post('/admin/post/create','backend\website\PostController@store');
Route::get('/admin/post/edit/{ID}','backend\website\PostController@edit');
Route::post('/admin/post/edit/{ID}','backend\website\PostController@update');
Route::get('/admin/post/delete/{ID}','backend\website\PostController@destroy');
Route::get('/admin/post/trash/{ID}','backend\website\PostController@trash');
/*--end--*/

/*-- Backend Post Category --*/
Route::any('/admin/taxonomy/post-category','backend\website\taxonomy\PostCategoryController@index');
Route::get('/admin/taxonomy/post-category/create','backend\website\taxonomy\PostCategoryController@create');
Route::post('/admin/taxonomy/post-category/create','backend\website\taxonomy\PostCategoryController@store');
Route::get('/admin/taxonomy/post-category/edit/{term_id}','backend\website\taxonomy\PostCategoryController@edit');
Route::post('/admin/taxonomy/post-category/edit/{term_id}','backend\website\taxonomy\PostCategoryController@update');
Route::get('/admin/taxonomy/post-category/delete/{term_id}','backend\website\taxonomy\PostCategoryController@destroy');
/*--end--*/

/*-- Backend Tag Post --*/
//Route::get('/admin/taxonomy/{taxonomy}','backend\taxonomy\TaxonomyController@index');
Route::any('/admin/taxonomy/post-tag','backend\website\taxonomy\PostTagController@index');
Route::get('/admin/taxonomy/post-tag/create','backend\website\taxonomy\PostTagController@create');
Route::post('/admin/taxonomy/post-tag/create','backend\website\taxonomy\PostTagController@store');
Route::get('/admin/taxonomy/post-tag/edit/{term_id}','backend\website\taxonomy\PostTagController@edit');
Route::post('/admin/taxonomy/post-tag/edit/{term_id}','backend\website\taxonomy\PostTagController@update');
Route::get('/admin/taxonomy/post-tag/delete/{term_id}','backend\website\taxonomy\PostTagController@destroy');
/*--end--*/

/*-- Backend Login Google --*/
/*
Route::get('/admin/login/google','backend\GoogleController@login');
Route::get('/admin/login/google/callback','backend\GoogleController@callback');
*/
/*--end--*/

/*-- Backend Facebook Login --*/
Route::get('/admin/login/facebook','backend\FacebookController@login');
/*--end--*/

/*-- Backend Log --*/
Route::get('/admin/log','backend\LogController@index');
Route::get('/admin/log2','backend\LogController@index2');
/*--end--*/

/*-- Backend Discount --*/
Route::any('/admin/discount','backend\store\DiscountController@index');
Route::get('/admin/discount/create','backend\store\DiscountController@create');
Route::post('/admin/discount/create','backend\store\DiscountController@store');
Route::get('/admin/discount/detail','backend\store\DiscountController@detail');

Route::get('/admin/discount/generate-code','backend\store\DiscountController@generateCodeDiscount');
Route::get('/admin/discount/offer-item','backend\store\DiscountController@GetOfferList');
/*Route::any('/admin/discount','backend\store\DiscountController@index');
Route::get('/admin/discount/generate-code','backend\store\DiscountController@generate_code_discount');
Route::get('/admin/discount/offer/get','backend\store\DiscountController@GetOfferList');*/
// Route::get('/admin/discount/offer/product-group','backend\store\DiscountController@offerProductGroup');
// Route::get('/admin/discount/product-list','backend\store\DiscountController@list_product');
/*Route::get('/admin/discount/create','backend\store\DiscountController@create');
Route::post('/admin/discount/create','backend\store\DiscountController@store');
Route::get('/admin/discount/edit/{term_id}', 'backend\store\DiscountController@edit');
Route::get('/admin/discount/delete/{term_id}', 'backend\store\DiscountController@destroy');*/
/*--end--*/

/*-- Backend Dashboard --*/
Route::get('/admin/dashboard','backend\DashboardController@index');
//post xem order tháng trong năm
Route::get('admin/dashboard/GetSalesYear','backend\DashboardController@turnover_year');
//post xem order ngày trong tháng
Route::post('/admin/dashboard/get-order-month','backend\DashboardController@statistics_order_month');
//post xem order tháng trong năm
Route::post('admin/dashboard/get-order-year','backend\DashboardController@statistics_order_year');
//Lấy dữ liệu theo các ngày trong tháng truyen tham số
Route::get('/admin/dashboard/list-month/{month}','backend\DashboardController@list_month');
//Lấy dữ liệu theo các tháng trong năm truyền tham số
Route::get('/admin/dashboard/list-year/{year}','backend\DashboardController@list_year');
//Load data từ controller
Route::get('/admin/dashboard/data-month/{year}/{month}','backend\DashboardController@data_month');
Route::get('/admin/dashboard/data-year/{month}','backend\DashboardController@data_year');
Route::get('/admin/dashboard/data-quarters/{year}','backend\DashboardController@data_quarters');
//end load data
//Đồ thị nhiefu dòng
Route::post('/admin/dashboard/get-order-quarters','backend\DashboardController@statistics_order_quarters');
/*--end--*/


/*-- Backend Statistic --*/
Route::get('/admin/report/statistic','backend\StatisticController@loadDefaultMonth');
Route::post('/admin/report/statistic/month','backend\StatisticController@changeMonth');
Route::post('/admin/report/statistic/year','backend\StatisticController@changeYear');
/*--end--*/

/*-- Backend Turnover --*/
Route::get('/admin/turnover','backend\TurnoverController@index');
Route::post('/admin/turnover/month','backend\TurnoverController@changeMonth');
Route::post('/admin/turnover/year','backend\TurnoverController@changeYear');
Route::post('/admin/turnover/quarters','backend\TurnoverController@changeQuarters');
Route::get('/admin/turnover/data-month/{month}/{year}/{status}','backend\TurnoverController@data_month');
Route::get('/admin/turnover/data-year/{year}/{status}','backend\TurnoverController@data_year');
Route::get('/admin/turnover/data-quarters/{year}/{status}','backend\TurnoverController@data_quarters');
/*--end--*/

/*-- Backend SellingProducts --*/
Route::get('admin/selling-products','backend\SellingProductsController@index');
Route::post('admin/selling-products/show-by-date','backend\SellingProductsController@showByDate');
Route::get('admin/selling-products/show-by-current-week','backend\SellingProductsController@showByCurrentWeek');
Route::post('admin/selling-products/show-by-month','backend\SellingProductsController@showByMonth');
Route::post('admin/selling-products/show-by-year','backend\SellingProductsController@showByYear');
Route::post('admin/selling-products/show-by-from-day-to-day','backend\SellingProductsController@showByFromDayToDay');
/*-- End --*/

/*-- Backend ThemeOption --*/
Route::get('admin/themes/option','backend\website\theme\ThemeOptionController@index');
Route::post('admin/themes/option','backend\website\theme\ThemeOptionController@save');
/*-- End --*/

/*-- Backend Group Customer --*/
//Route::get('/admin/taxonomy/{taxonomy}','backend\taxonomy\TaxonomyController@index');
Route::any('/admin/taxonomy/customer-group','backend\store\taxonomy\CustomerGroupController@index');
Route::get('/admin/taxonomy/customer-group/create','backend\store\taxonomy\CustomerGroupController@create');
Route::post('/admin/taxonomy/customer-group/create','backend\store\taxonomy\CustomerGroupController@store');
Route::get('/admin/taxonomy/customer-group/edit/{term_id}','backend\store\taxonomy\CustomerGroupController@edit');
Route::post('/admin/taxonomy/customer-group/edit/{term_id}','backend\store\taxonomy\CustomerGroupController@update');
Route::get('/admin/taxonomy/customer-group/delete/{term_id}','backend\store\taxonomy\CustomerGroupController@destroy');

/*-- Backend shipping --*/
Route::any('/admin/setting/shipping','backend\setting\ShippingSettingController@index');
// Route::get('/admin/setting/shipping/create','backend\setting\ShippingSettingController@create');
Route::post('/admin/setting/shipping/create','backend\setting\ShippingSettingController@store');
// Route::post('/admin/setting/shipping/edit/{shipping_id}','backend\setting\ShippingSettingController@update');
Route::get('/admin/setting/shipping/delete/{shipping_id}','backend\setting\ShippingSettingController@destroy');

// Route::get('/admin/setting/shipping-rate/create/{shipping_id}','backend\setting\ShippingSettingController@create_shipping_rate');
Route::post('/admin/setting/shipping/rate/create','backend\setting\ShippingSettingController@store_shipping_rate');
Route::post('/admin/setting/shipping/rate/edit/{shipping_id}','backend\setting\ShippingSettingController@update');
Route::get('/admin/setting/shipping/rate/delete/{shipping_id}','backend\setting\ShippingSettingController@destroy_shipping_rate');
/*-- End --*/

/*-- Backend checkout --*/
Route::get('/admin/setting/checkout','backend\setting\CheckoutSettingController@index');
Route::post('/admin/setting/checkout/updateCustomerAccount','backend\setting\CheckoutSettingController@updateCustomerAccount');
/*-- End --*/
