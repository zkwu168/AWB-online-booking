<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {

    // Cargo
    Route::apiResource('cargos', 'CargoApiController');

    // Address Book
    Route::apiResource('address-books', 'AddressBookApiController');
});
