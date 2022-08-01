<!-- Vendor JS Files -->

<script src = "{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src = "{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src = "{{ asset('frontend/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src = "{{ asset('frontend/assets/vendor/purecounter/purecounter.js')}}"></script>
<script src = "{{ asset('frontend/assets/vendor/aos/aos.js')}}"></script>
<script src = "{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src = "{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src = "{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src = "{{ asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>

 {{--datatable--}}
 <script type="text/javascript" src="{{ asset('admin_assets/plugins/jquery.dataTables/jquery.dataTables.min.js') }}"></script>
 <script type="text/javascript" src="{{ asset('admin_assets/plugins/dataTables.bootstrap/dataTables.bootstrap.min.js') }}"></script>
 <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>



<!-- Template Main JS File -->
<script src = "{{ asset('frontend/assets/js/main.js')}}"></script>


@yield('script')

