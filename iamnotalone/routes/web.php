<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExtraController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PeersForumController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

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

Route::view('signin', 'login')->name('login');
Route::view('signup', 'register')->name('register');
Route::view('event', 'event')->name('event');
//Forgot Password
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );
    if($status === Password::PASSWORD_RESET){
        notify()->success(__($status));
        return redirect()->route('login')->with('status', __($status));
    }else{
        notify()->info(__($status), 'Error');
       return  back()->withErrors(['email' => [__($status)]]);
    }
})->middleware('guest')->name('password.update');
//Home route
Route::Get('/', [ExtraController::class, 'home'])->name('home');
//Events route
Route::get('events', [ExtraController::class, 'events'])->name('events');
//Sign up route
Route::post('signup', [ExtraController::class, 'signup'])->name('signup');
//Sign in route
Route::post('auth', [ExtraController::class, 'auth'])->name('auth');
//Sign out route
Route::get('signout', [ExtraController::class, 'signout'])->name('signout');
// Get cities recommendations
Route::get('locations/get/{name}', [ExtraController::class, 'getCities'])->name('cities');
// Get States recommendations
Route::get('states/get/{name}', [ExtraController::class, 'getStates'])->name('states');
// Create new admin
Route::get('admin/create', [ExtraController::class, 'defaultAdmin'])->name('admin.default');
//Forum
Route::get('forum', [ExtraController::class, 'forum'])->name('forum');
//Donate Page
Route::get('donate', [ExtraController::class, 'donate'])->name('donate');

Route::get('storage/link',function (){
    $target = __DIR__.'/../storage/app/public';
    $shortcut = __DIR__.'/../../storage';
    #dd($target, $shortcut);

    symlink($target, $shortcut);
});

Route::get('artisan/optimize', function()
{
    Artisan::call('view:cache');
    dd("Optimized");
});

Route::prefix('events')->group(
    function () {
        Route::name('event.')->group(
            function () {
                Route::post('create', [UsersController::class, 'createEvent'])->name('create');
                Route::get('new', [UsersController::class, 'newEvent'])->name('new');
                Route::get('inperson', [UsersController::class, 'inpersonEvent'])->name('inperson');
                Route::get('online', [UsersController::class, 'onlineEvent'])->name('online');
                Route::get('hybrid', [UsersController::class, 'hybridEvent'])->name('hybrid');
                Route::post('update/inperson', [UsersController::class, 'updateInpersonEvent'])->name('update.inperson');
                Route::post('update/online', [UsersController::class, 'updateOnlineEvent'])->name('update.online');
                Route::post('update/hybrid', [UsersController::class, 'updateHybridEvent'])->name('update.hybrid');
                Route::get('date', [UsersController::class, 'eventDate'])->name('date');
                Route::post('date/set', [UsersController::class, 'setDate'])->name('date.set');
                Route::get('created/{id}', [UsersController::class, 'eventCreated'])->name('created');
                Route::get('details/{id}', [ExtraController::class, 'eventDetails'])->name('details');
                Route::get('register/{id}', [UsersController::class, 'registerForEvent'])->name('register');
                Route::get('{id}/success', [UsersController::class, 'successfulyRegistered'])->name('register.success');
                Route::get('user', [UsersController::class, 'userEvents'])->name('user');
                Route::get('training/{id}/start/{eId?}', [UsersController::class, 'startTraining'])->name('training.start');
            }
        );
    }
);

Route::prefix('admin')->group(
    function () {
        Route::name('admin.')->group(
            function () {
                Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
                Route::get('events/pending', [AdminController::class, 'pendingEvents'])->name('events.pending');
                Route::get('events/approved', [AdminController::class, 'approvedEvents'])->name('events.approved');
                Route::get('users', [AdminController::class, 'users'])->name('users');
                Route::get('event/{id}/approve', [AdminController::class, 'approveEvent'])->name('event.approve');
                Route::get('event/{id}/decline', [AdminController::class, 'declineEvent'])->name('event.decline');
                Route::get('event/{id}/details', [AdminController::class, 'eventDetails'])->name('event.details');
                Route::post('message/send', [AdminController::class, 'sendMessage'])->name('message.send');
                Route::get('training', [AdminController::class, 'training'])->name('training');
                Route::post('training/new', [AdminController::class, 'newTraining'])->name('training.new');
                Route::get('training/{id}/remove', [AdminController::class, 'removeTraining'])->name('training.remove');
                Route::get('training/{id}/details', [AdminController::class, 'trainingDetails'])->name('training.details');
                Route::post('training/details/update', [AdminController::class, 'updateTraining'])->name('training.update');
                Route::post('training/episode/new', [AdminController::class, 'newTrainingEpisode'])->name('training.episode.new');
                Route::get('training/episode/{id}/remove', [AdminController::class, 'removeTrainingEpisode'])->name('training.episode.remove');
                Route::post('training/episode/{id}/update', [AdminController::class, 'updateTrainingEpisode'])->name('training.episode.update');
            }
        );
    }
);

Route::prefix('forum')->group(
    function () {
        Route::name('forum.')->group(
            function () {
                Route::post('post/new', [UsersController::class, 'newForum'])->name('new');
                Route::get('post/{id}', [UsersController::class, 'post'])->name('post');
                Route::get('topics/explore', [UsersController::class, 'topics'])->name('topics');
                Route::get('user/comments', [UsersController::class, 'userComments'])->name('user.comments');
                Route::post('post/comment/new', [UsersController::class, 'newComment'])->name('comment.new');
                Route::get('user/posts', [UsersController::class, 'userPosts'])->name('user.posts');
                Route::get('event/{id}/topics', [UsersController::class, 'eventTopics'])->name('event.topics');
                Route::get('event/{id}/topics/popular', [UsersController::class, 'eventTopics'])->name('topics.popular');
            }
        );
    }
);

Route::prefix('peers/forum')->group(
    function () {
        Route::get('/', [PeersForumController::class, 'forum'])->name('peers.forum');
        Route::name('peers.forum.')->group(
            function () {
                Route::post('post/new', [PeersForumController::class, 'newPost'])->name('new');
                Route::get('post/{id}', [PeersForumController::class, 'post'])->name('post');
                Route::get('topics/explore', [PeersForumController::class, 'topics'])->name('topics');
                Route::get('user/comments', [PeersForumController::class, 'userComments'])->name('user.comments');
                Route::post('post/comment/new', [PeersForumController::class, 'newComment'])->name('comment.new');
                Route::get('user/posts', [PeersForumController::class, 'userPosts'])->name('user.posts');
                Route::get('event/{id}/topics', [PeersForumController::class, 'eventTopics'])->name('event.topics');
                Route::get('event/{id}/topics/popular', [PeersForumController::class, 'eventTopics'])->name('topics.popular');
            }
        );
    }
);




