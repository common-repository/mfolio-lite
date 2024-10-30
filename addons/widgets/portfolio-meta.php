<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Portfolio Post Widget .
 *
 */
class Mfolio_Portfolio_Meta extends Widget_Base {

	public function get_name() {
		return 'mfolioportfoliometa';
	}

	public function get_title() {
		return esc_html__( 'Portfolio Meta', 'mfolio-lite' );
	}

	public function get_icon() {
		return 'icon-Group-825';
    }

	public function get_categories() {
		return [ 'mfolio-lite' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'portfolio_meta_section',
			[
				'label'     => esc_html__( 'Portfolio Meta', 'mfolio-lite' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'meta_title', [
				'label'         => esc_html__( 'Meta Title', 'mfolio-lite' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => esc_html__( 'Book Cover Design' , 'mfolio-lite' ),
				'label_block'   => true,
			]
		);

        $repeater = new Repeater();

        $repeater->add_control(
			'select_option_type',
            [
				'label'         => esc_html__( 'Select Option Type', 'mfolio-lite' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => esc_html__( 'text' , 'mfolio-lite' ),
				'label_block'   => true,
                'options'       => [
					'text'         => esc_html__( 'Text', 'mfolio-lite' ),
					'date'         => esc_html__( 'Date', 'mfolio-lite' ),
				],
			]
		);

		$repeater->add_control(
			'text_option_name', [
				'label'         => esc_html__( 'Option Name', 'mfolio-lite' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => esc_html__( 'Client' , 'mfolio-lite' ),
				'label_block'   => true,
			]
		);

		$repeater->add_control(
			'text_option_value', [
				'label'         => esc_html__( 'Option Value','mfolio-lite' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => esc_html__( 'Themelooks','mfolio-lite' ),
				'label_block'   => true,
                'conditon'      => [ 'select_option_type' => 'text' ]
			]
		);

        $repeater->add_control(
			'text_link',
			[
				'label'         => esc_html__( 'Link', 'mfolio-lite' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'mfolio-lite' ),
				'show_external' => true,
				'default'   => [
					'url'          => '#',
					'is_external'  => true,
					'nofollow'     => true,
				],
                'conditon'      => [ 'select_option_type' => 'text' ]
			]
		);

        $repeater->add_control(
			'project_date',
			[
				'label'     => esc_html__( 'Project Date', 'mfolio-lite' ),
				'type'      => Controls_Manager::DATE_TIME,
                'conditon'  => [ 'select_option_type' => 'date' ]
			]
		);

		$this->add_control(
			'portfolio_meta',
			[
				'label'     => esc_html__( 'Meta', 'mfolio-lite' ),
				'type'      => Controls_Manager::REPEATER,
				'fields'    => $repeater->get_controls(),
				'default' => [
					[
						'text_option_value' => esc_html__( 'Themelooks', 'mfolio-lite' ),
					],
					[
						'text_option_value' => esc_html__( 'Product Design', 'mfolio-lite' ),
					],
				],
				'title_field' => '{{{ text_option_name }}}',
			]
		);

        $this->add_control(
            'meta_description', [
                'label'         => esc_html__( 'Meta Description', 'mfolio-lite' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'portfolio_meta_title_style_section',
			[
				'label'         => esc_html__( 'Title Style', 'mfolio-lite' ),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'sticky_top_position',
			[
				'label'         => esc_html__( 'Sticky Top Position', 'mfolio-lite' ),
				'type'          => Controls_Manager::SLIDER,
				'size_units'    => [ 'px' ],
				'range'         => [
					'px'           => [
						'min'             => 0,
						'max'             => 500,
						'step'            => 10,
					],
				],
				'default'   => [
					'unit'         => 'px',
					'size'         => 0,
				],
                'selectors' => [
					'.position-sticky' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'portfolio_meta_title_color',
			[
				'label'         => esc_html__( 'Meta Title Color', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .portfolio-details .entry-header-mfolio.style-1 .featured-area .featured-area-title' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'portfolio_meta_title_typography',
				'label'         => esc_html__( 'Meta Title Typography', 'mfolio-lite' ),
				'selector'      => '{{WRAPPER}} .portfolio-details .entry-header-mfolio.style-1 .featured-area .featured-area-title',
			]
        );

        $this->add_responsive_control(
			'portfolio_meta_title_margin',
			[
				'label'         => esc_html__( 'Meta Title Margin', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .portfolio-details .entry-header-mfolio.style-1 .featured-area .featured-area-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'portfolio_meta_title_padding',
			[
				'label'         => esc_html__( 'Meta Title Padding', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .portfolio-details .entry-header-mfolio.style-1 .featured-area .featured-area-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
			'portfolio_meta_style_section',
			[
				'label'         => esc_html__( 'Meta Option', 'mfolio-lite' ),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'portfolio_meta_color',
			[
				'label'         => esc_html__( 'Option Color', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .portfolio-details .entry-header-mfolio.style-1 .featured-area .featured-options li .option-name' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'portfolio_meta_typography',
				'label'         => esc_html__( 'Option Typography', 'mfolio-lite' ),
				'selector'      => '{{WRAPPER}} .portfolio-details .entry-header-mfolio.style-1 .featured-area .featured-options li .option-name',
			]
        );

        $this->add_responsive_control(
			'portfolio_meta_margin',
			[
				'label'         => esc_html__( 'Option Margin', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}}  .portfolio-details .entry-header-mfolio.style-1 .featured-area .featured-options li .option-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'portfolio_meta_padding',
			[
				'label'         => esc_html__( 'Option Padding', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}}  .portfolio-details .entry-header-mfolio.style-1 .featured-area .featured-options li .option-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
				'separator'		=> 'after',
			]
		);

        $this->add_control(
			'portfolio_meta_value_color',
			[
				'label'         => esc_html__( 'Value Color', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .portfolio-details .entry-header-mfolio.style-1 .featured-area .featured-options li .value' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'portfolio_meta_value_typography',
				'label'         => esc_html__( 'Value Typography', 'mfolio-lite' ),
				'selector'      => '{{WRAPPER}} .portfolio-details .entry-header-mfolio.style-1 .featured-area .featured-options li .value',
			]
        );

        $this->add_responsive_control(
			'portfolio_meta_value_margin',
			[
				'label'         => esc_html__( 'Value Margin', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .portfolio-details .entry-header-mfolio.style-1 .featured-area .featured-options li .value' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'portfolio_meta_value_padding',
			[
				'label'         => esc_html__( 'Value Padding', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .portfolio-details .entry-header-mfolio.style-1 .featured-area .featured-options li .value' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'portfolio_meta_desc_style_section',
			[
				'label'         => esc_html__( 'Description Style', 'mfolio-lite' ),
				'tab'           => Controls_Manager::TAB_STYLE,
                'condition'     => [ 'meta_description!' => ''  ]
			]
        );

        $this->add_control(
			'portfolio_meta_desc_color',
			[
				'label'         => esc_html__( 'Meta Description Color', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .portfolio-details .entry-header-mfolio.style-1 .featured-area .description' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'portfolio_meta_desc_typography',
				'label'         => esc_html__( 'Meta Description Typography', 'mfolio-lite' ),
				'selector'      => '{{WRAPPER}} .portfolio-details .entry-header-mfolio.style-1 .featured-area .description',
			]
        );

        $this->add_responsive_control(
			'portfolio_meta_desc_margin',
			[
				'label'         => esc_html__( 'Meta Description Margin', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .portfolio-details .entry-header-mfolio.style-1 .featured-area .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'portfolio_meta_desc_padding',
			[
				'label'         => __( 'Meta Description Padding', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .portfolio-details .entry-header-mfolio.style-1 .featured-area .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);
        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $portfolio_meta = $settings['portfolio_meta'];

        if( !empty( $portfolio_meta ) ){
            echo '<div class="portfolio-details">';
                echo '<div class="entry-header-mfolio style-1">';
                    echo '<div class="featured-area">';
                        if( !empty( $settings['meta_title'] ) ){
                            echo '<h2 class="featured-area-title">'.esc_html( $settings['meta_title'] ).'</h2>';
                        }
                        echo '<ul class="featured-options">';
                            foreach( $portfolio_meta as $meta ){
                                echo '<li>';
                                    if( !empty( $meta['text_option_name'] ) ){
                                        echo '<span class="option-name">'.esc_html( $meta['text_option_name'] ).'</span>';
                                    }
                                    if( $meta['select_option_type'] == 'text' ){
                                        if( !empty( $meta['text_option_value'] ) ){
                                            echo '<span class="value">';
                                                if( !empty( $meta['text_link']['url'] ) ){
                                                    $target     = $meta['text_link']['is_external'] ? ' target="_blank"' : '';
            		                                $nofollow   = $meta['text_link']['nofollow'] ? ' rel="nofollow"' : '';
                                                    echo '<a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $meta['text_link']['url'] ).'">';
                                                }

                                                echo esc_html( $meta['text_option_value'] );

                                                if( !empty( $meta['text_link']['url'] ) ){
                                                    echo '</a>';
                                                }
                                            echo '</span>';
                                        }
                                    }else{
                                        $project_date = strtotime( $meta['project_date'] );
                                        if( !empty( $project_date ) ){
                                            echo '<span class="value">';
                                                echo esc_html( date('d-m-Y',$project_date ) );
                                            echo '</span>';
                                        }
                                    }
                                echo '</li>';
                            }

                        echo '</ul>';
                        if( !empty( $settings['meta_description'] ) ){
                            echo '<p class="description">'.wp_kses_post( $settings['meta_description'] ).'</p>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }

	}
}