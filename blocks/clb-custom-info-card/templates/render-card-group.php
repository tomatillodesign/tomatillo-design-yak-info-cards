<?php

function yak_render_card_group_block( array $block ): string {
	if ( ! have_rows( 'td_info_cards_repeater' ) ) {
		return '<div class="yak-info-cards-group-empty">No cards available.</div>';
	}

	// Get global group settings once
	$settings = get_field( 'td_info_cards_settings_group' );

	// Get class + data-* attributes
	$attrs       = yak_info_cards_get_group_attributes( $settings );
	$class_attr  = esc_attr( $attrs['class'] );

	// Append align class if present
	if ( ! empty( $block['align'] ) ) {
		$attrs['class'] .= ' align' . $block['align'];
	}
	$class_attr = esc_attr( $attrs['class'] );

	$data_attrs  = '';
	foreach ( $attrs['data'] as $key => $value ) {
		$data_attrs .= ' data-' . esc_attr( $key ) . '="' . esc_attr( $value ) . '"';
	}

	// Build output
	$output = "<div class=\"{$class_attr}\"{$data_attrs}>";
	while ( have_rows( 'td_info_cards_repeater' ) ) {
		the_row();
		$data = yak_get_card_data_from_row();
		$output .= yak_render_card( $data, $settings );
	}
	$output .= '</div>';

	return $output;
}

