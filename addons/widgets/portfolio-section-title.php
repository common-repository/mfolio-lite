<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
/**
 *
 * Section Title Widget .
 *
 */
class Mfolio_Portfolio_Section_Title extends Widget_Base {

	public function get_name() {
		return 'mfoliosectiontitle';
	}

	public function get_title() {
		return esc_html__( 'Section Title', 'mfolio-lite' );
	}

	public function get_icon() {
		return 'icon-Group-825';
    }

	public function get_categories() {
		return [ 'mfolio-lite' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_title_section',
			[
				'label'     => esc_html__( 'Section Title', 'mfolio-lite' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'section_title',
			[
				'label'     => esc_html__( 'Section Title', 'mfolio-lite' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => esc_html__( 'Section Title', 'mfolio-lite' )
			]
        );

        $this->add_control(
			'section_title_tag',
			[
				'label'     => esc_html__( 'Title Tag', 'mfolio-lite' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'p'  =>  'P',
					'span'  =>  'span',
				],
				'default' => 'h2',
			]
        );


        $this->add_control(
			'section_subtitle',
			[
				'label'         => esc_html__( 'Section Subtitle', 'mfolio-lite' ),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => esc_html__( 'Section Subtitle', 'mfolio-lite' )
			]
        );

        $this->add_control(
			'section_subtitle_tag',
			[
				'label'     => esc_html__( 'Subitle Tag', 'mfolio-lite' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'p'  =>  'P',
					'span'  =>  'span',
				],
				'default'   => 'h4',
				'condition'	=> ['section_subtitle!' => '']
			]
		);

        $this->add_control(
			'section_short_desc',
			[
				'label'     => esc_html__( 'Section Short Description', 'mfolio-lite' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => esc_html__( 'Section Short Description', 'mfolio-lite' )
			]
        );

		$this->add_control(
			'title_style',
			[
				'label' 	=> esc_html__( 'Title Style', 'mfolio-lite' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'style-1',
				'options' 	=> [
					'style-1'  		=> esc_html__( 'Style One', 'mfolio-lite' ),
					'default' 		=> esc_html__( 'Style Two', 'mfolio-lite' ),
					'style-3' 		=> esc_html__( 'Style Three', 'mfolio-lite' ),
					'personal' 		=> esc_html__( 'Style Four', 'mfolio-lite' ),
				],
			]
		);

        $this->add_control(
			'section_title_align',
			[
				'label'     => esc_html__( 'Alignment', 'mfolio-lite' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'text-left'    => [
						'title'           => esc_html__( 'Left', 'mfolio-lite' ),
						'icon'            => 'fa fa-align-left',
					],
					'text-center'  => [
						'title'           => esc_html__( 'Center', 'mfolio-lite' ),
						'icon'            => 'fa fa-align-center',
					],
					'text-right'   => [
						'title'           => esc_html__( 'Right', 'mfolio-lite' ),
						'icon'            => 'fa fa-align-right',
					],
				],
				'default'   => 'text-left',
				'toggle'    => true,
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'general',
			[
				'label'     => esc_html__( 'General', 'mfolio-lite' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'section_wrapper_margin',
			[
				'label'         => esc_html__( 'Section Wrapper Margin', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .foliodon-section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'section_wrapper_padding',
			[
				'label'         => esc_html__( 'Section Wrapper Padding', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .foliodon-section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'     => 'after'
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_style_section',
            [
                'label'     => esc_html__( 'Section Title Style', 'mfolio-lite' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'section_title!'    => ''
                ]
            ]
        );

        $this->add_control(
			'section_title_color',
			[
				'label'         => esc_html__( 'Section Title Color', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .foliodon-section-title .title_heading .title-selector' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'section_title_stroke_color',
			[
				'label'         => esc_html__( 'Section Title Stroke Color', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .foliodon-section-title.personal h2' => '-webkit-text-stroke:1px {{VALUE}}',
                ],
                'condition' => [
                    'title_style'    => 'personal'
                ]
			]
        );

        $this->add_control(
			'section_hypen_color',
			[
				'label'         => esc_html__( 'Hypen Color After Title', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .foliodon-section-title.default h2:before' => 'background-color: {{VALUE}}',
                ],
                'condition' => [ 'title_style'    => 'default' ]
			]
        );

        $this->add_responsive_control(
            'hypen_margin_left',
            [
                'label'         => esc_html__( 'Hypen Margin Left', 'mfolio-lite' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => [ 'px' ],
                'range'         => [
                    'px'           => [
                        'min'             => -1000,
                        'max'             => 500,
                        'step'            => 1,
                    ],
                ],
                'default'       => [
                    'unit'         => 'px',
                    'size'         => 20,
                ],
                'selectors'     => [
					'{{WRAPPER}} .foliodon-section-title.default h2:before' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
                'condition' => [ 'title_style'    => 'default' ]
            ]
        );

        $this->add_responsive_control(
            'hypen_width',
            [
                'label'         => esc_html__( 'Hypen Width', 'mfolio-lite' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => [ 'px' ],
                'range'         => [
                    'px'           => [
                        'min'             => 1,
                        'max'             => 500,
                        'step'            => 1,
                    ],
                ],
                'default'       => [
                    'unit'         => 'px',
                    'size'         => 40,
                ],
                'selectors'     => [
					'{{WRAPPER}} .foliodon-section-title.default h2:before' => 'width: {{SIZE}}{{UNIT}};',
				],
                'condition' => [ 'title_style'    => 'default' ]
            ]
        );

        $this->add_responsive_control(
            'hypen_height',
            [
                'label'         => esc_html__( 'Hypen Height', 'mfolio-lite' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => [ 'px' ],
                'range'         => [
                    'px'           => [
                        'min'             => 1,
                        'max'             => 500,
                        'step'            => 1,
                    ],
                ],
                'default'       => [
                    'unit'         => 'px',
                    'size'         => 1,
                ],
                'selectors'     => [
					'{{WRAPPER}} .foliodon-section-title.default h2:before' => 'height: {{SIZE}}{{UNIT}};',
				],
                'condition' => [ 'title_style'    => 'default' ]
            ]
        );

        $this->add_responsive_control(
            'hypen_top_position',
            [
                'label'         => esc_html__( 'Hypen Top Position', 'mfolio-lite' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => [ 'px' ],
                'range'         => [
                    'px'           => [
                        'min'             => -500,
                        'max'             => 500,
                        'step'            => 1,
                    ],
                ],
                'default'       => [
                    'unit'         => 'px',
                    'size'         => 30,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .foliodon-section-title.default h2:before' => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [ 'title_style'    => 'default' ]
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'section_title_typography',
				'label'         => esc_html__( 'Section Title Typography', 'mfolio-lite' ),
                'selector'      => '{{WRAPPER}} .foliodon-section-title .title_heading .title-selector',
                'condition'     => [
                    'section_title!'    => ''
                ]
			]
		);

        $this->add_responsive_control(
			'section_title_margin',
			[
				'label'         => esc_html__( 'Section Title Margin', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .foliodon-section-title .title_heading .title-selector' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'     => [
                    'section_title!'    => ''
                ]
			]
        );

        $this->add_responsive_control(
			'section_title_padding',
			[
				'label'         => esc_html__( 'Section Title Padding', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .foliodon-section-title .title_heading .title-selector' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'     => [
                    'section_title!'    => ''
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'section_subtitle_style_section',
            [
                'label'     => esc_html__( 'Section Subtitle Style', 'mfolio-lite' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'section_subtitle!'    => ''
                ],
            ]
        );
		$this->add_control(
			'section_subtitle_color',
			[
				'label'         => esc_html__( 'Section Subtitle Color', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .foliodon-section-title .title_subheading .subtitle-selector' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
            'subtitle_hypen_color',
            [
                'label'         => esc_html__( 'Hypen Color After Subtitle', 'mfolio-lite' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .foliodon-section-title.style-3 .title_subheading h4:after' => 'background-color: {{VALUE}}',
                ],
                'condition' => [ 'title_style'    => 'style-3' ]
            ]
        );

        $this->add_responsive_control(
            'hypen_margin_left_subtitle',
            [
                'label'         => esc_html__( 'Hypen Margin Left', 'mfolio-lite' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => [ 'px' ],
                'range'         => [
                    'px'           => [
                        'min'             => -1000,
                        'max'             => 500,
                        'step'            => 1,
                    ],
                ],
                'default'       => [
                    'unit'         => 'px',
                    'size'         => 0,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .foliodon-section-title.style-3 .title_subheading h4:after' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [ 'title_style'    => 'style-3' ]
            ]
        );

        $this->add_responsive_control(
            'hypen_width_subtitle',
            [
                'label'         => esc_html__( 'Hypen Width', 'mfolio-lite' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => [ 'px' ],
                'range'         => [
                    'px'           => [
                        'min'             => 1,
                        'max'             => 500,
                        'step'            => 1,
                    ],
                ],
                'default'       => [
                    'unit'         => 'px',
                    'size'         => 40,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .foliodon-section-title.style-3 .title_subheading h4:after' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [ 'title_style'    => 'style-3' ]
            ]
        );

        $this->add_responsive_control(
            'hypen_height_subtitle',
            [
                'label'         => esc_html__( 'Hypen Height', 'mfolio-lite' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => [ 'px' ],
                'range'         => [
                    'px'           => [
                        'min'             => 1,
                        'max'             => 500,
                        'step'            => 1,
                    ],
                ],
                'default'       => [
                    'unit'         => 'px',
                    'size'         => 1,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .foliodon-section-title.style-3 .title_subheading h4:after' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [ 'title_style'    => 'style-3' ]
            ]
        );

        $this->add_responsive_control(
            'hypen_top_position_subtitle',
            [
                'label'         => esc_html__( 'Hypen Top Position', 'mfolio-lite' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => [ 'px' ],
                'range'         => [
                    'px'           => [
                        'min'             => -500,
                        'max'             => 500,
                        'step'            => 1,
                    ],
                ],
                'default'       => [
                    'unit'         => 'px',
                    'size'         => 10,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .foliodon-section-title.style-3 .title_subheading h4:after' => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [ 'title_style'    => 'style-3' ]
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'section_subtitle_typography',
				'label'         => esc_html__( 'Section Subtitle Typography', 'mfolio-lite' ),
                'selector'      => '{{WRAPPER}} .foliodon-section-title .title_subheading .subtitle-selector',
			]
        );

        $this->add_responsive_control(
			'section_subtitle_margin',
			[
				'label'         => esc_html__( 'Section Subtitle Margin', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .foliodon-section-title .title_subheading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'section_subtitle_padding',
			[
				'label'         => esc_html__( 'Section Subtitle Padding', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .foliodon-section-title .title_subheading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
            'section_desc_style_section',
            [
                'label'     => esc_html__( 'Section Description Style', 'mfolio-lite' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'section_short_desc!'    => ''
                ],
            ]
        );

        $this->add_control(
			'section_desc_color',
			[
				'label'         => esc_html__( 'Section Description Color', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .foliodon-section-title .title_text p' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'              => 'section_desc_typography',
				'label'             => esc_html__( 'Section Description Typography', 'mfolio-lite' ),
                'selector'          => '{{WRAPPER}} .foliodon-section-title .title_text p',
			]
        );

        $this->add_responsive_control(
			'section_desc_margin',
			[
				'label'             => esc_html__( 'Section Description Margin', 'mfolio-lite' ),
				'type'              => Controls_Manager::DIMENSIONS,
				'size_units'        => [ 'px', '%', 'em' ],
				'selectors'         => [
					'{{WRAPPER}} .foliodon-section-title .title_text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'section_desc_padding',
			[
				'label'             => esc_html__( 'Section Description Padding', 'mfolio-lite' ),
				'type'              => Controls_Manager::DIMENSIONS,
				'size_units'        => [ 'px', '%', 'em' ],
				'selectors'         => [
					'{{WRAPPER}} .foliodon-section-title .title_text p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);


        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper','class','foliodon-section-title' );
        $this->add_render_attribute( 'wrapper','class',$settings['title_style'] );
        $this->add_render_attribute( 'wrapper','class',$settings['section_title_align'] );

        echo '<!-- Section Title -->';
		echo '<div '.$this->get_render_attribute_string('wrapper').' >';
			if( !empty( $settings['section_subtitle'] ) ) {
				echo '<div class="title_subheading">';
		            echo '<'.esc_attr($settings['section_subtitle_tag']).' class="subtitle-selector">'.wp_kses_post( $settings['section_subtitle'] ).'</'.esc_attr($settings['section_subtitle_tag']).'>';
				echo '</div>';
			}
			if( !empty( $settings['section_title'] ) ) {
				echo '<div class="title_heading">';
					echo '<'.esc_attr($settings['section_title_tag']).' class="title-selector">'.wp_kses_post( $settings['section_title'] ).'</'.esc_attr($settings['section_title_tag']).'>';
				echo '</div>';
			}
			if( !empty( $settings['section_short_desc'] ) ) {
				echo '<div class="title_text">';
					echo '<p>'. wp_kses_post( $settings['section_short_desc'] ).'</p>';
				echo '</div>';
			}
        echo '</div>';
        echo '<!-- End Section Title -->';
	}

}