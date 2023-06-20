<?php

use App\Http\Controllers\Chat\ChatController;
/*
|--------------------------------------------------------------------------
| Caht Routes
|--------------------------------------------------------------------------
|
| Here is where you can register caht routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "chat" middleware group. Make something great!
|
*/
Route::controller(ChatController::class)->middleware('require_login')->group(function(){
    Route::get('/inbox/{user}','index')->name('chat.index');
    Route::post('/chat/submit','store')->name(('chat.store'));
    Route::post('/chat/delete','deleteConversation')->name(('chat.delete'));
    Route::get('/chat/notification','notification')->name(('chat.notification'));
    Route::post('/caht/destroy-session','destroySession')->name('chat.destroy-session');
    Route::get('/caht/emoji','getEmojis')->name('chat.emojis');
    Route::post('/caht/media-upload','chatMedia')->name('chat.media');
    Route::post('/caht/media-delete','deleteMedia')->name('chat.delete-media');
    Route::post('/caht/add-quick-response','addQuickResponse')->name('chat.add-quick-response');
    Route::get('/caht/delete-quick-response/{id}','deleteQuickResponse')->name('chat.delete-quick-response');
    Route::post('/caht/offer-send','sendOffer')->name('chat.offer-send');
    Route::post('/caht/offer-accept','offerAccept')->name('chat.offer-accept');
    Route::post('/caht/change-status','changeReadingStatus')->name('chat.reading.status');
});