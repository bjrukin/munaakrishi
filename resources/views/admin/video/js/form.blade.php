<script>
$(document).ready(function() {
    $("#form").submit(function(e) {
        e.preventDefault();
        $('.btn-loading').prop('disabled', true);
        $('.btn-loading').html('<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Processing...');
        $.ajax({
            type: 'post',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                Swal.fire({
                    icon: "success",
                    title: data.message,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    timer: timer,
                    didOpen: () => {
                        document.querySelector('.swal2-timer-progress-bar').style.backgroundColor = 'green';
                    }
                });
                setTimeout(function() {
                    window.location.href = "{{route('admin.video')}}";
                }, timer);
            },
            error: function(xhr) {
                $('.btn-loading').prop('disabled', false);
                $('.btn-loading').html('Submit');
                var res = $.parseJSON(xhr.responseText);
                if (res.error || res.message) {
                    Swal.fire({
                        title: res.error ?? res.message,
                        showConfirmButton: false,
                        timerProgressBar: true,
                        allowOutsideClick: false,
                        timer: timer,
                        customClass: { title: 'swal2-left-title' },
                        didOpen: () => {
                            document.querySelector('.swal2-timer-progress-bar').style.backgroundColor = 'red';
                        }
                    });
                }
            }
        });
    });
});

function imageDelete(field_name) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
        title: 'Are you sure to delete this thumbnail?',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: false
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("admin.video.imagedelete")}}',
                type: 'POST',
                data: {
                    'id': '{{ ($row) ? $row->id : 0 }}',
                    'field_name': field_name,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(data) {
                    $("#btn_" + field_name + "_delete").addClass('d-none');
                    $("#display_" + field_name).addClass('d-none');
                    $(".dropify-message-" + field_name).removeClass('d-none').addClass('d-block');
                    $("#display_" + field_name).attr("src", '');
                    $("#" + field_name).val('');
                }
            });
        }
    });
}
</script>
