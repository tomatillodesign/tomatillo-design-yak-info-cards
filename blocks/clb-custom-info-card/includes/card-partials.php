<?php


function yak_info_cards_render_heading( $heading, array $settings ): string {
	if ( !$heading ) {
		return '';
	}

    $tag      = $settings['td_info_cards_heading_level'] ?? 'h3';
    $heading_to_publish = null;
	if ( ! empty( $heading ) ) {
        $heading_to_publish .= '<' . tag_escape( $tag ) . ' class="yak-info-cards-heading">';
        $heading_to_publish .= esc_html( $heading );
        $heading_to_publish .= '</' . tag_escape( $tag ) . '>';
        return $heading_to_publish;
    }
}

function yak_info_cards_render_subheading( $subheading, array $settings ): string {
	if ( empty( $settings['td_info_cards_include_sub_header'] ) || !$subheading ) {
		return '';
	}

	return '<div class="yak-info-cards-subheading">' . esc_html( $subheading ) . '</div>';
}

function yak_info_cards_render_description( $description, array $settings ): string {
	if ( empty( $settings['td_info_cards_include_description'] ) || !$description ) {
		return '';
	}
	return '<div class="yak-info-cards-description">' . wp_kses_post( $description ) . '</div>';
}

function yak_info_cards_render_button( array $data, array $settings ): string {

	if (
		empty( $settings['td_info_cards_include_button'] ) ||
		empty( $data['button_text'] ) ||
		empty( $data['link_url'] )
	) {
		return '';
	}
	$link = esc_url( $data['link_url'] );
	$text = esc_html( $data['button_text'] );
	return '<div class="yak-info-cards-button"><a class="button" href="' . $link . '">' . $text . '</a></div>';
}
