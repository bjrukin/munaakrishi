<script>
$(document).ready(function() {

    $("#frm_profile").submit(function(e) {
        e.preventDefault();
        $(this).find('.btn-loading').prop('disabled', true)
        $(this).find('.btn-loading').html(
            '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Processing...'
        );
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
                        document.querySelector('.swal2-timer-progress-bar')
                            .style.backgroundColor = 'green';
                    }
                });
                setTimeout(function() {
                    window.location.href = "{{route('admin.account.setting')}}";
                }, timer);
            },
            error: function(xhr) {
                $("#frm_profile").find('.btn-loading').prop('disabled', false);
                $("#frm_profile").find('.btn-loading').html('Submit');
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

    $("#frm_password").submit(function(e) {
        e.preventDefault();
        $(this).find('.btn-loading').prop('disabled', true)
        $(this).find('.btn-loading').html(
            '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Processing...'
        );
        $.ajax({
            type: 'post',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                Swal.fire({
                    icon: "success",
                    title: data.message,
                    text: 'Your are being logout now.',
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
                    window.location.href = "{{route('admin.logout')}}";
                }, timer);
            },
            error: function(xhr) {
                $("#frm_password").find('.btn-loading').prop('disabled', false);
                $("#frm_password").find('.btn-loading').html('Submit');
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
</script>