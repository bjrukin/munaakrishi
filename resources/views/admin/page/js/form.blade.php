<script>
$(document).ready(function() {
    var timer = 1800;

    if (typeof CKEDITOR !== 'undefined' && $('#description').length) {
        CKEDITOR.replace('description', {
            allowedContent: true,
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    }

    // Re-index all blocks inputs to maintain clean sequential order in PHP
    function reindexBlocks() {
        $('#blocks_accordion_container .block-card').each(function(index) {
            $(this).attr('data-block-index', index);
            $(this).find('.btn-add-block-item').attr('data-block-index', index);
            $(this).find('.block-items-container').attr('data-block-index', index);
            $(this).find('input, textarea, select').each(function() {
                var name = $(this).attr('name');
                if (name && name.startsWith('blocks[')) {
                    var newName = name.replace(/^blocks\[\d+\]/, 'blocks[' + index + ']');
                    $(this).attr('name', newName);
                }
            });
        });
        if ($('#blocks_accordion_container .block-card').length === 0) {
            $('#no_blocks_alert').removeClass('d-none');
        } else {
            $('#no_blocks_alert').addClass('d-none');
        }
    }

    // Add Block dynamically via server-side Blade template
    $('.add-block-btn').click(function() {
        var type = $(this).data('type');
        var label = $(this).data('label');
        var nextIndex = $('#blocks_accordion_container .block-card').length;

        $.ajax({
            url: "{{ route('admin.page.render_block') }}",
            type: "GET",
            data: {
                type: type,
                label: label,
                index: nextIndex
            },
            beforeSend: function() {
                $('#addBlockDropdown').prop('disabled', true);
            },
            complete: function() {
                $('#addBlockDropdown').prop('disabled', false);
            },
            success: function(html) {
                $('#no_blocks_alert').addClass('d-none');
                $('#blocks_accordion_container').append(html);
                reindexBlocks();
                var newCard = $('#blocks_accordion_container .block-card:last-child');
                newCard.find('.block-title-input').first().focus();
                $('html, body').animate({
                    scrollTop: newCard.offset().top - 80
                }, 300);
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Failed to add block',
                    text: 'Unable to load the block template. Please refresh and try again.'
                });
            }
        });
    });

    // Move Up
    $(document).on('click', '.btn-move-block-up', function() {
        var card = $(this).closest('.block-card');
        var prev = card.prev('.block-card');
        if (prev.length) {
            card.insertBefore(prev);
            reindexBlocks();
        }
    });

    // Move Down
    $(document).on('click', '.btn-move-block-down', function() {
        var card = $(this).closest('.block-card');
        var next = card.next('.block-card');
        if (next.length) {
            card.insertAfter(next);
            reindexBlocks();
        }
    });

    // Delete Block
    $(document).on('click', '.btn-delete-block', function() {
        var card = $(this).closest('.block-card');
        Swal.fire({
            title: 'Delete this block?',
            text: 'Are you sure you want to remove this block from the page?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it'
        }).then((result) => {
            if (result.isConfirmed) {
                card.remove();
                reindexBlocks();
            }
        });
    });

    // Live update block title in card header
    $(document).on('input', '.block-title-input', function() {
        var title = $(this).val() || 'No title';
        $(this).closest('.block-card').find('.block-display-subtitle').text('(' + title + ')');
    });

    // Dynamic repeater items inside blocks (aims, implementation, who_can_invest)
    $(document).on('click', '.btn-add-block-item', function() {
        var card = $(this).closest('.block-card');
        var blockIndex = card.attr('data-block-index') || 0;
        var container = card.find('.block-items-container');
        var count = container.find('.repeater-item-row').length + 1;
        var num = (count < 10 ? '0' : '') + count;

        var rowHtml = `
            <div class="input-group input-group-sm repeater-item-row">
                <span class="input-group-text bg-light text-muted row-number">${num}</span>
                <input type="text" class="form-control" name="blocks[${blockIndex}][data][items][]" value="" placeholder="Enter item statement...">
                <button type="button" class="btn btn-outline-danger btn-remove-block-item" title="Delete item"><i class="fa fa-trash"></i></button>
            </div>
        `;
        container.append(rowHtml);
        container.find('.repeater-item-row:last-child input').focus();
    });

    $(document).on('click', '.btn-remove-block-item', function() {
        var container = $(this).closest('.block-items-container');
        $(this).closest('.repeater-item-row').remove();
        container.find('.repeater-item-row').each(function(i) {
            var num = (i + 1 < 10 ? '0' : '') + (i + 1);
            $(this).find('.row-number').text(num);
        });
    });

    // Form Submit
    $("#form").submit(function(e) {
        e.preventDefault();
        $('.btn-loading').prop('disabled', true);
        $('.btn-loading').html(
            '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Saving...'
        );

        if (typeof CKEDITOR !== 'undefined' && CKEDITOR.instances.description) {
            CKEDITOR.instances.description.updateElement();
        }

        reindexBlocks();

        $.ajax({
            type: 'post',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                Swal.fire({
                    icon: "success",
                    title: data.message || 'Page updated successfully.',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    timer: timer,
                    didOpen: () => {
                        document.querySelector('.swal2-timer-progress-bar')
                            .style.backgroundColor = 'green';
                    }
                });
                setTimeout(function() {
                    window.location.href = "{{route('admin.page')}}";
                }, timer);
            },
            error: function(xhr) {
                $('.btn-loading').prop('disabled', false);
                $('.btn-loading').html('Submit');
                var res = {};
                try {
                    res = $.parseJSON(xhr.responseText);
                } catch(e) {}
                var errMsg = res.error || res.message || 'An error occurred while saving.';
                if (res.errors) {
                    errMsg = Object.values(res.errors).flat().join('<br>');
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

function imageDelete(field_name) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success me-2',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
        title: 'Are you sure you want to delete this image?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete',
        cancelButtonText: 'No',
        reverseButtons: false
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("admin.page.imagedelete")}}',
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
