<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/adminRegister', function () {
    return view('adminRegister');
});
Route::post('/registerAdmin','AdminController@register');

Route::get('/adminLogin', function () {
    return view('adminLogin');
});
Route::post('/loginAdmin','AdminController@login');
Route::get('/logoutAdmin','AdminController@logout');

Route::get('/listPesanan', 'AdminController@getList');

Route::get('/tambahDestinasi', function () {
    return view('tambahDestinasi');
});
Route::post('/tambah','AdminController@tambah');

Route::get('/updateDestinasi', function () {
    return view('updateDestinasi');
});
Route::get('/updateDestinasi','AdminController@updateDestinasi');
Route::get('/updatingDestinasi/{id}','AdminController@updatingDestinasi');
Route::post('/update','AdminController@update');

Route::get('/hapusDestinasi', function () {
    return view('hapusDestinasi');
});
Route::get('/hapusDestinasi','AdminController@hapusDestinasi');
Route::get('/hapus/{id}', 'AdminController@hapus');

Route::get('/customerRegister', function () {
    return view('customerRegister');
});
Route::post('/registerCustomer','CustomerController@register');

Route::get('/customerLogin', function () {
    return view('customerLogin');
});
Route::post('/loginCustomer','CustomerController@login');
Route::get('/logoutCustomer','CustomerController@logout');

Route::get('/destinasi', function () {
    return view('destinasi');
});
Route::get('/destinasi','CustomerController@getDestinasi');

Route::get('/cart','CustomerController@getCart');
Route::get('/addtocart/{id}','CustomerController@addtocart');
Route::get('/reducecart/{id}','CustomerController@reducecart');
Route::get('/removefromcart/{id}', 'CustomerController@removefromcart');
Route::get('/pesan','CustomerController@pesan');
