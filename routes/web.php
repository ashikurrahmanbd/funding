<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PagesController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);


//****************************************** */

// Register view Route
Route::get('/register', [AuthController::class, 'register_view'])->name('register');
// register post route
Route::post('/register', [AuthController::class, 'register_post'])->name('register');


// Login View route
Route::get('/login', [AuthController::class, 'login_view'])->name('login');

//login action route
Route::post('/login', [AuthController::class, 'login_post'])->name('login');

// logout rout
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

// *********************************************


// Frontend Pages Route
Route::get('/campaigns', [PagesController::class, 'campaigns_page_view'])->name('frontend-page-campaign');
// events page
Route::get('/page-events', [PagesController::class, 'events_page_view'])->name('frontend-page-events');

Route::get('/page-contact', [PagesController::class, 'contact_page_view'])->name('frontend-page-contact');

Route::get('/page-about', [PagesController::class, 'about_page_view'])->name('frontend-page-about');


/************************** Dasboard ********************** */

// unauthorized access view
Route::get('/unauthorized', [DashController::class, 'unauthorized_view'])->name('unauthorized');

// dashboard home
Route::get('/dash-board', [DashController::class, 'dash_index'])->middleware(['authmiddleware'])->name('dash-baord');

Route::get('/campaign', [DashController::class, 'dash_campaign'])->middleware(['authmiddleware'])->name('dashboard.campaign');

// addnew campaign form view
Route::get('/campaign-addnew', [DashController::class, 'dash_campaign_add_new_form'])->name('campaign.addnew');

// add new campaign form process
Route::post('/add-new-campaign', [DashController::class, 'dash_campaign_add_new_form_process'])->name('add-new-campaign');

// campaign edit form view
Route::get('/campaign-edit-form/{id}', [DashController::class, 'dash_campaign_edit_form'])->name('campaign-edit-form');

// campaign form update 
Route::post('/campaign-edit-form-process/{id}', [DashController::class, 'dash_campaign_edit_form_process'])->name('campaign-edit-form-process');


// delete campaign
Route::get('campaign-delete/{id}', [DashController::class, 'dash_campaign_delete'])->name('campaign-delete');


// ------------------------------ Single Campign with payment----------------------------

Route::get('single-campaign/{id}', [HomeController::class, 'single_campaign_details'])->name('single-campaign');


// payment routes
Route::get('campaign-make-payment/{id}', [PaymentController::class, 'campaign_payment'])->name('campaign-make-payment');

/*************************  Bkash Route from the bkash tokenzie payment package  ********************* */


Route::group(['middleware' => ['web']], function () {
    // Payment Routes for bKash
    Route::get('/bkash/payment', [App\Http\Controllers\BkashTokenizePaymentController::class,'index']);
    Route::get('/bkash/create-payment', [App\Http\Controllers\BkashTokenizePaymentController::class,'createPayment'])->name('bkash-create-payment');
    Route::get('/bkash/callback', [App\Http\Controllers\BkashTokenizePaymentController::class,'callBack'])->name('bkash-callBack');

    //search payment
    Route::get('/bkash/search/{trxID}', [App\Http\Controllers\BkashTokenizePaymentController::class,'searchTnx'])->name('bkash-serach');

    //refund payment routes
    Route::get('/bkash/refund', [App\Http\Controllers\BkashTokenizePaymentController::class,'refund'])->name('bkash-refund');
    Route::get('/bkash/refund/status', [App\Http\Controllers\BkashTokenizePaymentController::class,'refundStatus'])->name('bkash-refund-status');

});


// ************ Events Routes *************** //

//new menu events
Route::get('/events', [EventController::class, 'dash_events_index'])->middleware(['authmiddleware'])->name('dashboard.events');

// addnew event form view
Route::get('/add-new-event', [EventController::class, 'dash_event_add_new_form_view'])->middleware(['authmiddleware'])->name('dashboard.events.addnew.form');

// add new event process
Route::post('/add-new-event-process', [EventController::class, 'dash_event_add_new_form_process'])->name('dashboard.events.addnew.form.proces');

