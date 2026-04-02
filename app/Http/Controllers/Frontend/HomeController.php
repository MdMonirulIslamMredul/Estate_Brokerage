<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Notice;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\About;
use App\Models\AboutOwner;
use App\Models\Blog;
use App\Models\Sponsor;
use App\Models\Team;
use App\Models\Slider;
use App\Models\Category;
use App\Models\ImageGallery;
use App\Models\CompletedEvent;
use App\Models\OngoingEvent;
use App\Models\UpcommingEvent;
use App\Models\BannerAndTitle;
use App\Models\Business;
use App\Models\VideoGallery;
use App\Models\Faq;
use App\Models\Career;
use App\Models\Certificate;
use App\Models\Project;
use App\Models\CounterIcon;
use App\Models\CounterImage;
use App\Models\SocialWork;
use App\Models\ProjectCategory;
use App\Models\ProjectSubcategory;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Models\PrivacPolicy;

use Carbon\Carbon;

class HomeController extends Controller
{
    public function tech_web_home_index()
    {
        $testimonials = Testimonial::where('status', 1)->latest()->limit(5)->get();
        $social_works = Service::inRandomOrder()->get();
        $blogs = Blog::inRandomOrder()->get();
        $about = About::latest()->first();
        $brands = Sponsor::all();
        $category = Category::where('status', 1)->orderBy('id', 'DESC')->limit(10)->get();
        $teams = Team::inRandomOrder()->limit(4)->get();
        $slider = Slider::where('status', '1')->get();
        $img_gallery = ImageGallery::where('status', 1)->paginate(9);
        $projects = Project::where('status', 1)->with('projectCategory')->latest()->get();
        $video_gallery = VideoGallery::where('status', 1)->latest()->limit(2)->get();
        $faqs = Faq::where('status', 1)->latest()->limit(8)->get();
        $completed_project = Project::where('status', 1)->where('property_status', '3')->with('projectCategory')->inRandomOrder()->limit(4)->get();
        $ongoing_project = Project::where('status', 1)->where('property_status', '1')->with('projectCategory')->inRandomOrder()->limit(4)->get();
        $upcomming_project = Project::where('status', 1)->where('property_status', '2')->with('projectCategory')->inRandomOrder()->limit(4)->get();
        $counter_icon = CounterIcon::latest()->first();
        $sponsors = Sponsor::latest('id', 'DESC')->get();
        $projectCategories = ProjectCategory::where('status', 1)->orderBy('name', 'ASC')->get();
        return view('frontend.home.index', compact('sponsors', 'counter_icon', 'video_gallery', 'faqs', 'testimonials', 'social_works', 'about', 'blogs', 'brands', 'teams', 'slider', 'img_gallery', 'category', 'completed_project', 'projects', 'ongoing_project', 'upcomming_project', 'projectCategories'));
    } //end method------------------------

    public function tech_web_emi_calculator()
    {
        return view('frontend.service.emi_calculator');
    }

    public function tech_web_roi_calculator()
    {
        return view('frontend.service.roi_calculator');
    }

    public function tech_web_unit_converter()
    {
        return view('frontend.service.unit_converter');
    }

    public function tech_web_all_builders()
    {
        $sponsors = Sponsor::where('status', 1)->latest('id', 'DESC')->get();

        return view('frontend.builders.all_builders', compact('sponsors'));
    }

    public function tech_web_about_details()
    {
        $about = About::latest()->first();
        return view('frontend.about.about_details', compact('about'));
    } //end method-------------------

    //about owner details---------------------------
    public function tech_web_about_owner_details()
    {
        $owner = AboutOwner::latest()->first();
        $banner = BannerAndTitle::where('page', 'blogs')->where('status', 1)->first();
        return view('frontend.about.about_owner_details', compact('owner', 'banner'));
    } //end method-------------------

    //completd project list-------------------
    public function tech_web_completed_project()
    {
        $banner = BannerAndTitle::where('page', 'courses')->where('status', 1)->first();
        $all_project = Project::where('status', 1)->where('property_status', '3')->with('projectCategory')->orderBy('id', 'DESC')->get();
        return view('frontend.project.completed_project_list', compact('all_project', 'banner'));
    }
    //completd project details-------------------
    public function tech_web_completed_project_details($id)
    {
        $banner = BannerAndTitle::where('page', 'courses')->where('status', 1)->first();
        $completed = Project::findOrFail($id);
        return view('frontend.project.completed_project_details', compact('completed', 'banner'));
    }

