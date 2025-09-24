<?php
/**
 * Icon Card Template (Wrapped)
 *
 * Expected $data includes:
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

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$settings = $data['settings'] ?? array();
$type     = $type ?? 'icon';

$heading          = $data['heading'] ?? '';
$subheading       = $data['subheading'] ?? '';
$description      = $data['description'] ?? '';
$button_text      = $data['button_text'] ?? '';
$link_url         = $data['link_url'] ?? '';
$icon_style       = $data['icon_style'] ?? '';
$icon_type        = $data['icon_type'] ?? '';
$icon_name        = ! empty( $data['icon_name'] ) ? $data['icon_name'] : 'info-circle';
$custom_icon_code = $data['custom_icon_code'] ?? '';
$icon_size        = $settings['td_info_cards_icon_size'] ?? 'fa-4x';

// Inner card content (HTML only — will be wrapped next)
ob_start();
?>
	<div class="yak-card yak-info-cards-type-icon">
		
	<div class="yak-info-cards-icon-wrapper">
		<?php if ( ! empty( $custom_icon_code ) && $icon_type === 'custom' ) : ?>
			<i class="<?php echo esc_attr( $custom_icon_code . ' ' . $icon_size ); ?>"></i>
		<?php else : ?>
			<i class="
			<?php
				echo esc_attr( 'fa-' . $icon_type . ' ' . $icon_style . ' fa-' . $icon_name . ' ' . $icon_size );
			?>
			"></i>
		<?php endif; ?>
	</div>

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



