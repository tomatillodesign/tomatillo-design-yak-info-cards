<?php

function yak_get_card_data_from_row(): array {
	return array(
		'heading'          => get_sub_field( 'card_heading' ),
		'subheading'       => get_sub_field( 'card_subheading' ),
		'description'      => get_sub_field( 'card_description' ),
		'image_id'         => get_sub_field( 'card_photo' ),
		'button_text'      => get_sub_field( 'card_button_text' ),
		'action'           => get_sub_field( 'card_action' ),
		'link_url'         => get_sub_field( 'card_link' ),
		'video'            => get_sub_field( 'card_video' ),
		'cover_opacity'    => get_sub_field( 'cover_opacity_percentage' ),
		'icon_style'       => 'fa-' . get_sub_field( 'card_icon_style' ),
		'icon_type'        => get_sub_field( 'card_icon_type' ),
		'icon_name'        => get_sub_field( 'card_icon' ),
		'custom_icon_code' => get_sub_field( 'card_custom_icon_code' ),
		'icon_size'        => get_field( 'td_info_cards_icon_size' ), // from group
	);
}
