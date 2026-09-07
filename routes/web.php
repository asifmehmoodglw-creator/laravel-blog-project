<?php
use App\Models\Post;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Route;
Route::get('/post-card', function(){
    return view('components.post-card');
});
Route::get('/create', function(){
    return view('admin.posts.create');
});
Route::get('/edit', function(){
    return view('admin.posts.edit');
});
// Route::get('/category',function(){
//     return view('components.category-form');
// })->name('category.form1');
Route::get('/', [PostController::class, 'index'])->name('home');
Route::match(['get','post'],'/store', [PostController::class, 'store'])->name('posted');
Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::patch('posts/{post}', [PostController::class, 'update'])->name('post.update');

// Route::get('posts/{post:slug}', [PostController::class, 'show']);
// Route::get('/posts/{post:slug}', function (Post $post) {
//     return view('post', [
//         'post' => $post
//     ]);
// });
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::match(['get','post'],'newsletter', [NewsletterController::class , '__invoke'])->name('newsL');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->name('log')->middleware('auth');
Route::post('logout1', [RegisterController::class, 'destroy'])->name('log1')->middleware('auth');
// Admin Section
// Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
// });

Route::get('posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('post.delete')->middleware('auth');
Route::post('/category',[CategoryController::class,'store'])->name('categoryform');
// Route::get('/close',[CategoryController::class , 'close'])->name('category.delete');
Route::get('/create', [CategoryController::class, 'create']);
Route::get('/create1', [CategoryController::class, 'create1']);
Route::get('/create2', [CategoryController::class,'ind'])->name('categor');
Route::get('/categoryData',[CategoryController::class, 'ind'])->name('CategoryData');
Route::get('/edit/category/{id}',[CategoryController::class, 'editcategory'])->name('editcategory');
// Route::match(['get','post','head','put'],'/update/category/{id}',[CategoryController::class, 'updatecategory'])->name('updatecategory');
// Route::match(['get','post','head','put','delete'],'/delete/category/{id}',[CategoryController::class, 'delete'])->name('deletecategory');
Route::match(['get', 'post', 'head', 'put'], '/update/category/{id}', [CategoryController::class, 'updatecategory'])->name('updatecategory');
Route::match(['get', 'post', 'head', 'put', 'delete'], '/delete/category/{id}', [CategoryController::class, 'delete'])->name('deletecategory');
Route::get('/card',function(){
    return view('admin.posts.card');
});
Route::post('/rate-card',[CardController::class, 'rate'])->name('card-rate');
Route::middleware(['auth'])->group(function(){
Route::post('/cards/{post}/comments',[PostCommentsController::class, 'store'])->name('comment');
});