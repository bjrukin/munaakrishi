<script>
$('#form').on('submit', function (event) {
    event.preventDefault();
    const button = $('.btn-loading').prop('disabled', true).text('Processing...');
    $.post($(this).attr('action'), $(this).serialize())
        .done(function (data) {
            Swal.fire({ icon: 'success', title: data.message, showConfirmButton: false, timer: timer });
            setTimeout(function () { window.location.href = "{{ route('admin.product-category') }}"; }, timer);
        })
        .fail(function (xhr) {
            button.prop('disabled', false).text('Submit');
            const res = xhr.responseJSON || {};
            Swal.fire({ icon: 'error', title: res.message || res.error || 'Unable to save the category.' });
        });
});
</script>
