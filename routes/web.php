<?php

use Illuminate\Support\Facades\Route;

Route::get('/comment', 'HomeController@comment')->name('comment');

Route::resource('/comments','CommentsController');
Route::resource('/replies','RepliesController');
Route::post('/replies/ajaxDelete','RepliesController@ajaxDelete');

Route::get('/registeractive', function () {
    return view('registeractive');
});

Route::get('/renungan', function () {
    return view('post/renungan');
});

Route::get('/warta-jemaat', function () {
    return view('post/warta');
});

Route::get('/pengumuman', function () {
    return view('post/pengumuman');
});

Route::get('/renungan/{id}', function () {
    return view('postdetail/renungan');
});

Route::get('/', 'CategoryReservationController@reservation')->name('categoryReservation');

Route::get('/post/{id}', 'Admin\PostController@detailspost')->name('postdetail');

Route::get('/lagu/{id}', 'Admin\LaguIbadahController@detailslagu')->name('lagu.detail');

Route::get('/guest/categoryReservation/show/{id}', 'CategoryReservationController@show')->name('categoryReservation.show');

// Route::get('send-mail', function () {
//    $email = Auth::user()->email;
//    $nama = Auth::user()->name;
//     $details = [
//         'title' => 'Mail from ItSolutionStuff.com',
//         'body' => $nama
//     ];
   
//     \Mail::to($email)->send(new \App\Mail\ReservationMail($details));
   
//     dd("Email is Sent.");
// });

Auth::routes();

// Hak Akses Super Admin
// Semua Fitur 
// =====================================================================
Route::group(['middleware' => ['cekrole:superadmin,adminverification']], function () {

    Route::prefix('admin')->group(function () {

        Route::get('/toggle-approve', 'Admin\UserController@approval')->name('admin.user.approval');
        Route::get('/user', 'Admin\UserController@index')->name('admin.user');
        Route::get('/user/{id}', 'Admin\UserController@details')->name('admin.user.detail');
        Route::post('/user', 'Admin\UserController@update')->name('admin.user.update');
        // Route::post('/user', 'Admin\UserController@approval')->name('admin.user.approval');
        Route::delete('/user/delete/{id}','Admin\UserController@delete')->name('admin.user.delete');
    });
});

// Hak Akses Admin
// Semua Fitur kecuali User dan tidak bisa delete family dan jemaat
// =====================================================================
Route::group(['middleware' => ['cekrole:superadmin,admin']], function () {

    Route::prefix('admin')->group(function () {
    
        Route::get('/family', 'Admin\FamilyController@index')->name('admin.family.family');
        Route::get('/family/{id}', 'Admin\FamilyController@details')->name('admin.family.detail');
        Route::get('/family/show/{id}', 'Admin\FamilyController@show')->name('admin.family.show');
        Route::post('/family', 'Admin\FamilyController@update')->name('admin.family.update');
        Route::delete('/family/delete/{id}','Admin\FamilyController@delete')->name('admin.family.delete');
        Route::get('/family/export_excel', 'Admin\FamilyController@export_excel')->name('admin.family.export_excel');
        Route::post('/family/import_excel', 'Admin\FamilyController@import_excel')->name('admin.family.import_excel');

        Route::get('/jemaat', 'Admin\JemaatController@index')->name('admin.jemaat.jemaat');
        Route::get('/jemaat/{id}', 'Admin\JemaatController@details')->name('admin.jemaat.detail');
        Route::post('/jemaat', 'Admin\JemaatController@update')->name('admin.jemaat.update');
        Route::delete('/jemaat/delete/{id}','Admin\JemaatController@delete')->name('admin.jemaat.delete');
        Route::get('/jemaat/export_excel', 'Admin\JemaatController@export_excel')->name('admin.jemaat.export_excel');
        Route::post('/jemaat/import_excel', 'Admin\JemaatController@import_excel')->name('admin.jemaat.import_excel');

        Route::get('/bpj', 'Admin\BpjController@index')->name('admin.bpj');
        Route::get('/bpj/{id}', 'Admin\BpjController@details')->name('admin.bpj.detail');
        Route::post('/bpj', 'Admin\BpjController@update')->name('admin.bpj.update');
        Route::delete('/bpj/delete/{id}','Admin\BpjController@delete')->name('admin.bpj.delete');
    });
});

