<?php

Auth::routes();
//Payment Methods Route
Route::post('ipnpaypal', 'User\PaymentController@ipnpaypal')->name('ipn.paypal');
Route::post('ipnperfect', 'User\PaymentController@ipnperfect')->name('ipn.perfect');
Route::post('ipnstripe', 'User\PaymentController@ipnstripe')->name('ipn.stripe');
Route::post('ipnskrill', 'User\PaymentController@skrillIPN')->name('ipn.skrill');
Route::get('ipnbchain', 'User\PaymentController@ipnBchain')->name('ipn.bchain');
Route::get('ipnblockbtc', 'User\PaymentController@blockIpnBtc')->name('ipn.block.btc');
Route::get('ipnblocklite', 'User\PaymentController@blockIpnLite')->name('ipn.block.lite');
Route::get('ipnblockdog', 'User\PaymentController@blockIpnDog')->name('ipn.block.dog');
Route::post('ipncoinpaybtc', 'User\PaymentController@ipnCoinPayBtc')->name('ipn.coinPay.btc');
Route::post('ipncoinpayeth', 'User\PaymentController@ipnCoinPayEth')->name('ipn.coinPay.eth');
Route::post('ipncoinpaybch', 'User\PaymentController@ipnCoinPayBch')->name('ipn.coinPay.bch');
Route::post('ipncoinpaydash', 'User\PaymentController@ipnCoinPayDash')->name('ipn.coinPay.dash');
Route::post('ipncoinpaydoge', 'User\PaymentController@ipnCoinPayDoge')->name('ipn.coinPay.doge');
Route::post('ipncoinpayltc', 'User\PaymentController@ipnCoinPayLtc')->name('ipn.coinPay.ltc');
Route::post('ipncoingate', 'User\PaymentController@ipnCoinGate')->name('ipn.coingate');
Route::post('ipncoin', 'User\PaymentController@ipnCoin')->name('ipn.coinpay');

//Frontend Routes
Route::get('/', 'Frontend\Frontendcontroller@index')->name('home');

Route::get('about', 'Frontend\Frontendcontroller@about')->name('about');
Route::view('api', 'frontend.api')->name('api');
Route::get('announcement', 'Frontend\Frontendcontroller@announcement')->name('announcement');
Route::get('read/announcement/{id}', 'Frontend\Frontendcontroller@announcementDetails')->name('announcement.details');
Route::view('contact', 'frontend.contact')->name('contact');
Route::post('contact', 'Frontend\Frontendcontroller@contact')->name('contact.mail');

Route::view('404', 'frontend.404')->name('404');

Route::post('subscription', 'Frontend\Frontendcontroller@subscription')->name('subscribe');

Route::post('forgot-pass', 'Frontend\FrontendController@forgotPass')->name('forgot.pass');
Route::get('reset/{token}', 'Frontend\FrontendController@resetLink')->name('reset.passlink');
Route::post('reset/password', 'Frontend\FrontendController@passwordReset')->name('reset.pass');

Route::get('order-cron', 'User\UserController@cron');
Route::get('status-cron', 'User\UserController@cronn');

