<?php

function yak_render_card( array $card, array $settings = array() ): string {
	$card['type'] = $card['type'] ?? $settings['td_info_cards_type'] ?? 'default';
	$heading      = esc_html( $card['heading'] ?? '' );
	$subheading   = esc_html( $card['subheading'] ?? '' );
	$button       = esc_html( $card['button_text'] ?? '' );
	$link         = esc_url( $card['link'] ?? '#' );
	$action_type  = sanitize_html_class( $card['action'] ?? 'default' );

	$image_html = '';
	if ( ! empty( $card['image_id'] ) ) {
		$image_html = wp_get_attachment_image( $card['image_id'], 'large' );
	}

	$heading_level = $settings['td_info_cards_heading_level'] ?? 'h3';
	$heading_level = in_array( $heading_level, array( 'h2', 'h3', 'h4' ), true ) ? $heading_level : 'h3';

	$heading_html = $heading ? "<{$heading_level} class=\"yak-card-heading\">{$heading}</{$heading_level}>" : '';

	$subheading_html = '';
	if ( ( $settings['td_info_cards_include_sub_header'] ?? false ) && $subheading ) {
		$subheading_html = '<p class="yak-card-subheading">' . $subheading . '</p>';
	}

	$description_html = '';
	if ( ( $settings['td_info_cards_include_description'] ?? false ) && ! empty( $card['description'] ) ) {
		$description_html = '<div class="yak-card-description">' . wp_kses_post( $card['description'] ) . '</div>';
	}

	$button_html = '';
	if ( ( $settings['td_info_cards_include_button'] ?? false ) && $button ) {
		$button_html = '<div class="yak-card-button"><a class="button" href="' . $link . '">' . $button . '</a></div>';
	}

	$type = sanitize_html_class( $card['type'] ?? 'default' );

	// Modular rendering switch
	switch ( $type ) {
		case 'icon':
			return yak_info_cards_load_template(
				'render-card-icon.php',
				array(
					...$card,
					'settings' => $settings,
				)
			);
		case 'photo':
			return yak_info_cards_load_template(
				'render-card-photo.php',
				array(
					...$card,
					'settings' => $settings,
				)
			);
			break;
		case 'cover':
			return yak_info_cards_load_template(
				'render-card-cover.php',
				array(
					...$card,
					'settings' => $settings,
				)
			);
			break;
		case 'text':
			return yak_info_cards_load_template(
				'render-card-text.php',
				array(
					...$card,
					'settings' => $settings,
				)
			);
			break;
		case 'video':
			return yak_info_cards_load_template(
				'render-card-video.php',
				array(
					...$card,
					'settings' => $settings,
				)
			);
			break;
	}

	// Default fallback
	return <<<HTML
	<div class="yak-card yak-card-type-{$action_type}">
        {$image_html}
        {$heading_html}
        {$subheading_html}
        {$description_html}
        {$button_html}
    </div>
HTML;
}