// Hak Akses Admin Ibadah
// - Category Pelayan, Pelayan, Pelayanan, Category Reservation, Reservation, Lagu Ibadah, Lagu, Banner
// ======================================================================================================
Route::group(['middleware' => ['cekrole:superadmin,admin,adminibadah']], function () {

    Route::prefix('admin')->group(function () {
    
        Route::get('/categoryPelayan', 'Admin\CategoryPelayanController@index')->name('admin.categoryPelayan');
        Route::get('/categoryPelayan/{id}', 'Admin\CategoryPelayanController@details')->name('admin.categoryPelayan.detail');
        Route::post('/categoryPelayan', 'Admin\CategoryPelayanController@update')->name('admin.categoryPelayan.update');
        Route::delete('/categoryPelayan/delete/{id}','Admin\CategoryPelayanController@delete')->name('admin.categoryPelayan.delete');

        Route::get('/pelayan', 'Admin\PelayanController@index')->name('admin.pelayan');
        Route::get('/pelayan/{id}', 'Admin\PelayanController@details')->name('admin.pelayan.detail');
        Route::post('/pelayan', 'Admin\PelayanController@update')->name('admin.pelayan.update');
        Route::delete('/pelayan/delete/{id}','Admin\PelayanController@delete')->name('admin.pelayan.delete');

        Route::get('/pelayanan', 'Admin\PelayananController@index')->name('admin.pelayanan');
        Route::get('/pelayanan/{id}', 'Admin\PelayananController@details')->name('admin.pelayanan.detail');
        Route::post('/pelayanan', 'Admin\PelayananController@update')->name('admin.pelayanan.update');
        Route::delete('/pelayanan/delete/{id}','Admin\PelayananController@delete')->name('admin.pelayanan.delete');

        Route::get('/categoryReservation', 'Admin\CategoryReservationController@index')->name('admin.categoryReservation');
        Route::get('/categoryReservation/{id}', 'Admin\CategoryReservationController@details')->name('admin.categoryReservation.detail');
        Route::get('/categoryReservation/show/{id}', 'Admin\CategoryReservationController@show')->name('admin.categoryReservation.show');
        Route::post('/categoryReservation', 'Admin\CategoryReservationController@update')->name('admin.categoryReservation.update');
        Route::delete('/categoryReservation/delete/{id}','Admin\CategoryReservationController@delete')->name('admin.categoryReservation.delete');
        Route::get('/laporan-pdf/{id}','Admin\CategoryReservationController@generatePDF')->name('admin.categoryReservation.generatePDF');

        Route::get('/reservation', 'Admin\ReservationController@index')->name('admin.reservation');
        Route::get('/reservation/{id}', 'Admin\ReservationController@details')->name('admin.reservation.detail');
        Route::post('/reservation', 'Admin\ReservationController@update')->name('admin.reservation.update');
        Route::delete('/reservation/delete/{id}','Admin\ReservationController@delete')->name('admin.reservation.delete');

        Route::get('/lagu', 'Admin\LaguController@index')->name('admin.lagu');
        Route::get('/lagu/{id}', 'Admin\LaguController@details')->name('admin.lagu.detail');
        Route::post('/lagu', 'Admin\LaguController@update')->name('admin.lagu.update');
        Route::delete('/lagu/delete/{id}','Admin\LaguController@delete')->name('admin.lagu.delete');

        Route::get('/laguIbadah', 'Admin\LaguIbadahController@index')->name('admin.laguIbadah');
        Route::get('/laguIbadah/{id}', 'Admin\LaguIbadahController@details')->name('admin.laguIbadah.detail');
        Route::post('/laguIbadah', 'Admin\LaguIbadahController@update')->name('admin.laguIbadah.update');
        Route::delete('/laguIbadah/delete/{id}','Admin\LaguIbadahController@delete')->name('admin.laguIbadah.delete');

        Route::get('/banner', 'Admin\BannerController@index')->name('admin.banner');
        Route::get('/banner/{id}', 'Admin\BannerController@details')->name('admin.banner.detail');
        Route::post('/banner', 'Admin\BannerController@update')->name('admin.banner.update');
        Route::delete('/banner/delete/{id}','Admin\BannerController@delete')->name('admin.banner.delete');
  
    });
});

// Hak Akses Admin Post
// - Category Post, Post
// =====================================================================
Route::group(['middleware' => ['cekrole:adminpost,superadmin,admin']], function () {

    Route::prefix('admin')->group(function () {

        Route::get('/categoryPost', 'Admin\CategoryPostController@index')->name('admin.categoryPost');
        Route::get('/categoryPost/{id}', 'Admin\CategoryPostController@details')->name('admin.categoryPost.detail');
        Route::get('/categoryPost/show/{id}', 'Admin\categoryPostController@show')->name('admin.categoryPost.show');
        Route::post('/categoryPost', 'Admin\CategoryPostController@update')->name('admin.categoryPost.update');
        Route::delete('/categoryPost/delete/{id}','Admin\CategoryPostController@delete')->name('admin.categoryPost.delete');

        Route::get('/post', 'Admin\PostController@index')->name('admin.post.post');
        Route::get('/post/{id}', 'Admin\PostController@details')->name('admin.post.detail');
        Route::post('/post', 'Admin\PostController@update')->name('admin.post.update');
        Route::delete('/post/delete/{id}','Admin\PostController@delete')->name('admin.post.delete');

    });
});

Route::group(['middleware' => ['cekrole:superadmin,admin,adminibadah,adminpost,adminverification']], function () {

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');

        Route::get('/home', 'Admin\HomeController@index')->name('admin.home');

    });
});


Route::group(['middleware' => ['cekrole:superadmin,admin,jemaat,adminpost,adminibadah,adminverification']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::get('/home', 'CategoryReservationController@reservationhome')->name('reservationhome');

    Route::get('/reservation', 'ReservationController@index')->name('reservation');
    Route::get('/reservation/{name}', 'ReservationController@details')->name('reservation.detail');
    Route::post('/reservation', 'ReservationController@update')->name('reservation.update');
    Route::delete('/reservation/delete/{id}','ReservationController@delete')->name('reservation.delete');
    
    Route::get('/categoryReservation', 'CategoryReservationController@index')->name('categoryReservation');
    Route::get('/categoryReservation/{id}', 'CategoryReservationController@details')->name('categoryReservation.detail');
    Route::get('/categoryReservation/show/{id}', 'CategoryReservationController@show')->name('categoryReservation.show');
    Route::post('/categoryReservation', 'CategoryReservationController@update')->name('categoryReservation.update');
    Route::delete('/categoryReservation/delete/{id}','CategoryReservationController@delete')->name('categoryReservation.delete');

    Route::get('/update-profile/{id}', 'Admin\JemaatController@jemaatdetails')->name('jemaat.updateprofile');
    Route::post('/update-profile', 'Admin\JemaatController@updatejemaat')->name('jemaat.update');

});


