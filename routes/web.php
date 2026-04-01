<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AgentController;
use App\Http\Controllers\Backend\AgroProductController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CertificateController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\CounterController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\GeneralController;
use App\Http\Controllers\Backend\ItFarmController;
use App\Http\Controllers\Backend\PrivacyController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\ProjectCategoryController;
use App\Http\Controllers\Backend\ProjectSubcategoryController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SocialWorkController;
use App\Http\Controllers\Backend\SponsorController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Frontend\F_EventController;
use App\Http\Controllers\Frontend\FBlogController;
use App\Http\Controllers\Frontend\FcontactusController;
use App\Http\Controllers\Frontend\FServiceController;
use App\Http\Controllers\Frontend\FVideoGalleryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;






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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// Route::middleware(['auth', 'role:user'])->group(function () {
//     Route::get('/user/dashboard', [UserController::class, 'index']);
// });

// frontend all route start=================================================
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'tech_web_home_index')->name('webview.home.index');
    Route::get('/about/details', 'tech_web_about_details')->name('about.details');
    Route::get('/owner/details/more', 'tech_web_about_owner_details')->name('owner.details');
    Route::get('/project/details/{id}', 'tech_web_completed_project_details')->name('completed.project.details');
    Route::get('/ongoing/project/details/{id}', 'tech_web_ongoing_project_details')->name('ongoing.project.details');
    Route::get('/upcomming/project/details/{id}', 'tech_web_upcomming_project_details')->name('upcomming.project.details');
    Route::get('/all/project/list', 'tech_web_completed_project_list')->name('all.project.list');
    Route::get('/fongoing/project', 'tech_web_ongoing_project')->name('frontend.ongoing.project');
    Route::get('/fupcomming/project', 'tech_web_upcomming_project')->name('frontend.upcomming.project');
    Route::get('/fcompleted/project', 'tech_web_completed_project')->name('frontend.completed.project');
    Route::get('/serch-property/type/location', 'tech_web_serch_property');
    Route::get('/serch-property/type-completed/', 'tech_web_completed_serch')->name('completed.project.search');
    Route::get('/serch-property/type-upcomming/', 'tech_web_upcomming_serch')->name('upcomming.project.search');
    Route::get('/serch-property/type-ongoing/', 'tech_web_ongoing_serch')->name('ongoing.project.search');
    // Route::get('/all/property', 'tech_web_all_property')->name('all.property');
    // business item methods --------------------------
    Route::get('/business/item/details/{id}', 'tech_web_business_item_details')->name('business.item.details');
    // Service item methods --------------------------
    Route::get('/service/item/details/{id}', 'tech_web_service_item_details')->name('service.item.details');
    Route::get('/mission/vission', 'tech_web_mission_vission')->name('mission.vission');
    Route::get('/team/members', 'tech_web_team_members')->name('team.members');
    Route::get('/client/review', 'tech_web_client_review')->name('client.review');
    Route::get('/client/review', 'tech_web_client_review')->name('client.review');
    Route::get('/career/opportunity', 'tech_web_career_opportunity')->name('career.opportunity');
    Route::post('/career/oppoutunity/store', 'tech_web_career_opportunity_store')->name('career.oppoutunity.store');
    Route::get('/our/certification', 'tech_web_our_certification')->name('our.certification');
    Route::get('/our/certification', 'tech_web_our_certification')->name('our.certification');
    Route::get('/certificate/details/{id}', 'tech_web_certificate_details')->name('certificate.details');

    // blogs/new methods
    Route::get('/all/news/list', 'tech_web_all_blogs_list')->name('all.news.list');
    Route::get('/news/details/{id}', 'tech_web_blog_details')->name('news.details');

    // blogs/new methods
    Route::get('/social/response', 'tech_web_social_response')->name('social.response');
    Route::get('/social/response/details/{id}', 'tech_web_social_response_details')->name('social.response.details');
    // privacy policy
    Route::get('/privacy/policy', 'tech_web_privacy_policy')->name('privacy.policy');
});

Route::get('/faq/list', [AdminController::class, 'faq'])->name('faq.list');
Route::post('/faq/store', [AdminController::class, 'faqstore'])->name('faq.store');
Route::get('/delete/faq/{id}', [AdminController::class, 'faqdelete'])->name('delete.faq');



Route::controller(FVideoGalleryController::class)->group(function () {
    Route::get('/front/video.gallery', 'tech_web_video_gallery')->name('front.video.gallery');
    Route::get('/front/image.gallery', 'tech_web_image_gallery')->name('front.image.gallery');
});


