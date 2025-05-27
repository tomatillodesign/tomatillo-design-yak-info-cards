<?php
/**
 * Text Card Template (Wrapped)
 *
 * Expected $data includes:
 * - heading
 * - subheading
 * - description
 * - link_url
 * - button_text
 * - type
 * - settings (array of group-level settings)
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$settings     = $data['settings'] ?? [];
$type         = $type ?? 'text';

$heading      = $data['heading'] ?? '';
$subheading   = $data['subheading'] ?? '';
$description  = $data['description'] ?? '';
$button_text  = $data['button_text'] ?? '';
$link_url     = $data['link_url'] ?? '';

// Inner card content (HTML only — will be wrapped next)
ob_start();
?>
	<div class="yak-card yak-info-cards-type-text">
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
