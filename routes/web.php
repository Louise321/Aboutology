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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return App\Models\Article::with(['category'])->filterBy(request()->all())->get();
});

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware('auth')->name('dashboard');

// Route::get('/knowledge', [HomeController::class, 'knowledge']);
Route::get('/profile', [ProfileController::class, 'index'])
    ->middleware('auth')->name('profile');

// Route::get('/udashboard', [HomeController::class, 'udashboard'])
//     ->middleware('auth')->name('udashboard');

// Route::get('/article', [HomeController::class, 'article']);
// Route::get('/article-detail', [HomeController::class, 'adetail'])
//     ->middleware('auth')->name('article-detail');

// Route::get('/forum', [HomeController::class, 'forum'])
//     ->middleware('auth')->name('forum');

// Route::get('/forum-detail', [HomeController::class, 'fdetail'])
//     ->middleware('auth')->name('forum-detail');

Route::get('/news-user', [HomeController::class, 'news'])
    ->middleware('auth')->name('news-user');

Route::get('/news-detail', [HomeController::class, 'ndetail'])
    ->middleware('auth')->name('news-detail');

Route::get('/calendar', [HomeController::class, 'calendar'])
    ->middleware('auth')->name('calendar');

/* Route::get('/helpcenter', [HomeController::class, 'helpc'])
    ->middleware('auth')->name('helpcenter'); */

//Testing on going hereeeeeeeeeeeeeeeeeeeeeeeeeeeeeee (setting, two factor, confirm)
// Route::get('/setting', [HomeController::class, 'setting'])
//     ->middleware('auth')->name('setting');

Route::get('/setting', [HomeController::class, 'setting'])
    ->middleware(['auth', 'verified']);

// Route::get('/twofactor', [HomeController::class, 'twofactor']);
// Route::get('/confirm', [HomeController::class, 'confirm']);


Route::get('/test', [HomeController::class, 'test']);

// Dashboard



// Chatbot
Route::match(['get', 'post'], '/botman','BotManController@handle');

// Article
// Admin
Route::resource("articles", ArticleController::class)->middleware('auth:admin');
Route::get('/article-adcat/{id}', [ArticleController::class, 'acategory'])->middleware('auth:admin')->name('article-adcat');
Route::get('/import-form', [ArticleController::class, 'importForm']);
Route::post('/import', [ArticleController::class, 'import'])->name('article.import');

// User 
Route::get('/article', [ArticleController::class, 'uindex'])
    ->middleware('auth')->name('article');
Route::get('/article-cat/{id}', [ArticleController::class, 'category'])
    ->middleware('auth')->name('article-cat');
Route::get('/article/{id}', 'App\Http\Controllers\ArticleController@udetails')
    ->middleware('auth')->name('article.detail');
Route::post('/article/{id}/like', [ArticleLikesController::class, 'store']);
Route::delete('/article/{id}/like', [ArticleLikesController::class, 'destroy']);

// News
// Admin
Route::resource("news", NewsController::class);


//User
Route::get('/news-user', [NewsController::class, 'userNewspage'])
    ->middleware('auth')->name('news.usernews');
Route::get('/newspage/{id}', 'App\Http\Controllers\NewsController@userDetailNewspage')
    ->middleware('auth')->name('news.userNewspage');   
    

//Knowledgebase
Route::resource("knowledge", KnowledgeController::class);
Route::get('/knowledge-search', [KnowledgeController::class, 'search'])->name('knowledge.search');

//for helpcenter
Route::resource("helpcenter", HelpCenterController::class);

// This is Forum and its friendssss lalalalalalalala
// Admin
Route::resource("forums", ForumController::class);
Route::get('/forum-adcat/{id}', [ForumController::class, 'acategory'])->name('forum-adcat');

// User 
Route::get('/forum', [ForumController::class, 'index'])
    ->middleware('auth')->name('forum');
Route::get('/forum-cat/{id}', [ForumController::class, 'category'])
    ->middleware('auth')->name('forum-cat');
Route::get('/forum/{id}', 'App\Http\Controllers\ForumController@udetails')
    ->middleware('auth')->name('forum.detail');

// Route::get('/forum/create', 'App\Http\Controllers\ForumController@create')->name('forum.create');
// Route::post('/forum/store', 'App\Http\Controllers\ForumController@store')->name('forum.store');
// Route::get('/forums', 'App\Http\Controllers\ForumController@index')->name('forums');
// Route::get('/forum/show/{id}', 'App\Http\Controllers\ForumController@show')->name('forum.show');
Route::post('/comment/store', 'App\Http\Controllers\CommentController@store')->name('comment.add');


/* Route::get('/middleware-prueba', function () {
    echo "Administrador";
})->middleware('auth:admins');
 */  

Route::prefix('admin')->group(function () {

    //Dashboard
    Route::get('/', [DashboardController::class, 'index'])->middleware('auth:admin')->name('admin.dashboard');

    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::post('/auth', [AdminController::class, 'authenticate'])->name('admin.auth');
    
    // Route::get('/article', [AdminController::class, 'article'])->middleware('auth:admin')->name('admin.article');
    
    /* Route::get('/news', [AdminController::class, 'newspage'])->name('admin.news');
    Route::get('/testnewspage', [AdminController::class, 'testnewspage'])->name('admin.testnewspage'); */
    Route::get('/setting', [AdminController::class, 'settingpage'])->middleware('auth:admin')->name('admin.setting');
    Route::get('/banners', [AdminController::class, 'banners'])->middleware('auth:admin')->name('admin.banner');


    Route::get('/test', [AdminController::class, 'test'])->middleware('auth:admin')->name('admin.test');

});

require __DIR__.'/auth.php';
