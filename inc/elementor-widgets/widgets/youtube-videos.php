<?php
namespace Musicoelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Musico elementor videos section widget.
 *
 * @since 1.0
 */
class Musico_Youtube_Videos extends Widget_Base {

	public function get_name() {
		return 'musico-videos';
	}

	public function get_title() {
		return __( 'Youtube Videos', 'musico-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'musico-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  videos content ------------------------------
		$this->start_controls_section(
			'videos_content',
			[
				'label' => __( 'Youtube Videos content', 'musico-companion' ),
			]
        );
		$this->add_control(
            'video_contents', [
                'label' => __( 'Create New', 'musico-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ video_title }}}',
                'fields' => [
                    [
                        'name' => 'video_thumb',
                        'label' => __( 'Video Thumb', 'musico-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'popup_video_url',
                        'label' => __( 'Popup Video URL', 'musico-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default'     => [
                            'url'   => 'https://www.youtube.com/watch?v=_X0eYtY8T_U',
                        ]
                    ],
                    [
                        'name' => 'album_title',
                        'label' => __( 'Album Title', 'musico-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default'     => __( 'New York Show-2018', 'musico-companion' ),
                    ],
                    [
                        'name' => 'video_title',
                        'label' => __( 'Video Title', 'musico-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default'     => __( 'Shadows of My Dream', 'musico-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'video_thumb' => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'album_title' => __( 'New York Show-2018', 'musico-companion' ),
                        'video_title' => __( 'Shadows of My Dream', 'musico-companion' ),
                    ],
                    [      
                        'video_thumb' => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'album_title' => __( 'New York Show-2018', 'musico-companion' ),
                        'video_title' => __( 'Shadows of My Dream', 'musico-companion' ),
                    ],
                    [      
                        'video_thumb' => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'album_title' => __( 'New York Show-2018', 'musico-companion' ),
                        'video_title' => __( 'Shadows of My Dream', 'musico-companion' ),
                    ],
                    [      
                        'video_thumb' => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'album_title' => __( 'New York Show-2018', 'musico-companion' ),
                        'video_title' => __( 'Shadows of My Dream', 'musico-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End features content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_room_section', [
                'label' => __( 'Style Service Section', 'musico-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Section Title Color', 'musico-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .doctors_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'single_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'musico-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'member_name_col', [
                'label' => __( 'Member Name Color', 'musico-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .single_expert .experts_name h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'member_desig_color', [
                'label' => __( 'Member Designation Color', 'musico-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .single_expert .experts_name span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'single_item_bg_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Bg Styles', 'musico-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'member_bg_color', [
                'label' => __( 'Bg Color', 'musico-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .single_expert .experts_name' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'hover_member_bg_color', [
                'label' => __( 'Item Hover Bg Color', 'musico-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .expert_doctors_area .single_expert:hover .experts_name' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    $video_contents  = !empty( $settings['video_contents'] ) ? $settings['video_contents'] : '';
    ?>

    <!-- youtube_video_area  -->
    <div class="youtube_video_area">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <?php 
                if( is_array( $video_contents ) && count( $video_contents ) > 0 ) {
                    foreach( $video_contents as $item ) {
                        $video_thumb = !empty( $item['video_thumb']['id'] ) ? wp_get_attachment_image( $item['video_thumb']['id'], 'musico_youtube_video_thumb_477x440', '', array( 'alt' => musico_image_alt( $item['video_thumb']['url'] ) ) ) : '';
                        $popup_video_url = ( !empty( $item['popup_video_url']['url'] ) ) ? $item['popup_video_url']['url'] : '';
                        $album_title = ( !empty( $item['album_title'] ) ) ? $item['album_title'] : '';
                        $video_title = ( !empty( $item['video_title'] ) ) ? $item['video_title'] : '';
                        ?>
                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <div class="single_video">
                                <div class="thumb">
                                    <?php 
                                        if ( $video_thumb ) { 
                                            echo $video_thumb;
                                        }
                                    ?>
                                </div>
                                <div class="hover_elements">
                                    <div class="video">
                                        <a class="popup-video" href="<?php echo esc_url($popup_video_url)?>"> 
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>

                                    <div class="hover_inner">
                                        <!-- <span>New York Show-2018</span>
                                        <h3><a href="#">Shadows of My Dream</a></h3> -->
                                        <?php 
                                            if ( $album_title ) { 
                                                echo '<span>'.esc_html( $album_title ).'</span>';
                                            }
                                            if ( $video_title ) { 
                                                echo '<h3><a href="#">'.wp_kses_post( $video_title ).'</a></h3>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- youtube_video_area  -->
    <?php
    }
}