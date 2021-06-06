<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * @Packge     : Musico Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author     URI : http://colorlib.com/wp/
 *
 */


/*===========================================================
	Get elementor templates
============================================================*/
function get_elementor_templates() {
	$options = [];
	$args = [
		'post_type' => 'elementor_library',
		'posts_per_page' => -1,
	];

	$page_templates = get_posts($args);

	if (!empty($page_templates) && !is_wp_error($page_templates)) {
		foreach ($page_templates as $post) {
			$options[$post->ID] = $post->post_title;
		}
	}
	return $options;
}

// Section Heading
function musico_section_heading( $title = '', $subtitle = '' ) {
	if( $title || $subtitle ) :
	?>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-heading text-center">
						<?php
						// Sub title
						if ( $subtitle ) {
							echo '<p>' . esc_html( $subtitle ) . '</p>';
						}
						// Title
						if ( $title ) {
							echo '<h2>' . esc_html( $title ) . '</h2>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	<?php
	endif;
}

// Enqueue scripts
add_action( 'wp_enqueue_scripts', 'musico_companion_frontend_scripts', 99 );
function musico_companion_frontend_scripts() {

	wp_enqueue_script( 'musico-companion-script', plugins_url( '../js/loadmore-ajax.js', __FILE__ ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'musico-common-js', plugins_url( '../js/common.js', __FILE__ ), array( 'jquery' ), '1.0', true );

}
// 
add_action( 'wp_ajax_musico_portfolio_ajax', 'musico_portfolio_ajax' );

add_action( 'wp_ajax_nopriv_musico_portfolio_ajax', 'musico_portfolio_ajax' );
function musico_portfolio_ajax( ){

	ob_start();

	if( !empty( $_POST['elsettings'] ) ):


		$items = array_slice( $_POST['elsettings'], $_POST['postNumber'] );

	    $i = 0;
	    foreach( $items as $val ):

	    $tagclass = sanitize_title_with_dashes( $val['label'] );
	    $i++;
	?>
	<div class="single_gallery_item <?php echo esc_attr( $tagclass ); ?>">
	    <?php 
	    if( !empty( $val['img']['url'] ) ){
	        echo '<img src="'.esc_url( $val['img']['url'] ).'" />';
	    }
	    ?>
	    <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
	        <div class="port-hover-text text-center">
	            <?php 
	            if( !empty( $val['title'] ) ){
	                echo musico_heading_tag(
	                    array(
	                        'tag'  => 'h4',
	                        'text' => esc_html( $val['title'] )
	                    )
	                );
	            }

	            if( !empty( $val['sub-title-url'] ) &&  !empty( $val['sub-title'] ) ){
	                echo '<a href="'.esc_url( $val['sub-title-url'] ).'">'.esc_html( $val['sub-title'] ).'</a>';
	            }else{
	                echo '<p>'.esc_html( $val['sub-title'] ).'</p>';
	            }
	            ?>
	            
	        </div>
	    </div>
	</div>

	<?php 

	if( !empty( $_POST['postIncrNumber'] ) ){

	    if( $i == $_POST['postIncrNumber'] ){
	        break;
	    }
	}
	    endforeach;
	endif;
	echo ob_get_clean();
	die();
}

	// Update the post/page by your arguments
	function musico_update_the_followed_post_page_status( $title = 'Hello world!', $type = 'post', $status = 'draft', $message = false ){

		// Get the post/page by title
		$target_post_id = get_page_by_title( $title, OBJECT, $type);

		// Post/page arguments
		$target_post = array(
			'ID'    => $target_post_id->ID,
			'post_status'   => $type,
		);

		if ( $message == true ) {
			// Update the post/page
			$update_status = wp_update_post( $target_post, true );
		} else {
			// Update the post/page
			$update_status = wp_update_post( $target_post, false );
		}

		return $update_status;
	}


	
// Musico - Custom Post Type
function musico_custom_posts() {	
	$labels = array(
		'name'               => _x( 'Musico', 'post type general name', 'musico-companion' ),
		'singular_name'      => _x( 'Recipe', 'post type singular name', 'musico-companion' ),
		'menu_name'          => _x( 'Musico', 'admin menu', 'musico-companion' ),
		'name_admin_bar'     => _x( 'Musico', 'add new on admin bar', 'musico-companion' ),
		'add_new'            => _x( 'Add New', 'musico', 'musico-companion' ),
		'add_new_item'       => __( 'Add New Musico', 'musico-companion' ),
		'new_item'           => __( 'New Recipe', 'musico-companion' ),
		'edit_item'          => __( 'Edit Recipe', 'musico-companion' ),
		'view_item'          => __( 'View Recipe', 'musico-companion' ),
		'all_items'          => __( 'All Musico', 'musico-companion' ),
		'search_items'       => __( 'Search Musico', 'musico-companion' ),
		'parent_item_colon'  => __( 'Parent Musico:', 'musico-companion' ),
		'not_found'          => __( 'No Musico found.', 'musico-companion' ),
		'not_found_in_trash' => __( 'No Musico found in Trash.', 'musico-companion' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'musico-companion' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'musico' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'musico', $args );

	// musico-cat - Custom taxonomy
	$labels = array(
		'name'              => _x( 'Musico Category', 'taxonomy general name', 'musico-companion' ),
		'singular_name'     => _x( 'Musico Categories', 'taxonomy singular name', 'musico-companion' ),
		'search_items'      => __( 'Search Musico Categories', 'musico-companion' ),
		'all_items'         => __( 'All Musico Categories', 'musico-companion' ),
		'parent_item'       => __( 'Parent Recipe Category', 'musico-companion' ),
		'parent_item_colon' => __( 'Parent Recipe Category:', 'musico-companion' ),
		'edit_item'         => __( 'Edit Recipe Category', 'musico-companion' ),
		'update_item'       => __( 'Update Recipe Category', 'musico-companion' ),
		'add_new_item'      => __( 'Add New Recipe Category', 'musico-companion' ),
		'new_item_name'     => __( 'New Recipe Category Name', 'musico-companion' ),
		'menu_name'         => __( 'Recipe Category', 'musico-companion' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'musico-category' ),
	);

	register_taxonomy( 'musico-cat', array( 'musico' ), $args );


	// musico-tags - Custom taxonomy
	$labels = array(
		'name'              => _x( 'Musico Tags', 'taxonomy general name', 'musico-companion' ),
		'singular_name'     => _x( 'Musico Tags', 'taxonomy singular name', 'musico-companion' ),
		'search_items'      => __( 'Search Musico Tags', 'musico-companion' ),
		'all_items'         => __( 'All Musico Tags', 'musico-companion' ),
		'parent_item'       => __( 'Parent Recipe Tag', 'musico-companion' ),
		'parent_item_colon' => __( 'Parent Recipe Tag:', 'musico-companion' ),
		'edit_item'         => __( 'Edit Recipe Tag', 'musico-companion' ),
		'update_item'       => __( 'Update Recipe Tag', 'musico-companion' ),
		'add_new_item'      => __( 'Add New Recipe Tag', 'musico-companion' ),
		'new_item_name'     => __( 'New Recipe Tag Name', 'musico-companion' ),
		'menu_name'         => __( 'Recipe Tag', 'musico-companion' ),
	);

	$args = array(
		// 'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'musico-tag' ),
	);

	register_taxonomy( 'musico-tag', array( 'musico' ), $args );

}
add_action( 'init', 'musico_custom_posts' );



/*=========================================================
    Cases Section
========================================================*/
function musico_case_section( $post_order ){ 
	$cases = new WP_Query( array(
		'post_type' => 'case',
		'order' => $post_order,

	) );
	
	if( $cases->have_posts() ) {
		while ( $cases->have_posts() ) {
			$cases->the_post();			
			$case_cat = get_the_terms(get_the_ID(), 'case-cat');
			$case_img      = get_the_post_thumbnail( get_the_ID(), 'musico_case_study_thumb_362x240', '', array( 'alt' => get_the_title() ) );
			?>
			<div class="single_case">
				<?php 
					if ( $case_img ) {
						echo '
							<div class="case_thumb">
								'.$case_img.'
							</div>
						';
					}
				?>
				<div class="case_heading">
					<span><?php echo $case_cat[0]->name?></span>
					<h3><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
				</div>
			</div>
			<?php
		}
	}
}

// Related musico for Single Page
function musico_related_items( $current_post_id = null, $post_item = 3, $post_order = 'DESC' ){
	$related_musico = new WP_Query( array(
        'post_type' => 'musico',
        'order' => $post_order,
        'posts_per_page' => $post_item,
		'post__not_in' => array( $current_post_id ),
        // 'posts_per_page'    => $pnumber,
    ) );
	?>
	<!-- recepie_area_start  -->
	<div class="recepie_area inc_padding">
        <div class="container">
            <div class="row">
				<?php
				if( $related_musico->have_posts() ) {
					while ( $related_musico->have_posts() ) {
						$related_musico->the_post();			
						$recipe_img = get_the_post_thumbnail( get_the_ID(), 'musico_circle_thumb_300x300', '', array( 'alt' => get_the_title() ) );
						$making_time = ! empty( musico_meta( 'time') ) ? musico_meta( 'time') : 'N/A';
						?>
						<div class="col-xl-4 col-lg-4 col-md-6">
							<div class="single_recepie text-center">
								<?php
									if ( has_post_thumbnail() ) {
										echo '
											<div class="recepie_thumb">
												'.$recipe_img.'
											</div>
										';
									}
								?>
								<h3><?php the_title()?></h3>
								<span><?php echo musico_get_tax_function('musico-cat')?></span>
								<p><?php _e('Time Needs :', 'musico-companion')?> <?php echo esc_html($making_time)?></p>
								<a href="<?php the_permalink()?>" class="line_btn"><?php _e('View Full Recipe', 'musico-companion')?></a>
							</div>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</div>
	<!-- recepie_area_end  -->
	<?php
}