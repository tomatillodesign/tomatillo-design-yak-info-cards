<?php
/**
 * Icon Card Template (Extracted Variables Version)
 *
 * Expected extracted variables:
 * - heading
 * - subheading
 * - description
 * - link_url
 * - button_text
 * - icon_style (e.g. fa-regular)
 * - icon_type (e.g. duotone, sharp)
 * - icon_name (e.g. fa-lightbulb)
 * - type
 * - settings (array of group-level settings)
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Defaults and fallbacks
$settings    = $data['settings'] ?? [];
$type     = $type ?? 'icon';

$subheading  = $data['subheading'] ?? '';
$description = $data['description'] ?? '';
$button_text = $data['button_text'] ?? '';
$link_url    = $data['link_url'] ?? '';
$heading     = $data['heading'] ?? '';
$icon_style  = $data['icon_style'] ?? '';
$icon_type   = $data['icon_type'] ?? '';
$icon_name = ! empty( $data['icon_name'] ) ? $data['icon_name'] : 'info-circle';

print_r('ICON NAME: ' . $icon_name );

$tag      = $settings['td_info_cards_heading_level'] ?? 'h3';
$icon_size = $settings['td_info_cards_icon_size'] ?? 'fa-4x';

echo '<div class="yak-info-cards-card yak-info-cards-type-icon">';

// ICON
echo '<div class="yak-info-cards-icon-wrapper">';
	echo '<i class="' .
		esc_attr( 'fa-' . $icon_type ) . ' ' .
		esc_attr( $icon_style ) . ' ' .
		'fa-' . esc_attr( $icon_name ) . ' ' .
		esc_attr( $icon_size ) .
	'"></i>';
	echo '</div>';

echo yak_info_cards_render_heading( $heading, $settings );
echo yak_info_cards_render_subheading( $subheading, $settings );
echo yak_info_cards_render_description( $description, $settings );

// BUTTON
echo yak_info_cards_render_button( [
	'button_text' => $button_text ?? '',
	'link_url'    => $link_url,
], $settings );

echo '</div>';