// delete event
Route::get('/event-delete/{id}', [EventController::class, 'dash_event_delete'])->name('dashboard.event.delete');

// Edit Event form view
Route::get('/event-edit/{id}', [EventController::class, 'event_edit_form_view'])->name('dashbaord.event.edit.form');

//Edit event form  process
Route::post('/event-edit-form-process/{id}', [EventController::class, 'event_edit_form_process'])->name('campaign-edit-form-process');





//********** End of events routes */


//************* Volunteer routes *************** */

//new menu volunteers
Route::get('/volunteers', [VolunteerController::class, 'dash_volunteers_index'])->middleware(['authmiddleware'])->name('dashboard.volunteers');

// Add new volunter form
Route::get('volunteer-add-new', [VolunteerController::class, 'dash_volunteer_add_new_form'])->name('dash.volunteer.add.new.form');

// addnew volunteer form process
Route::post('/volunteer-add-new-process', [VolunteerController::class, 'dash_volunteer_add_new_form_process'])->name('dash.volunteer.add.new.form.process');

// delete volunteer
Route::get('volunteer-delete/{id}', [VolunteerController::class, 'dash_volunteer_delete'])->name('volunteer-delete');

//edit volunteer form view
Route::get('volunteer-edit-form/{id}', [VolunteerController::class, 'dash_volunteer_edit_form_view'])->name('volunteer-edit-form');

//Volunteer event form  process
Route::post('volunteer-edit-form-process/{id}', [VolunteerController::class, 'volunteer_edit_form_process'])->name('volunteer-edit-form-process');


// **************** end volunteer routes **********************/

/***************** Testimonials routes *************** */
//new menu testimonials
Route::get('/testimonials', [TestimonialController::class, 'dash_testimonials_index'])->middleware(['authmiddleware'])->name('dashboard.testimonials');

// add new testimonials form
Route::get('/testimonial-add-new-form', [TestimonialController::class, 'dash_testimonial_add_new_form_view'])->name('dash.testimonial.add.new.form');

// add new testimonial form process
Route::post('/testimonial-add-new-form-process', [TestimonialController::class, 'dash_testimonial_add_new_form_process'])->name('testmonial-add-new');

// Testimonial Edit form View
Route::get('/testimonial-edit-form/{id}', [TestimonialController::class, 'dash_testimonial_edit_form_view'])->name('testimonial-edit-form');

// Testimonial Edit form Process
Route::post('/testimonial-edit-form-process/{id}', [TestimonialController::class, 'dash_testimonial_edit_form_process'])->name('testimonial-edit-form-process');

// Testimonial Delete
Route::get('/testimonial-delete/{id}', [TestimonialController::class, 'dash_testimonial_delete'])->name('testimonial-delete');


/**************** end of testimonials routes ********************* */

/**************** Start News routes */
Route::get('/news', [NewsController::class, 'dash_news_index'])->middleware(['authmiddleware'])->name('dashboard.news');

Route::get('/add-new-news-form', [NewsController::class, 'dash_news_add_new_form_view'])->name('dash.news.add.new.form');

// news post form process
Route::post('add-new-news-form-process', [NewsController::class, 'dash_news_add_new_form_process'])->name('dash.news.add.new.form.process');

// delete news
Route::get('news-delete/{id}', [NewsController::class, 'dash_news_delete'])->name('news-delete');

// Edit Form view
Route::get('news-edit-form/{id}', [NewsController::class, 'dash_news_edit_form'])->name('news-edit-form');

// News Edit Form Process
Route::post('news-edit-form-process/{id}', [NewsController::class, 'dash_news_edit_form_process'])->name('news-edit-form-process');


/************* End News Route ******************/


// start users route

Route::get('/users', [UsersController::class, 'dash_users_index'])->middleware(['authmiddleware'])->name('dashboard.news');

// end users route


/** Start Route for Bkash Make Payment */
Route::post('bkash-make-payment/{campaign_id}', [PaymentController::class, 'bkash_make_payment'])->name('bkash-make-payment');

Route::post('bkash-payment-process', [PaymentController::class, 'bkash_payment_process'])->name('bkash-payment-process');


/** End route for Bkash Make Payment */







