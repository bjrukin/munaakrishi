<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/dist/boxicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.7.5/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput-jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.16.1/sweetalert2.all.min.js"></script>
<script>
let timer = 2000;
var loader = document.getElementById("preloader");
window.addEventListener("load", function() {
	loader.style.display = "none";
});
$(document).ready(function() {
	$("#back-top").hide();
	$(function() {
		$(window).scroll(function() {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});
		$('#back-top a').click(function() {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
});
</script>