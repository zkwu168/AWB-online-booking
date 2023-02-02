<?php

Route::view('/', 'welcome');
Auth::routes();
Route::post('/captcha-validation', 'CaptchaServiceController::class@capthcaFormValidate')->name('captcha-validation');
Route::get('/reload-captcha', 'CaptchaServiceController@reloadCaptcha')->name('reload-captcha');
Route::view('/vacancies', 'frontend/pages/vacancies');
Route::view('/guide', 'frontend/pages/guide');
Route::get('/contact', 'ContactUsFormController@createForm');

 // Terms (Ajax)
Route::get('terms/freightTerms', 'TermsController@freightTerms')->name('freightTerms');
Route::get('terms/itemTerms', 'TermsController@itemTerms')->name('itemTerms');

Route::post('/contact', 'ContactUsFormController@ContactUsForm')->name('contact.store');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Shipments
    Route::delete('shipments/destroy', 'ShipmentsController@massDestroy')->name('shipments.massDestroy');
    Route::post('shipments/parse-csv-import', 'ShipmentsController@parseCsvImport')->name('shipments.parseCsvImport');
    Route::post('shipments/process-csv-import', 'ShipmentsController@processCsvImport')->name('shipments.processCsvImport');
    Route::resource('shipments', 'ShipmentsController');

    // Importer Info
    Route::delete('importer-infos/destroy', 'ImporterInfoController@massDestroy')->name('importer-infos.massDestroy');
    Route::resource('importer-infos', 'ImporterInfoController');

    // Cargo
    Route::delete('cargos/destroy', 'CargoController@massDestroy')->name('cargos.massDestroy');
    Route::resource('cargos', 'CargoController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Shipment Status
    Route::delete('shipment-statuses/destroy', 'ShipmentStatusController@massDestroy')->name('shipment-statuses.massDestroy');
    Route::resource('shipment-statuses', 'ShipmentStatusController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // Payment
    Route::delete('payments/destroy', 'PaymentController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentController');

    // Shipment Tracking
    Route::delete('shipment-trackings/destroy', 'ShipmentTrackingController@massDestroy')->name('shipment-trackings.massDestroy');
    Route::resource('shipment-trackings', 'ShipmentTrackingController');

    // Shipment Pickup Type
    Route::delete('shipment-pickup-types/destroy', 'ShipmentPickupTypeController@massDestroy')->name('shipment-pickup-types.massDestroy');
    Route::resource('shipment-pickup-types', 'ShipmentPickupTypeController');

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tag
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Local Service Provider
    Route::delete('local-service-providers/destroy', 'LocalServiceProviderController@massDestroy')->name('local-service-providers.massDestroy');
    Route::resource('local-service-providers', 'LocalServiceProviderController');

    // Address Book
    Route::delete('address-books/destroy', 'AddressBookController@massDestroy')->name('address-books.massDestroy');
    Route::resource('address-books', 'AddressBookController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    Route::get('team-members', 'TeamMembersController@index')->name('team-members.index');
    Route::post('team-members', 'TeamMembersController@invite')->name('team-members.invite');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});

Route::group(['prefix' => 'warehouse','as' => 'warehouse.', 'namespace' => 'Warehouse', 'middleware' => ['auth', '2fa', 'prevent-back-history']], function () {
    Route::get('/', 'WarehouseController@index')->name('warehouse.index');
    Route::get('/incoming', 'WarehouseController@incoming')->name('warehouse.incoming');
    Route::get('/inventory', 'WarehouseController@inventory')->name('warehouse.inventory');
    Route::get('/shipments/{shipment}', 'WarehouseController@getShipmentById')->name('warehouse.getShipmentById');
    Route::get('/inbound-scan', 'WarehouseController@inboundScan')->name('warehouse.inboundScan');
    Route::get('/weighing', 'WarehouseController@weighing')->name('warehouse.weighing');
    Route::get('/despatch', 'WarehouseController@despatch')->name('warehouse.despatch');
    Route::post('/check-in', 'WarehouseController@checkIn')->name('warehouse.check-in');
    Route::post('/snapshot', 'WarehouseController@snapshot')->name('warehouse.snapshot');
    Route::post('/chargeable-update', 'WarehouseController@chargeableUpdate')->name('warehouse.chargeableUpdate');
    Route::post('/get-sf-awb', 'WarehouseController@getSFawb')->name('warehouse.getSFawb');

});    

Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth', '2fa', 'prevent-back-history']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Shipments
    Route::delete('shipments/destroy', 'ShipmentsController@massDestroy')->name('shipments.massDestroy');
    Route::resource('shipments', 'ShipmentsController');

    Route::get('shipment/checkout', 'ShipmentsController@checkout')->name('shipments.checkout');

    // Importer Info
    Route::delete('importer-infos/destroy', 'ImporterInfoController@massDestroy')->name('importer-infos.massDestroy');
    Route::resource('importer-infos', 'ImporterInfoController');

    // Cargo
    Route::delete('cargos/destroy', 'CargoController@massDestroy')->name('cargos.massDestroy');
    Route::resource('cargos', 'CargoController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Shipment Status
    Route::delete('shipment-statuses/destroy', 'ShipmentStatusController@massDestroy')->name('shipment-statuses.massDestroy');
    Route::resource('shipment-statuses', 'ShipmentStatusController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // Payment
    Route::delete('payments/destroy', 'PaymentController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentController');

    // Shipment Tracking
    Route::delete('shipment-trackings/destroy', 'ShipmentTrackingController@massDestroy')->name('shipment-trackings.massDestroy');
    Route::resource('shipment-trackings', 'ShipmentTrackingController');

    // Shipment Pickup Type
    Route::delete('shipment-pickup-types/destroy', 'ShipmentPickupTypeController@massDestroy')->name('shipment-pickup-types.massDestroy');
    Route::resource('shipment-pickup-types', 'ShipmentPickupTypeController');

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tag
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Local Service Provider
    Route::delete('local-service-providers/destroy', 'LocalServiceProviderController@massDestroy')->name('local-service-providers.massDestroy');
    Route::resource('local-service-providers', 'LocalServiceProviderController');

    // Address Book
    Route::delete('address-books/destroy', 'AddressBookController@massDestroy')->name('address-books.massDestroy');
    Route::resource('address-books', 'AddressBookController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
    Route::post('profile/toggle-two-factor', 'ProfileController@toggleTwoFactor')->name('profile.toggle-two-factor');

    // Address Book (Ajax)
    Route::post('address-book/add_shipper', 'AddressBookController@ajax_add_shipper')->name('address-book.addShipper');
    Route::get('address-book/get_shipper', 'AddressBookController@ajax_get_shipper')->name('address-book.getShipper');
    Route::post('address-book/add_receiver', 'AddressBookController@ajax_add_receiver')->name('address-book.addReceiver');
    Route::get('address-book/get_receiver', 'AddressBookController@ajax_get_receiver')->name('address-book.get');
    Route::post('find-address', 'AddressBookController@ajax_find_address')->name('address-book.find_address');

    //Ayden Paymeny
    Route::get('/payment_result/{type}', 'CheckoutController@result')->name('result');
    
    // Shipments (Ajax)
    Route::get('shipments/{id}/get_shipment', 'ShipmentsController@ajax_get_shipment')->name('shipments.ajaxGetReceiver');
    Route::get('shipments/{shipment}/getAWB', 'ShipmentsController@getAWB')->name('shipments.getAWB');
    Route::get('shipments/{shipment}/generateFCR', 'ShipmentsController@generateFCR')->name('shipments.generateFCR');
    Route::post('shipments/{shipment}/paymentProcessed', 'ShipmentsController@paymentProcessed')->name('shipments.paymentProcessed');
    Route::get('shipments/{shipment}/createIuopOrder', 'ShipmentsController@createIuopOrder')->name('shipments.createIuopOrder');
    Route::get('shipments/{shipment}/updateIuopOrder', 'ShipmentsController@updateIuopOrder')->name('shipments.updateIuopOrder');
    Route::get('shipments/{shipment}/orderDetailsQuery', 'ShipmentsController@orderDetailsQuery')->name('shipments.orderDetailsQuery');
    Route::get('shipments/{shipment}/freightQuery', 'ShipmentsController@freightQuery')->name('shipments.freightQuery');

    
}); 

Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});


Route::get('/preview', 'CheckoutController@preview');
Route::get('/checkout/{type}', 'CheckoutController@checkout');
Route::get('/result/{type}', 'CheckoutController@result')->name('result');
// The API routes are exempted from app/Http/Middleware/VerifyCsrfToken.php
Route::post('/api/getPaymentMethods', 'CheckoutController@getPaymentMethods');
Route::post('/api/initiatePayment', 'CheckoutController@initiatePayment');
Route::post('/api/submitAdditionalDetails', 'CheckoutController@submitAdditionalDetails');
Route::match(['get', 'post'], '/api/handleShopperRedirect', 'CheckoutController@handleShopperRedirect');