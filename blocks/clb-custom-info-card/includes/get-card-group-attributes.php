<?php

function yak_info_cards_get_group_attributes( array $settings ): array {
	$classes = array( 'yak-info-cards-group' );
	$data    = array();
	$style   = '';

	// Columns
	if ( ! empty( $settings['td_info_cards_number_of_columns'] ) ) {
		$cols                           = (int) $settings['td_info_cards_number_of_columns'];
		$classes[]                      = 'yak-info-cards-cols-' . $cols;
		$data['yak-info-cards-columns'] = $cols;
	}

	// Layout (only used if 1 column)
	if ( $cols === 1 && ! empty( $settings['td_info_cards_single_column_layout'] ) ) {
		$layout                        = sanitize_html_class( $settings['td_info_cards_single_column_layout'] );
		$classes[]                     = 'yak-info-cards-layout-' . $layout;
		$data['yak-info-cards-layout'] = $layout;
	}

	// Card type
	if ( ! empty( $settings['td_info_cards_type'] ) ) {
		$type                        = sanitize_html_class( $settings['td_info_cards_type'] );
		$classes[]                   = 'yak-info-cards-type-' . $type;
		$data['yak-info-cards-type'] = $type;
	}

	// Toggles
	foreach ( array(
		'td_info_cards_include_sub_header'  => 'subheadings',
		'td_info_cards_include_description' => 'descriptions',
		'td_info_cards_include_button'      => 'buttons',
	) as $field => $suffix ) {
		$val                                = ! empty( $settings[ $field ] );
		$classes[]                          = $val ? "yak-info-cards-has-{$suffix}" : "yak-info-cards-no-{$suffix}";
		$data[ "yak-info-cards-{$suffix}" ] = $val ? 'true' : 'false';
	}

	// Aspect ratio
	if ( ! empty( $settings['td_info_cards_aspect_ratio'] ) ) {
		$ratio                         = sanitize_html_class( $settings['td_info_cards_aspect_ratio'] );
		$classes[]                     = 'yak-info-cards-aspect-' . $ratio;
		$data['yak-info-cards-aspect'] = $ratio;
	} elseif ( $settings['td_info_cards_aspect_ratio'] == 0 ) {
		$classes[]                     = 'yak-info-cards-aspect-original';
		$data['yak-info-cards-aspect'] = 'original';
	}

	// Heading level
	if ( ! empty( $settings['td_info_cards_heading_level'] ) ) {
		$heading                              = sanitize_html_class( $settings['td_info_cards_heading_level'] );
		$data['yak-info-cards-heading-level'] = $heading;
	}

	// Automatic hyphenation
	if ( ! empty( $settings['td_info_cards_automatic_hyphenation'] ) ) {
		$hyphenation                        = sanitize_html_class( $settings['td_info_cards_automatic_hyphenation'] );
		$data['yak-info-cards-hyphenation'] = $hyphenation;
	}

	// Background color (raw RGBA values from ACF)
	if (
		isset(
			$settings['td_info_cards_card_background']['red'],
			$settings['td_info_cards_card_background']['green'],
			$settings['td_info_cards_card_background']['blue'],
			$settings['td_info_cards_card_background']['alpha']
		)
	) {
		$r = intval( $settings['td_info_cards_card_background']['red'] );
		$g = intval( $settings['td_info_cards_card_background']['green'] );
		$b = intval( $settings['td_info_cards_card_background']['blue'] );
		$a = floatval( $settings['td_info_cards_card_background']['alpha'] );

		// Sanity bounds
		if ( $r >= 0 && $r <= 255 && $g >= 0 && $g <= 255 && $b >= 0 && $b <= 255 && $a >= 0 && $a <= 1 ) {
			$classes[] = 'yak-info-cards-has-background-color';
			$style     = "--yak-info-cards-bg: rgba({$r}, {$g}, {$b}, {$a});";
		}
	}

	return array(
		'class' => implode( ' ', $classes ),
		'data'  => $data,
		'style' => $style,
	);
}
