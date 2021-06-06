<?php
function musico_page_metabox( $meta_boxes ) {

	$musico_prefix = '_musico_';
	$meta_boxes[] = array(
		'id'        => 'musico_metaboxes',
		'title'     => esc_html__( 'Other Options', 'musico-companion' ),
		'post_types'=> array( 'musico' ),
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'    => $musico_prefix . 'short_text',
				'type'  => 'textarea',
				'name'  => esc_html__( 'Musico Short Text', 'musico-companion' ),
			),
			array(
				'id'    => $musico_prefix . 'rating',
				'type'  => 'button_group',
				'name'  => esc_html__( 'Musico Ratings', 'musico-companion' ),
				'inline'  => true,
				'options' => [
					'1' => '<span class="dashicons dashicons-star-filled"></span> <strong>1</strong>',
					'2' => '<span class="dashicons dashicons-star-filled"></span> <strong>2</strong>',
					'3' => '<span class="dashicons dashicons-star-filled"></span> <strong>3</strong>',
					'4' => '<span class="dashicons dashicons-star-filled"></span> <strong>4</strong>',
					'5' => '<span class="dashicons dashicons-star-filled"></span> <strong>5</strong>',
				]
			),
			array(
				'id'    => $musico_prefix . 'time',
				'type'  => 'text',
				'name'  => esc_html__( 'Time To Prepare', 'musico-companion' ),
				'placeholder'  => esc_html__( 'Ex: 30 mins', 'musico-companion' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'musico_page_metabox' );