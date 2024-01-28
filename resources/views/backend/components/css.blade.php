<link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/backend/fonts/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/backend/css/main.css') }}">
<!-- Data Tables -->
<link rel="stylesheet" href="{{ asset('assets/backend/vendor/datatables/dataTables.bs4.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/backend/vendor/datatables/dataTables.bs4-custom.css') }}" />
<link href="{{ asset('assets/backend/vendor/datatables/buttons.bs.css') }}" rel="stylesheet" />

<link rel="stylesheet" href="{{ asset('assets/backend/vendor/summernote/summernote-bs4.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/backend/vendor/input-tags/tagsinput.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/backend/vendor/bs-select/bs-select.css') }}" />

<link rel="stylesheet" href="{{ asset('assets/backend/vendor/fileuploads/css/fileupload.css') }}" />
<link href="{{ asset('assets/backend/toastr/toastr.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
<style>
    .info-stats4 .info-icon {
        height: 35px !important;
        width: 35px !important;
    }


</style>
<script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>



<script type="text/javascript">
    function modalview(id) {
        var img = $('.img').val();
        //  alert(img);
        $('#adid').val(id);
        $('#img').val(img);
        //  alert(as);
    }

    function modalBulk(id) {
        $('#bulkid').val(id);
    }

    function modalview_app(id) {
        $('#id-app').val(id);
    }

    function modalstock(id) {
        $('#stid').val(id);
    }
</script>

<script>
    $(document).ready(function() {
        $("#chkSelectAll").on('click', function() {
            // alert('okk');
            this.checked ? $(".chkDel").prop("checked", true) : $(".chkDel").prop("checked", false);
        })
    })
</script>
