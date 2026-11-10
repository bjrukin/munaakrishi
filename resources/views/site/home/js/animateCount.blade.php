<script>
    function animateCount(el, target) {
	let start = 0;
	const duration = 2000; // duration in ms
	const startTime = performance.now();

	function update(currentTime) {
		const elapsed = currentTime - startTime;
		const progress = Math.min(elapsed / duration, 1);
		const value = Math.floor(progress * target);
		el.textContent = value;
		if (progress < 1) {
			requestAnimationFrame(update);
		} else {
			el.textContent = target;
		}
	}
	requestAnimationFrame(update);
}
const counterEl = document.querySelector('.counter');
let counted = false;
const observer = new IntersectionObserver((entries) => {
	entries.forEach(entry => {
		if (entry.isIntersecting && !counted) {
			counted = true;
			const target = parseInt(counterEl.getAttribute('data-target'), 10);
			animateCount(counterEl, target);
		}
	});
}, {
	threshold: 0.6
});
observer.observe(counterEl);
</script>