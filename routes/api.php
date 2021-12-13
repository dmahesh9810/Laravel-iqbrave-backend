<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\ProfileUpdateController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Cashier\CheckOutBalance;
use App\Http\Controllers\Cashier\GetCoinController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\Game\Knowledge\QuestionsController;
use App\Http\Controllers\Game\Knowledge\QuestionsGameController;
use App\Http\Controllers\Game\Random\MatchNumber;
use App\Http\Controllers\Game\Random\RiseFallGameController;
use App\Http\Controllers\Game\Random\SnakeLadder;
use App\Http\Controllers\Gsg\GsgController;
use App\Http\Controllers\SecureController;
use App\Http\Controllers\SellCoinController;
use Illuminate\Support\Facades\Route;


Route::post("authusersignup", RegisterController::class);
Route::post("authusersignin", LoginController::class);
Route::post('frogot-password', [NewPasswordController::class, 'frogotPassword']);
Route::post('reset-password', [NewPasswordController::class, 'reset']);

Route::get('gsg', [GsgController::class, 'getGSG']);

Route::post('email/verification-notification', [EmailVerificationController::class, 'sendVerificationEmail'])->middleware('auth:sanctum');
Route::get('verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify')->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', 'verified' ])->group(function (){

    Route::post('sellcoin', SellCoinController::class);

    Route::get("email/verification-notification-check", [EmailVerificationController::class, 'emailCheck']);
});

Route::middleware(['auth:sanctum'])->group(function () {


    Route::post("userlogout", LogoutController::class);

    Route::get("getcoins", [GetCoinController::class, 'packageCoin']);
    Route::get("getsellcoins", [GetCoinController::class, 'getSellCoins']);
    Route::post('checkout/save/{coin}', CheckOutController::class);
    Route::post('checkout/secure', [SecureController::class, 'securePayhere']);
    Route::post('checkout/notsecure', [SecureController::class, 'NotsecurePayhere']);
    Route::post('checkout/payherenotify', [SecureController::class, 'payhereNotify']);

    Route::post('checkoutbalance', CheckOutBalance::class,);

    Route::post('matchnumberenter', [MatchNumber::class, 'matchEnterGame']);
    Route::post('matchnumberplayer', [MatchNumber::class, 'matchPlayer']);
    Route::post('matchnumberbot', [MatchNumber::class, 'matchBot']);
    Route::post('matchresume', [MatchNumber::class, 'matchResume']);

    Route::post('risefallenter', [RiseFallGameController::class, 'riseFallEnter']);

    Route::post('snakeladderenter', [SnakeLadder::class, 'EnterGame']);
    Route::post('snakeladderwaitingroom', [SnakeLadder::class, 'WaitingRoom']);
    Route::post('snakeladderplayerclick', [SnakeLadder::class, 'PlayerClick']);
    Route::post('snakeladderplayerwaiting', [SnakeLadder::class, 'PlayerWaiting']);

    Route::post('snakeladderentersystem', [SnakeLadder::class, 'snakeLadderEnterSystem']);
    Route::post('snakeladderentersystemresumcansle', [SnakeLadder::class, 'snakeLadderEnterSystemResumCansle']);
    Route::post('snakeladderresumebot', [SnakeLadder::class, 'snakeLadderResumeBot']);
    Route::post('snakeladderplayerclicksystem', [SnakeLadder::class, 'snakeLadderPlayerClickSystem']);

    Route::post('getquiz', [QuestionsGameController::class, 'getQuiz']);
    Route::post('quizanswer', [QuestionsGameController::class, 'quizAnswer']);
    Route::post('test', [QuestionsGameController::class, 'test']);

    Route::post('savequiz', [QuestionsController::class, 'saveQuiz']);
    Route::get('getquiz', [QuestionsController::class, 'getQuiz']);
    Route::post('editquiz', [QuestionsController::class, 'editQuiz']);
    Route::post('quizapproved', [QuestionsController::class, 'quizApproved']);

    Route::get('getuserquiz', [QuestionsController::class, 'getUserQuiz']);
    Route::get('getuserquizict', [QuestionsController::class, 'getUserQuizIct']);
    Route::get('getuserquizmaths', [QuestionsController::class, 'getUserQuizMaths']);
    Route::get('getuserquizscience', [QuestionsController::class, 'getUserQuizScience']);

    Route::post('profile-update', ProfileUpdateController::class,);
    Route::get('user', ProfileController::class,);


});


// Route::middleware(['auth:sanctum','role:ROLE_ADMIN', 'verified'])->group(function () {
//     Route::post('quizapproved', [QuestionsController::class, 'quizApproved']);
// });
