<?php 

/*Trang home*/
Route::get('/','frontend\HomeController@index');

/* sản phẩm */
Route::get('collections','frontend\CollectionsController@index');
Route::post('collections','frontend\CollectionsController@filter');
Route::get('collections/discount','frontend\CollectionsController@discount');
Route::post('collections/discount','frontend\CollectionsController@filter_discount');
Route::get('collections/{slugDetail}','frontend\CollectionsController@detail'); 
Route::get('collections/{product_id}/{variant_id}','frontend\ProductController@variant_detail');
Route::post('collections/get_variant_price','frontend\ProductController@get_variant_price');
/* end sản phẩm */

/*Cart*/
Route::get('cart','frontend\CartController@index');
Route::post('cart/order/{product_slug}','frontend\CartController@getOrder');
Route::post('cart','frontend\CartController@postCart');
Route::get('cart/checkout','frontend\CartController@getCheckout');
Route::post('cart/checkout','frontend\CartController@postCheckout');
Route::post('cart/checkoutLogin','frontend\CartController@postCheckoutLogin');
Route::post('cart/checkout-pending','frontend\CartController@pendingCheckout');
Route::get('cart/delete_item/{id}','frontend\CartController@deleteCartItem');
Route::get('cart/delete_cart_all','frontend\CartController@delete_cart_all');
Route::get('cart/get_discount_code/{code}','frontend\CartController@get_discount_code');
Route::get('cart/get_district/{provinceId}','frontend\CartController@get_district');
Route::get('cart/camon/{order_id}','frontend\CartController@get_camon');
/* end cart*/

/* page */
Route::get('pages/contact','frontend\PagesController@contact');
Route::post('pages/contact','frontend\PagesController@sendmail');
Route::get('pages/contact_success','frontend\PagesController@success');

Route::get('pages/{slug}','frontend\PagesController@index'); 
/* end page */

/*-- Customer --*/
Route::get('customer','frontend\CustomerController@info');
Route::get('customer/logout','frontend\CustomerController@logout');
Route::get('customer/login','frontend\CustomerController@index');
Route::post('customer/login','frontend\CustomerController@login');
Route::get('customer/register','frontend\CustomerController@create');
Route::post('customer/register','frontend\CustomerController@register');
Route::get('customer/edit','frontend\CustomerController@edit');
Route::post('customer/edit','frontend\CustomerController@update');
Route::get('customer/order/{order_code}','frontend\CustomerController@customer_order');
/*-- End --*/

/* post */
Route::get('{slug}','frontend\CheckSlugController@index');
/* end post */

