<?php
/**
 * Cover Card Template (Wrapped)
 *
 * Expected $data includes:
 * - heading
 * - subheading
 * - description
 * - image_id
 * - link_url
 * - button_text
 * - overlay_opacity (0.0 – 1.0 as string or float)
 * - type
 * - settings (array of group-level settings)
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$settings       = $data['settings'] ?? [];
$type           = $type ?? 'cover';

$heading        = $data['heading'] ?? '';
$subheading     = $data['subheading'] ?? '';
$description    = $data['description'] ?? '';
$button_text    = $data['button_text'] ?? '';
$link_url       = $data['link_url'] ?? '';
$image_id       = $data['image_id'] ?? 0;
$overlay_opacity = isset( $data['overlay_opacity'] ) ? floatval( $data['overlay_opacity'] ) : 0.4;

// Fallback image output
$image_html = '';
if ( $image_id ) {
	$image_html = wp_get_attachment_image( $image_id, 'large', false, [
		'class' => 'yak-info-cards-cover-img',
		'alt'   => esc_attr( $heading ),
	] );
}

// Inline overlay style
$overlay_style = 'style="opacity:' . esc_attr( $overlay_opacity ) . ';"';

// Inner card content (HTML only — will be wrapped next)
ob_start();
?>
	<div class="yak-card yak-info-cards-type-cover">
		<?php if ( $image_html ) : ?>
			<div class="yak-info-cards-cover-bg-wrapper">
				<?php echo $image_html; ?>
				<div class="yak-info-cards-overlay" <?php echo $overlay_style; ?>></div>
			</div>
		<?php endif; ?>

		<div class="yak-info-cards-cover-inner">
			<?php echo yak_info_cards_render_heading( $heading, $settings ); ?>
			<?php echo yak_info_cards_render_subheading( $subheading, $settings ); ?>
			<?php echo yak_info_cards_render_description( $description, $settings ); ?>

			<?php echo yak_info_cards_render_button( [
				'button_text' => $button_text,
				'link_url'    => $link_url,
			], $settings ); ?>
		</div>
	</div>
<?php
$card_html = ob_get_clean();

// Output wrapped version
$uid = uniqid( 'yak-card-' );
echo yak_info_cards_render_wrapper( $card_html, $data, $settings, $uid );
echo yak_info_cards_render_modal( $data, $settings, $uid );
