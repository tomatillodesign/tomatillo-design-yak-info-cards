<?php

function yak_info_cards_get_group_attributes( array $settings ): array {
	$classes = [ 'yak-info-cards-group' ];
	$data    = [];

	// Columns
	if ( ! empty( $settings['td_info_cards_number_of_columns'] ) ) {
		$cols = (int) $settings['td_info_cards_number_of_columns'];
		$classes[] = 'yak-info-cards-cols-' . $cols;
		$data['yak-info-cards-columns'] = $cols;
	}

	// Layout (only used if 1 column)
	if ( $cols === 1 && ! empty( $settings['td_info_cards_single_column_layout'] ) ) {
		$layout = sanitize_html_class( $settings['td_info_cards_single_column_layout'] );
		$classes[] = 'yak-info-cards-layout-' . $layout;
		$data['yak-info-cards-layout'] = $layout;
	}

	// Card type
	if ( ! empty( $settings['td_info_cards_type'] ) ) {
		$type = sanitize_html_class( $settings['td_info_cards_type'] );
		$classes[] = 'yak-info-cards-type-' . $type;
		$data['yak-info-cards-type'] = $type;
	}

	// Toggles
	foreach ( [
		'td_info_cards_include_sub_header' => 'subheadings',
		'td_info_cards_include_description' => 'descriptions',
		'td_info_cards_include_button'      => 'buttons',
	] as $field => $suffix ) {
		$val = ! empty( $settings[ $field ] );
		$classes[] = $val ? "yak-info-cards-has-{$suffix}" : "yak-info-cards-no-{$suffix}";
		$data[ "yak-info-cards-{$suffix}" ] = $val ? 'true' : 'false';
	}

	// Aspect ratio
	if ( ! empty( $settings['td_info_cards_aspect_ratio'] ) ) {
		$ratio = sanitize_html_class( $settings['td_info_cards_aspect_ratio'] );
		$classes[] = 'yak-info-cards-aspect-' . $ratio;
		$data['yak-info-cards-aspect'] = $ratio;
	}

	// Heading level
	if ( ! empty( $settings['td_info_cards_heading_level'] ) ) {
		$heading = sanitize_html_class( $settings['td_info_cards_heading_level'] );
		$data['yak-info-cards-heading-level'] = $heading;
	}

	return [
		'class' => implode( ' ', $classes ),
		'data'  => $data,
	];
}
