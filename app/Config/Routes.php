<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(true);
$routes->set404Override();
$routes->setAutoRoute(true);

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index');
$routes->get('/index', 'Pages::index');
$routes->get('/about-us', 'Pages::about-us');
$routes->get('/accordions-collpase', 'Pages::accordions-collpase');
$routes->get('/add-products', 'Pages::add-products');
$routes->get('/alerts', 'Pages::alerts');
$routes->get('/apex-area-charts', 'Pages::apex-area-charts');
$routes->get('/apex-bar-charts', 'Pages::apex-bar-charts');
$routes->get('/apex-boxplot-charts', 'Pages::apex-boxplot-charts');
$routes->get('/apex-bubble-charts', 'Pages::apex-bubble-charts');
$routes->get('/apex-candlestick-charts', 'Pages::apex-candlestick-charts');
$routes->get('/apex-column-charts', 'Pages::apex-column-charts');
$routes->get('/apex-heatmap-charts', 'Pages::apex-heatmap-charts');
$routes->get('/apex-line-charts', 'Pages::apex-line-charts');
$routes->get('/apex-mixed-charts', 'Pages::apex-mixed-charts');
$routes->get('/apex-pie-charts', 'Pages::apex-pie-charts');
$routes->get('/apex-polararea-charts', 'Pages::apex-polararea-charts');
$routes->get('/apex-radar-charts', 'Pages::apex-radar-charts');
$routes->get('/apex-radialbar-charts', 'Pages::apex-radialbar-charts');
$routes->get('/apex-rangearea-charts', 'Pages::apex-rangearea-charts');
$routes->get('/apex-scatter-charts', 'Pages::apex-scatter-charts');
$routes->get('/apex-timeline-charts', 'Pages::apex-timeline-charts');
$routes->get('/apex-treemap-charts', 'Pages::apex-treemap-charts');
$routes->get('/avatars', 'Pages::avatars');
$routes->get('/badge', 'Pages::badge');
$routes->get('/blog-create', 'Pages::blog-create');
$routes->get('/blog-details', 'Pages::blog-details');
$routes->get('/blog', 'Pages::blog');
$routes->get('/borders', 'Pages::borders');
$routes->get('/breadcrumb', 'Pages::breadcrumb');
$routes->get('/breakpoints', 'Pages::breakpoints');
$routes->get('/buttongroup', 'Pages::buttongroup');
$routes->get('/buttons', 'Pages::buttons');
$routes->get('/cards', 'Pages::cards');
$routes->get('/carousel', 'Pages::carousel');
$routes->get('/cart', 'Pages::cart');
$routes->get('/chartjs-charts', 'Pages::chartjs-charts');
$routes->get('/chat', 'Pages::chat');
$routes->get('/checkout', 'Pages::checkout');
$routes->get('/colors', 'Pages::colors');
$routes->get('/columns', 'Pages::columns');
$routes->get('/coming-soon', 'Pages::coming-soon');
$routes->get('/contact-us', 'Pages::contact-us');
$routes->get('/contacts', 'Pages::contacts');
$routes->get('/create-password-basic', 'Pages::create-password-basic');
$routes->get('/create-password-cover', 'Pages::create-password-cover');
$routes->get('/crm-companies', 'Pages::crm-companies');
$routes->get('/crm-contacts', 'Pages::crm-contacts');
$routes->get('/crm-deals', 'Pages::crm-deals');
$routes->get('/crm-leads', 'Pages::crm-leads');
$routes->get('/crypto-buy-sell', 'Pages::crypto-buy-sell');
$routes->get('/crypto-currency-exchange', 'Pages::crypto-currency-exchange');
$routes->get('/crypto-marketcap', 'Pages::crypto-marketcap');
$routes->get('/crypto-transactions', 'Pages::crypto-transactions');
$routes->get('/crypto-wallet', 'Pages::crypto-wallet');
$routes->get('/css-grid', 'Pages::css-grid');
$routes->get('/data-tables', 'Pages::data-tables');
$routes->get('/draggable-cards', 'Pages::draggable-cards');
$routes->get('/dropdowns', 'Pages::dropdowns');
$routes->get('/echarts', 'Pages::echarts');
$routes->get('/edit-products', 'Pages::edit-products');
$routes->get('/emptypage', 'Pages::emptypage');
$routes->get('/error401', 'Pages::error401');
$routes->get('/error404', 'Pages::error404');
$routes->get('/error500', 'Pages::error500');
$routes->get('/faqs', 'Pages::faqs');
$routes->get('/file-manager', 'Pages::file-manager');
$routes->get('/flex', 'Pages::flex');
$routes->get('/floating-labels', 'Pages::floating-labels');
$routes->get('/form-check-radios', 'Pages::form-check-radios');
$routes->get('/form-color-pickers', 'Pages::form-color-pickers');
$routes->get('/form-dateTime-pickers', 'Pages::form-dateTime-pickers');
$routes->get('/form-file-uploads', 'Pages::form-file-uploads');
$routes->get('/form-input-group', 'Pages::form-input-group');
$routes->get('/form-input-masks', 'Pages::form-input-masks');
$routes->get('/form-inputs', 'Pages::form-inputs');
$routes->get('/form-layout', 'Pages::form-layout');
$routes->get('/form-range', 'Pages::form-range');
$routes->get('/form-select', 'Pages::form-select');
$routes->get('/form-select2', 'Pages::form-select2');
$routes->get('/form-validation', 'Pages::form-validation');
$routes->get('/full-calendar', 'Pages::full-calendar');
$routes->get('/gallery', 'Pages::gallery');
$routes->get('/google-maps', 'Pages::google-maps');
$routes->get('/grid-tables', 'Pages::grid-tables');
$routes->get('/gutters', 'Pages::gutters');
$routes->get('/helpers', 'Pages::helpers');
$routes->get('/icons', 'Pages::icons');
$routes->get('/images-figures', 'Pages::images-figures');
$routes->get('/index1', 'Pages::index1');
$routes->get('/index2', 'Pages::index2');
$routes->get('/index3', 'Pages::index3');
$routes->get('/index4', 'Pages::index4');
$routes->get('/index5', 'Pages::index5');
$routes->get('/index6', 'Pages::index6');
$routes->get('/index7', 'Pages::index7');
$routes->get('/index8', 'Pages::index8');
$routes->get('/index9', 'Pages::index9');
$routes->get('/index10', 'Pages::index10');
$routes->get('/index11', 'Pages::index11');
$routes->get('/invoice-create', 'Pages::invoice-create');
$routes->get('/invoice-details', 'Pages::invoice-details');
$routes->get('/invoice-list', 'Pages::invoice-list');
$routes->get('/job-candidate-details', 'Pages::job-candidate-details');
$routes->get('/job-candidate-search', 'Pages::job-candidate-search');
$routes->get('/job-company-search', 'Pages::job-company-search');
$routes->get('/job-details', 'Pages::job-details');
$routes->get('/job-post', 'Pages::job-post');
$routes->get('/job-search', 'Pages::job-search');
$routes->get('/jobs-list', 'Pages::jobs-list');
$routes->get('/landing-jobs', 'Pages::landing-jobs');
$routes->get('/landing', 'Pages::landing');
$routes->get('/leaflet-maps', 'Pages::leaflet-maps');
$routes->get('/listgroup', 'Pages::listgroup');
$routes->get('/lockscreen-basic', 'Pages::lockscreen-basic');
$routes->get('/lockscreen-cover', 'Pages::lockscreen-cover');
$routes->get('/mail-settings', 'Pages::mail-settings');
$routes->get('/mail', 'Pages::mail');
$routes->get('/modals-closes', 'Pages::modals-closes');
$routes->get('/more', 'Pages::more');
$routes->get('/navbar', 'Pages::navbar');
$routes->get('/navs-tabs', 'Pages::navs-tabs');
$routes->get('/nft-create', 'Pages::nft-create');
$routes->get('/nft-details', 'Pages::nft-details');
$routes->get('/nft-live-auction', 'Pages::nft-live-auction');
$routes->get('/nft-marketplace', 'Pages::nft-marketplace');
$routes->get('/nft-wallet-integration', 'Pages::nft-wallet-integration');
$routes->get('/notifications', 'Pages::notifications');
$routes->get('/object-fit', 'Pages::object-fit');
$routes->get('/offcanvas', 'Pages::offcanvas');
$routes->get('/order-details', 'Pages::order-details');
$routes->get('/orders', 'Pages::orders');
$routes->get('/pagination', 'Pages::pagination');
$routes->get('/placeholders', 'Pages::placeholders');
$routes->get('/popovers', 'Pages::popovers');
$routes->get('/position', 'Pages::position');
$routes->get('/pricing', 'Pages::pricing');
$routes->get('/product-details', 'Pages::product-details');
$routes->get('/products-list', 'Pages::products-list');
$routes->get('/products', 'Pages::products');
$routes->get('/profile', 'Pages::profile');
$routes->get('/progress', 'Pages::progress');
$routes->get('/projects-create', 'Pages::projects-create');
$routes->get('/projects-list', 'Pages::projects-list');
$routes->get('/projects-overview', 'Pages::projects-overview');
$routes->get('/quill-editor', 'Pages::quill-editor');
$routes->get('/ratings', 'Pages::ratings');
$routes->get('/reset-password-basic', 'Pages::reset-password-basic');
$routes->get('/reset-password-cover', 'Pages::reset-password-cover');
$routes->get('/reviews', 'Pages::reviews');
$routes->get('/scrollspy', 'Pages::scrollspy');
$routes->get('/sign-in-basic', 'Pages::sign-in-basic');
$routes->get('/sign-in-cover', 'Pages::sign-in-cover');
$routes->get('/sign-up-basic', 'Pages::sign-up-basic');
$routes->get('/sign-up-cover', 'Pages::sign-up-cover');
$routes->get('/spinners', 'Pages::spinners');
$routes->get('/sweet-alerts', 'Pages::sweet-alerts');
$routes->get('/swiperjs', 'Pages::swiperjs');
$routes->get('/tables', 'Pages::tables');
$routes->get('/task-details', 'Pages::task-details');
$routes->get('/task-kanban-board', 'Pages::task-kanban-board');
$routes->get('/task-list-view', 'Pages::task-list-view');
$routes->get('/team', 'Pages::team');
$routes->get('/terms-conditions', 'Pages::terms-conditions');
$routes->get('/timeline', 'Pages::timeline');
$routes->get('/to-do-list', 'Pages::to-do-list');
$routes->get('/toasts', 'Pages::toasts');
$routes->get('/tooltips', 'Pages::tooltips');
$routes->get('/two-step-verification-basic', 'Pages::two-step-verification-basic');
$routes->get('/two-step-verification-cover', 'Pages::two-step-verification-cover');
$routes->get('/typography', 'Pages::typography');
$routes->get('/under-maintenance', 'Pages::under-maintenance');
$routes->get('/vector-maps', 'Pages::vector-maps');
$routes->get('/widgets', 'Pages::widgets');
$routes->get('/wishlist', 'Pages::wishlist');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
