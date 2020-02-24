<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//test routes
Route::get('/testjson', 'PaymentGatewayController@testjson');


Route::get('/sess', 'HomeController@sess')->name('sess');

Route::get('/test', 'HomeController@test')->name('test');

//Hosted Payment Page
// Route::get('/test', function(){
//     $batchMain = 0;
//     $batch = 0;
//     return view('transaction.customerTransactionPage',compact('batchMain','batch'));
//     });



Route::get('/', function () {
    return view('welcome');
});

Route::get('/terminal', function (){
    return view('terminal.terminal');
})->name('terminal');

Route::get('/transaction-timeline', function () {
    return view('transaction.transaction-timeline');
});

Route::get('/searchTransaction', function () {
    return view('transaction.searchTransaction');
});

Route::post('/transaction_submit', 'TransactionController@transaction');

//Route::get('/mailtest', 'TransactionController@transaction');


Route::get('/settings', 'AccountController@settings')->name('settings');
Auth::routes(['verify' => true]);

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/search-dates', 'HomeController@searchDates')->name('search-dates');

/* Account Controller Routes Start */

Route::post('/update-profile', 'AccountController@updateProfile')->name('update-profile');
Route::post('/password-change', 'AccountController@passwordChange')->name('password-change');
Route::post('/pass_check', 'AccountController@passCheck')->name('pass_check');


/* Account Controller Routes End */

/* PaymentGateway Controller Routes Start */
Route::get('/payment-gateways', 'PaymentGatewayController@index')->name('payment-gateways');
Route::get('/add-gateway', 'PaymentGatewayController@addGateway')->name('add-gateway');
Route::get('/charge', 'PaymentGatewayController@charge')->name('charge');
Route::get('/batches', 'PaymentGatewayController@batches')->name('batch');
Route::get('/viewBatchData', 'PaymentGatewayController@viewBatchData')->name('viewBatchData');
Route::post('/chargeTransaction', 'PaymentGatewayController@chargeTransaction')->name('chargeTransaction');
Route::post('/smartTerminalAmount', 'PaymentGatewayController@smartTerminalAmount')->name('smartTerminalAmount');
Route::get('/sign-transaction', 'PaymentGatewayController@mailConfirm')->name('sign-transaction');
Route::get('/transactions', 'PaymentGatewayController@transactions')->name('transactions');
Route::get('/approve-batch', 'PaymentGatewayController@approveBatch')->name('approve-batch');
Route::get('/CronBatchResolve', 'PaymentGatewayController@CronJobForApproveBatch');  // Cron Job for auto solve batches
Route::get('/retrieve-searched-batch', 'PaymentGatewayController@retrieveSearchedBatch')->name('retrieve-searched-batch');
Route::get('/transactionPage', 'PaymentGatewayController@transactionPage')->name('transactionPage');
Route::post('/submitCustomerPayment', 'PaymentGatewayController@submitCustomerPayment');
Route::get('/all-batches-csv', 'CustomerController@csvTransfer');



/* PaymentGateway Controller Routes End */


/* Customer Controller Routes Start */
Route::get('/customers', 'CustomerController@index')->name('customers');
Route::get('/get-first-customer', 'CustomerController@getFirstCustomer')->name('get-first-customer');
Route::get('/dynamicSearch', 'CustomerController@dynamicSearch')->name('dynamicSearch');
Route::get('/retrieve-customer', 'CustomerController@retrieveCustomer')->name('retrieve-customer');
Route::get('/retrieve-searched-customer', 'CustomerController@retrieveSearchedCustomer')->name('retrieve-searched-customer');
Route::get('/customer-detail', 'CustomerController@customerDetail')->name('customer-detail');
Route::post('/add-customer', 'CustomerController@addCustomer')->name('add-customer');
Route::post('/update-customer', 'CustomerController@updateCustomer')->name('update-customer');
Route::post('delete-customer', 'CustomerController@deleteCustomer')->name('delete-customer');
Route::get('/all-customers-csv', 'CustomerController@csvTransfer');
// Route::post('merge-customer', 'CustomerController@mergeCustomer')->name('merge-customer');
Route::post('add-custom-column', 'CustomerController@addCustomColumn')->name('add-custom-column');
Route::get('get-custom-column', 'CustomerController@getCustomColumn')->name('get-custom-column');
Route::get('merge-customer-data', 'CustomerController@mergeCustomerData')->name('merge-customer-data');   //MergeContacts
Route::post('merge-customer-save', 'CustomerController@mergeCustomerSave')->name('merge-customer-save');   //MergeContacts


/*  Customer Controller Routes End */

