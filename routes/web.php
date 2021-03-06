<?php
/*
|--------------------------------------------------------------------------
|  ADMIN SECTION
|--------------------------------------------------------------------------
|
*/

Route::get('/admin', function () {
  return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
  Route::get('/home', 'HomeController@index')->name('home');
  // Product Basic
  Route::get('/products', 'ProductsController@products')->name('products');
  Route::get('/product-list', 'ProductsController@productList')->name('product-list');
  Route::get('/add-product/{id?}', 'ProductsController@addProduct')->name('add-product');
  Route::post('/add-product', 'ProductsController@add')->name('add-product');
  Route::get('/product-delete/{id}', 'ProductsController@delete')->name('product-delete');

  /** Customers */
  Route::get('/customers', 'CustomerController@index')->name('customers');
  Route::get('/customer-list', 'CustomerController@customerList')->name('customer-list');
  Route::get('/customers/{id}', 'CustomerController@view')->name('customers_view');
  Route::post('/customers/{id}', 'CustomerController@update')->name('customers_update');

  // Product Image
  Route::post('/product_image', 'ImagesController@add')->name('product_image');
  Route::get('/image-feature', 'ImagesController@imageFeature')->name('image_feature');

  /** Order */
  Route::get('/order-all', 'OrderController@index')->name('orders');
  Route::get('/order-list', 'OrderController@orderList')->name('order-list');
  Route::get('/orders/{order?}/details', 'OrderController@details')->name('order_details');
  Route::get('/orders/pdf', 'OrderController@downloadPDF')->name('order_pdf');
  Route::post('/orders/{id}', 'OrderController@edit')->name('order_edit');
  Route::get('/orders/{id}/delete', 'OrderController@delete')->name('order_delete');

  /** Order Request **/
  Route::get('/order-requests', 'OrderRequestController@index')->name('order_requests');
  Route::get('/order-requests/new', 'OrderRequestController@new')->name('order_request_new');
  Route::post('/order-requests/add', 'OrderRequestController@add')->name('order_request_add');
  Route::get('/order-requests-list', 'OrderRequestController@orderList')->name('order_requests_list'); //ajax_data
  Route::get('/order-requests/{id}', 'OrderRequestController@view')->name('order_request_view');
  Route::post('/order-requests/{id}', 'OrderRequestController@update')->name('order_request_update');
  Route::get('/order-requests/{id}/delete', 'OrderRequestController@delete')->name('order_request_delete');
  Route::post('/order-image-delete', 'OrderRequestController@imageDelete')->name('order_image_delete');

  // Size
  Route::get('/size/{id?}', 'SizesController@index')->name('size');
  Route::get('/size-delete/{id}', 'SizesController@delete')->name('size-delete');
  Route::post('/size', 'SizesController@add')->name('size');
  // Color
  Route::get('/color/{id?}', 'ColorsController@index')->name('color');
  Route::get('/color-delete/{id}', 'ColorsController@delete')->name('color-delete');
  Route::post('/color', 'ColorsController@add')->name('color');
  // Brand
  Route::get('/brand/{id?}', 'BrandController@index')->name('brand');
  Route::get('/brand-delete/{id}', 'BrandController@delete')->name('brand-delete');
  Route::post('/brand', 'BrandController@add')->name('brand');
  // Category
  Route::get('/category/{id?}', 'CategoriesController@index')->name('category');
  Route::get('/category-delete/{id}', 'CategoriesController@delete')->name('category-delete');
  Route::post('/category', 'CategoriesController@add')->name('category');
  // Sub Category
  Route::get('/sub-category/{id?}', 'CategoriesController@indexSub')->name('sub-category');
  Route::get('/sub-category-delete/{id}', 'CategoriesController@deleteSub')->name('sub-category-delete');
  Route::post('/sub-category', 'CategoriesController@addSub')->name('sub-category');
  Route::get('/get-sub-cat-by-cat', 'CategoriesController@getSubCatByCat')->name('get-sub-cat-by-cat');
  // Sub Sub Category
  Route::get('/sub-sub-category/{id?}', 'CategoriesController@indexSubSub')->name('sub-sub-category');
  Route::get('/sub-sub-category-delete/{id}', 'CategoriesController@deleteSubSub')->name('sub-sub-category-delete');
  Route::post('/sub-sub-category', 'CategoriesController@addSubSub')->name('sub-sub-category');
  Route::get('/get-sub-sub-cat-by-sub-cat', 'CategoriesController@getSubSubCatBySubCat')->name('get-sub-sub-cat-by-sub-cat');
});

/** ########################################  FRONT SECTION ################################# **/

//Route::get('/', function () {
//    return view('front.home');
//});

Route::get('/', 'Front\HomeController@home')->name('home_page');
Route::get('/products/category/{id}/{limit?}', 'Front\ProductsController@categoryProducts')->name('category_products');
Route::get('/view-product/{id}', 'Front\ProductsController@viewProduct')->name('view_product');

/** Cart */
Route::post('/add-to-cart', 'Front\CartsController@addToCart')->name('add_to_cart');
Route::post('/update-cart', 'Front\CartsController@updateCart')->name('update_cart');
Route::get('/view-cart', 'Front\CartsController@viewCart')->name('view_cart');
Route::get('/remove-cart-item/{itemId}', 'Front\CartsController@removeCartItem')->name('remove_cart_item');

/** Order */
Route::get('/checkout/{cart?}', 'Front\OrderController@checkout')->name('checkout');
Route::post('/orders', 'Front\OrderController@add')->name('add_order');
Route::get('/orders/{order?}', 'Front\OrderController@view')->name('view_order');
