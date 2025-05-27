<?php
/**
 * Render full modal HTML for Yak Info Card
 *
 * @param array  $data      ACF row data for the card.
 * @param array  $settings  Group/block-level settings.
 * @param string $uid       Unique modal ID, must match card trigger.
 * @return string           Full modal HTML.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function yak_info_cards_render_modal( array $data, array $settings = [], string $uid = '' ): string {
	if ( empty( $uid ) ) {
		$uid = uniqid( 'yak-modal-' ); // Fallback (shouldn't happen)
	}

	$type_class  = 'yak-info-cards-type-' . sanitize_html_class( $data['type'] ?? 'default' );
	$heading     = $data['heading'] ?? '';
	$subheading  = $data['subheading'] ?? '';
	$description = $data['description'] ?? '';

	ob_start();
	?>
	<div id="<?php echo esc_attr( $uid ); ?>-modal" class="yak-modal yak-info-card-modal <?php echo esc_attr( $type_class ); ?>" hidden>
		<div class="yak-modal-content modal-content">
			<div class="yak-modal-header modal-header">
				<h5 class="yak-modal-title modal-title" id="yak-search-modal-title"><?php echo $heading; ?></h5>
				<button type="button" class="yak-modal-close close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="yak-modal-body">
				<?php echo $description; ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
	<?php
	return ob_get_clean();
}
