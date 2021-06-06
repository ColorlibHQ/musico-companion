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
 * Musico elementor tracks section widget.
 *
 * @since 1.0
 */
class Musico_Latest_Tracks extends Widget_Base {

	public function get_name() {
		return 'musico-tracks';
	}

	public function get_title() {
		return __( 'Latest Vracks', 'musico-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'musico-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  tracks content ------------------------------
		$this->start_controls_section(
			'latest_tracks_content',
			[
				'label' => __( 'Latest Tracks content', 'musico-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'musico-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Latest Tracks', 'musico-companion' ),
            ]
        );
		$this->add_control(
            'tracks_contents', [
                'label' => __( 'Create New', 'musico-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ track_title }}}',
                'fields' => [
                    [
                        'name' => 'video_thumb',
                        'label' => __( 'Track Thumb', 'musico-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'track_title',
                        'label' => __( 'Track Title', 'musico-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default'     => __( 'Frando Kally', 'musico-companion' ),
                    ],
                    [
                        'name' => 'publish_date',
                        'label' => __( 'Publish Date', 'musico-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::DATE_TIME,
                        'picker_options'   => [
                            'dateFormat' => 'd F, Y'
                        ],
                        'default'     => __( '10 November, 2022', 'musico-companion' ),
                    ],
                    [
                        'name' => 'track_src',
                        'label' => __( 'Upload Audio', 'musico-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'btn_title',
                        'label' => __( 'Button Title', 'musico-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default'     => __( 'Buy Album', 'musico-companion' ),
                    ],
                    [
                        'name' => 'btn_url',
                        'label' => __( 'Button URL', 'musico-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default'     => [
                            'url'   => '#',
                        ]
                    ],
                ],
                'default'   => [
                    [      
                        'video_thumb'  => [
                            'url'      => Utils::get_placeholder_image_src(),
                        ],
                        'track_title'  => __( 'Frando Kally', 'musico-companion' ),
                        'publish_date' => __( '10 November, 2022', 'musico-companion' ),
                        'btn_title'    => __( 'Buy Album', 'musico-companion' ),
                        'btn_url'      => [
                            'url'      => '#',
                        ],
                    ],
                    [      
                        'video_thumb'  => [
                            'url'      => Utils::get_placeholder_image_src(),
                        ],
                        'track_title'  => __( 'Frando Kally', 'musico-companion' ),
                        'publish_date' => __( '10 November, 2022', 'musico-companion' ),
                        'btn_title'    => __( 'Buy Album', 'musico-companion' ),
                        'btn_url'      => [
                            'url'      => '#',
                        ],
                    ],
                    [      
                        'video_thumb'  => [
                            'url'      => Utils::get_placeholder_image_src(),
                        ],
                        'track_title'  => __( 'Frando Kally', 'musico-companion' ),
                        'publish_date' => __( '10 November, 2022', 'musico-companion' ),
                        'btn_title'    => __( 'Buy Album', 'musico-companion' ),
                        'btn_url'      => [
                            'url'      => '#',
                        ],
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
    // call load widget script
    $this->load_widget_script(); 
    $settings  = $this->get_settings();
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $tracks_contents  = !empty( $settings['tracks_contents'] ) ? $settings['tracks_contents'] : '';
    ?>

    <!-- music_area  -->
    <div class="music_area music_gallery">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-65">
                        <?php 
                            if ( $sec_title ) { 
                                echo '<h3>'.esc_html( $sec_title ).'</h3>';
                            }
                        ?>
                    </div>
                </div>
            </div>

            <?php 
            if( is_array( $tracks_contents ) && count( $tracks_contents ) > 0 ) {
                foreach( $tracks_contents as $item ) {
                    $video_thumb = !empty( $item['video_thumb']['id'] ) ? wp_get_attachment_image( $item['video_thumb']['id'], 'musico_youtube_video_thumb_477x440', '', array( 'alt' => musico_image_alt( $item['video_thumb']['url'] ) ) ) : '';
                    $track_title = ( !empty( $item['track_title'] ) ) ? $item['track_title'] : '';
                    $publish_date = ( !empty( $item['publish_date'] ) ) ? $item['publish_date'] : '';
                    $track_src = ( !empty( $item['track_src']['url'] ) ) ? $item['track_src']['url'] : '';
                    $btn_title = ( !empty( $item['btn_title'] ) ) ? $item['btn_title'] : '';
                    $btn_url = ( !empty( $item['btn_url']['url'] ) ) ? $item['btn_url']['url'] : '';
                    ?>
                    <div class="row align-items-center justify-content-center mb-20">
                        <div class="col-xl-10">
                            <div class="row align-items-center">
                                <div class="col-xl-9 col-md-9">
                                    <div class="music_field">
                                        <div class="thumb">
                                            <?php 
                                                if ( $video_thumb ) { 
                                                    echo $video_thumb;
                                                }
                                            ?>
                                        </div>
                                        <div class="audio_name">
                                            <div class="name">
                                                <?php 
                                                    if ( $track_title ) { 
                                                        echo '<h4>'.esc_html( $track_title ).'</h4>';
                                                    }
                                                    if ( $publish_date ) { 
                                                        echo '<p>'.esc_html( $publish_date ).'</p>';
                                                    }
                                                ?>
                                            </div>
                                            <audio preload="auto" controls>
                                                <source src="<?php echo esc_url( $track_src )?>">
                                            </audio>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-3">
                                    <div class="music_btn">
                                        <?php 
                                            if ( $btn_title ) { 
                                                echo '<a href="'.esc_url( $btn_url ).'" class="boxed-btn">'.esc_html( $btn_title ).'</a>';
                                            }
                                        ?>
                                    </div>
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
    <?php
    }
    
    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            $('audio').audioPlayer();
        })(jQuery);
        </script>
        <?php 
        }
    }	
}