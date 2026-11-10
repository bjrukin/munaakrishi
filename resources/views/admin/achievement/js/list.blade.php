<script>
$(document).ready(function() {
    $('.switch-status').change(function() {
        if ($(this).attr('data-status-value') == 0) {
            var val = 1;
        } else {
            var val = 0;
        }
        $(this).attr("data-status-value", val);
        var id = $(this).attr('data-id');
        $.ajax({
            url: '{{route("admin.achievement.status")}}',
            type: 'POST',
            data: {
                'id': id,
                'val': val,
                'field_name': 'status',
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
                        document.querySelector('.swal2-timer-progress-bar')
                            .style.backgroundColor = 'green';
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
                        customClass: {
                            title: 'swal2-left-title'
                        },
                        didOpen: () => {
                            document.querySelector('.swal2-timer-progress-bar')
                                .style.backgroundColor = 'red';
                        }
                    });
                }
            }
        });
    });
});
function deleteData(id) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: 'Are you sure to delete this?',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: false
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("admin.achievement.delete")}}',
                type: 'POST',
                data: {
                    'id': id,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(data) {
                    $("#tr" + id).remove();
                    Swal.fire({
                        icon: "success",
                        title: data.message,
                        showConfirmButton: false,
                        timerProgressBar: true,
                        allowOutsideClick: false,
                        timer: timer,
                        didOpen: () => {
                            document.querySelector(
                                    '.swal2-timer-progress-bar')
                                .style.backgroundColor = 'green';
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
                            customClass: {
                                title: 'swal2-left-title'
                            },
                            didOpen: () => {
                                document.querySelector(
                                        '.swal2-timer-progress-bar')
                                    .style.backgroundColor = 'red';
                            }
                        })
                    }
                }
            })
        }
    })

}
</script>