<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Client');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Client::index');
$routes->get('logout', function(){
    session()->destroy();
    return redirect()->to(base_url(""));
});
$routes->get('/register',"Login::register");

//untuk admin system


//untuk admin makanan
$routes->get("admin","AdminMakanan::index");
$routes->get("admin/makanan","AdminMakanan::index");
$routes->get("admin/makanan/tambah","AdminMakanan::tambah");
$routes->get("admin/makanan/delete/(:num)","AdminMakanan::delete/$1");
$routes->get("admin/makanan/edit/(:num)","AdminMakanan::edit/$1");

// untuk admin tempat

$routes->get("admin/tempat", "AdminTempat::index");
$routes->get("admin/tempat/tambah", "AdminTempat::tambah");
$routes->post("admin/tempat/save", "AdminTempat::save");
$routes->get("admin/tempat/edit/(:num)", "AdminTempat::edit/$1");
$routes->post("admin/tempat/update", "AdminTempat::update");
$routes->get("admin/tempat/delete/(:num)", "AdminTempat::delete/$1");
// $routes->get("adminMakanansimpan","AdminMakanan::simpan");


// untuk admin login
$routes->get("admin/login", "Login::admin");
$routes->get("admin/register", "Login::adminRegister");
$routes->post("admin/admin_register_process", "Login::adminRegisterProcess");
$routes->post("admin/login_process", "Login::admin_process");
$routes->get("admin/logout", function(){
    session()->destroy();
    return redirect()->to("admin/login");   
});

// untuk admin kategori

$routes->get("admin/kategori", "AdminKategori::index");
$routes->get("admin/kategori/tambah", "AdminKategori::tambah");
$routes->post("admin/kategori/save", "AdminKategori::save");
// $routes->get("admin/kategori/edit/(:num)", "AdminKategori::edit/$1");
$routes->post("admin/kategori/update/(:num)", "AdminKategori::update/$1");
$routes->get("admin/kategori/delete/(:num)", "AdminKategori::delete/$1");



//untuk admin transaksi

$routes->get("admin/transaksi","AdminTransaksi::index");
$routes->get("admin/transaksi/konfirmasi/(:num)","AdminTransaksi::konfirmasi/$1");



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
