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

/*-- Frontend Home --*/
Route::get('/','HomeController@index');
Route::get('/index.html','HomeController@index');
/*--end--*/

/*-- Frontend Page  --*/
Route::get('/page/{page_slug}.html','PageController@pageDetail');
/*--end--*/

/*-- Frontend Search Product --*/
Route::get('/search_product/search.html','SearchProductController@search');
Route::post('/search_product/search.html','SearchProductController@filter');
/*--end--*/

/*-- Frontend Contact Page --*/
Route::get('/contact.html','ContactController@index');
Route::post('/contact/sendmail.html','ContactController@sendmail');
Route::get('/contact_success.html','ContactController@success');
/*--end--*/

/*-- Frontend Post New --*/
Route::get('/news.html','PostController@showFull');
Route::get('/news/{post_slug}.html','PostController@postDetail');
Route::get('/news/tags/{tag_slug}.html','PostController@post_tag');
/*--end--*/

/*-- Frontend Product --*/
Route::get('/product.html','ProductController@index');
Route::post('/product.html','ProductController@filter');
/*--end--*/

/*-- Frontend Product Group --*/
Route::get('/product_group/{slug}.html','ProductGroupController@index');
Route::post('/product_group/{slug}.html','ProductGroupController@filter');
/*--end--*/

/*-- Frontend Product New --*/
Route::get('/product_new.html','ProductNewController@index');
Route::post('/product_new.html','ProductNewController@filter');
/*--end--*/ 

/*-- Frontend Customer Register --*/
Route::get('/customer_register.html','CustomerRegisterController@index');
Route::post('/customer_register/create.html','CustomerRegisterController@store');
/*--end--*/

/*-- Frontend Login --*/
Route::get('login.html','LoginController@index');
Route::post('login.html','LoginController@login');
Route::get('logout.html','LoginController@logout');
/*--end--*/

/*-- Frontend Search Post ( Search News ) --*/
Route::get('/search_news/search.html','SearchNewsController@search');
/*--end--*/

/*-- Frontend Product Discount --*/
Route::get('/product_discount.html','ProductDiscountController@index');
Route::post('/product_discount.html','ProductDiscountController@filter');
/*--end--*/

/*-- Frontend Order --*/
Route::post('/order/{product_slug}.html','OrderController@getOrder');
Route::get('/cart.html','OrderController@getCart');
Route::post('/cart.html','OrderController@postCart');
Route::get('/cart/delete_all.html','OrderController@deleteCartAll');
Route::get('/cart/delete_item/{id}.html','OrderController@deleteCartItem');
Route::get('/cart/checkout.html','OrderController@getCheckout');
Route::post('/cart/checkout.html','OrderController@postCheckout');
Route::post('/cart/checkout-login.html','OrderController@postCheckoutLogin');
/*--end--*/

/*-- Frontend Product Detail --*/
Route::get('/product-detail/{product_slug}.html','ProductDetailController@productDetail');
/*--end--*/

/*-- Frontend Post Category --*/
Route::get('/post_category/{slug}.html','PostCategoryController@index');
/*--end--*/ 

/*------------------------------------------------------ Demo --------------------------------------------------*/

Route::get('{slug}','CheckSlugController@index'); // danh muc, nhan bai viet, chi tiet bai viet, redirect ve trang chu
Route::get('pages/{slug}','CheckSlugController@index'); // chi tiet page
//Route::get('product/category/{slugDetail}','CheckSlugController@index'); // danh muc san pham
Route::get('collections','CollectionsController@index');// hien thi tat ca san pham
Route::get('collections/{slugDetail}','CollectionsController@index'); // danh muc san pham, nhan, nha cung cap, nhom, chi tiet san pham
//Route::get('product/tags/{slug}','CheckSlugController@index'); // tag san pham
//Route::get('product/factory/{slug}','CheckSlugController@index'); // nha cung cap
//Route::get('product/group/{slug}','CheckSlugController@index'); // nhom san pham
Route::get('collections/discount','CollectionsController@discount'); // san pham khuyen mai
/*------------------------------------------------------ End Demo --------------------------------------------------*/