    //ongoing project details-------------------
    public function tech_web_ongoing_project_details($id)
    {
        $banner = BannerAndTitle::where('page', 'courses')->where('status', 1)->first();
        $ongoing = OngoingEvent::findOrFail($id);
        return view('frontend.project.ongoing_project_details', compact('ongoing', 'banner'));
    }
    //upcomming project details-------------------
    public function tech_web_upcomming_project_details($id)
    {
        $banner = BannerAndTitle::where('page', 'courses')->where('status', 1)->first();
        $upcomming = UpcommingEvent::findOrFail($id);
        return view('frontend.project.upcomming_project_details', compact('upcomming', 'banner'));
    }
    //completed project list -------------------
    public function tech_web_completed_project_list(Request $request)
    {
        $banner = BannerAndTitle::where('page', 'courses')->where('status', 1)->first();
        $projectCategories = ProjectCategory::where('status', 1)->orderBy('name', 'ASC')->get();

        $categorySlug = $request->query('category');
        $subcategorySlug = $request->query('subcategory');

        $selectedCategory = null;
        $selectedSubcategory = null;

        $all_project = Project::query()
            ->where('status', 1)
            ->with(['projectCategory', 'projectSubcategory'])
            ->orderBy('id', 'DESC');

        if (!empty($categorySlug)) {
            $selectedCategory = ProjectCategory::where('status', 1)
                ->where('slug', $categorySlug)
                ->first();

            if ($selectedCategory) {
                $all_project->where('project_category_id', $selectedCategory->id);
            } else {
                $all_project->whereRaw('1 = 0');
            }
        }

        if (!empty($subcategorySlug)) {
            $subcategoryQuery = ProjectSubcategory::where('status', 1)
                ->where('slug', $subcategorySlug);

            if ($selectedCategory) {
                $subcategoryQuery->where('project_category_id', $selectedCategory->id);
            }

            $selectedSubcategory = $subcategoryQuery->first();

            if ($selectedSubcategory) {
                $all_project->where('project_subcategory_id', $selectedSubcategory->id);
            } else {
                $all_project->whereRaw('1 = 0');
            }
        }

        $all_project = $all_project->get();

        return view('frontend.project.all_porject', compact('all_project', 'banner', 'selectedCategory', 'selectedSubcategory', 'projectCategories'));
    }
    //business item mehtod -------------------
    public function tech_web_business_item_details($id)
    {
        $banner = BannerAndTitle::where('page', 'courses')->where('status', 1)->first();
        $business = Business::findOrFail($id);
        return view('frontend.business.business_item_view', compact('business', 'banner'));
    }
    //Service item mehtod -------------------
    public function tech_web_service_item_details($id)
    {
        $banner = BannerAndTitle::where('page', 'service')->where('status', 1)->first();
        $service = Service::findOrFail($id);
        return view('frontend.service.service_item_view', compact('service', 'banner'));
    }

    public function tech_web_ongoing_project()
    {
        $banner = BannerAndTitle::where('page', 'courses')->where('status', 1)->first();
        $all_project = Project::where('status', 1)->where('property_status', '1')->with('projectCategory')->orderBy('id', 'DESC')->get();
        return view('frontend.project.ongoing_project_list', compact('all_project', 'banner'));
    }
    public function tech_web_upcomming_project()
    {
        $banner = BannerAndTitle::where('page', 'courses')->where('status', 1)->first();
        $all_project = Project::where('status', 1)->where('property_status', '2')->with('projectCategory')->orderBy('id', 'DESC')->get();
        return view('frontend.project.upcomming_porject_list', compact('all_project', 'banner'));
    }
    // serch property start here-------------------------------
    public function tech_web_serch_property(Request $request)
    {
        // dd($request);
        $banner = BannerAndTitle::where('page', 'event')->where('status', 1)->first();

        $location = $request->location;
        $categorySlug = $request->property_type;
        $bedrooms = $request->bedrooms;
        $bathrooms = $request->bathrooms;
        $property_size = $request->property_size;
        // dd($property_size);

        $all_project = Project::query()
            ->where('status', 1)
            ->when(!empty($location), function ($query) use ($location) {
                return $query->where('location_eng', 'like', '%' . $location . '%');
            })
            ->when(!empty($categorySlug), function ($query) use ($categorySlug) {
                return $query->whereHas('projectCategory', function ($q) use ($categorySlug) {
                    $q->where('slug', $categorySlug);
                });
            })
            ->when(!empty($bedrooms), function ($query) use ($bedrooms) {
                return $query->where('rooms', 'like', '%' . $bedrooms . '%');
            })
            ->when(!empty($bathrooms), function ($query) use ($bathrooms) {
                return $query->where('bathrooms', 'like', '%' . $bathrooms . '%');
            })
            ->when(!empty($property_size), function ($query) use ($property_size) {
                return $query->where('property_size', 'like', '%' . $property_size . '%');
            })
            ->with('projectCategory')
            ->orderBy('id', 'DESC')
            ->get();

        //  dd($all_project);

        return view('frontend.project.search_project_list', compact('all_project', 'banner'));
    } //end method------------------

