<script>
$('.switch-status').on('change', function () {
    const checkbox = $(this);
    const val = checkbox.is(':checked') ? 1 : 0;
    $.post("{{ route('admin.product-category.status') }}", { id: checkbox.data('id'), val: val, _token: '{{ csrf_token() }}' })
        .done(function (data) { checkbox.attr('data-status-value', val); Swal.fire({ icon: 'success', title: data.message, showConfirmButton: false, timer: timer }); })
        .fail(function (xhr) { checkbox.prop('checked', !val); const res = xhr.responseJSON || {}; Swal.fire({ icon: 'error', title: res.message || res.error || 'Unable to update status.' }); });
});

function changeRank(id, input) {
    $.post("{{ route('admin.product-category.rank') }}", { id: id, rank: input.value, _token: '{{ csrf_token() }}' })
        .done(function (data) { Swal.fire({ icon: 'success', title: data.message, showConfirmButton: false, timer: timer }); })
        .fail(function (xhr) { const res = xhr.responseJSON || {}; Swal.fire({ icon: 'error', title: res.message || res.error || 'Unable to update rank.' }); });
}

function deleteData(id) {
    Swal.fire({ title: 'Delete this product category?', text: 'Categories assigned to products cannot be deleted.', showCancelButton: true, confirmButtonText: 'Yes, delete it' }).then(function (result) {
        if (!result.isConfirmed) return;
        $.post("{{ route('admin.product-category.delete') }}", { id: id, _token: '{{ csrf_token() }}' })
            .done(function (data) { $('#tr' + id).remove(); Swal.fire({ icon: 'success', title: data.message, showConfirmButton: false, timer: timer }); })
            .fail(function (xhr) { const res = xhr.responseJSON || {}; Swal.fire({ icon: 'error', title: res.message || res.error || 'Unable to delete the category.' }); });
    });
}
</script>
