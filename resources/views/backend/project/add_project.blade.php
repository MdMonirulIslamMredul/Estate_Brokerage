@extends('admin_dashboard')
@section('title')
    Admin
@endsection
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <a href="{{ url('/all/project') }}"
                                    class="btn btn-primary rounded-pill waves-effect waves-light"><i
                                        class="fe-arrow-left"></i>All Project</a>
                            </ol>
                        </div>
                        <h4 class="page-title">Add Project</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <p class="text-white" style="font-size: 20px">Project Informantion</p>

                            <form id="myForm" method="post" action="{{ route('project.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="title_english" class="form-label">Project Name</label>
                                            <input type="text" name="property_name" id="property_name"
                                                class="form-control" placeholder="Project Name...">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="title" class="form-label">Project short Title</label>
                                            <input type="text" name="title" id="title" class="form-control"
                                                placeholder="Project title...">
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="title_english" class="form-label mb-2">Project Status <span
                                                    class="text-danger" style="font-size: 12px">(1 for Ongoing, 2 for
                                                    Upcomming, 3 for Completed)</span></label>
                                            <select name="property_status" id="" class="form-select"
                                                style="padding: 12px 3px">
                                                <option disabled selected>Select Project Type</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="price" class="form-label">Price </label>
                                            <input type="text" name="price" id="price" class="form-control"
                                                placeholder="price...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="discount" class="form-label">Discount </label>
                                            <input type="text" name="discount" id="discount" class="form-control"
                                                placeholder="discount...">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="commission" class="form-label">Agent Commission </label>
                                            <input type="text" name="commission" id="commission" class="form-control"
                                                placeholder="agent commission...">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="project_category" class="form-label mb-2">Project Category</label>
                                            <select name="project_category_id" id="project_category" class="form-select"
                                                style="padding: 12px 3px">
                                                <option disabled selected>Select Category</option>
                                                @php
                                                    $categories = \App\Models\ProjectCategory::where(
                                                        'status',
                                                        1,
                                                    )->get();
                                                @endphp
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="project_subcategory" class="form-label mb-2">Project
                                                Subcategory</label>
                                            <select name="project_subcategory_id" id="project_subcategory"
                                                class="form-select" style="padding: 12px 3px">
                                                <option disabled selected>Select Subcategory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="property_type" class="form-label mb-2">Property Mood</label>
                                            <select name="property_mood" id="" class="form-select"
                                                style="padding: 12px 3px">
                                                <option disabled selected>Select Project Size</option>
                                                <option value="Per katha">Per katha</option>
                                                <option value="sqr feet">sqr feet</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="property_size" class="form-label">Property Size </label>
                                            <input type="text" name="property_size" id="property_size"
                                                class="form-control" placeholder="Size...">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="title_english" class="form-label">Project Location </label>
                                            <input type="text" name="location_eng" id="location_eng"
                                                class="form-control" placeholder="Event location English...">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="title_english" class="form-label">Project Start Date </label>
                                            <input type="text" name="start_date" id="start_datepicker"
                                                class="form-control" placeholder="Event Start Date..."
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="title_english" class="form-label">Project End Date </label>
                                            <input type="text" name="end_date" id="end_datepicker"
                                                class="form-control" placeholder="Event End Date..." autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="title_english" class="form-label"> Bedrooms</label>
                                            <input type="text" name="bedrooms" id="bedrooms" class="form-control"
                                                placeholder="Bedrooms...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="bathrooms" class="form-label">Bathrooms </label>
                                            <input type="text" name="bathrooms" id="bathrooms" class="form-control"
                                                placeholder="Bathrooms...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="rooms" class="form-label">Rooms </label>
                                            <input type="text" name="rooms" id="rooms" class="form-control"
                                                placeholder="Rooms...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="rooms" class="form-label">Units </label>
                                            <input type="text" name="units" id="units" class="form-control"
                                                placeholder="Units...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="title_english" class="form-label"> Floors</label>
                                            <input type="text" name="floors" id="floors" class="form-control"
                                                placeholder="Floors...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="kitchens" class="form-label">Kitchens </label>
                                            <input type="text" name="kitchens" id="kitchens" class="form-control"
                                                placeholder="Kitchens...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="garages" class="form-label">Garages </label>
                                            <input type="text" name="garages" id="garages" class="form-control"
                                                placeholder="garages...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="drawing" class="form-label">drawing </label>
                                            <input type="text" name="drawing" id="drawing" class="form-control"
                                                placeholder="drawing...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="daining" class="form-label">Daining </label>
                                            <input type="text" name="daining" id="daining" class="form-control"
                                                placeholder="daining...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="belkuni" class="form-label">Belkuni </label>
                                            <input type="text" name="belkuni" id="belkuni" class="form-control"
                                                placeholder="belkuni...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="store_room" class="form-label">store_room </label>
                                            <input type="text" name="store_room" id="store_room" class="form-control"
                                                placeholder="store_room...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="lift" class="form-label">lift </label>
                                            <input type="text" name="lift" id="lift" class="form-control"
                                                placeholder="lift...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="face_type" class="form-label">face_type </label>
                                            <input type="text" name="face_type" id="face_type" class="form-control"
                                                placeholder="face_type...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="ploot_status" class="form-label">ploot_status </label>
                                            <input type="text" name="ploot_status" id="ploot_status"
                                                class="form-control" placeholder="ploot_status...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="main_road_size" class="form-label">main_road_size </label>
                                            <input type="text" name="main_road_size" id="main_road_size"
                                                class="form-control" placeholder="main_road_size...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="approved_by" class="form-label">approved_by </label>
                                            <input type="text" name="approved_by" id="approved_by"
                                                class="form-control" placeholder="approved_by...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="property_type" class="form-label">Property type </label>
                                            <input type="text" name="property_type" id="property_type"
                                                class="form-control" placeholder="Land or Apartment">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="property_video" class="form-label">Property Video </label>
                                            <input type="text" name="property_video" id="property_video"
                                                class="form-control" placeholder="property video...">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="map_link" class="form-label">Property Map Link </label>
                                            <input type="text" name="map_link" id="map_link" class="form-control"
                                                placeholder="Map link...">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="main_image" class="form-label">Plan Image</label>
                                            <input type="file" id="banner_image" name="banner_image"
                                                class="form-control">
                                        </div>
                                        <img src="{{ url('upload/no_image.jpg') }}" alt="" id="banner_image_show"
                                            class="avatar-lg img-thumbnail" alt="profile-image"
                                            style="width: 120px;height:120px">

                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="property_thumbnail" class="form-label">Main Image(460x440)
                                            </label>
                                            <input type="file" id="thumbnail" name="property_thumbnail"
                                                class="form-control">
                                        </div>
                                        <img src="{{ url('upload/no_image.jpg') }}" alt="" id="thumbnail_show"
                                            class="avatar-lg img-thumbnail" alt="profile-image"
                                            style="width: 120px;height:120px">

                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group mb-3">
                                            <label for="banner_image" class="form-label">Image1(460x440) </label>
                                            <input type="file" id="image1" name="image1" class="form-control">
                                        </div>
                                        <img src="{{ url('upload/no_image.jpg') }}" alt="" id="image1_show"
                                            class="avatar-lg img-thumbnail" alt="profile-image"
                                            style="width: 120px;height:120px">

                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group mb-3">
                                            <label for="details_image2" class="form-label"> Image2(460x440) </label>
                                            <input type="file" id="image2" name="image2" class="form-control">
                                        </div>
                                        <img src="{{ url('upload/no_image.jpg') }}" alt="" id="image2_show"
                                            class="avatar-lg img-thumbnail" alt="profile-image"
                                            style="width: 120px;height:120px">

                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group mb-3">
                                            <label for="details_image2" class="form-label"> Image3(460x440) </label>
                                            <input type="file" id="image3" name="image3" class="form-control">
                                        </div>
                                        <img src="{{ url('upload/no_image.jpg') }}" alt="" id="image3_show"
                                            class="avatar-lg img-thumbnail" alt="profile-image"
                                            style="width: 120px;height:120px">

                                    </div>


                                    <div class="col-lg-12 mt-2">
                                        <div class="form-group mb-3">
                                            <label for="short_des" class="form-label">Short Description </label>
                                            <textarea name="short_des" class="editor form-control" id="tinymce" cols="30" rows="5"
                                                placeholder="Agro Short Description English ...">
                                      </textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-2">
                                        <div class="form-group">
                                            <label for="long_des" class="form-label">Long Description </label>
                                            <textarea id="tinymce" class="editor form-control" col="10" row="15" name="long_des"
                                                placeholder=" Long Description ..."></textarea>
                                        </div>
                                    </div>

                                </div>
                                <!-- end row-->
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-success waves-effect waves-light "><i
                                            class="mdi mdi-content-save"></i>Submit</button>
                                </div>
                            </form>

                        </div> <!-- end card-body -->
                    </div> <!-- end card -->

                </div><!-- end col -->
            </div>
            <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->


    {{-- image view js  --}}
    <script>
        $(document).ready(function() {
            $('#banner_image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#banner_image_show').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('#thumbnail').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#thumbnail_show').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('#image1').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image1_show').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('#image2').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image2_show').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('#image3').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image3_show').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

        });
    </script>

    {{-- js form validation rules --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    property_name: {
                        required: true,
                    },
                    property_thumbnail: {
                        required: true,
                    },


                },

                messages: {
                    property_name: {
                        required: 'Please Enter Proptery Title',
                    },
                    property_thumbnail: {
                        required: 'Please Select Thumbnail Image',
                    },


                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });

            // Load subcategories on category select
            $('#project_category').on('change', function() {
                const categoryId = $(this).val();
                const subcategorySelect = $('#project_subcategory');
                subcategorySelect.html('<option disabled selected>Loading...</option>');

                if (categoryId) {
                    $.ajax({
                        url: '/api/project-subcategories/' + categoryId,
                        type: 'GET',
                        success: function(data) {
                            subcategorySelect.html(
                                '<option disabled selected>Select Subcategory</option>');
                            $.each(data, function(key, subcategory) {
                                subcategorySelect.append('<option value="' + subcategory
                                    .id + '">' + subcategory.name + '</option>');
                            });
                        },
                        error: function() {
                            subcategorySelect.html(
                                '<option disabled selected>Error loading subcategories</option>'
                            );
                        }
                    });
                } else {
                    subcategorySelect.html('<option disabled selected>Select Subcategory</option>');
                }
            });
        });
    </script>






    <script>
        $(function() {
            $("#start_datepicker").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd',

            });
        });
    </script>
    <script>
        $(function() {
            $("#end_datepicker").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd',

            });
        });
    </script>
@endsection