    public function tech_web_completed_serch(Request $request)
    {
        $banner = BannerAndTitle::where('page', 'event')->where('status', 1)->first();
        $ptype = $request->property_type;
        $location = $request->location_eng;
        $all_project = Project::where('property_status', 3)
            ->where('location_eng', 'like', '%' . $location . '%')
            ->where('property_type', 'like', '%' . $ptype . '%')
            ->with('projectCategory')
            ->get();
        if ($all_project != NULL) {
            return view('frontend.project.completed_project_list', compact('all_project', 'banner'));
        } else {
            return redirect('/serch-property/type-completed/')->with('message', 'No Property Found!!!');
        }
    }
    public function tech_web_upcomming_serch(Request $request)
    {
        $banner = BannerAndTitle::where('page', 'event')->where('status', 1)->first();
        $ptype = $request->property_type;
        $location = $request->location_eng;
        $all_project = Project::where('property_status', 2)
            ->where('location_eng', 'like', '%' . $location . '%')
            ->where('property_type', 'like', '%' . $ptype . '%')
            ->with('projectCategory')
            ->get();
        if ($all_project != NULL) {
            return view('frontend.project.upcomming_porject_list', compact('all_project', 'banner'));
        } else {
            return redirect('/serch-property/type-upcomming/')->with('message', 'No Property Found!!!');
        }
    }
    public function tech_web_ongoing_serch(Request $request)
    {
        $banner = BannerAndTitle::where('page', 'event')->where('status', 1)->first();
        $ptype = $request->property_type;
        $location = $request->location_eng;
        $all_project = Project::where('property_status', 1)
            ->where('location_eng', 'like', '%' . $location . '%')
            ->where('property_type', 'like', '%' . $ptype . '%')
            ->with('projectCategory')
            ->get();
        if ($all_project != NULL) {
            return view('frontend.project.ongoing_project_list', compact('all_project', 'banner'));
        } else {
            return redirect('/serch-property/type-ongoing/')->with('message', 'No Property Found!!!');
        }
    }
    // serch property end here-------------------------------

    public function tech_web_all_property()
    {
        $banner = BannerAndTitle::where('page', 'event')->where('status', 1)->first();
        $all_project = Project::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('frontend.project.all_porject', compact('all_project', 'banner'));
    }

    //mission and vission------------------
    public function tech_web_mission_vission()
    {
        $banner = BannerAndTitle::where('page', 'event')->where('status', 1)->first();
        $about = About::latest()->first();
        return view('frontend.about.mission_vission', compact('about', 'banner'));
    } //end method------------------

    //team members------------------
    public function tech_web_team_members()
    {
        $banner = BannerAndTitle::where('page', 'team')->where('status', 1)->first();
        $teams = Team::orderBy('committee')->get();
        return view('frontend.about.team_members', compact('teams', 'banner'));
    } //end method------------------

    //client Review/testimonials ------------------
    public function tech_web_client_review()
    {
        $banner = BannerAndTitle::where('page', 'testimonial')->where('status', 1)->first();
        $testimonials = Testimonial::where('status', 1)->get();
        return view('frontend.about.testimonials_page', compact('testimonials', 'banner'));
    } //end method------------------

    //career_opportunity ------------------
    public function tech_web_career_opportunity()
    {
        $banner = BannerAndTitle::where('page', 'team')->where('status', 1)->first();
        return view('frontend.about.career_oppourtinity_page', compact('banner'));
    } //end method------------------

    //social response------------------
    public function tech_web_social_response()
    {
        $social = SocialWork::where('status', 1)->get();
        $banner = BannerAndTitle::where('page', 'social_respon')->where('status', 1)->first();
        return view('frontend.about.social_response_page', compact('social', 'banner'));
    } //end method------------------
    public function tech_web_social_response_details($id)
    {
        $social_detials = SocialWork::find($id);
        $banner = BannerAndTitle::where('page', 'social_respon')->where('status', 1)->first();
        return view('frontend.about.social_response_details', compact('social_detials', 'banner'));
    } //end method------------------

    //career_opportunity_store ------------------
    public function tech_web_career_opportunity_store(Request $request)
    {
        $details = $request;
        Mail::to('contact@ajgroup.com.bd')->send(new SendEmail($details));
        $notification = array(
            'message' => 'Your Message Sent Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with('career_msg', 'Your Career Message Sent Successfully');
    } //end method------------------

    //certificates  ------------------
    public function tech_web_our_certification()
    {
        $certificate = Certificate::where('status', 1)->get();
        $banner = BannerAndTitle::where('page', 'certificate')->where('status', 1)->first();
        return view('frontend.about.certificate_page', compact('certificate', 'banner'));
    } //end method------------------
    //certificate details ------------------
    public function tech_web_certificate_details($id)
    {
        $certificate = Certificate::find($id);
        $banner = BannerAndTitle::where('page', 'certificate')->where('status', 1)->first();
        return view('frontend.about.certificate_details', compact('certificate', 'banner'));
    } //end method------------------

    // Blog Frontend site===================================================
    public function tech_web_all_blogs_list()
    {
        $banner = BannerAndTitle::where('page', 'media')->where('status', 1)->first();
        $blogs = Blog::where('status', 1)->paginate(10);
        return view('frontend.blog.blog_list', compact('blogs', 'banner'));
    } //end method ------------------------------------------

    public function tech_web_blog_details($id)
    {
        $banner = BannerAndTitle::where('page', 'media')->where('status', 1)->first();
        $blog_details = Blog::find($id);
        return view('frontend.blog.blog_details', compact('blog_details', 'banner'));
    }

    // privacy policy method
    public function tech_web_privacy_policy()
    {
        $policy = PrivacPolicy::latest()->first();
        return view('frontend.about.privacy_policy', compact('policy'));
    }
}
