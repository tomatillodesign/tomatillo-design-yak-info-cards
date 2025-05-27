<?php

/**
 * Photo Card Template (Wrapped)
 *
 * Expected $data includes:
 * - heading
 * - subheading
 * - description
 * - image_id
 * - link_url
 * - button_text
 * - type
 * - settings (array of group-level settings)
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$settings     = $data['settings'] ?? [];
$type         = $type ?? 'photo';

$heading      = $data['heading'] ?? '';
$subheading   = $data['subheading'] ?? '';
$description  = $data['description'] ?? '';
$button_text  = $data['button_text'] ?? '';
$link_url     = $data['link_url'] ?? '';
$image_id     = $data['image_id'] ?? 0;

// Fallback image output
$image_html = '';
if ( $image_id ) {
	$image_html = wp_get_attachment_image( $image_id, 'large', false, [
		'class' => 'yak-info-cards-photo-img',
		'alt'   => esc_attr( $heading ),
	] );
}

// Inner card content (HTML only — will be wrapped next)
ob_start();
?>
	<div class="yak-card yak-info-cards-type-photo">
		<?php if ( $image_html ) : ?>
			<div class="yak-info-cards-photo-wrapper">
				<?php echo $image_html; ?>
			</div>
		<?php endif; ?>

		<?php echo yak_info_cards_render_heading( $heading, $settings ); ?>
		<?php echo yak_info_cards_render_subheading( $subheading, $settings ); ?>
		<?php echo yak_info_cards_render_description( $description, $settings ); ?>

		<?php echo yak_info_cards_render_button( [
			'button_text' => $button_text,
			'link_url'    => $link_url,
		], $settings ); ?>
	</div>
<?php
$card_html = ob_get_clean();

// Output wrapped version
$uid = uniqid( 'yak-card-' );
echo yak_info_cards_render_wrapper( $card_html, $data, $settings, $uid );
echo yak_info_cards_render_modal( $data, $settings, $uid );
