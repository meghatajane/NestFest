<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::index');
$routes->get('/sign-in', 'Auth::admin');
$routes->get('/pg-sign-in', 'Auth::pg_sign_in');
$routes->get('/mess-sign-in', 'Auth::mess_sign_in');
$routes->get('/student-sign-in', 'Auth::student_sign_in');
$routes->get('/sign-up/(:any)', 'Auth::sign_up/$1');
$routes->post('/submitSignIn', 'Auth::submitSignIn');
$routes->post('/submitSignUp', 'Auth::submitSignUp');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/profile', 'Dashboard::profile');
$routes->post('/submit-profile', 'Dashboard::submit_profile');
$routes->get('/logout', 'Auth::logout');
$routes->get('/forget-password', 'Auth::forget_password');
$routes->post('/forget-password', 'Auth::forget_password');
$routes->get('/reset-password', 'Auth::reset_password');
$routes->post('/reset-password', 'Auth::reset_password');
$routes->post('/new-tiffin-entry', 'Messes::new_tiffin_entry');
$routes->get('/messes-tiffin/(:any)', 'Messes::messes_tiffin/$1');

$routes->resource('fishes');
$routes->resource('users');
$routes->resource('pgs');
$routes->get('/pgs/photos/(:any)', 'Pgs::photos/$1');
$routes->post('/remove-photo', 'Dashboard::remove_photo');
$routes->get('/pending-pgs', 'Pgs::pending_pgs');
$routes->get('/approve-pg/(:any)', 'Pgs::approve_pg/$1');
$routes->get('/reject-pg/(:any)', 'Pgs::reject_pg/$1');
$routes->get('/pg-view/(:any)', 'Pgs::pg_view/$1');
$routes->get('/pg-list', 'Pgs::pg_list');
$routes->post('/pg-list', 'Pgs::pg_list');
$routes->post('/apply-pg', 'Pgs::apply_pg');
$routes->get('/pg-bookings', 'Pgs::pg_bookings');
$routes->post('/make-payment', 'Pgs::make_payment');
$routes->post('/pg-feedback', 'Pgs::pg_feedback');
$routes->get('/my-pg-bookings', 'Pgs::my_pg_bookings');
$routes->post('/watch-pg-docs', 'Pgs::watch_pg_docs');
$routes->get('/approve-pg-request/(:any)', 'Pgs::approve_pg_request/$1');
$routes->get('/reject-pg-request/(:any)', 'Pgs::reject_pg_request/$1');
$routes->get('/pg-feedbacks', 'Pgs::pg_feedbacks');

$routes->resource('messes');
$routes->get('/messes/photos/(:any)', 'Messes::photos/$1');
$routes->get('/pending-messes', 'Messes::pending_pgs');
$routes->get('/approve-mess/(:any)', 'Messes::approve_pg/$1');
$routes->get('/reject-mess/(:any)', 'Messes::reject_pg/$1');
$routes->get('/mess-list', 'Messes::mess_list');
$routes->post('/mess-list', 'Messes::mess_list');
$routes->get('/mess-view/(:any)', 'Messes::mess_view/$1');
$routes->post('/apply-mess', 'Messes::apply_mess');
$routes->get('/mess-bookings', 'Messes::mess_bookings');
$routes->post('/make-payment-mess', 'Messes::make_payment');
$routes->post('/mess-feedback', 'Messes::mess_feedback');
$routes->get('/my-mess-bookings', 'Messes::my_mess_bookings');
$routes->post('/watch-mess-docs', 'Messes::watch_mess_docs');
$routes->get('/approve-mess-request/(:any)', 'Messes::approve_mess_request/$1');
$routes->get('/reject-mess-request/(:any)', 'Messes::reject_mess_request/$1');
$routes->get('/mess-feedbacks', 'Messes::mess_feedbacks');