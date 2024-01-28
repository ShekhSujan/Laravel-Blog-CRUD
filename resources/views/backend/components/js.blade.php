<script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/slimscroll/slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/slimscroll/custom-scrollbar.js') }}"></script>

<script src="{{ asset('assets/backend/js/main.js') }}"></script>
<!-- Data Tables -->
<script src="{{ asset('assets/backend/vendor/datatables/dataTables.min.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- Custom Data tables -->
<script src="{{ asset('assets/backend/vendor/datatables/custom/custom-datatables.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/datatables/custom/fixedHeader.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/input-tags/tagsinput-custom.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/input-tags/tagsinput.min.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/input-tags/typeahead.js') }}"></script>

<script src="{{ asset('assets/backend/vendor/bs-select/bs-select.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/jquery.easing.1.3.js') }}"></script>


<!-- Download / CSV / Copy / Print -->
<script src="{{ asset('assets/backend/vendor/datatables/buttons.min.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/datatables/html5.min.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/datatables/buttons.print.min.js') }}"></script>
<!-- Fullcalendar -->

<script src="{{ asset('assets/backend/vendor/fileuploads/js/fileupload.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,
            tabsize: 2
        });
    });
</script>

<script src="{{ asset('assets/backend/toastr/toastr.min.js') }}"></script>

{!! Toastr::message() !!}
