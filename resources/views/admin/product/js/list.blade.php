<script>
$(document).ready(function() {
    $('.switch-status').change(function() {
        var val = ($(this).attr('data-status-value') == 0) ? 1 : 0;
        $(this).attr("data-status-value", val);
        var id = $(this).attr('data-id');
        $.ajax({
            url: '{{route("admin.product.status")}}',
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
        url: '{{route("admin.product.order")}}',
        type: 'POST',
        data: {
            'id': id,
            'order': order,
            'order_field_name': 'order',
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
                window.location.href = "{{route('admin.product')}}";
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

function deleteData(id) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
        title: 'Are you sure to delete this product?',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: false
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("admin.product.delete")}}',
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
