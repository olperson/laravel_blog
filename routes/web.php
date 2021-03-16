<?php

namespace App\Http\Controllers;

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
Route::any('/admin/login', [Admin\LoginController::class, 'login']);
Route::get('/verifycode', [Admin\LoginController::class, 'captcha']);
Route::get('/', function () {
	return view('welcome');
});
Route::match(['get', 'post'], '/crypt', [Admin\LoginController::class, 'crypt1']);
//后台登录中间件判断路由
Route::get('/test', [Admin\LoginController::class, 'test']);


Route::group(['middleware' => ['web', 'login'], 'prefix' => 'admin'], function () {
	Route::get('/info', [Admin\IndexController::class, 'info']);
	Route::get('/logout', [Admin\LoginController::class, 'logout'])->name('dashboard.logout');
	Route::any('/content/changeorder', [Admin\CreateController::class, 'order']);
	//索引界面异步修改文章标签
	Route::any('article/changetags', [Admin\ArticleController::class, 'changeTags']);
//    Route::resource('/contents/index', Admin\CreateController::class);
//	文章
	Route::resource('/article/index', Admin\ArticleController::class);
	Route::post('/article/search', [Admin\ArticleController::class, 'search']);
	Route::any('/upload', [Admin\ArticleController::class, 'upload']);
	//新增
	Route::get('/index', [Admin\IndexController::class, 'index']);
	Route::get('cryptocurrency', [Admin\IndexController::class, 'cryptocurrency']);
	Route::get('ecommerce', [Admin\IndexController::class, 'ecommerce']);
	Route::get('dashindex', [Admin\IndexController::class, 'dashindex']);
	Route::match(['get', 'post'], '/passwdreset', [Admin\LoginController::class, 'passwdreset'])->name('dashboard.repw');
	//文章分类
	Route::resource('/contents/index', Admin\CreateController::class);
});
///前台信息显示
Route::get('/blog', [Admin\ArticleController::class, 'test']);
Route::get('/imgs', [ImagesController::class, 'imgs']);
Route::any('/login', [Admin\LoginController::class, 'tt']);


Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('dashboard/cryptocurrency', [DashboardController::class, 'cryptocurrency'])->name('dashboard.cryptocurrency');
Route::get('dashboard/campaign', [DashboardController::class, 'campaign'])->name('dashboard.campaign');
Route::get('dashboard/ecommerce', [DashboardController::class, 'ecommerce'])->name('dashboard.ecommerce');

/* Apps */
Route::get('apps/inbox', [AppsController::class, 'inbox'])->name('apps.inbox');
Route::get('apps/inboxdetail', [AppsController::class, 'inboxdetail'])->name('apps.inboxdetail');
Route::get('apps/inboxcompose', [AppsController::class, 'inboxcompose'])->name('apps.inboxcompose');
Route::get('apps/chat', [AppsController::class, 'chat'])->name('apps.chat');
Route::get('apps/calendar', [AppsController::class, 'calendar'])->name('apps.calendar');
Route::get('apps/events', [AppsController::class, 'events'])->name('apps.events');
Route::get('apps/todolist', [AppsController::class, 'todolist'])->name('apps.todolist');
Route::get('apps/filemanager', [AppsController::class, 'filemanager'])->name('apps.filemanager');
Route::get('apps/contacts', [AppsController::class, 'contacts'])->name('apps.contacts');
Route::get('apps/scrumboard', [AppsController::class, 'scrumboard'])->name('apps.scrumboard');
Route::get('apps/blog', [AppsController::class, 'blog'])->name('apps.blog');
Route::get('apps/social', [AppsController::class, 'social'])->name('apps.social');