Route::controller(FServiceController::class)->group(function () {
    Route::get('/all/fservices', 'tech_web_all_services')->name('all.fservices');
});
Route::controller(FcontactusController::class)->group(function () {
    Route::get('/contact/us', 'tech_web_contact_us')->name('contact.us');
    Route::post('/contactdata/store', [ContactController::class, 'tech_web_contactdata_store'])->name('contactdata.store');
});
Route::post('/cv/submit', [HomeController::class, 'tech_web_career_opportunity_store']);
Route::controller(F_EventController::class)->group(function () {

    Route::get('/all/event', 'tech_web_events')->name('frontend.events');
    Route::get('/events/detials/{id}', 'tech_web_events_detials')->name('events.detials');
});

// frontend all route end ======================================================================


// Agent (user role) routes
Route::middleware(['auth'])->controller(AgentController::class)->group(function () {
    Route::get('/agent/dashboard', 'agentDashboard')->name('agent.dashboard');
    Route::get('/agent/profile', 'agentProfile')->name('agent.profile');
    Route::patch('/agent/profile/update', 'agentProfileUpdate')->name('agent.profile.update');
    Route::get('/agent/change/password', 'agentChangePassword')->name('agent.change.password');
    Route::post('/agent/update/password', 'agentUpdatePassword')->name('agent.update.password');
    Route::get('/agent/logout', 'agentLogout')->name('agent.logout');
});


// beckend all routes///////////////////////////////////////////////////////////////////////////


