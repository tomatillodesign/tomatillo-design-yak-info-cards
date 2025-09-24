<?php

/**
 * Yak Info Cards – Shared Wrapper Generator
 *
 * Wraps card content based on action type.
 *
 * @param string $content  Inner HTML of the card (already rendered).
 * @param array  $data     ACF row data (individual card).
 * @param array  $settings Block-level settings.
 * @return string          Full card markup with proper outer wrapper.
 */
function yak_info_cards_render_wrapper( string $content, array $data, array $settings = array(), string $uid = '' ): string {
	if ( empty( $uid ) ) {
		$uid = uniqid( 'yak-card-' );
	}

	$action     = sanitize_key( $data['action'] ?? 'default' );
	$link_url   = esc_url( $data['link_url'] ?? '' );
	$title_attr = esc_attr( strip_tags( $data['heading'] ?? '' ) );
	$type_class = 'yak-info-cards-type-' . sanitize_html_class( $data['type'] ?? 'default' );

	// Base classes
	$classes = array( 'yak-card-wrapper-link', $type_class, 'yak-info-cards-action-' . $action );

	// Build appropriate inner wrapper
	switch ( $action ) {
		case 'modal':
			$modal_id = $uid . '-modal'; // Ensure modal ID matches expected target

			$wrapped = sprintf(
				'<div id="%s" class="%s" role="button" tabindex="0" aria-label="%s" aria-controls="%s" data-yak-modal="%s">%s</div>',
				$uid,
				esc_attr( implode( ' ', $classes ) ),
				$title_attr,
				$modal_id,
				$modal_id,
				$content
			);
			break;

		case 'collapse':
			$wrapped = sprintf(
				'<div id="%s" class="%s" role="button" tabindex="0" data-yak-collapse="%s" aria-expanded="false" aria-controls="%s-content">%s</div>',
				$uid,
				esc_attr( implode( ' ', $classes ) ),
				$uid,
				$uid,
				$content
			);
			break;

		case 'default':
		default:
			if ( ! empty( $link_url ) ) {
				$wrapped = sprintf(
					'<a href="%s" class="%s" role="group" aria-label="%s">%s</a>',
					$link_url,
					esc_attr( implode( ' ', $classes ) ),
					$title_attr,
					$content
				);
			} else {
				$wrapped = sprintf(
					'<div class="%s" role="group" aria-label="%s">%s</div>',
					esc_attr( implode( ' ', $classes ) ),
					$title_attr,
					$content
				);
			}
			break;
	}

	// Add outer wrapper
	return sprintf(
		'<div class="yak-single-info-card-outer-wrapper">%s</div>',
		$wrapped
	);
}
