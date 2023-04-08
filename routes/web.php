<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\ServiceController;
use App\Http\Controllers\Home\ServiceTitleController;
use App\Http\Controllers\Home\WPTitleController;
use App\Http\Controllers\Demo\DemoController;


Route::get('/', function () {
    return view('frontend.index');
});

//Admin All Route
Route::middleware(['auth'])->group(function () {

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout','destroy')->name('admin.logout');
    Route::get('/admin/profile','Profile')->name('admin.profile');
    Route::get('/edit/profile','EditProfile')->name('edit.profile');
    Route::post('/store/profile','StoreProfile')->name('store.profile');
    
    Route::get('/change/password','ChangePassword')->name('change.password');
    Route::post('/update/password','UpdatePassword')->name('update.password');

});

});

//Home Slide All Route
Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/slide','HomeSlider')->name('home.slide');
    Route::post('/update/slide','UpdateSlider')->name('update.slider');
  
});

//About Page All Route
Route::controller(AboutController::class)->group(function () {
    Route::get('/about/page','AboutPage')->name('about.page');
    Route::post('/update/about','UpdateAbout')->name('update.about');
    Route::get('about','HomeAbout')->name('home.about');
    Route::get('about/multi/image','AboutMultiImage')->name('about.multi.image');
    Route::post('/store/multi/image','StoreMultiImage')->name('store.multi.image');
    Route::get('/all/multi/image','AllMultiImage')->name('all.multi.image');
    Route::get('/all/multi/image/{id}','EditMultiImage')->name('edit.multi.image');
    Route::post('/update/multi/image', 'UpdateMultiImage')->name('update.multi.image');
    Route::get('/delete/multi/image/{id}','DeleteMultiImage')->name('delete.multi.image');
});

 // Porfolio All Route 
 Route::controller(PortfolioController::class)->group(function () {
    Route::get('/all/portfolio', 'AllPortfolio')->name('all.portfolio');
    Route::get('/add/portfolio', 'AddPortfolio')->name('add.portfolio');
    Route::post('/store/portfolio', 'StorePortfolio')->name('store.portfolio');

    Route::get('/edit/portfolio{id}', 'EditPortfolio')->name('edit.portfolio');
    Route::post('/update/portfolio', 'UpdatePortfolio')->name('update.portfolio');
    Route::get('/delete/portfolio{id}','DeletePortfolio')->name('delete.portfolio');
    Route::get('/portfolio/details/{id}','PortfolioDetails')->name('portfolio.details');
    Route::get('/portfolio','HomePortfolio')->name('home.portfolio');


});

//Blog Category All Route
Route::controller(BlogCategoryController::class)->group(function () {
    Route::get('/all/blog/category','AllBlogCategory')->name('all.blog.category');
    Route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category');
    Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
    Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category');
    Route::post('/update/blog/category/{id}', 'UpdateBlogCategory')->name('update.blog.category');
    Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
});

//Blog All Route
Route::controller(BlogController::class)->group(function () {
    Route::get('/all/blog','AllBlog')->name('all.blog');
    Route::get('/add/blog', 'AddBlog')->name('add.blog');
    Route::post('/store/blog', 'StoreBlog')->name('store.blog');
    Route::get('/edit/blog/{id}', 'EditBlog')->name('edit.blog');
    Route::post('/update/blog', 'UpdateBlog')->name('update.blog');
    Route::get('/delete/blog/{id}', 'DeleteBlog')->name('delete.blog');

    Route::get('/blog/details/{id}', 'BlogDetails')->name('blog.details');
    Route::get('/category/blog/{id}', 'CategoryBlog')->name('category.blog');

    
    Route::get('/blog', 'HomeBlog')->name('home.blog');
  
});

//Footer All Route
Route::controller(FooterController::class)->group(function () {
    Route::get('/footer/setup','FooterSetup')->name('footer.setup');
    Route::post('/update/footer', 'UpdateFooter')->name('update.footer');
  
});

 // Contact All Route 
 Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'Contact')->name('contact.me');
    Route::post('/store/message', 'StoreMessage')->name('store.message');
    Route::get('/contact/message', 'ContactMessage')->name('contact.message');   
    Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message'); 
 });

 //Service Title Route
 Route::controller(ServiceTitleController::class)->group(function () {
    Route::get('view', 'ServiceTitle')->name('service.title');
    Route::get('/edit/serviceTitle/{id}', 'EditServiceTitle')->name('edit.serviceTitle');
    Route::post('/update/serviceTitle', 'UpdateServiceTitle')->name('update.serviceTitle');

 });

  //Service Information Route
    Route::controller(ServiceController::class)->group(function () {
    Route::get('viewService', 'AllServiceInformation')->name('service.info');
    Route::get('/edit/serviceInformation/{id}', 'EditServiceinfo')->name('edit.serviceInfo');

    Route::get('/add/serviceInfo', 'AddServiceInfo')->name('add.service');
    Route::post('/store/service', 'StoreServiceInfo')->name('store.service');
    Route::post('/update/serviceInformation', 'UpdateServiceInfo')->name('update.info');
    Route::get('/delete/service/{id}', 'DeleteService')->name('delete.service'); 

    Route::get('/service','HomeService')->name('home.service');

 });

  //Working Process Title Route
    Route::controller(WPTitleController::class)->group(function () {
    Route::get('viewS', 'WPTitle')->name('WP.title');

    Route::get('/edit/WPTitle/{id}', 'EditWPTitle')->name('edit.wptitle');
     Route::post('/update/WPTitle', 'UpdateWPTitle')->name('update.wptitle');

     Route::get('/delete/WPTitle/{id}', 'DeleteWP')->name('delete.WP');


 });
//Demo Controller
//  Route::controller(DemoController::class)->group(function () {
//     Route::get('/', 'HomeMain')->name('home');


//     Route::get('/about', 'Index')->name('about.page')->middleware('check');
//     Route::get('/contact', 'ContactMethod')->name('cotact.page');
// });
  
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
