<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\gCalendarController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HelpCenterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArticleLikesController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\SetupRegController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminForumController;
use App\Http\Controllers\AdForumController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserPreferenceController;
use App\Http\Controllers\SettingsController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'index'])
    ->middleware('auth')->name('profile');
Route::resource("profiles", ProfileController::class);

// Route::get('/news-user', [HomeController::class, 'news'])
//     ->middleware('auth')->name('news-user');

// Route::get('/news-detail', [HomeController::class, 'ndetail'])
//     ->middleware('auth')->name('news-detail');

Route::get('/setting', [HomeController::class, 'setting']) 
    ->middleware(['auth', 'verified']);
Route::resource('update-password',SettingsController::class);


//Setting Up - After Register
Route::get('/setup', [HomeController::class, 'setup'])->name('user.setup');
Route::post('/setup-store', [SetupRegController::class, 'store'])->name('user.setup-store');

// Route::get('/twofactor', [HomeController::class, 'twofactor']);
// Route::get('/confirm', [HomeController::class, 'confirm']);

// Chatbot    
// Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);
Route::post('/botman', function() {
    app('botman')->listen();
});

//Knowledgebase
Route::resource("knowledge", KnowledgeController::class)->middleware('auth');
Route::get('/knowledge-search', [KnowledgeController::class, 'search'])->middleware('auth')->name('knowledge.search');


//Category
Route::resource("category", CategoryController::class)->middleware('auth:admin');

// Article
// Admin
Route::resource("articles", ArticleController::class)->middleware('auth:admin');
Route::get('/article-adcat/{id}', [ArticleController::class, 'acategory'])->middleware('auth:admin')->name('article-adcat');
Route::get('/article-search', [ArticleController::class, 'getMoreArticle'])->name('article.search');

// User 
Route::get('/article', [ArticleController::class, 'uindex'])
    ->middleware('auth')->name('article');
Route::get('/article-cat/{id}', [ArticleController::class, 'category'])
    ->middleware('auth')->name('article-cat');
Route::get('/article/{id}', 'App\Http\Controllers\ArticleController@udetails')
    ->middleware('auth')->name('article.detail');

// News
// Admin
Route::resource("news", NewsController::class)->middleware('auth:admin');
Route::get('/news-search', [NewsController::class, 'getMoreUsers'])->middleware('auth:admin')->name('news.search');

//User
Route::get('/news-user', [NewsController::class, 'userNewspage'])
    ->middleware('auth')->name('news.usernews');
Route::get('/newspage/{id}', 'App\Http\Controllers\NewsController@userDetailNewspage')
    ->middleware('auth')->name('news.userNewspage');   
    
//Helpcenter
Route::resource("helpcenter", HelpCenterController::class)->middleware('auth');

// Forum
// Admin
Route::resource("aforum", AdForumController::class)->middleware('auth:admin');
Route::get('/forum-adcat/{id}', [AdForumController::class, 'acategory'])->middleware('auth:admin')->name('forum-adcat');
Route::delete('/aforum/{aforum}', [AdForumController::class, 'destroy'])->middleware('auth:admin')->name('aforum.destroy');

//User
Route::resource("forums", ForumController::class)->middleware('auth');
Route::get('/forum-cat/{id}', [ForumController::class, 'category'])
    ->middleware('auth')->name('forum-cat');
Route::get('/forum/{id}', 'App\Http\Controllers\ForumController@udetails')
    ->middleware('auth')->name('forum.detail');
Route::delete('/forums/{id}', [ForumController::class, 'destroy'])->middleware('auth:admin')->name('forums.destroy');

// Route::get('/forum/create', 'App\Http\Controllers\ForumController@create')->name('forum.create');
// Route::post('/forum/store', 'App\Http\Controllers\ForumController@store')->name('forum.store');
// Route::get('/forums', 'App\Http\Controllers\ForumController@index')->name('forums');
// Route::get('/forum/show/{id}', 'App\Http\Controllers\ForumController@show')->name('forum.show');
Route::post('/comment/store', 'App\Http\Controllers\CommentController@store')->name('comment.add');
Route::post('/comment/show', 'App\Http\Controllers\CommentController@show')->name('comment.show');


// Banner Admin
Route::get('/banners', [BannersController::class, 'index'])->middleware('auth:admin')->name('banners.index');
Route::get('/banners/add_banner', [BannersController::class, 'create'])->middleware('auth:admin')->name('banners.add_banner');  
Route::get('/banners/edit_banner/{id}', [BannersController::class, 'edit'])->middleware('auth:admin')->name('banners.edit_banner');  
Route::post('/banners/edit_banner/{id}', [BannersController::class, 'update'])->middleware('auth:admin')->name('banners.update');  
Route::delete('/banners/{banner}', [BannersController::class, 'destroy'])->middleware('auth:admin')->name('banners.destroy');
Route::get('/update-banner-status',[BannersController::class, 'updateBannerStatus'])->middleware('auth:admin');
Route::post('/banners/store', [BannersController::class, 'store'])->middleware('auth:admin')->name('banners.store');
//Route::delete('/delete-banner/{id}', [BannersController::class, 'destroy'])->middleware('auth:admin')->name('banners.destroy');

//Setting
Route::delete('/user-delete/{id}', [UsersController::class, 'delete'])->middleware('auth:admin')->name('userRecord.delete');


//update user preference
Route::get('/update-user-preference-status',[UserPreferenceController::class, 'updatePreferenceStatus'])->middleware('auth')->name('setting.updatePref');
Route::get('/update-user-password',[SettingsController::class, 'update'])->middleware('auth')->name('setting.updatePass');


Route::prefix('admin')->group(function () {
    //Dashboard
    Route::get('/', [DashboardController::class, 'index'])->middleware('auth:admin')->name('admin.dashboard');
    
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::post('/auth', [AdminController::class, 'authenticate'])->name('admin.auth');
    
    Route::get('/setting', [AdminController::class, 'settingpage'])->middleware('auth:admin')->name('admin.setting');
  
});

require __DIR__.'/auth.php';
