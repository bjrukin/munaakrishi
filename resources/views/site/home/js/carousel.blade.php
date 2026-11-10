<script>
$(document).ready(function() {
	$('#clients-carousel').owlCarousel({
		loop: true,
		margin: 25,
		navRewind: false,
		autoplay: true,
		autoplayTimeout: 4000,
		autoplayHoverPause: true,
		navText: [""],
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 3
			},
			1000: {
				items: 5
			}
		}
	});
	$('#testimonial-carousel').owlCarousel({
		loop: true,
		margin: 10,
		responsiveClass: true,
		nav: true,
		dots: false,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: true
			},
			600: {
				items: 2,
				nav: false
			},
			1000: {
				items: 1,
				nav: true,
				loop: true,
				margin: 20
			}
		},
		onInitialized: function() {
			// Add aria-labels to navigation buttons after initialization
			$('#testimonial .owl-prev').attr('aria-label', 'Previous testimonial');
			$('#testimonial .owl-next').attr('aria-label', 'Next testimonial');
		}
	});
})
</script>