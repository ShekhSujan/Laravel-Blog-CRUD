<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.st-id', function() {
            alert('Are You Sure You Want To Update');
            var id = $(this).val();
            var status = $(this).prop('checked') === true ? 'inactive' : 'active';
            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-right"
            };
            if (id) {
                $.ajax({
                    url: '{{ route('blog_status') }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    data: {
                        id: id,
                        status: status
                    },
                    success: function(data) {

                        toastr.success(data.message);

                    }
                });
            }
        });
    });
</script>
