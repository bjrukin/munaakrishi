<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
$(document).ready(function() {
    try {
        if ($.fn.datepicker) {
            $('.date').datepicker();
        }
    } catch (e) {
        console.error('Datepicker init error:', e);
    }

    try {
        if (typeof CKEDITOR !== 'undefined' && $('#description').length) {
            CKEDITOR.replace('description', {
                allowedContent: true,
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ], false) }}",
                filebrowserUploadMethod: 'form'
            });
        }
    } catch (e) {
        console.error('CKEditor init error:', e);
    }

    $("#form").on("submit", function(e) {
        e.preventDefault();
        e.stopPropagation();

        $('.btn-loading').prop('disabled', true);
        $('.btn-loading').html('<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Processing...');

        if (typeof CKEDITOR !== 'undefined' && CKEDITOR.instances.description) {
            CKEDITOR.instances.description.updateElement();
        }

        var postUrl = $(this).attr('action') || '{{ route("admin.notice.store", [], false) }}';
        if (postUrl.indexOf('http://') === 0) {
            postUrl = postUrl.replace(/^http:\/\//i, 'https://');
        }

        $.ajax({
            type: 'POST',
            url: postUrl,
            data: $(this).serialize(),
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
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
                    window.location.href = "{{ route('admin.notice', [], false) }}";
                }, timer);
            },
            error: function(xhr) {
                $('.btn-loading').prop('disabled', false);
                $('.btn-loading').html('Submit');
                var res = xhr.responseJSON || {};
                if (!res.message && xhr.responseText) {
                    try {
                        res = JSON.parse(xhr.responseText);
                    } catch (err) {}
                }
                var errorMsg = res.error || res.message || 'An error occurred while saving.';
                Swal.fire({
                    title: errorMsg,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    timer: timer,
                    customClass: {
                        title: 'swal2-left-title'
                    },
                    didOpen: () => {
                        document.querySelector('.swal2-timer-progress-bar').style.backgroundColor = 'red';
                    }
                });
            }
        });

        return false;
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
        title: 'Are you sure to delete this?',
        text: "",
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: false
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("admin.notice.imagedelete", [], false) }}',
                type: 'POST',
                data: {
                    'id': '{{ ($row) ? $row->id : 0 }}',
                    'field_name': field_name,
                    '_token': '{{ csrf_token() }}'
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(data) {
                    $("#btn_" + field_name + "_delete").addClass('d-none');
                    $("#display_" + field_name).addClass('d-none');
                    $(".dropify-message-" + field_name).removeClass('d-none').addClass('d-block');
                    $("#display_" + field_name).attr("src", '');
                    $("#" + field_name).val('');
                }
            });
        } else {
            Swal.fire({
                icon: "error",
                title: 'Cancelled',
                showConfirmButton: false,
                timerProgressBar: true,
                allowOutsideClick: false,
                timer: timer,
                didOpen: () => {
                    document.querySelector('.swal2-timer-progress-bar').style.backgroundColor = 'red';
                }
            });
        }
    });
}
</script>
