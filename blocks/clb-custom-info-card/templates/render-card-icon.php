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
$icon_name                 = ! empty( $data['icon_name'] ) ? $data['icon_name'] : 'info-circle';
$custom_icon_code          = $data['custom_icon_code'] ?? '';
$icon_size                 = $settings['td_info_cards_icon_size'] ?? 'fa-4x';
$duotone_primary_color      = $data['duotone_primary_color'] ?? '';
$duotone_secondary_color    = $data['duotone_secondary_color'] ?? '';
$duotone_primary_opacity    = $data['duotone_primary_opacity'] ?? '';
$duotone_secondary_opacity  = $data['duotone_secondary_opacity'] ?? '';
$duotone_use_accent_color   = $data['duotone_use_accent_color'] ?? false;
$duotone_use_custom_opacity = $data['duotone_use_custom_opacity'] ?? false;

// Build inline style for duotone icons
$duotone_style = '';
if ( in_array( $icon_type, array( 'duotone', 'sharp-duotone' ), true ) ) {
	$style_parts = array();
	
	// Check if new toggle fields exist (for backward compatibility)
	$has_new_toggles = isset( $data['duotone_use_accent_color'] ) || isset( $data['duotone_use_custom_opacity'] );
	
	// Primary color: always set, use provided value or default to black
	$primary_color = ! empty( $duotone_primary_color ) ? $duotone_primary_color : 'var(--yak-color-black, #000000)';
	$style_parts[] = '--fa-primary-color: ' . esc_attr( $primary_color ) . ';';
	
	// Secondary color: always set
	// If accent toggle is enabled and color provided, use that color
	// Otherwise, use primary color (for duotone effect with same color at different opacity)
	if ( $has_new_toggles ) {
		// New logic: use accent color if toggle is enabled and color is provided, otherwise use primary color
		if ( $duotone_use_accent_color && ! empty( $duotone_secondary_color ) ) {
			$style_parts[] = '--fa-secondary-color: ' . esc_attr( $duotone_secondary_color ) . ';';
		} else {
			// No accent color selected: use primary color for secondary (will be at 40% opacity)
			$style_parts[] = '--fa-secondary-color: ' . esc_attr( $primary_color ) . ';';
		}
	} else {
		// Old logic: backward compatibility - use provided color if exists, otherwise use primary color
		if ( ! empty( $duotone_secondary_color ) ) {
			$style_parts[] = '--fa-secondary-color: ' . esc_attr( $duotone_secondary_color ) . ';';
		} else {
			// No secondary color in old data: use primary color
			$style_parts[] = '--fa-secondary-color: ' . esc_attr( $primary_color ) . ';';
		}
	}
	
	// Opacity: always set CSS variables
	if ( $has_new_toggles ) {
		// New logic: use custom values if toggle is on, otherwise use FA defaults
		if ( $duotone_use_custom_opacity ) {
			// Custom opacity enabled: use provided values or defaults
			$primary_opacity = ( '' !== $duotone_primary_opacity && is_numeric( $duotone_primary_opacity ) ) 
				? floatval( $duotone_primary_opacity ) / 100 
				: 1.0; // Default 100%
			$style_parts[] = '--fa-primary-opacity: ' . esc_attr( $primary_opacity ) . ';';
			
			// Secondary opacity: always set (whether accent color is enabled or not)
			$secondary_opacity = ( '' !== $duotone_secondary_opacity && is_numeric( $duotone_secondary_opacity ) ) 
				? floatval( $duotone_secondary_opacity ) / 100 
				: 0.4; // Default 40%
			$style_parts[] = '--fa-secondary-opacity: ' . esc_attr( $secondary_opacity ) . ';';
		} else {
			// Custom opacity disabled: use Font Awesome defaults
			$style_parts[] = '--fa-primary-opacity: 1.0;'; // 100%
			$style_parts[] = '--fa-secondary-opacity: 0.4;'; // 40% (always set, even without accent color)
		}
	} else {
		// Old logic: backward compatibility - set opacity if values exist
		if ( '' !== $duotone_primary_opacity && is_numeric( $duotone_primary_opacity ) ) {
			$opacity_value = floatval( $duotone_primary_opacity ) / 100;
			$style_parts[] = '--fa-primary-opacity: ' . esc_attr( $opacity_value ) . ';';
		} else {
			// No primary opacity in old data: use default
			$style_parts[] = '--fa-primary-opacity: 1.0;'; // 100%
		}
		
		if ( '' !== $duotone_secondary_opacity && is_numeric( $duotone_secondary_opacity ) ) {
			$opacity_value = floatval( $duotone_secondary_opacity ) / 100;
			$style_parts[] = '--fa-secondary-opacity: ' . esc_attr( $opacity_value ) . ';';
		} else {
			// No secondary opacity in old data: use default 40%
			$style_parts[] = '--fa-secondary-opacity: 0.4;'; // 40%
		}
	}
	
	if ( ! empty( $style_parts ) ) {
		$duotone_style = ' style="' . implode( ' ', $style_parts ) . '"';
	}
}

// Inner card content (HTML only — will be wrapped next)
ob_start();
?>
	<div class="yak-card yak-info-cards-type-icon">
		
	<div class="yak-info-cards-icon-wrapper">
		<?php if ( ! empty( $custom_icon_code ) && $icon_type === 'custom' ) : ?>
			<i class="<?php echo esc_attr( $custom_icon_code . ' ' . $icon_size ); ?>"<?php echo $duotone_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>></i>
		<?php else : ?>
			<i class="
			<?php
				echo esc_attr( 'fa-' . $icon_type . ' ' . $icon_style . ' fa-' . $icon_name . ' ' . $icon_size );
			?>
			"<?php echo $duotone_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>></i>
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



