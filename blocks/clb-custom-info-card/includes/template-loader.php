<?php
/**
 * Yak Info Cards – Template Loader
 *
 * Loads all reusable render helpers and rendering templates.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// -----------------------------------------------------------------------------
// 🧩 Universal Template Loader (safe version — no extract)
// -----------------------------------------------------------------------------
function yak_info_cards_load_template( string $filename, array $data = [] ): string {
	$path = plugin_dir_path( __FILE__ ) . '../templates/' . $filename;

	if ( ! file_exists( $path ) ) {
		return '<!-- Missing template: ' . esc_html( $filename ) . ' -->';
	}

	ob_start();
	include $path; // Templates will reference $data directly
	return ob_get_clean();
}


// -----------------------------------------------------------------------------
// 📦 Helpers (data + render partials)
// -----------------------------------------------------------------------------
require_once __DIR__ . '/get-card-data.php';
require_once __DIR__ . '/get-card-group-attributes.php';
require_once __DIR__ . '/card-partials.php'; // Subheading, Description, Button
require_once __DIR__ . '/helpers/render-wrapper.php'; // wrapper, incl action logic
require_once __DIR__ . '/helpers/render-modal.php'; // modal markup

// -----------------------------------------------------------------------------
// 🧱 Template Renderers (main + card types)
// -----------------------------------------------------------------------------
require_once plugin_dir_path( __FILE__ ) . '../templates/render-card-group.php';
require_once plugin_dir_path( __FILE__ ) . '../templates/render-card.php';

// Card type templates (loaded once so they're callable if needed)
// require_once plugin_dir_path( __FILE__ ) . '../templates/render-card-icon.php';
// require_once plugin_dir_path( __FILE__ ) . '../templates/render-card-photo.php';
// require_once plugin_dir_path( __FILE__ ) . '../templates/render-card-cover.php';
// require_once plugin_dir_path( __FILE__ ) . '../templates/render-card-video.php';


