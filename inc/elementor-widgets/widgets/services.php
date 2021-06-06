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
 * Musico elementor service section widget.
 *
 * @since 1.0
 */
class Musico_Services extends Widget_Base {

	public function get_name() {
		return 'musico-service';
	}

	public function get_title() {
		return __( 'Services', 'musico-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'musico-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Services content ------------------------------
		$this->start_controls_section(
			'service_content',
			[
				'label' => __( 'Services content', 'musico-companion' ),
			]
        );

        $this->add_control(
            'service_settings_seperator',
            [
                'label' => esc_html__( 'Services', 'musico-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'services', [
                'label' => __( 'Create New', 'musico-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_img',
                        'label' => __( 'Upload Image', 'musico-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Title', 'musico-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default'     => __( 'Birthday Catering', 'musico-companion' ),
                    ],
                    [
                        'name' => 'item_text',
                        'label' => __( 'Text', 'musico-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default'     => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'musico-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'item_img'  => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title' => __( 'Birthday Catering', 'musico-companion' ),
                        'item_text'  => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'musico-companion' ),
                    ],
                    [      
                        'item_img'  => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title' => __( 'Party Catering', 'musico-companion' ),
                        'item_text'  => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'musico-companion' ),
                    ],
                    [      
                        'item_img'  => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title' => __( 'Wedding Catering', 'musico-companion' ),
                        'item_text'  => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'musico-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End service content

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
    $services = !empty( $settings['services'] ) ? $settings['services'] : '';
    ?>

    <!-- dish_area start  -->
    <div class="dish_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="dish_wrap d-flex">
                        <?php 
                        if( is_array( $services ) && count( $services ) > 0 ) {
                            foreach( $services as $item ) {
                                $item_title = ( !empty( $item['item_title'] ) ) ? $item['item_title'] : '';
                                $item_img  = !empty( $item['item_img']['id'] ) ? wp_get_attachment_image( $item['item_img']['id'], 'musico_dish_thumb_192x192', '', array( 'alt' => $item_title ) ) : '';
                                $item_text  = ( !empty( $item['item_text'] ) ) ? $item['item_text'] : '';
                                ?>
                                <div class="single_dish text-center">
                                    <?php 
                                        if ( $item_img ) { 
                                            echo '
                                            <div class="thumb">
                                                '.$item_img.'
                                            </div>
                                            ';
                                        }
                                        if ( $item_title ) { 
                                            echo '<h3>'.esc_html( $item_title ).'</h3>';
                                        }
                                        if ( $item_text ) { 
                                            echo '<p>'.wp_kses_post( $item_text ).'</p>';
                                        }
                                    ?>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service_area_end  -->
    <?php
    }
}