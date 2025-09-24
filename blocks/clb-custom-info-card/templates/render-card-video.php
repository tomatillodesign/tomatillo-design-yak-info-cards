<?php
/**
 * Video Card Template (Wrapped)
 *
 * Expected $data includes:
 * - heading
 * - subheading
 * - description
 * - video_embed (raw ACF oEmbed HTML)
 * - link_url
 * - button_text
 * - type
 * - settings (array of group-level settings)
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$settings = $data['settings'] ?? array();
$type     = $type ?? 'video';

$heading     = $data['heading'] ?? '';
$subheading  = $data['subheading'] ?? '';
$description = $data['description'] ?? '';
$button_text = $data['button_text'] ?? '';
$link_url    = $data['link_url'] ?? '';
$video_embed = $data['video'] ?? ''; // ACF oEmbed field value

// Inner card content (HTML only — will be wrapped next)
ob_start();
?>
	<div class="yak-card yak-info-cards-type-video">
		<?php if ( $video_embed ) : ?>
			<div class="yak-info-cards-video-wrapper">
				<?php echo $video_embed; ?>
			</div>
		<?php endif; ?>

		<div class="yak-card-contents-wrapper">
			<?php echo yak_info_cards_render_heading( $heading, $settings ); ?>
			<?php echo yak_info_cards_render_subheading( $subheading, $settings ); ?>
			<?php echo yak_info_cards_render_description( $description, $settings ); ?>

			<?php
			echo yak_info_cards_render_button(
				array(
					'button_text' => $button_text,
					'link_url'    => $link_url,
				),
				$settings
			);
			?>
		</div>
	</div>
<?php
$card_html = ob_get_clean();

// Output wrapped version
$uid = uniqid( 'yak-card-' );
echo yak_info_cards_render_wrapper( $card_html, $data, $settings, $uid );
echo yak_info_cards_render_modal( $data, $settings, $uid );