// admin all route ..........................................
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/admin/logout', [AdminController::class, 'admin_destroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'tec_web_admin_profile'])->name('admin.profile');
    Route::post('/admin/profile/update', [AdminController::class, 'tec_web_admin_profile_update'])->name('admin.profile.update');
    Route::get('/change/password', [AdminController::class, 'tec_web_admin_change_password'])->name('change.password');
    Route::get('/admin/password/update', [AdminController::class, 'tec_web_admin_password_update'])->name('admin.password.update');

    // User management routes
    Route::controller(AgentController::class)->group(function () {
        Route::get('/all/users', 'index')->name('all.agents');
        Route::get('/user/active/{id}', 'userActive')->name('user.active');
        Route::get('/user/inactive/{id}', 'userInactive')->name('user.inactive');

        //agent commission routes
        Route::get('/agent/commission/add', 'addAgentCommission')->name('agent.commission.add');
        Route::post('/agent/commission/store', 'storeAgentCommission')->name('agent.commission.store');
        Route::get('/agent/commission/list', 'listAgentCommissions')->name('agent.commission.list');
        Route::get('/agent/commission/edit/{id}', 'editAgentCommission')->name('agent.commission.edit');
        Route::post('/agent/commission/update', 'updateAgentCommission')->name('agent.commission.update');
        Route::get('/agent/commission/delete/{id}', 'deleteAgentCommission')->name('agent.commission.delete');
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    //general setting all route start
    Route::controller(GeneralController::class)->group(function () {
        //banner and title all route
        Route::get('/general/setting', 'tech_web_general_settings')->name('general.setting');
        Route::post('/banner/title/store', 'tech_web_banner_title_store')->name('banner.title.store');
        Route::get('/edit/banner/title/{id}', 'tech_web_edit_banner_title')->name('edit.banner.title');
        Route::post('/banner/title/update', 'tech_web_banner_title_update')->name('banner.title.update');
        Route::get('/delete/banner/title/{id}', 'tech_web_delete_banner_title')->name('delete.banner.title');
        Route::get('/banner/title/inactive/{id}', 'tec_web_banner_title_inactive')->name('banner.title.inactive');
        Route::get('/banner/title/active/{id}', 'tec_web_banner_title_active')->name('banner.title.active');

        // logo setting route
        Route::post('/logo/store', 'tec_web_logo_store')->name('logo.store');
        // websitelink setting route
        Route::post('/websitelink/store', 'tec_web_websitelink_store')->name('websitelink.store');
        // website banner setting route
        Route::post('/website/banner/store', 'tec_web_website_banner_store')->name('website.banner.store');
        Route::get('/edit/website/banner/{id}', 'tec_web_edit_website_banner')->name('edit.website.banner');
        Route::post('/website/banner/update', 'tec_web_website_banner_update')->name('website.banner.update');
        Route::get('/website/banner/delete/{id}', 'tec_web_website_banner_delete')->name('delete.website.banner');
        Route::get('/website/banner/inactive/{id}', 'tec_web_website_banner_inactive')->name('website.banner.inactive');
        Route::get('/website/banner/active/{id}', 'tec_web_website_banner_active')->name('website.banner.active');
        // footer data setting route
        Route::post('/footer/store', 'tec_web_footer_store')->name('footer.store');
    });
    //general setting all route end

    //Service setting all route
    Route::controller(ServiceController::class)->group(function () {
        Route::get('/all/services', 'tech_web_all_services')->name('all.services');
        Route::get('/add/services', 'tech_web_add_services')->name('add.services');
        Route::post('/service/store', 'tech_web_service_store')->name('service.store');
        Route::get('/edit/service/{id}', 'tec_web_edit_service')->name('edit.service');
        Route::post('/update/store', 'tec_web_update_store')->name('update.store');
        Route::get('/delete/service/{id}', 'tec_web_delete_service')->name('delete.service');
        Route::get('/service/inactive/{id}', 'tec_web_service_inactive')->name('service.inactive');
        Route::get('/service/active/{id}', 'tec_web_service_active')->name('service.active');
    });

    //about setting all route end
    Route::controller(AboutController::class)->group(function () {
        Route::get('/about/setting', 'tech_web_about_setting')->name('about.setting');
        Route::post('/about/update/store', 'tech_web_about_store_and_update')->name('about.update.store');
        Route::get('/about/owner', 'tech_web_about_owner')->name('about.owner');
        Route::post('/owner/store', 'tech_web_about_owner_store')->name('owner.store');
    });

    //privacy  setting all route
    Route::controller(PrivacyController::class)->group(function () {
        Route::get('/privacy/setting', 'tech_web_privacy_setting')->name('privacy.setting');
        Route::post('/privacy/store', 'tech_web_privacy_store')->name('privacy.store');
    });

    //Team/teacher setting all route
    Route::controller(TeamController::class)->group(function () {
        Route::get('/all/team', 'tech_web_all_team')->name('all.team');
        Route::get('/add/team', 'tech_web_add_team')->name('add.team');
        Route::post('/team/store', 'tech_web_team_store')->name('team.store');
        Route::get('/edit/team/{id}', 'tec_web_edit_team')->name('edit.team');
        Route::post('/update/team', 'tec_web_update_team')->name('update.team');
        Route::get('/delete/team/{id}', 'tec_web_delete_team')->name('delete.team');
        Route::get('/team/inactive/{id}', 'tec_web_team_inactive')->name('team.inactive');
        Route::get('/team/active/{id}', 'tec_web_team_active')->name('team.active');
    });

    //blogs setting all route
    Route::controller(BlogController::class)->group(function () {
        Route::get('/all/blogs', 'tech_web_all_blogs')->name('all.blogs');
        Route::get('/add/blogs', 'tech_web_add_blogs')->name('add.blogs');
        Route::post('/blogs/store', 'tech_web_blogs_store')->name('blogs.store');
        Route::get('/edit/blogs/{id}', 'tec_web_edit_blogs')->name('edit.blogs');
        Route::post('/update/blogs', 'tec_web_update_blogs')->name('update.blogs');
        Route::get('/delete/blogs/{id}', 'tec_web_delete_blogs')->name('delete.blogs');
        Route::get('/blogs/inactive/{id}', 'tec_web_blogs_inactive')->name('blogs.inactive');
        Route::get('/blogs/active/{id}', 'tec_web_blogs_active')->name('blogs.active');
    });

    //social workd all route
    Route::controller(SocialWorkController::class)->group(function () {
        Route::get('/all/social/work', 'tech_web_all_social_work')->name('all.social.work');
        Route::get('/add/social/work', 'tech_web_add_social_work')->name('add.social.work');
        Route::post('/social/work/store', 'tech_web_social_work_store')->name('social.work.store');
        Route::get('/edit/social/work/{id}', 'tec_web_edit_social_work')->name('edit.social.work');
        Route::post('/update/social/work', 'tec_web_update_social_work')->name('update.social.work');
        Route::get('/delete/social/work/{id}', 'tec_web_delete_social_work')->name('delete.social.work');
        Route::get('/social/work/inactive/{id}', 'tec_web_social_work_inactive')->name('social.work.inactive');
        Route::get('/social/work/active/{id}', 'tec_web_social_work_active')->name('social.work.active');
    });

    //testimonial setting all route
    Route::controller(TestimonialController::class)->group(function () {
        Route::get('/all/testimonial_1', 'tech_web_all_testimonial')->name('all.testimonial_1');
        Route::get('/add/testimonial', 'tech_web_add_testimonial')->name('add.testimonial');
        Route::post('/testimonial/store', 'tech_web_testimonial_store')->name('testimonial.store');
        Route::get('/edit/testimonial/{id}', 'tec_web_edit_testimonial')->name('edit.testimonial');
        Route::post('/testimonial/update', 'tec_web_testimonial_update')->name('testimonial.update');
        Route::get('/delete/testimonial/{id}', 'tec_web_delete_testimonial')->name('delete.testimonial');
        Route::get('/testimonial/inactive/{id}', 'tec_web_testimonial_inactive')->name('testimonial.inactive');
        Route::get('/testimonial/active/{id}', 'tec_web_testimonial_active')->name('testimonial.active');
    });

    //video or Image Gallery setting all route
    Route::controller(GalleryController::class)->group(function () {
        Route::get('/all/image', 'tech_web_all_image')->name('all.image');
        Route::get('/add/image', 'tech_web_add_image')->name('add.image');
        Route::post('/image/store', 'tech_web_image_store')->name('image.store');
        Route::get('/image/edit/{id}', 'tec_web_edit_image')->name('edit.image');
        Route::post('/image/update', 'tec_web_image_update')->name('image.update');
        Route::get('/image/delete/{id}', 'tec_web_delete_image')->name('delete.image');
        Route::get('/image/inactive/{id}', 'tec_web_image_inactive')->name('image.inactive');
        Route::get('/image/active/{id}', 'tec_web_image_active')->name('image.active');

        Route::get('/all/video', 'tech_web_all_video')->name('all.video');
        Route::get('/add/video', 'tech_web_add_video')->name('add.video');
        Route::post('/video/store', 'tech_web_video_store')->name('video.store');
        Route::get('/video/edit/{id}', 'tec_web_edit_video')->name('edit.video');
        Route::post('/video/update', 'tec_web_video_update')->name('video.update');
        Route::get('/video/delete/{id}', 'tec_web_delete_video')->name('delete.video');
        Route::get('/video/inactive/{id}', 'tec_web_video_inactive')->name('video.inactive');
        Route::get('/video/active/{id}', 'tec_web_video_active')->name('video.active');
    });


    //Sponsor setting all route
    Route::controller(SponsorController::class)->group(function () {
        Route::get('/all/sponsor', 'tech_web_all_sponsor')->name('all.sponsor');
        Route::get('/add/sponsor', 'tech_web_add_sponsor')->name('add.sponsor');
        Route::post('/sponsor/store', 'tech_web_sponsor_store')->name('sponsor.store');
        Route::get('/sponsor/edit/{id}', 'tech_web_sponsor_edit')->name('sponsor.edit');
        Route::post('/sponsor/update', 'tech_web_sponsor_update')->name('sponsor.update');
        Route::get('/sponsor/delete/{id}', 'tech_web_sponsor_delete')->name('sponsor.delete');
        Route::get('/sponsor/inactive/{id}', 'tec_web_sponsor_inactive')->name('sponsor.inactive');
        Route::get('/sponsor/active/{id}', 'tec_web_sponsor_active')->name('sponsor.active');
    });

    //Sponsor setting all route
    Route::controller(CounterController::class)->group(function () {
        Route::get('/counter/icon', 'tech_web_counter_icon')->name('counter.icon');
        Route::post('/counter/icon/store', 'tech_web_counter_icon_store')->name('counter.icon.store');
        Route::get('/counter/image', 'tech_web_counter_image')->name('counter.image');
        Route::post('/counter/image/store', 'tech_web_counter_image_store')->name('counter.image.store');
    });

    //slider setting all route
    Route::controller(SliderController::class)->group(function () {
        Route::get('/slider/setting', 'tech_web_slider_setting')->name('all.slider');
        Route::get('/slider/add', 'tech_web_add_slider')->name('add.slider');
        Route::post('/slider/store', 'tech_web_slider_store')->name('slider.store');
        Route::get('/edit/slide/{id}r', 'tech_web_slider_edit')->name('edit.slider');
        Route::post('/update/slider', 'tech_web_slider_update')->name('slider.update');
        Route::get('/delete.slider/{id}', 'tech_web_slider_delete')->name('delete.slider');
        Route::get('/slider/inactive/{id}', 'tec_web_slider_inactive')->name('slider.inactive');
        Route::get('/slider/active/{id}', 'tec_web_slider_active')->name('slider.active');
    });

    //AgroProduct setting all route
    Route::controller(AgroProductController::class)->group(function () {
        Route::get('/all/agro_product', 'tech_web_agro_product')->name('all.agro_product');
        Route::get('/add/agro_product', 'tech_web_add_agro_product')->name('add.agro_product');
        Route::post('/agro_product/store', 'tech_web_agro_product_store')->name('agro_product.store');
        Route::get('/edit/agro_product/{id}', 'tech_web_edit_agro_product')->name('edit.agro_product');
        Route::post('/update/agro_product', 'tech_web_agro_product_update')->name('agro_product.update');
        Route::get('/delete/agro_product/{id}', 'tech_web_agro_product_delete')->name('delete.agro_product');
        Route::get('/agro_product/inactive/{id}', 'tec_web_agro_product_inactive')->name('agro_product.inactive');
        Route::get('/agro_product/active/{id}', 'tec_web_agro_product_active')->name('agro_product.active');
    });
    //ItFarm setting all route
    Route::controller(ItFarmController::class)->group(function () {
        Route::get('/all/itfarm/service', 'tech_web_all_itfarm_service')->name('all.itfarm.service');
        Route::get('/add/itservice', 'tech_web_add_itservice')->name('add.itservice');
        Route::post('/itservice/store', 'tech_web_it_service_store')->name('it_service.store');
        Route::get('/edit/itservice/{id}', 'tech_web_edit_itservice')->name('edit.itservice');
        Route::post('/update/itservice', 'tech_web_itservice_update')->name('itservice.update');
        Route::get('/delete/itservice/{id}', 'tech_web_itservice_delete')->name('delete.itservice');
        Route::get('/itservice/inactive/{id}', 'tec_web_itservice_inactive')->name('itservice.inactive');
        Route::get('/itservice/active/{id}', 'tec_web_itservice_active')->name('itservice.active');
    });
    //Event setting all route
    Route::controller(ProjectController::class)->group(function () {

        Route::get('/all/project', 'tech_web_all_project')->name('project.setting');
        Route::get('/add/project', 'tech_web_add_project')->name('add.project');
        Route::post('/project/store', 'tech_web_project_store')->name('project.store');
        Route::get('/edit/project/{id}', 'tech_web_edit_project')->name('edit.project');
        Route::post('/update/project', 'tech_web_project_update')->name('project.update');
        Route::get('/delete/project/{id}', 'tech_web_project_delete')->name('delete.project');
        Route::get('/project/inactive/{id}', 'tec_web_project_inactive')->name('project.inactive');
        Route::get('/project/active/{id}', 'tec_web_project_active')->name('project.active');

        Route::get('/all/ongoing/project', 'tech_web_all_ongoing_events')->name('all.ongoing.events');
        Route::get('/add/ongoing/project', 'tech_web_add_ongoing_events')->name('add.ongoing_event');
        Route::post('/ongoing/project/store', 'tech_web_ongoing_event_store')->name('ongoing.event.store');
        Route::get('/edit/ongoing/project/{id}', 'tech_web_edit_ongoing_event')->name('edit.ongoing.event');
        Route::post('/update/ongoing/project', 'tech_web_ongoing_event_update')->name('ongoing.event.update');
        Route::get('/delete/ongoing/project/{id}', 'tech_web_ongoing_event_delete')->name('delete.ongoing.event');
        Route::get('/ongoing/project/inactive/{id}', 'tec_web_ongoing_event_inactive')->name('ongoing.event.inactive');
        Route::get('/ongoing/project/active/{id}', 'tec_web_ongoing_event_active')->name('ongoing.event.active');

        Route::get('/all/upcomming/project', 'tech_web_all_upcomming_events')->name('all.upcomming.events');
        Route::get('/add/upcomming/project', 'tech_web_add_upcomming_events')->name('add.upcomming_event');
        Route::post('/upcomming/project/store', 'tech_web_upcomming_event_store')->name('upcomming.event.store');
        Route::get('/edit/upcomming/project/{id}', 'tech_web_edit_upcomming_event')->name('edit.upcomming.event');
        Route::post('/update/upcomming/project', 'tech_web_upcomming_event_update')->name('upcomming.event.update');
        Route::get('/delete/upcomming/project/{id}', 'tech_web_upcomming_event_delete')->name('delete.upcomming.event');
        Route::get('/upcomming/project/inactive/{id}', 'tec_web_upcomming_event_inactive')->name('upcomming.event.inactive');
        Route::get('/upcomming/project/active/{id}', 'tec_web_upcomming_event_active')->name('upcomming.event.active');

        Route::get('/all/completed/project', 'tech_web_all_completed_events')->name('all.completed.events');
        Route::get('/add/completed/project', 'tech_web_add_completed_events')->name('add.completed_event');
        Route::post('/completed/project/store', 'tech_web_completed_event_store')->name('completed.event.store');
        Route::get('/edit/completed/project/{id}', 'tech_web_edit_completed_event')->name('edit.completed.event');
        Route::post('/update/completed/project', 'tech_web_completed_event_update')->name('completed.event.update');
        Route::get('/delete/completed/project/{id}', 'tech_web_completed_event_delete')->name('delete.completed.event');
        Route::get('/completed/project/inactive/{id}', 'tec_web_completed_event_inactive')->name('completed.event.inactive');
        Route::get('/completed/project/active/{id}', 'tec_web_completed_event_active')->name('completed.event.active');
    });

    //Event Real estate setting all route
    Route::controller(EventController::class)->group(function () {
        Route::get('/all/ongoing/events', 'tech_web_all_events')->name('all.event');
        Route::get('/add/event', 'tech_web_add_events')->name('add.event');
        Route::post('/event/store', 'tech_web_event_store')->name('event.store');
        Route::get('/edit/event/{id}', 'tech_web_edit_event')->name('edit.event');
        Route::post('/update/event', 'tech_web_event_update')->name('event.update');
        Route::get('/delete/event/{id}', 'tech_web_event_delete')->name('delete.event');
        Route::get('/event/inactive/{id}', 'tec_web_event_inactive')->name('event.inactive');
        Route::get('/event/active/{id}', 'tec_web_event_active')->name('event.active');
    });

    //Real estate Category setting all route
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/all/category', 'tech_web_all_category')->name('all.category');
        Route::get('/add/category', 'tech_web_add_category')->name('add.category');
        Route::post('/category/store', 'tech_web_category_store')->name('category.store');
        Route::get('/edit/category/{id}', 'tech_web_edit_category')->name('edit.category');
        Route::post('/update/category', 'tech_web_category_update')->name('category.update');
        Route::get('/delete/category/{id}', 'tech_web_category_delete')->name('delete.category');
        Route::get('/category/inactive/{id}', 'tec_web_category_inactive')->name('category.inactive');
        Route::get('/category/active/{id}', 'tec_web_category_active')->name('category.active');
    });
    //certificate  setting all route
    Route::controller(CertificateController::class)->group(function () {
        Route::get('/all/certificate', 'tech_web_all_certificate')->name('all.certificate');
        Route::get('/add/certificate', 'tech_web_add_certificate')->name('add.certificate');
        Route::post('/certificate/store', 'tech_web_certificate_store')->name('certificate.store');
        Route::get('/edit/certificate/{id}', 'tech_web_edit_certificate')->name('edit.certificate');
        Route::post('/update/certificate', 'tech_web_certificate_update')->name('certificate.update');
        Route::get('/delete/certificate/{id}', 'tech_web_certificate_delete')->name('delete.certificate');
        Route::get('/certificate/inactive/{id}', 'tec_web_certificate_inactive')->name('certificate.inactive');
        Route::get('/certificate/active/{id}', 'tec_web_certificate_active')->name('certificate.active');
    });

    // Project Categories and Subcategories routes
    Route::controller(ProjectCategoryController::class)->group(function () {
        Route::get('/all/project/category', 'index')->name('all.project_category');
        Route::get('/create/project/category', 'create')->name('create.project_category');
        Route::post('/store/project/category', 'store')->name('store.project_category');
        Route::get('/edit/project/category/{category}', 'edit')->name('edit.project_category');
        Route::put('/update/project/category/{category}', 'update')->name('update.project_category');
        Route::delete('/destroy/project/category/{category}', 'destroy')->name('destroy.project_category');
    });

    Route::controller(ProjectSubcategoryController::class)->group(function () {
        Route::get('/all/project/subcategory', 'index')->name('all.project_subcategory');
        Route::get('/create/project/subcategory', 'create')->name('create.project_subcategory');
        Route::post('/store/project/subcategory', 'store')->name('store.project_subcategory');
        Route::get('/edit/project/subcategory/{subcategory}', 'edit')->name('edit.project_subcategory');
        Route::put('/update/project/subcategory/{subcategory}', 'update')->name('update.project_subcategory');
        Route::delete('/destroy/project/subcategory/{subcategory}', 'destroy')->name('destroy.project_subcategory');
    });
});
