

document.addEventListener('DOMContentLoaded', () => {
	if (typeof createHyphenator === 'undefined' || typeof hyphenationPatternsEnUs === 'undefined') {
		// console.warn('[YakCards] Hyphenation scripts not loaded');
		return;
	}

	const hyphenateText = createHyphenator(hyphenationPatternsEnUs);

	const applyHyphenation = () => {
		const cards = document.querySelectorAll('.yak-card');
		const isMobile = window.innerWidth < 768;

		// Force hyphenation on mobile or if any card < 400px
		const shouldRun = isMobile || Array.from(cards).some(card => card.offsetWidth < 400);

		if (!shouldRun) {
			// console.log('[YakCards] Skipping hyphenation — cards are wide');
			return;
		}

		// console.log('[YakCards] Running hyphenation');
		cards.forEach(card => {
			card.innerHTML = hyphenateText(card.innerHTML);
		});
	};

	// Debounce helper
	let resizeTimeout;
	window.addEventListener('resize', () => {
		clearTimeout(resizeTimeout);
		resizeTimeout = setTimeout(applyHyphenation, 200);
	});

	// Initial run
	applyHyphenation();
});


document.addEventListener('DOMContentLoaded', function () {
	document.querySelectorAll('.yak-card').forEach(card => {
		const contents = card.querySelector('.yak-card-contents-wrapper');
		if (contents && !contents.textContent.trim()) {
			card.classList.add('yak-card-empty-contents');
		}
	});
});
