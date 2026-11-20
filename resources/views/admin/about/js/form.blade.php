<script>
$(document).ready(function() {
    var timer = 1800;

    // Initialize CKEditor for who_we_are_content
    if (typeof CKEDITOR !== 'undefined' && $('#who_we_are_content').length) {
        CKEDITOR.replace('who_we_are_content', {
            allowedContent: true,
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
            filebrowserUploadMethod: 'form',
            height: 240
        });
    }

    // Dynamic Aims repeater
    function refreshAimNumbers() {
        $('#aims_repeater_container .repeater-row').each(function(index) {
            var num = (index + 1 < 10 ? '0' : '') + (index + 1);
            $(this).find('.row-number').text(num);
        });
    }

    $('#btn_add_aim').click(function() {
        var count = $('#aims_repeater_container .repeater-row').length + 1;
        var num = (count < 10 ? '0' : '') + count;
        var rowHtml = `
            <div class="repeater-row input-group">
                <span class="input-group-text font-weight-bold text-muted bg-light row-number">${num}</span>
                <input type="text" name="aims_content[]" class="form-control" value="" placeholder="Enter objective statement...">
                <button type="button" class="btn btn-outline-danger btn-remove-row" title="Delete aim">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        `;
        $('#aims_repeater_container').append(rowHtml);
        $('#aims_repeater_container .repeater-row:last-child input').focus();
    });

    // Dynamic Strategy repeater
    $('#btn_add_strategy').click(function() {
        var rowHtml = `
            <div class="repeater-row input-group">
                <span class="input-group-text text-muted bg-light"><i class="fa fa-check text-success"></i></span>
                <input type="text" name="implementation_content[]" class="form-control" value="" placeholder="Enter implementation strategy point...">
                <button type="button" class="btn btn-outline-danger btn-remove-row" title="Delete point">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        `;
        $('#strategy_repeater_container').append(rowHtml);
        $('#strategy_repeater_container .repeater-row:last-child input').focus();
    });

    // Dynamic Investor repeater
    $('#btn_add_investor').click(function() {
        var rowHtml = `
            <div class="repeater-row input-group">
                <span class="input-group-text text-muted bg-light"><i class="fa fa-user-circle text-primary"></i></span>
                <input type="text" name="investment_content[]" class="form-control" value="" placeholder="e.g. Non-Resident Nepalis (NRNs)">
                <button type="button" class="btn btn-outline-danger btn-remove-row" title="Delete item">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        `;
        $('#investor_repeater_container').append(rowHtml);
        $('#investor_repeater_container .repeater-row:last-child input').focus();
    });

    // Remove row event delegation
    $(document).on('click', '.btn-remove-row', function() {
        var container = $(this).closest('#aims_repeater_container');
        $(this).closest('.repeater-row').remove();
        if (container.length) {
            refreshAimNumbers();
        }
    });

    // Form submission
    $("#form").submit(function(e) {
        e.preventDefault();

        if (typeof CKEDITOR !== 'undefined' && CKEDITOR.instances.who_we_are_content) {
            CKEDITOR.instances.who_we_are_content.updateElement();
        }

        var $btn = $('.btn-loading');
        $btn.prop('disabled', true);
        var originalBtnHtml = $btn.html();
        $btn.html('<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Saving...');

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                Swal.fire({
                    icon: "success",
                    title: data.message || 'Updated successfully!',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    timer: timer,
                    didOpen: () => {
                        document.querySelector('.swal2-timer-progress-bar').style.backgroundColor = 'green';
                    }
                });
                setTimeout(function() {
                    window.location.reload();
                }, timer);
            },
            error: function(xhr) {
                $btn.prop('disabled', false);
                $btn.html(originalBtnHtml);
                var res = {};
                try {
                    res = $.parseJSON(xhr.responseText);
                } catch(e) {}

                var errMsg = res.error || res.message || 'An error occurred while saving.';
                if (res.errors) {
                    var errorList = Object.values(res.errors).flat().join('<br>');
                    errMsg = errorList;
                }

                Swal.fire({
                    icon: "error",
                    title: 'Submission Failed',
                    html: errMsg,
                    showConfirmButton: true,
                    customClass: {
                        title: 'swal2-left-title'
                    }
                });
            }
        });
    });
});

// Delete image via AJAX
function imageDelete(field_name) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success me-2',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: 'Are you sure you want to remove this chart image?',
        text: 'The default chart image will be restored.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, remove it',
        cancelButtonText: 'No, keep it',
        reverseButtons: false
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("admin.about.imagedelete") }}',
                type: 'POST',
                data: {
                    'field_name': field_name,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(data) {
                    $("#btn_" + field_name + "_delete").addClass('d-none');
                    $("#display_" + field_name).addClass('d-none');
                    $(".dropify-message-" + field_name).removeClass('d-none').addClass('d-block');
                    $("#display_" + field_name).attr("src", '');
                    $("#" + field_name).val('');

                    Swal.fire({
                        icon: "success",
                        title: data.message || 'Image removed',
                        timer: 1500,
                        showConfirmButton: false
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: "error",
                        title: 'Failed to remove image',
                        showConfirmButton: true
                    });
                }
            });
        }
    });
}
</script>
