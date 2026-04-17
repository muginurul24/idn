<?php

use App\Http\Controllers\ApiQr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\AuthPageController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\LaunchGameController;
use App\Http\Controllers\OthersPageController;
use App\Http\Controllers\TransactionController;

Route::get('/sitemap.xml', SitemapController::class)->middleware('cache.headers:public;max_age=3600;etag')->name('sitemap');

Route::get('/', [MainPageController::class, 'index'])->name('home');
Route::get('/sportsbook', [MainPageController::class, 'sportsbook'])->name('sportsbook');
Route::get('/casino', [MainPageController::class, 'casino'])->name('casino');
Route::get('/idnpoker', [MainPageController::class, 'idnpoker'])->name('idnpoker');
Route::get('/slots', [MainPageController::class, 'slots'])->name('slots');
Route::get('/slots/new', [MainPageController::class, 'newSlots'])->name('newSlot');
Route::get('/slots/exclusive', [MainPageController::class, 'exclusiveSlots'])->name('exclusiveSlot');
Route::get('/slots/{provider:slug}', [MainPageController::class, 'slotBySlug'])->name('slot');
Route::get('/idnlive', [MainPageController::class, 'idnlive'])->name('idnlive');
Route::get('/arcadeGames', [MainPageController::class, 'arcade'])->name('arcades');
Route::get('/arcadeGames/{provider:slug}', [MainPageController::class, 'arcadeBySlug'])->name('arcade');
Route::get('/tableGames', [MainPageController::class, 'table'])->name('table');
Route::get('/idnraffle', [MainPageController::class, 'idnraffle'])->name('idnraffle');
Route::get('/lottery', [MainPageController::class, 'lottery'])->name('lottery');
Route::get('/promotion', [MainPageController::class, 'promotion'])->name('promotion');
Route::get('/referrals', [MainPageController::class, 'referrals'])->name('referral');

// Others Page
Route::get('/rtp', [OthersPageController::class, 'rtp'])->name('rtp');
Route::get('/language/{any}', fn() => redirect('/'));
Route::get('/contact-us', [OthersPageController::class, 'contact'])->name('contact');
Route::get('/ticket/create', [OthersPageController::class, 'createTicket']);
Route::post('/ticket/create', [OthersPageController::class, 'postTicket']);

Route::middleware('guest')->group(function () {
    Route::prefix('login')->group(function () {
        Route::get('/', fn() => redirect()->route('home'))->name('login');
        Route::post('/', [AuthController::class, 'login']);
    });
    Route::prefix('register')->group(function () {
        Route::get('/', [AuthPageController::class, 'register'])->name('register');

        // Response for Ajax
        Route::get('bank-profiles', [ResponseController::class, 'bankProfiles']);
        Route::get('user-availibility', [ResponseController::class, 'checkUsername']);
        Route::get('accountnumber-availibility', [ResponseController::class, 'checkBankNumber']);
        Route::get('referral-availibility/257', [ResponseController::class, 'checkReferral']);
    });

    Route::post('/register-validate', [AuthController::class, 'register']);
    Route::prefix('password')->group(function () {
        Route::get('reset', [AuthPageController::class, 'resetPassword'])->name('reset');
        Route::post('/', [AuthController::class, 'resetPassword']);
    });
});

Route::middleware('auth')->group(function () {
    Route::prefix('password')->group(function () {
        Route::get('change', [AuthPageController::class, 'changePassword'])->name('re-password');
        Route::post('update', [AuthController::class, 'updatePassword']);
    });
    Route::get('/logout', [AuthController::class, 'logout']);

    // Response for Ajax
    Route::prefix('wallet')->group(function () {
        Route::post('refresh', [ResponseController::class, 'refreshBalance']);
        Route::get('calibrate', [ResponseController::class, 'walletCalibrate']);
        Route::get('update', [ResponseController::class, 'walletUpdate']);
    });
    Route::get('/deposit-bank-accounts', [ResponseController::class, 'getBankList']);
    Route::get('/downlinerefferal', [ResponseController::class, 'downlineReferral']);

    // Others Auth Page
    Route::get('/mybonus', [OthersPageController::class, 'mybonus'])->name('bonus');

    Route::prefix('open-game')->group(function () {
        Route::get('/slot/{game:code}', [AuthPageController::class, 'openGame']);
        Route::get('/casino/{game:code}', [AuthPageController::class, 'openGame']);
        Route::get('/lobby/casino', [AuthPageController::class, 'openGameCasino']);
    });

    Route::name('popup.')->group(function () {
        Route::get('/transaction/history', [AuthPageController::class, 'transactionHistory'])->name('history');
        Route::get('/bonus/history', [AuthPageController::class, 'bonusHistory'])->name('bonus');
        Route::get('/memo', [AuthPageController::class, 'memo'])->name('memo');
        Route::post('/memo/create', [AuthController::class, 'createMemo'])->name('createMemo');
        Route::get('/memo/delete/{ticket}', [ResponseController::class, 'deleteMemo'])->name('deleteMemo');
        Route::get('/memo/mark-read/{ticket}', [ResponseController::class, 'readMemo'])->name('mark');
        Route::get('/referral', [AuthPageController::class, 'referral'])->name('referral');

        Route::get('/deposit', [AuthPageController::class, 'transactionDeposit'])->name('deposit');
        Route::get('/withdraw', [AuthPageController::class, 'transactionWithdraw'])->name('withdraw');
        Route::post('/deposit', [TransactionController::class, 'deposit']);
        Route::post('/withdraw', [TransactionController::class, 'withdraw']);
    });

    Route::get('/pga/qris', [OthersPageController::class, 'viewQr']);
});

Route::post('/api/qr', ApiQr::class);

Route::domain('7800d17b5a0.ucnuzulk5c.net')->group(function(){
    Route::get('/gs2c/html5Game.do', [LaunchGameController::class, 'pragmatic'])->name('openFramePragmatic');
});

Route::domain('m.lqoyu1i5b.com')->group(function(){
    Route::get('/{game}/index.html', [LaunchGameController::class, 'pgsoft'])->name('openFramePgsoft');
});
