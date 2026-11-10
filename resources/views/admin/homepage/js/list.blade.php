<script>
$(document).ready(function() {
    $('.switch-status').change(function() {
        var val = ($(this).attr('data-status-value') == 0) ? 1 : 0;
        $(this).attr("data-status-value", val);
        var id = $(this).attr('data-id');
        $.ajax({
            url: '{{ route("admin.homepage.status") }}',
            type: 'POST',
            data: {
                'id': id,
                'val': val,
                'field_name': 'is_enabled',
                '_token': '{{ csrf_token() }}'
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
            },
            error: function(xhr) {
                var res = $.parseJSON(xhr.responseText);
                if (res.error) {
                    Swal.fire({
                        title: res.error,
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

function changeOrder(id, selectElement) {
    let order = selectElement.value;
    $.ajax({
        url: '{{ route("admin.homepage.order") }}',
        type: 'POST',
        data: {
            'id': id,
            'order': order,
            '_token': '{{ csrf_token() }}'
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
                location.reload();
            }, timer);
        },
        error: function(xhr) {
            var res = $.parseJSON(xhr.responseText);
            if (res.error) {
                Swal.fire({
                    title: res.error,
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
}

function deleteComponent(id, name) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-danger me-2',
            cancelButton: 'btn btn-secondary'
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: 'Delete this component?',
        html: `Are you sure you want to remove <strong>${name}</strong>? This action cannot be undone.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it',
        cancelButtonText: 'Cancel',
        reverseButtons: false
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("admin.homepage.delete") }}',
                type: 'POST',
                data: {
                    'id': id,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#tr' + id).fadeOut(300, function() { $(this).remove(); });
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
                },
                error: function(xhr) {
                    var res = $.parseJSON(xhr.responseText);
                    if (res.error) {
                        Swal.fire({
                            title: res.error,
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
        }
    });
}
</script>
