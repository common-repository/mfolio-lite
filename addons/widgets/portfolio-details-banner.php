<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
/**
 *
 * Portfolio Post Widget .
 *
 */
class Mfolio_Portfolio_Details_Banner extends Widget_Base {

	public function get_name() {
		return 'mfolioportfoliodetailsbanner';
	}

	public function get_title() {
		return esc_html__( 'Portfolio Details Banner', 'mfolio-lite' );
	}

	public function get_icon() {
		return 'icon-Group-825';
    }

	public function get_categories() {
		return [ 'mfolio-lite' ];
	}

	protected function register_controls() {

        $this->start_controls_section(
			'portfolio_details_section',
			[
				'label' => esc_html__( 'Go Premium For Portfolio Details Banner', 'mfolio-lite' ),
			]
        );

        $this->add_control(
            'mfolio_control_get_pro',
            [
                'label'         => esc_html__( 'Unlock The Widget', 'mfolio-lite' ),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    '1'     => [
                            'title' => esc_html__( '', 'mfolio-lite' ),
                            'icon'  => 'fa fa-unlock-alt',
                    ],
                ],
                'default'       => '1',
                'description'   => '<span class="pro-feature"> Get the  <a href="https://codecanyon.net/item/mfolio-wordpress-portfolio-plugin-for-elementor/27154459?s_rank=1" target="_blank">Pro version</a> for more stunning elements and customization options.</span>',
            ]
        );

        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

	}
}