<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
<!-- Tiny slider -->
<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/tiny-slider.js') }}"></script>
<script src="{{ asset('frontend/assets/js/easy_background.js') }}"></script>
<script src="{{ asset('frontend/assets/js/swiper.min.js') }}"></script>
<!-- Tobii -->
<script src="{{ asset('frontend/assets/js/tobii.min.js') }}"></script>
<!-- Choice js -->
<script src="{{ asset('frontend/assets/js/choices.min.js') }}"></script>
<!-- Icons -->
<script src="{{ asset('frontend/assets/js/feather.min.js') }}"></script>
<!-- Custom -->
<script src="{{ asset('frontend/assets/js/plugins.init.js') }}"></script>
<script src="{{ asset('frontend/assets/js/app.js') }}"></script>
{{-- js form validation --}}
<script src="{{ asset('frontend/assets/js/validate.min.js') }}"></script>
{{-- toastr js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
       case 'info':
       toastr.info(" {{ Session::get('message') }} ");
       break;
   
       case 'success':
       toastr.success(" {{ Session::get('message') }} ");
       break;
   
       case 'warning':
       toastr.warning(" {{ Session::get('message') }} ");
       break;
   
       case 'error':
       toastr.error(" {{ Session::get('message') }} ");
       break; 
    }
    @endif 
   </script>







