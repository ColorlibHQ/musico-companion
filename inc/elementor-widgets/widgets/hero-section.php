<?php
namespace Musicoelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Musico elementor hero section widget.
 *
 * @since 1.0
 */
class Musico_Hero extends Widget_Base {

	public function get_name() {
		return 'musico-hero';
	}

	public function get_title() {
		return __( 'Hero Section', 'musico-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'musico-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero section content', 'musico-companion' ),
			]
        );
        $this->add_control(
            'sec_img',
            [
                'label' => esc_html__( 'Bg Image', 'musico-companion' ),
                'description' => esc_html__( 'Best size is 1920x1080', 'musico-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'musico-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Musician', 'musico-companion' ),
            ]
        );
        $this->add_control(
            'music_section_separator',
            [
                'label' => esc_html__( 'Music Section', 'musico-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'man_img',
            [
                'label' => esc_html__( 'Music Image', 'musico-companion' ),
                'description' => esc_html__( 'Best size is 148x148', 'musico-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Music Title', 'musico-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Frando Kally', 'musico-companion' ),
            ]
        );
        $this->add_control(
            'date',
            [
                'label' => esc_html__( 'Music Date', 'musico-companion' ),
                'type' => Controls_Manager::DATE_TIME,
                'label_block' => true,
                'picker_options'   => [
                    'dateFormat' => 'd F, Y'
                ],
            ]
        );
        $this->add_control(
            'music',
            [
                'label' => esc_html__( 'Music', 'musico-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'btn_title',
            [
                'label' => esc_html__( 'Music Title', 'musico-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Buy Album', 'musico-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Music URL', 'musico-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url' => '#'
                ]
            ]
        );
        $this->end_controls_section(); // End Hero content


    /**
     * Style Tab
     * ------------------------------ Style Title ------------------------------
     *
     */
        $this->start_controls_section(
			'style_title', [
				'label' => __( 'Style Hero Section', 'musico-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_col', [
				'label' => __( 'Title Color', 'musico-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}
    
	protected function render() {    
    // call load widget script
    $this->load_widget_script(); 
    $settings  = $this->get_settings();
    $sec_img   = !empty( $settings['sec_img']['url'] ) ? $settings['sec_img']['url'] : '';
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $music = !empty( $settings['music']['url'] ) ? $settings['music']['url'] : '';
    $man_img = !empty( $settings['man_img']['id'] ) ? wp_get_attachment_image( $settings['man_img']['id'], 'musico_music_man_thumb_148x148', '', array( 'alt' => 'man image' ) ) : '';
    $title = !empty( $settings['title'] ) ? $settings['title'] : '';
    $date = !empty( $settings['date'] ) ? $settings['date'] : '';
    $btn_title = !empty( $settings['btn_title'] ) ? $settings['btn_title'] : '';
    $btn_url = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
    ?>

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center overlay2" <?php echo musico_inline_bg_img( esc_url( $sec_img ) ); ?>>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider_text text-center ">
                            <?php 
                                if ( $sec_title ) { 
                                    echo '<h3>'.esc_html( $sec_title ).'</h3>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- music_area  -->
    <div class="music_area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-10">
                    <div class="row align-items-center">
                        <div class="col-xl-9 col-md-9">
                            <div class="music_field">
                                <?php 
                                    if ( $man_img ) { 
                                        echo '
                                        <div class="thumb">
                                            '.$man_img.'
                                        </div>
                                        ';
                                    }
                                ?>
                                <div class="audio_name">
                                    <div class="name">
                                        <?php 
                                            if ( $title ) { 
                                                echo '<h4>'.esc_html( $title ).'</h4>';
                                            }
                                            if ( $date ) { 
                                                echo '<p>'.esc_html( $date ).'</p>';
                                            }
                                        ?>
                                    </div>
                                    <audio preload="auto" controls>
                                        <source src="<?php echo esc_url( $music )?>">
                                    </audio>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3">
                            <div class="music_btn">
                                <?php 
                                    if ( $btn_title ) { 
                                        echo '<a href="'.esc_url($btn_url).'" class="boxed-btn">'.esc_html($btn_title).'</a>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- music_area end  -->
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