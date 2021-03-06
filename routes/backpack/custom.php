<?php
// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

if(Request::is('admin') || Request::is('admin/*')){

	Route::group([
	    'prefix'     => 'admin',
	    'middleware' => ['web', 'auth:admin'],
	    'namespace'  => 'App\Http\Controllers\Admin',
	], function () {
		Route::get('/dashboard', 'DashboardController@dashboard')->name('admin.dashboard');

		Route::get('/edit-account-info', 'AccountController@getAccountInfoForm')->name('account.info');
	    Route::post('/edit-account-info', 'AccountController@postAccountInfoForm');
	    Route::get('/change-password', 'AccountController@getChangePasswordForm')->name('account.password');
	    Route::post('/change-password', 'AccountController@postChangePasswordForm');
		//changes
        Route::post('/set_default_tier', 'TuningCreditCrudController@set_default_tier');
        Route::post('/set_evc_default_tier', 'TuningEVCCreditCrudController@set_default_tier');


		#Customers routes
        Route::crud('customer', 'CustomerCrudController');
        Route::get('customer/{user}/switch-account','CustomerCrudController@switchAsCustomer');
        Route::get('customer/{user}/transactions','CustomerCrudController@transactions');
        Route::get('customer/{user}/resend-password-reset-link','CustomerCrudController@resendPasswordResetLink');
        Route::post('customer/transaction','CustomerCrudController@storeTransaction');
        Route::post('customer/transaction-evc','CustomerCrudController@storeTransactionEVC');
        Route::get('customer/transaction/{transaction}/delete','CustomerCrudController@deleteTransaction');
        Route::get('customer/{user}/file-services','CustomerCrudController@fileServices');
        Route::get('customer/file-service/{fileService}/delete','CustomerCrudController@deleteFileService');

		#File service routes
		Route::crud('file-service', 'FileServiceCrudController');
        Route::get('file-service/{fileService}/download-orginal', 'FileServiceCrudController@downloadOrginalFile');
        Route::get('file-service/{fileService}/download-modified', 'FileServiceCrudController@downloadModifiedFile');
        Route::get('file-service/{fileService}/delete-modified', 'FileServiceCrudController@deleteModifiedFile');
        Route::get('file-service/{fileService}/create-ticket', 'FileServiceCrudController@createTicket');
        Route::post('file-service/{fileService}/store-ticket', 'FileServiceCrudController@storeTicket');
        Route::post('upload-file-service-file', 'FileServiceCrudController@uploadFile');

        #Ticket Routes
        Route::crud('tickets', 'TicketsCrudController');
        Route::get('tickets/{ticket}/download-file', 'TicketsCrudController@downloadFile');
        Route::get('tickets/{ticket}/mark-close', 'TicketsCrudController@markClose');
        Route::post('upload-ticket-file', 'TicketsCrudController@uploadFile');

		#Orders routes
		Route::crud('order', 'OrderCrudController');
        Route::get('order/{order}/invoice', 'OrderCrudController@invoice');

		#Transaction routes
		Route::crud('transaction', 'TransactionCrudController');

		#Email templates routes
		Route::crud('email-template', 'EmailTemplateCrudController');

		#Tuning credit routes
		Route::crud('tuning-credit', 'TuningCreditCrudController');
        Route::get('tuning-credit/{tuningCreditGroup}/default','TuningCreditCrudController@markDefault');
        Route::get('tuning-credit/credit-tire','TuningCreditTireController@creditTire');
        Route::post('tuning-credit/credit-tire','TuningCreditTireController@updateCreditTire');
        Route::get('tuning-credit/credit-tire/{tuningCreditTire}/delete','TuningCreditTireController@deleteCreditTire');

        #Tuning EVC credit routes
		Route::crud('tuning-evc-credit', 'TuningEVCCreditCrudController');
        Route::get('tuning-evc-credit/{tuningCreditGroup}/default','TuningEVCCreditCrudController@markDefault');
        Route::get('tuning-evc-credit/credit-tire','TuningEVCCreditTireController@creditTire');
        Route::post('tuning-evc-credit/credit-tire','TuningEVCCreditTireController@updateCreditTire');
        Route::get('tuning-evc-credit/credit-tire/{tuningCreditTire}/delete','TuningEVCCreditTireController@deleteCreditTire');

		#Tuning types routes
		Route::crud('tuning-type', 'TuningTypeCrudController');
        Route::get('tuning-type/{tuningType}/up', 'TuningTypeCrudController@upGradeOrder');
        Route::get('tuning-type/{tuningType}/down', 'TuningTypeCrudController@downGradeOrder');

		// #Tuning type options routes

		Route::crud('tuning-type/{tuningType}/options', 'TuningTypeOptionCrudController');
        Route::get('tuning-type/{tuningType}/options/{tuningTypeOption}/up', 'TuningTypeOptionCrudController@upGradeOrder');
        Route::get('tuning-type/{tuningType}/options/{tuningTypeOption}/down', 'TuningTypeOptionCrudController@downGradeOrder');

		Route::group(['middleware' => 'has.privilege:admin'], function(){
			#Packages routes
            Route::crud('package', 'PackageCrudController');
		});

		// #Companies routes
		Route::group(['middleware' => 'has.privilege:admin'], function(){
			Route::crud('company', 'CompanyCrudController');
            Route::get('company/{company}/resend-password-reset-link','CompanyCrudController@resendPasswordResetLink');
            Route::get('company/{company}/company-trial-subscription','CompanyCrudController@trialSubscriptions');
            Route::post('company/{company}/company-trial-subscription','CompanyCrudController@storeTrialSubscription');
            //change
            Route::get('company/{company}/company-account-type','CompanyCrudController@companyAccountType');
            Route::get('company/{company}/account-activate','CompanyCrudController@accountActivate');
        });
        Route::get('company-setting', 'CompanyCrudController@profile')->name('admin.profile');

		// #Subscription routes

		Route::crud('subscription', 'SubscriptionCrudController');
        Route::get('subscription/packages', 'SubscriptionCrudController@showSubscriptionPackages')->name('subscription.packages');
        Route::get('subscription/subscribe-package/{package}', 'SubscriptionCrudController@subscribeSubscription')->name('subscribe.paypal');
        Route::get('subscription/execute', 'SubscriptionCrudController@executeSubscription')->name('paypal.subscription.execute');
        Route::get('subscription/immediate/{subscription}', 'SubscriptionCrudController@immediateCancelSubscription');
        Route::get('subscription/cancel/{subscription}', 'SubscriptionCrudController@cancelSubscription');

		#Subscription payment routes
        Route::crud('subscription-payment', 'SubscriptionPaymentCrudController');
        Route::get('subscription-payment/{id}/invoice', 'SubscriptionPaymentCrudController@invoice');

		Route::get('backup', 'BackupController@index');
	    Route::put('backup/create', 'BackupController@create');
	    Route::get('backup/download/{file_name?}', 'BackupController@download');
	    Route::delete('backup/delete/{file_name?}', 'BackupController@delete')->where('file_name', '(.*)');

		#Slider Manager routes
        Route::crud('slidermanager', 'SliderManagerCrudController');

	});

}elseif(\Request::is('customer') || \Request::is('customer/*')){

	Route::group([
	    'prefix'     => 'customer',
	    'middleware' => ['web', 'auth:customer'],
	    'namespace'  => 'App\Http\Controllers\Customer',
	], function () {
		Route::get('/dashboard', 'DashboardController@dashboard')->name('customer.dashboard');
        Route::post('add-rating', 'DashboardController@addRating');
        Route::post('set-reseller', 'DashboardController@setReseller');
		Route::get('edit-account-info', 'AccountController@getAccountInfoForm')->name('account.info');
	    Route::post('edit-account-info', 'AccountController@postAccountInfoForm');
	    Route::get('change-password', 'AccountController@getChangePasswordForm')->name('account.password');
	    Route::post('change-password', 'AccountController@postChangePasswordForm');
	    #File service routes
		Route::crud('file-service', 'FileServiceCrudController');
        Route::get('file-service/{fileService}/download-orginal', 'FileServiceCrudController@downloadOrginalFile');
        Route::get('file-service/{fileService}/download-modified', 'FileServiceCrudController@downloadModifiedFile');
        Route::get('file-service/{fileService}/create-ticket', 'FileServiceCrudController@createTicket');
        Route::post('file-service/{fileService}/store-ticket', 'FileServiceCrudController@storeTicket');
        Route::post('upload-file-service-file', 'FileServiceCrudController@uploadFile');
		#Buy credit routes
		Route::group(['prefix'=>'buy-credits'], function(){
			Route::get('/', 'BuyCreditController@index')->name('buy.credit');
			// route for post request
			Route::post('paypal', 'PaymentController@postPaymentWithpaypal')->name('pay.with.paypal');
			// route for check status responce
			Route::get('paypal', 'PaymentController@getPaymentStatus')->name('paypal.payment.status');
		});
		#Orders routes
		Route::crud('order', 'OrderCrudController');
        Route::get('order/{order}/invoice', 'OrderCrudController@invoice');
		// #Transaction routes
		Route::crud('transaction', 'TransactionCrudController');
        #Tickets routes
        Route::crud('tickets', 'TicketsCrudController');
        Route::get('tickets/{ticket}/download-file', 'TicketsCrudController@downloadFile');
        Route::get('tickets/{ticket}/mark-close', 'TicketsCrudController@markClose');
        Route::post('upload-ticket-file', 'TicketsCrudController@uploadFile');
	});

}else{

}

