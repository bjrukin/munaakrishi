<script>
$(document).ready(function() {
    var dropAreaImage = document.querySelector('.drag-area-image');
    var image = dropAreaImage.querySelector('#drag-image');
    dropAreaImage.onclick = () => {
        image.click();
    };
    image.addEventListener('change', function() {
        file = this.files[0];
        var reader = new FileReader();
        reader.onloadend = function() {
            $("#btn_image_delete").removeClass('d-none');
            $("#display_image").removeClass('d-none');
            $("#image").val(reader.result);
            $("#display_image").attr("src", reader.result);
            $(".dropify-message-image").removeClass('d-block').addClass('d-none');
        }
        reader.readAsDataURL(file);
    });


    $('#frm_image').off('submit').on('submit', function(e) {
        e.preventDefault();
        $('.btn-loading').prop('disabled', true)
        $('.btn-loading').html(
            '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Loading...'
        );
        $.ajax({
            type: 'post',
            url: $('#frm_image').attr('action'),
            data: $("#frm_image").serialize(),
            success: function(data) {
                $('.btn-loading').prop('disabled', false);
                $('.btn-loading').html('Submit');
                $("#btn_image_delete").addClass('d-none');
                $("#display_image").addClass('d-none');
                $(".dropify-message-image").removeClass('d-none').addClass('d-block');
                $("#display_image").attr("src", '');
                $("#image").val('');
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
                $('[data-bs-target="#imageModal"][data-id="' + $('input[name="gallery_id"]')
                    .val() + '"]').click();
            },
            error: function(xhr) {
                $('.btn-loading').prop('disabled', false);
                $('.btn-loading').html('Submit');
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

    $("#btn_image_delete").click(function() {
        $("#btn_image_delete").addClass('d-none');
        $("#display_image").addClass('d-none');
        $(".dropify-message-image").removeClass('d-none').addClass('d-block');
        $("#display_image").attr("src", '');
        $("#image").val('');
    });

    $('.delete-image-btn').click(function() {
        const deletebtn = $(this);
        var id = $(this).data("id");
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
                    url: '{{ route("admin.gallery.imagesdelete")}}',
                    type: 'POST',
                    data: {
                        'id': id,
                        '_token': '{{ csrf_token() }}'
                    },
                    // success: function(data) {
                    //     deletebtn.parents('tr').remove();
                    //     toastr["success"](data.message);
                    // },
                    success: function(data) {
                        deletebtn.parents('tr').remove();
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
                });
            } else {
                result.dismiss === Swal.DismissReason.cancel
            }
        })
    });
});

function changeOrder(id, selectElement) {
    let order = selectElement.value;
    $.ajax({
        url: '{{route("admin.gallery.imageOrder")}}',
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
                    document.querySelector('.swal2-timer-progress-bar')
                        .style.backgroundColor = 'green';
                }
            });
            $('[data-bs-target="#imageModal"][data-id="' + $('input[name="gallery_id"]').val() + '"]')
                .click();
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
}
</script>