//User Routes
Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('authorization', 'User\UserController@authCheck')->name('user.authorization');
        Route::post('authorization', 'User\UserController@authorization')->name('user.auth');
        Route::post('reAuthorization', 'User\UserController@reAuthorization')->name('user.reauth');
        Route::middleware(['checkstatus'])->group(function () {
            Route::get('dashboard', 'User\UserController@index')->name('user.home');

            Route::get('serviceList', 'User\UserController@serviceList')->name('user.servicelist');

            Route::get('newOrder', 'User\UserController@newOrder')->name('new.order');
            Route::post('getPack', 'User\UserController@getPack')->name('get.pack');
            Route::post('getPackDetails', 'User\UserController@getPackDetails')->name('get.pack.details');
            Route::post('newOrder', 'User\UserController@storeNewOrder')->name('newOrder.store');
            Route::get('massOrder', 'User\UserController@massOrder')->name('mass.order');
            Route::post('massOrder', 'User\UserController@storeMassOrder')->name('massOrder.store');
            Route::get('orderHistory', 'User\UserController@orderHistory')->name('order.history');

            Route::get('myProfile', 'User\UserController@profile')->name('my.profile');
            Route::post('myProfile', 'User\UserController@updateProfile')->name('user.profile.update');

            Route::get('deposit', 'User\UserController@deposit')->name('user.deposit');
            Route::post('depositPreview', 'User\UserController@depositPreview')->name('user.depositPreview');
            Route::get('depositConfirm', 'User\PaymentController@depositConfirm')->name('user.depositConfirm');
            Route::get('depositLog', 'User\UserController@depositLog')->name('user.depositLog');

            Route::get('transactionLog', 'User\UserController@transactionLog')->name('user.transactionLog');

            Route::get('changePassword', 'User\UserController@changePassword')->name('change.password');
            Route::post('changePassword', 'User\UserController@passwordChange')->name('user.pass.change');

            Route::get('supportTicket', 'User\UserController@supportTicket')->name('user.ticket');
            Route::get('openSupportTicket', 'User\UserController@openSupportTicket')->name('user.ticket.open');
            Route::post('openSupportTicket', 'User\UserController@storeSupportTicket')->name('user.ticket.store');
            Route::get('supportMessage/{ticket}', 'User\UserController@supportMessage')->name('user.message');
            Route::put('storeSupportMessage/{ticket}', 'User\UserController@supportMessageStore')->name('user.message.store');

            Route::get('apiDocumentation', 'User\UserController@apiDocumentation')->name('api.doc');
            Route::get('generateKey', 'User\UserController@generateKey')->name('key.generate');
        });
    });
});
//Admin Routes
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\LoginController@showLoginForm')->middleware('guest:admin');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login');
    Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('passwordChange', 'Admin\AdminController@password')->name('admin.pass');
        Route::post('passwordChange', 'Admin\AdminController@passwordChange')->name('admin.pass.change');

        Route::get('dashboard', 'Admin\AdminController@index')->name('admin.dashboard');

        Route::get('gatewayList', 'Admin\AdminController@gateway')->name('gateway.lists');
        Route::put('gatewayListUpdate/{id}', 'Admin\AdminController@gatewayUpdate')->name('gateway.list.update');

        Route::get('category', 'Admin\AdminController@category')->name('admin.category');
        Route::post('category', 'Admin\AdminController@categoryStore')->name('category.store');
        Route::put('categoryUpdate/{id}', 'Admin\AdminController@categoryUpdate')->name('category.update');
        Route::delete('categoryDelete/{id}', 'Admin\AdminController@categoryDelete')->name('category.delete');

        Route::get('service', 'Admin\AdminController@service')->name('admin.service');
        Route::get('apiService', 'Admin\AdminController@apiService')->name('api.service');
        Route::post('service', 'Admin\AdminController@serviceStore')->name('service.store');
        Route::put('serviceUpdate/{id}', 'Admin\AdminController@serviceUpdate')->name('service.update');
        Route::delete('serviceDelete/{id}', 'Admin\AdminController@serviceDelete')->name('service.delete');

        Route::get('orders', 'Admin\AdminController@orders')->name('admin.order');
        Route::get('pendingOrders', 'Admin\AdminController@pendingOrders')->name('admin.pending.order');
        Route::get('processingOrders', 'Admin\AdminController@processingOrders')->name('admin.process.order');
        Route::get('partialOrders', 'Admin\AdminController@partialOrders')->name('admin.partial.order');
        Route::get('completedOrders', 'Admin\AdminController@completeOrders')->name('admin.complete.order');
        Route::get('cancelledOrders', 'Admin\AdminController@cancelledOrders')->name('admin.cancel.order');
        Route::get('refundedOrders', 'Admin\AdminController@refundedOrders')->name('admin.refund.order');
        Route::get('orderDetails/{id}', 'Admin\AdminController@orderDetails')->name('admin.order.details');
        Route::put('order/{id}', 'Admin\AdminController@editOrder')->name('admin.edit.order');

        Route::get('apiSettings', 'Admin\AdminController@apiSettings')->name('api.settings');
        Route::post('testAPI', 'Admin\AdminController@testAPI')->name('api.test');
        Route::post('apiSettings', 'Admin\AdminController@apiStore')->name('api.store');

        Route::get('supportTickets', 'Admin\AdminController@supportTicket')->name('admin.ticket');
        Route::get('ticketReply/{id}', 'Admin\AdminController@ticketReply')->name('admin.ticket.reply');
        Route::get('pendingSupportTickets', 'Admin\AdminController@pendingSupportTicket')->name('admin.pending.ticket');
        Route::put('ticketReplySend/{id}', 'Admin\AdminController@ticketReplySend')->name('admin.ticket.send');

        Route::get('users', 'Admin\AdminController@userIndex')->name('admin.users');
        Route::post('user-search', 'Admin\AdminController@userSearch')->name('admin.search-users');
        Route::get('user/{user}', 'Admin\AdminController@singleUser')->name('admin.user-single');
        Route::get('user-banned', 'Admin\AdminController@bannedUser')->name('admin.user-ban');
        Route::get('mail/{user}', 'Admin\AdminController@email')->name('admin.user-email');
        Route::post('sendmail', 'Admin\AdminController@sendemail')->name('admin.send-email');
        Route::put('user/pass-change/{user}', 'Admin\AdminController@userPasschange')->name('admin.user-pass');
        Route::get('servicePrice/{user}', 'Admin\AdminController@servicePrice')->name('user.service.price');
        Route::put('storeServicePrice/{user}', 'Admin\AdminController@storeServicePrice')->name('store.service.price');
        Route::put('user/status/{user}', 'Admin\AdminController@statupdate')->name('admin.user-status');
        Route::get('broadcast', 'Admin\AdminController@broadcast')->name('admin.broadcast');
        Route::post('broadcast/email', 'Admin\AdminController@broadcastemail')->name('admin.broadcast-email');
        Route::get('subscribers', 'Admin\AdminController@subscribers')->name('admin.subscibers');
        Route::put('subscriber/{id}', 'Admin\AdminController@unSubscriber')->name('admin.unsubsciber');
        Route::get('broadcastMail', 'Admin\AdminController@subscriberEmail')->name('subscribers.email');
        Route::post('broadcastMail', 'Admin\AdminController@sendSubscriberEmail')->name('send.subscribers.email');

        Route::get('transactionLogs', 'Admin\AdminController@transactionLogs')->name('admin.transaction');
        Route::get('depositLogs', 'Admin\AdminController@depositLogs')->name('admin.deposit.logs');

        Route::get('generalSetting', 'Admin\WebsiteController@genSetting')->name('admin.GenSetting');
        Route::post('generalSetting', 'Admin\WebsiteController@updateGenSetting')->name('admin.UpdateGenSetting');

        Route::get('emailSetting', 'Admin\WebsiteController@emailSetting')->name('admin.EmailSetting');
        Route::post('emailSetting', 'Admin\WebsiteController@updateEmailSetting')->name('admin.UpdateEmailSetting');

        Route::view('logoFaviconSettings', 'admin.interface.logoicon')->name('logoicon');
        Route::post('logoFaviconSettings', 'Admin\InterfaceController@logoIconUpdate')->name('logoicon.update');

        Route::get('socialSettings', 'Admin\InterfaceController@social')->name('social');
        Route::post('socialStore', 'Admin\InterfaceController@socialStore')->name('social.store');
        Route::put('socialEdit/{id}', 'Admin\InterfaceController@socialEdit')->name('social.edit');
        Route::delete('socialDelete/{id}', 'Admin\InterfaceController@socialDelete')->name('social.delete');

        Route::get('ourServices', 'Admin\InterfaceController@ourServices')->name('admin.ourServices');
        Route::post('ourServices', 'Admin\InterfaceController@ourServicesStore')->name('admin.ourServices.store');
        Route::put('updateOurService/{id}', 'Admin\InterfaceController@updateOurService')->name('admin.ourServices.update');
        Route::delete('deleteOurService/{id}', 'Admin\InterfaceController@deleteOurService')->name('admin.ourServices.delete');

        Route::get('testimonial', 'Admin\InterfaceController@testimonial')->name('admin.testimonial');
        Route::post('testimonial', 'Admin\InterfaceController@testimonialStore')->name('admin.testimonial.store');
        Route::put('updatetestimonial/{id}', 'Admin\InterfaceController@updateTestimonial')->name('admin.testimonial.update');
        Route::delete('deletetestimonial/{id}', 'Admin\InterfaceController@deleteTestimonial')->name('admin.testimonial.delete');

        Route::get('faq', 'Admin\InterfaceController@faq')->name('admin.faq');
        Route::post('faq', 'Admin\InterfaceController@faqStore')->name('admin.faq.store');
        Route::put('updatetesfaq/{id}', 'Admin\InterfaceController@updateFaq')->name('admin.faq.update');
        Route::delete('deletefaq/{id}', 'Admin\InterfaceController@deleteFaq')->name('admin.faq.delete');

        Route::get('announcements', 'Admin\InterfaceController@announcements')->name('admin.announcements');
        Route::post('announcements', 'Admin\InterfaceController@announcementsStore')->name('admin.announcements.store');
        Route::put('updatetesAnnouncements/{id}', 'Admin\InterfaceController@updateAnnouncements')->name('admin.announcements.update');
        Route::delete('deleteAnnouncements/{id}', 'Admin\InterfaceController@deleteAnnouncements')->name('admin.announcements.delete');

        Route::get('frontendSetting', 'Admin\InterfaceController@frontend')->name('admin.frontend');
        Route::post('frontendSetting', 'Admin\InterfaceController@frontendStore')->name('admin.frontend.store');
    });
});