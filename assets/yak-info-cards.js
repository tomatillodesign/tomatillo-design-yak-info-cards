

document.addEventListener('DOMContentLoaded', () => {
	if (typeof createHyphenator === 'undefined' || typeof hyphenationPatternsEnUs === 'undefined') {
		// console.warn('[YakCards] Hyphenation scripts not loaded');
		return;
	}

	const hyphenateText = createHyphenator(hyphenationPatternsEnUs);

	const applyHyphenation = () => {
		const cardGroups = document.querySelectorAll('.yak-info-cards-group');
		
		cardGroups.forEach(group => {
			const hyphenationSetting = group.getAttribute('data-yak-info-cards-hyphenation') || 'none';
			
			// Skip if hyphenation is disabled
			if (hyphenationSetting === 'none') {
				return;
			}
			
			const cards = group.querySelectorAll('.yak-card');
			const isMobile = window.innerWidth < 768;

			// Force hyphenation on mobile or if any card < 400px
			const shouldRun = isMobile || Array.from(cards).some(card => card.offsetWidth < 400);

			if (!shouldRun) {
				// console.log('[YakCards] Skipping hyphenation — cards are wide');
				return;
			}

			// console.log('[YakCards] Running hyphenation with setting:', hyphenationSetting);
			cards.forEach(card => {
				if (hyphenationSetting === 'title_only') {
					// Only hyphenate titles/headings
					const headings = card.querySelectorAll('h1, h2, h3, h4, h5, h6, .yak-card-heading');
					headings.forEach(heading => {
						heading.innerHTML = hyphenateText(heading.innerHTML);
					});
				} else if (hyphenationSetting === 'title_body') {
					// Hyphenate everything
					card.innerHTML = hyphenateText(card.innerHTML);
				}
			});
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





function rescaleYakCoverCard(cardEl) {
	const content = cardEl.querySelector('.yak-info-cards-cover-inner');
	if (!content) {
		console.warn('[YakCoverScale] Missing .yak-info-cards-cover-inner in:', cardEl);
		return;
	}

	// Reset scale (but preserve centering)
	content.style.transform = 'translate(-50%, -50%) scale(1)';
	content.style.height = 'auto';

	const cardHeight = cardEl.clientHeight;
	const contentHeight = content.scrollHeight;
	const padding = 16; // 1rem in px
	const maxContentHeight = cardHeight - padding * 2;

	console.log('[YakCoverScale] Rescaling card:', cardEl);
	console.log(`→ cardHeight: ${cardHeight}, contentHeight: ${contentHeight}, maxAllowed: ${maxContentHeight}`);

	if (contentHeight > maxContentHeight) {
		const scale = Math.min(maxContentHeight / contentHeight, 1);
		console.log(`[YakCoverScale] Overflow! Applying scale(${scale.toFixed(3)})`);
		content.style.transform = `translate(-50%, -50%) scale(${scale})`;
		content.style.height = `${maxContentHeight}px`;
	} else {
		console.log('[YakCoverScale] No scaling needed.');
	}
}


function debounce(fn, delay = 150) {
	let timer;
	return (...args) => {
		clearTimeout(timer);
		timer = setTimeout(() => fn(...args), delay);
	};
}

function initYakCoverCardScaling() {
	console.log('[YakCoverScale] Initializing…');

	const coverCards = document.querySelectorAll('.yak-card.yak-info-cards-type-cover');
	if (!coverCards.length) {
		console.warn('[YakCoverScale] No cover cards found.');
		return;
	}

	const resizeAll = debounce(() => {
		console.log('[YakCoverScale] Window resize triggered.');
		coverCards.forEach(rescaleYakCoverCard);
	}, 150);

	const resizeObserver = new ResizeObserver(entries => {
		console.log('[YakCoverScale] ResizeObserver: ' + entries.length + ' entries');
		coverCards.forEach(rescaleYakCoverCard);
	});

	coverCards.forEach(card => {
		console.log('[YakCoverScale] Setting up:', card);
		rescaleYakCoverCard(card);
		resizeObserver.observe(card);
	});

	window.addEventListener('resize', resizeAll);
}

document.addEventListener('DOMContentLoaded', () => {
	console.log('[YakCoverScale] DOMContentLoaded');
	initYakCoverCardScaling();
});
