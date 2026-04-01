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
                        <h4 class="page-title">Edit Project</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <p class="text-white" style="font-size: 20px">Project Informantion</p>

                            <form id="myForm" method="post" action="{{ route('project.update') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $edit_project->id }}">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="title_english" class="form-label">Project Name</label>
                                            <input type="text" name="property_name" id="property_name"
                                                class="form-control" value="{{ $edit_project->property_name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="title" class="form-label">Project short Title</label>
                                            <input type="text" name="title" id="title" class="form-control"
                                                value="{{ $edit_project->title }}" placeholder="Project title...">
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
                                                <option value="1"
                                                    {{ $edit_project->property_status == '1' ? 'selected' : '' }}>1</option>
                                                <option value="2"
                                                    {{ $edit_project->property_status == '2' ? 'selected' : '' }}>2</option>
                                                <option value="3"
                                                    {{ $edit_project->property_status == '3' ? 'selected' : '' }}>3</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="status" class="form-label mb-2">Active Status</label>
                                            <div class="d-flex align-items-center gap-4 mt-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status"
                                                        id="status_active" value="1"
                                                        {{ (int) ($edit_project->status ?? 1) === 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="status_active">Active</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status"
                                                        id="status_inactive" value="0"
                                                        {{ (int) ($edit_project->status ?? 1) === 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="status_inactive">Inactive</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="price" class="form-label">Price </label>
                                            <input type="text" name="price" id="price" class="form-control"
                                                value="{{ $edit_project->price }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="discount" class="form-label">Discount </label>
                                            <input type="text" name="discount" id="discount" class="form-control"
                                                value="{{ $edit_project->discount }}">
                                        </div>
                                    </div>


                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="commission" class="form-label">Agent Commission </label>
                                            <input type="text" name="commission" id="commission" class="form-control"
                                                value="{{ $edit_project->commission }}">
                                        </div>
                                    </div>


                                    <div class="col-lg-3">
                                        <div class="form-group mb-4">
                                            <label for="property_type" class="form-label mb-2">Property Mood</label>
                                            <select name="property_mood" id="" class="form-select"
                                                style="padding: 12px 3px">
                                                <option disabled selected>Select Project Size</option>
                                                <option value="Per katha"
                                                    {{ $edit_project->property_mood == 'Per katha' ? 'selected' : '' }}>Per
                                                    katha</option>
                                                <option value="sqr feet"
                                                    {{ $edit_project->property_mood == 'sqr feet' ? 'selected' : '' }}>sqr
                                                    feet</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="property_size" class="form-label">Property Size </label>
                                            <input type="text" name="property_size" id="property_size"
                                                class="form-control" value="{{ $edit_project->property_size }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="title_english" class="form-label">Project Location </label>
                                            <input type="text" name="location_eng" id="location_eng"
                                                class="form-control" value="{{ $edit_project->location_eng }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="title_english" class="form-label">Project Start Date </label>
                                            <input type="text" name="start_date" class="form-control"
                                                value="{{ $edit_project->start_date }}" id="start_datepicker"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="title_english" class="form-label">Project End Date </label>
                                            <input type="text" name="end_date" id="end_datepicker"
                                                class="form-control" value="{{ $edit_project->end_date }}"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="title_english" class="form-label"> Bedrooms</label>
                                            <input type="text" name="bedrooms" id="bedrooms" class="form-control"
                                                value="{{ $edit_project->bedrooms }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="bathrooms" class="form-label">Bathrooms </label>
                                            <input type="text" name="bathrooms" id="bathrooms" class="form-control"
                                                value="{{ $edit_project->bathrooms }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="rooms" class="form-label">Rooms </label>
                                            <input type="text" name="rooms" id="rooms" class="form-control"
                                                value="{{ $edit_project->rooms }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="rooms" class="form-label">Units </label>
                                            <input type="text" name="units" id="units" class="form-control"
                                                value="{{ $edit_project->units }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="title_english" class="form-label"> Floors</label>
                                            <input type="text" name="floors" id="floors" class="form-control"
                                                value="{{ $edit_project->floors }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="kitchens" class="form-label">Kitchens </label>
                                            <input type="text" name="kitchens" id="kitchens" class="form-control"
                                                value="{{ $edit_project->kitchens }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="garages" class="form-label">Garage </label>
                                            <input type="text" name="garages" id="garages" class="form-control"
                                                value="{{ $edit_project->garages }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="drawing" class="form-label">drawing </label>
                                            <input type="text" name="drawing" id="drawing"
                                                value="{{ $edit_project->drawing }}" class="form-control"
                                                placeholder="drawing...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="daining" class="form-label">Daining </label>
                                            <input type="text" name="daining" id="daining"
                                                value="{{ $edit_project->daining }}" class="form-control"
                                                placeholder="daining...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="belkuni" class="form-label">Belkuni </label>
                                            <input type="text" name="belkuni" id="belkuni"
                                                value="{{ $edit_project->belkuni }}" class="form-control"
                                                placeholder="belkuni...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="store_room" class="form-label">store_room </label>
                                            <input type="text" name="store_room" id="store_room"
                                                value="{{ $edit_project->store_room }}" class="form-control"
                                                placeholder="store_room...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="lift" class="form-label">lift </label>
                                            <input type="text" name="lift" id="lift" class="form-control"
                                                value="{{ $edit_project->lift }}" placeholder="lift...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="face_type" class="form-label">face_type </label>
                                            <input type="text" name="face_type" id="face_type"
                                                value="{{ $edit_project->face_type }}" class="form-control"
                                                placeholder="face_type...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="ploot_status" class="form-label">ploot_status </label>
                                            <input type="text" name="ploot_status" id="ploot_status"
                                                value="{{ $edit_project->ploot_status }}" class="form-control"
                                                placeholder="ploot_status...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="main_road_size" class="form-label">main_road_size </label>
                                            <input type="text" name="main_road_size" id="main_road_size"
                                                value="{{ $edit_project->main_road_size }}" class="form-control"
                                                placeholder="main_road_size...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="approved_by" class="form-label">approved_by </label>
                                            <input type="text" name="approved_by" id="approved_by"
                                                class="form-control" value="{{ $edit_project->approved_by }}"
                                                placeholder="approved_by...">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="property_type" class="form-label">Property type </label>
                                            <input type="text" name="property_type" id="property_type"
                                                class="form-control" value="{{ $edit_project->property_type }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="property_video" class="form-label">Property Video </label>
                                            <input type="text" name="property_video" id="property_video"
                                                class="form-control" value="{{ $edit_project->property_video }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="map_link" class="form-label">Property Map Link </label>
                                            <input type="text" name="map_link" id="map_link" class="form-control"
                                                value="{{ $edit_project->map_link }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="main_image" class="form-label">Plan Image</label>
                                            <input type="file" id="banner_image" name="banner_image"
                                                class="form-control">
                                        </div>
                                        <img src="{{ !empty($edit_project->banner_image) ? asset($edit_project->banner_image) : url('upload/no_image.jpg') }}"
                                            alt="" id="banner_image_show" class="avatar-lg img-thumbnail"
                                            alt="profile-image" style="width: 120px;height:120px">

                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group mb-3">
                                            <label for="property_thumbnail" class="form-label">Main Image(460x440)
                                            </label>
                                            <input type="file" id="thumbnail" name="property_thumbnail"
                                                class="form-control">
                                        </div>
                                        <img src="{{ !empty($edit_project->property_thumbnail) ? asset($edit_project->property_thumbnail) : url('upload/no_image.jpg') }}"
                                            alt="" id="thumbnail_show" class="avatar-lg img-thumbnail"
                                            alt="profile-image" style="width: 120px;height:120px">

                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group mb-3">
                                            <label for="banner_image" class="form-label">Image1(460x440) </label>
                                            <input type="file" id="image1" name="image1" class="form-control">
                                        </div>
                                        <img src="{{ !empty($edit_project->image1) ? asset($edit_project->image1) : url('upload/no_image.jpg') }}"
                                            alt="" id="image1_show" class="avatar-lg img-thumbnail"
                                            alt="profile-image" style="width: 120px;height:120px">

                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group mb-3">
                                            <label for="details_image2" class="form-label"> Image2(460x440) </label>
                                            <input type="file" id="image2" name="image2" class="form-control">
                                        </div>
                                        <img src="{{ !empty($edit_project->image2) ? asset($edit_project->image2) : url('upload/no_image.jpg') }}"
                                            alt="" id="image2_show" class="avatar-lg img-thumbnail"
                                            alt="profile-image" style="width: 120px;height:120px">

                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group mb-3">
                                            <label for="details_image2" class="form-label"> Image3(460x440) </label>
                                            <input type="file" id="image3" name="image3" class="form-control">
                                        </div>
                                        <img src="{{ !empty($edit_project->image3) ? asset($edit_project->image3) : url('upload/no_image.jpg') }}"
                                            alt="" id="image3_show" class="avatar-lg img-thumbnail"
                                            alt="profile-image" style="width: 120px;height:120px">

                                    </div>


                                    <div class="col-lg-12 mt-2">
                                        <div class="form-group mb-3">
                                            <label for="short_des" class="form-label">Short Description </label>
                                            <textarea name="short_des" class="editor form-control" id="tinymce" cols="30" rows="5"
                                                placeholder="Agro Short Description English ...">
                                            {!! $edit_project->short_des !!}
                                      </textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-2">
                                        <div class="form-group">
                                            <label for="long_des" class="form-label">Long Description </label>
                                            <textarea id="tinymce" class="editor form-control" col="10" row="15" name="long_des"
                                                placeholder=" Long Description ...">
                                            {!! $edit_project->long_des !!}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <!-- end row-->
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-success waves-effect waves-light "><i
                                            class="mdi mdi-content-save"></i>Update</button>
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
                                '<option disabled>Select Subcategory</option>');
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
                    subcategorySelect.html('<option disabled>Select Subcategory</option>');
                }
            });
        });
    </script>



    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea',
            // content_css: 'dark',
            skin: "oxide-dark",
            content_css: "tinymce-5-dark"
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
