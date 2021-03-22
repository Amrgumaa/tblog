<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<!-- <script src="{{ asset('admin/assets/plugins/jquery/jquery.min.js') }}"></script> -->
<!-- Bootstrap 4 -->
<!-- <script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> -->

<!-- AdminLTE App -->
<script src="{{ asset('admin/assets/dist/js/adminlte.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('admin/assets/plugins/select2/js/select2.full.min.js') }}"></script>

<!-- toastr -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if(Session::has('success'))
<script>
    toastr.success("{!!(Session::get('success')) !!}");
</script>
@endif
<!-- toastr -->
@yield('foot')