/* elements */
Route::get('elements/helperclass', [ElementsController::class, 'helperclass'])->name('elements.helperclass');
Route::get('elements/bootstrap', [ElementsController::class, 'bootstrap'])->name('elements.bootstrap');
Route::get('elements/typography', [ElementsController::class, 'typography'])->name('elements.typography');
Route::get('elements/tabs', [ElementsController::class, 'tabs'])->name('elements.tabs');
Route::get('elements/buttons', [ElementsController::class, 'buttons'])->name('elements.buttons');
Route::get('elements/icons', [ElementsController::class, 'icons'])->name('elements.icons');
Route::get('elements/notifications', [ElementsController::class, 'notifications'])->name('elements.notifications');
Route::get('elements/colors', [ElementsController::class, 'colors'])->name('elements.colors');
Route::get('elements/dialogs', [ElementsController::class, 'dialogs'])->name('elements.dialogs');
Route::get('elements/listgroup', [ElementsController::class, 'listgroup'])->name('elements.listgroup');
Route::get('elements/mediaobject', [ElementsController::class, 'mediaobject'])->name('elements.mediaobject');
Route::get('elements/modals', [ElementsController::class, 'modals'])->name('elements.modals');
Route::get('elements/nestable', [ElementsController::class, 'nestable'])->name('elements.nestable');
Route::get('elements/progressbars', [ElementsController::class, 'progressbars'])->name('elements.progressbars');
Route::get('elements/rangesliders', [ElementsController::class, 'rangesliders'])->name('elements.rangesliders');

/* Form elements */
Route::get('forms/formsbasic', [FormsController::class, 'formsbasic'])->name('forms.formsbasic');
Route::get('forms/advanced', [FormsController::class, 'advanced'])->name('forms.advanced');
Route::any('forms/validation', [FormsController::class, 'validation'])->name('forms.validation');
Route::get('forms/wizard', [FormsController::class, 'wizard'])->name('forms.wizard');
Route::get('forms/dragdropupload', [FormsController::class, 'dragdropupload'])->name('forms.dragdropupload');
Route::get('forms/cropping', [FormsController::class, 'cropping'])->name('forms.cropping');
Route::get('forms/summernote', [FormsController::class, 'summernote'])->name('forms.summernote');
Route::get('forms/editors', [FormsController::class, 'editors'])->name('forms.editors');
Route::get('forms/markdown', [FormsController::class, 'markdown'])->name('forms.markdown');

/* Tables elements */
Route::get('tables/normal', [TablesController::class, 'normal'])->name('tables.normal');
Route::get('tables/editable', [TablesController::class, 'editable'])->name('tables.editable');
Route::get('tables/tablecolor', [TablesController::class, 'tablecolor'])->name('tables.tablecolor');
Route::get('tables/filter', [TablesController::class, 'filter'])->name('tables.filter');
Route::get('tables/dragger', [TablesController::class, 'dragger'])->name('tables.dragger');

/* Charts*/
Route::get('charts/apex', [ChartsController::class, 'apex'])->name('charts.apex');
Route::get('charts/c_chart', [ChartsController::class, 'c_chart'])->name('charts.c_chart');
Route::get('charts/morris', [ChartsController::class, 'morris'])->name('charts.morris');
Route::get('charts/flot', [ChartsController::class, 'flot'])->name('charts.flot');
Route::get('charts/chartjs', [ChartsController::class, 'chartjs'])->name('charts.chartjs');
Route::get('charts/knob', [ChartsController::class, 'knob'])->name('charts.knob');
Route::get('charts/sparkline', [ChartsController::class, 'sparkline'])->name('charts.sparkline');

// widgets
Route::get('widgets/widget', [WidgetsController::class, 'widget'])->name('widgets.widget');

// extra pages
Route::get('pages/blank', [PagesController::class, 'blank'])->name('pages.blank');
Route::get('pages/searchresults', [PagesController::class, 'searchresults'])->name('pages.searchresults');
Route::get('pages/profile', [PagesController::class, 'profile'])->name('pages.profile');
Route::get('pages/invoices', [PagesController::class, 'invoices'])->name('pages.invoices');
Route::get('pages/invoicesview', [PagesController::class, 'invoicesview'])->name('pages.invoicesview');
Route::get('pages/gallery', [PagesController::class, 'gallery'])->name('pages.gallery');
Route::get('pages/timeline', [PagesController::class, 'timeline'])->name('pages.timeline');
Route::get('pages/pricing', [PagesController::class, 'pricing'])->name('pages.pricing');
Route::get('pages/settings', [PagesController::class, 'settings'])->name('pages.settings');


Route::get('map/vectormap', [MapController::class, 'vectormap'])->name('map.vectormap');

Route::get('authentication/login', [AuthenticationController::class, 'login'])->name('authentication.login');
Route::get('authentication/register', [AuthenticationController::class, 'register'])->name('authentication.register');
Route::get('authentication/forgotpassword', [AuthenticationController::class, 'forgotpassword'])->name('authentication.forgotpassword');
Route::get('authentication/error404', [AuthenticationController::class, 'error404'])->name('authentication.error404');