/* Contacts Routes Start */
Route::get('/customer-contacts', 'ContactController@index')->name('customer-contacts');
Route::post('/add-customer-contact', 'ContactController@addContact')->name('add-customer-contact');
Route::get('/view-customer-contacts/{id}', 'ContactController@viewContact')->name('view-customer-contacts');
Route::post('delete-contact', 'ContactController@deleteContact')->name('delete-contact');
Route::get('/retrieve-contact', 'ContactController@retrieveContact')->name('retrieve-contact');
Route::post('/update-contact', 'ContactController@updateContact')->name('update-contact');
Route::get('merge-contact-data', 'ContactController@mergeContactData')->name('merge-contact-data');   //MergeContacts
Route::post('merge-contact-save', 'ContactController@mergeContactSave')->name('merge-contact-save');   //MergeContacts
/* Contacts Routes End */

/* Reportings Controller Routes Start */
Route::get('/reportings', 'ReportingController@index')->name('reportings');
Route::get('/dynamicReporting', 'ReportingController@dynamicReporting')->name('dynamicReporting');
Route::get('/all-reportingLogs-csv', 'ReportingController@csvTransfer');

/* Reportings Controller Routes End */


/* Wallets Controller Routes Start  (wallets is new name of vouchers) */ 
Route::get('/Wallets', 'WalletsController@index')->name('Wallets');
Route::post('/addBank', 'WalletsController@addBank')->name('addBank');
Route::post('/delete-bank', 'WalletsController@deleteBank')->name('delete-bank');
Route::get('/account-edit-page', 'WalletsController@accountEditPage')->name('account-edit-page');
Route::get('/amount-transfer-page', 'WalletsController@amountTransferPage')->name('amount-transfer-page');
Route::post('/account-edit', 'WalletsController@accountEdit')->name('account-edit');
Route::post('/addVoucher', 'WalletsController@addVoucher')->name('addVoucher');
Route::post('/voucher-transfer', 'WalletsController@voucherTransfer')->name('voucher-transfer');
Route::post('/bank-transfer', 'WalletsController@bankTransfer')->name('bank-transfer');
Route::get('/get-transaction-history', 'WalletsController@getTransactionHistory')->name('get-transaction-history');
Route::get('/get-transfer-information', 'WalletsController@getTransferInformation')->name('get-transfer-information');
Route::get('/get-user-information', 'WalletsController@getUserInformation')->name('get-user-information');
Route::post('/wallet-amount-transfered', 'WalletsController@walletAmountTransfered')->name('wallet-amount-transfered');
Route::get('/check-card', 'WalletsController@checkCard')->name('check-card');
Route::post('/save-wallet-percentage', 'WalletsController@saveWalletPercentage')->name('save-wallet-percentage');

/* Wallets Controller Routes End */


/* Funding Controller*/
Route::get('/fundings', 'FundingController@index')->name('fundings');
Route::get('/dynamicFunding', 'FundingController@dynamicFunding')->name('dynamicFunding');
Route::get('/all-funding-csv', 'FundingController@csvTransfer');
/* Funding Controller Routes End */

/* Merchant Controller Routes Start */
Route::get('/merchant-signup', 'MerchantController@signup')->name('signup-merchant');
Route::post('/merchant-signup-post', 'MerchantController@signupMerchant')->name('signup-merchant-post');
Route::get('/view-merchant-details', 'MerchantController@viewDetails')->name('view-merchant-details');
Route::get('/ban-merchant', 'MerchantController@banUser')->name('ban-merchant');
Route::get('/activate-merchant-account', 'MerchantController@activateUser')->name('activate-merchant-account');
/* Merchant Controller Routes End */

/* Payfac Controller Routes Start */
Route::get('/payfac', 'PayfacController@index')->name('payfac');
/* Payfac Controller Routes End */


/* Support Controller Routes Start */
Route::get('/support-system', 'SupportController@index')->name('support-system');
Route::post('/add-ticket', 'SupportController@addTicket')->name('add-ticket');
Route::post('/reply-ticket', 'SupportController@replyTicket')->name('reply-ticket');
Route::get('/close-ticket', 'SupportController@closeTicket')->name('close-ticket');

Route::get('/view-ticket', 'SupportController@viewTicket')->name('view-ticket');
/* Support Controller Routes End */


/* Developer Portal Controller Routes Start */
Route::get('/developer-portal', 'PortalController@index')->name('developer-portal');


/* Developer Portal Controller Routes End */



/* Admin Controller Routes Start */
Route::get('/merchants', 'AdminController@merchants')->name('merchants');

Route::get('/ticket-management', 'AdminController@ticketManagement')->name('ticket-management');

/* Admin Controller Routes End */



//custom fields add

Route::get('/custom-fields', 'AdminController@customFields')->name('custom-fields');
Route::post('/saveCustomField', 'AdminController@saveCustomField')->name('saveCustomField');
