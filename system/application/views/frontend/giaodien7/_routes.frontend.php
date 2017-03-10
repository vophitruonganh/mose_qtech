<?php

/*-- Frontend Home --*/
Route::get('/','HomeController@index');
Route::get('/index.html','HomeController@index');
/*--end--*/

/*-- Frontend Product --*/
Route::get('/product.html','ProductController@index');
Route::get('/product/tags/{tag_slug}.html','ProductController@product_tag');
Route::get('/product/category/{category_slug}.html','ProductController@product_category');
Route::post('/product.html','ProductController@filter');
/*--end--*/
/*-- Frontend Product Detail --*/

Route::get('/product-detail/{product_slug}.html','ProductDetailController@productDetail');
/*--end--*/

/*-- Frontend Post New --*/
Route::get('/news.html','PostController@showFull');
Route::get('/news/{post_slug}.html','PostController@postDetail');
Route::get('/news/tags/{tag_slug}.html','PostController@post_tag');
/*--end--*/

/*-- Frontend Order --*/
Route::post('/order/{product_slug}.html','OrderController@getOrder');
Route::get('/cart.html','OrderController@getCart');
Route::post('/cart.html','OrderController@postCart');
Route::get('/cart/delete_all.html','OrderController@deleteCartAll');
Route::get('/cart/delete_item/{id}.html','OrderController@deleteCartItem');
Route::get('/cart/checkout.html','OrderController@getCheckout');
Route::post('/cart/checkout.html','OrderController@postCheckout');
Route::post('/cart/checkoutLogin.html','OrderController@postCheckoutLogin');
Route::post('/cart/checkout-pending.html','OrderController@pendingCheckout');
/*--end--*/

/*-- Frontend Contact Page --*/
Route::get('/contact.html','ContactController@index');
Route::post('/contact/sendmail.html','ContactController@sendmail');
Route::get('/contact_success.html','ContactController@success');
/*--end--*/

/*-- Frontend Page  --*/
Route::get('/page/{page_slug}.html','PageController@pageDetail');
/*--end--*/

/*-- Frontend Login --*/
Route::get('login.html','LoginController@index');
Route::post('login.html','LoginController@login');
Route::get('logout.html','LoginController@logout');
/*--end--*/

/*-- Frontend Customer Register --*/
Route::get('/customer_register.html','CustomerRegisterController@index');
Route::post('/customer_register/create.html','CustomerRegisterController@store');
/*--end--*/

/*-- Frontend Search Product --*/
Route::get('/search_product/search.html','SearchProductController@search');
Route::post('/search_product/search.html','SearchProductController@filter');
/*--end--*/

?>