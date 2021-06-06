<?php
namespace Musicoelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Musico elementor call to action section section widget.
 *
 * @since 1.0
 */
class Musico_Call_To_Action extends Widget_Base {

	public function get_name() {
		return 'musico-call-to-action';
	}

	public function get_title() {
		return __( 'Call To Action', 'musico-companion' );
	}

	public function get_icon() {
		return 'eicon-play-o';
	}

	public function get_categories() {
		return [ 'musico-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Call To Action Section ------------------------------
        $this->start_controls_section(
            'call_to_action_content',
            [
                'label' => __( 'Call To Action Section', 'musico-companion' ),
            ]
        );
        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'BG Image', 'musico-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );        
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'musico-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__( 'Thousands of musico are waiting to be watched', 'musico-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Sec Title', 'musico-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Discover latest trending musico', 'musico-companion' ),
            ]
        );
        $this->add_control(
            'btn_label',
            [
                'label' => esc_html__( 'Button Label', 'musico-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'View all Musico', 'musico-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'musico-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        
        $this->end_controls_section(); // End emergency_contact_section

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'left_sec_style', [
                'label' => __( 'Top Section Styles', 'musico-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'text_col', [
				'label' => __( 'Text Color', 'musico-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .Emergency_contact .single_emergency .info h3' => 'color: {{VALUE}};',
					'{{WRAPPER}} .Emergency_contact .single_emergency .info p' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'button_col', [
				'label' => __( 'Button Text & Border Color', 'musico-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .Emergency_contact .single_emergency .info_button .boxed-btn3-white' => 'color: {{VALUE}} !important; border-color: {{VALUE}};',
					'{{WRAPPER}} .Emergency_contact .single_emergency .info_button .boxed-btn3-white:hover' => 'color: {{VALUE}} !important; border-color: transparent;',
				],
			]
        );

        $this->add_control(
            'button_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'musico-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
			'button_hover_col', [
				'label' => __( 'Button Hover Bg Color', 'musico-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .Emergency_contact .single_emergency .info_button .boxed-btn3-white:hover' => 'background: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'overlay_color_styles_seperator',
            [
                'label' => esc_html__( 'Overlay Color Styles', 'musico-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
			'sec_title_col', [
				'label' => __( 'Bg Overlay Color', 'musico-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .Emergency_contact .single_emergency.overlay_skyblue::before' => 'background: {{VALUE}};',
				],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    $bg_img    = !empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
    $sub_title = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $btn_label = !empty( $settings['btn_label'] ) ? $settings['btn_label'] : '';
    $btn_url   = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
    ?>

    <!-- latest_trand     -->
    <div class="latest_trand_area" <?php echo musico_inline_bg_img( esc_url( $bg_img ) ); ?>>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="trand_info text-center">
                        <?php 
                            if ( $sub_title ) { 
                                echo '<p>'.wp_kses_post($sub_title).'</p>';
                            }
                            if ( $sec_title ) { 
                                echo '<h3>'.esc_html($sec_title).'</h3>';
                            }
                            if ( $btn_label ) { 
                                echo '<a class="boxed-btn3" href="'.esc_url($btn_url).'">'.esc_html($btn_label).'</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ latest_trand     -->
    <?php

    }
}
