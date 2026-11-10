<script>
$(document).ready(function() {

CKEDITOR.replace('description', {
	allowedContent: true,
	filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
	filebrowserUploadMethod: 'form'
});
	$("#form").submit(function(e) {
		e.preventDefault();
		$('.btn-loading').prop('disabled', true)
		$('.btn-loading').html('<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Processing...');
        CKEDITOR.instances.description.updateElement();
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
					window.location.href = "{{route('admin.history')}}";
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
						customClass: {
							title: 'swal2-left-title'
						},
						didOpen: () => {
							document.querySelector('.swal2-timer-progress-bar').style.backgroundColor = 'red';
						}
					});
				}
			}
		});
	});
});
</script>