<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->


        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="badge bg-success rounded-pill float-end">4</span>
                        <span> Dashboards </span>
                    </a>

                </li>


                <li class="menu-title mt-2">Apps</li>


                <li>
                    <a href="#sidebarUser" data-bs-toggle="collapse">
                        <i class="fe-settings me-1"></i>
                        <span>Agent Settings</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarUser">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.agents') }}">Agent Approval</a>
                            </li>
                            <li>
                                <a href="{{ route('agent.commission.add') }}">Add Agent Commission</a>
                            </li>
                            <li>
                                <a href="{{ route('agent.commission.list') }}">List Agent Commissions</a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#sidebarGeneral" data-bs-toggle="collapse">
                        <i class="fe-settings me-1"></i>
                        <span>General Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarGeneral">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('general.setting') }}">General Setting</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#sidebarAbout" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>About Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAbout">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('about.setting') }}">About </a>
                            </li>
                            <li>
                                <a href="{{ route('about.owner') }}">About Owner</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarSlider" data-bs-toggle="collapse">
                        <i class="fe-settings me-1"></i>
                        <span>Slider Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSlider">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.slider') }}">All Slider</a>
                            </li>
                            <li>
                                <a href="{{ route('add.slider') }}">Add Slider</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#sidebarProject" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Project Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarProject">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('project.setting') }}">Project Settings</a>
                            </li>
                            <li>
                                <a href="{{ route('all.ongoing.events') }}">Ongoing Project</a>
                            </li>
                            <li>
                                <a href="{{ route('all.upcomming.events') }}">Upcomming Project</a>
                            </li>
                            <li>
                                <a href="{{ route('all.completed.events') }}">Completed Project</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarProjectCategory" data-bs-toggle="collapse">
                        <i class="mdi mdi-folder-outline"></i>
                        <span>Project Categories</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarProjectCategory">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.project_category') }}">All Categories</a>
                            </li>
                            <li>
                                <a href="{{ route('create.project_category') }}">Add Category</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarProjectSubcategory" data-bs-toggle="collapse">
                        <i class="mdi mdi-folder-multiple-outline"></i>
                        <span>Project Subcategories</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarProjectSubcategory">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.project_subcategory') }}">All Subcategories</a>
                            </li>
                            <li>
                                <a href="{{ route('create.project_subcategory') }}">Add Subcategory</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarSocialwork" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Social Work</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSocialwork">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.social.work') }}">Social Work</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- <li>
                    <a href="#sidebarCategory" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Category Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCategory">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.category') }}">All Category</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}


                <li>
                    <a href="#sidebarService" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Services </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarService">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.services') }}">All Services</a>
                            </li>
                            <li>
                                <a href="{{ route('add.services') }}">Add Services</a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li>
                    <a href="#sidebarBusiness" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Business Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBusiness">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.agro_product') }}">Business Setting </a>
                            </li>


                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarEvent" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Event Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEvent">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.event') }}">Event Setting </a>
                            </li>


                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#sidebarTeacher" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Team/Team Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTeacher">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.team') }}">All Teams</a>
                            </li>
                            <li>
                                <a href="{{ route('add.team') }}">Add Teams</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarBlog" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Blog Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBlog">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.blogs') }}">All Blogs</a>
                            </li>
                            <li>
                                <a href="{{ route('add.team') }}">Add Blogs</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarTestimonial" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Testimonial Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTestimonial">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.testimonial_1') }}">All Testimonial </a>
                            </li>


                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarCertificate" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Certificate Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCertificate">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.certificate') }}">All Certificate </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarGallery" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Gallery Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarGallery">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.image') }}">Image Gallery</a>
                            </li>
                            <li>
                                <a href="{{ route('all.video') }}">Video Gallery</a>
                            </li>

                        </ul>
                    </div>
                </li>



                <li>
                    <a href="#sidebarSponsor" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Builder Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSponsor">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.sponsor') }}">Builders </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarCounter" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Counter Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCounter">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('counter.icon') }}">Counter Icon</a>
                            </li>
                            <li>
                                <a href="{{ route('counter.image') }}">Counter Image</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarfaq" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>FAQ Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarfaq">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('faq.list') }}">FAQ</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarPrivacy" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Privacy Policy</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarPrivacy">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('privacy.setting') }}">Privacy Policy</a>
                            </li>

                        </ul>
                    </div>
                </li>











            </ul>
        </div>
        </li>
        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
