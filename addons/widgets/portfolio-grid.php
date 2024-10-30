<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
/**
 *
 * Portfolio Post Widget .
 *
 */
class Mfolio_Portfolio_Grid extends Widget_Base {

	public function get_name() {
		return 'mfolioportfoliogrid';
	}

	public function get_title() {
		return esc_html__( 'Portfolio Grid', 'mfolio-lite' );
	}

	public function get_icon() {
		return 'icon-Group-825';
    }

	public function get_categories() {
		return [ 'mfolio-lite' ];
	}

    public function get_script_depends() {
        return [ 'masonary-pkgd','imagesloaded' ];
    }

	protected function register_controls() {

		$this->start_controls_section(
			'portfolio_grid_section',
			[
				'label'     => esc_html__( 'Portfolio Grid', 'mfolio-lite' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'portfolio_grid_style',
			[
				'label'     => esc_html__( 'Style', 'mfolio-lite' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    '1'         => esc_html__( 'Style One (Pro)', 'mfolio-lite' ),
                    '2'         => esc_html__( 'Style Two', 'mfolio-lite' ),
                    '3'         => esc_html__( 'Style Three (Pro)', 'mfolio-lite' ),
                    '4'         => esc_html__( 'Style Four', 'mfolio-lite' ),
                ],
                'default'   => '2'
			]
        );

        $this->add_control(
            'mfolio_control_get_pro',
            [
                'label'         => esc_html__( 'Hey I Am Locked. Unlock Me!!!', 'mfolio-lite' ),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    '1'     => [
                            'title' => esc_html__( '', 'mfolio-lite' ),
                            'icon'  => 'fa fa-unlock-alt',
                    ],
                ],
                'default'       => '1',
                'description'   => '<span class="pro-feature"> Get the  <a href="https://codecanyon.net/item/mfolio-wordpress-portfolio-plugin-for-elementor/27154459?s_rank=1" target="_blank">Pro version</a> for more stunning elements and customization options.</span>',
                'condition'     => [ 'portfolio_grid_style' => ['1','3'] ]
            ]
        );

		$this->add_control(
			'portfolio_column',
			[
				'label'     => esc_html__( 'Portfolio Column', 'mfolio-lite' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    '2'         => esc_html__( 'Two Column','mfolio-lite' ),
                    '3'         => esc_html__( 'Three Column','mfolio-lite' ),
                    '4'         => esc_html__( 'Four Column','mfolio-lite' ),
                ],
                'default'   => '3'
			]
        );


		$this->add_control(
			'show_pagination',
			[
				'label' 		=> esc_html__( 'Show Pagination?', 'mfolio-lite' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> esc_html__( 'Yes', 'mfolio-lite' ),
				'label_off' 	=> esc_html__( 'No', 'mfolio-lite' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

        $this->add_control(
			'portfolio_grid_count',
			[
				'label'     => esc_html__( 'No of Post to show', 'mfolio-lite' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => 3,
			]
        );

        $this->add_control(
			'portfolio_grid_order',
			[
				'label'         => esc_html__( 'Order', 'mfolio-lite' ),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'ASC'           => esc_html__( 'ASC', 'mfolio-lite' ),
                    'DESC'          => esc_html__( 'DESC', 'mfolio-lite' ),
                ],
                'default'       => 'DESC'
			]
        );

        $this->add_control(
			'portfolio_grid_order_by',
			[
				'label'         => esc_html__( 'Order By', 'mfolio-lite' ),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'ID'            => esc_html__( 'ID', 'mfolio-lite' ),
                    'author'        => esc_html__( 'Author', 'mfolio-lite' ),
                    'title'         => esc_html__( 'Title', 'mfolio-lite' ),
                    'date'          => esc_html__( 'Date', 'mfolio-lite' ),
                    'rand'          => esc_html__( 'Random', 'mfolio-lite' ),
                ],
                'default'       => 'rand'
			]
        );

        $this->add_control(
			'exclude_cats',
			[
				'label'         => esc_html__( 'Exclude Categories', 'mfolio-lite' ),
                'type'          => Controls_Manager::SELECT2,
                'multiple'      => true,
				'options'       => $this->mfolio_get_categories(),
			]
        );

        $this->add_control(
			'exclude_tags',
			[
				'label'         => esc_html__( 'Exclude Tags', 'mfolio-lite' ),
                'type'          => Controls_Manager::SELECT2,
                'multiple'      => true,
				'options'       => $this->mfolio_get_tags(),
			]
        );

        $this->add_control(
			'exclude_post_id',
			[
				'label'         => esc_html__( 'Exclude Post', 'mfolio-lite' ),
                'type'          => Controls_Manager::SELECT2,
                'multiple'      => true,
				'options'       => $this->mfolio_post_id(),
			]
        );

        $this->add_control(
			'text_align',
			[
				'label'         => esc_html__( 'Alignment', 'mfolio-lite' ),
				'type'          => Controls_Manager::CHOOSE,
				'options'       => [
					'text-left'       => [
						'title'           => esc_html__( 'Left', 'mfolio-lite' ),
						'icon'            => 'fa fa-align-left',
					],
					'text-center'     => [
						'title'           => esc_html__( 'Center', 'mfolio-lite' ),
						'icon'            => 'fa fa-align-center',
					],
					'text-right'      => [
						'title'           => esc_html__( 'Right', 'mfolio-lite' ),
						'icon'            => 'fa fa-align-right',
					],
				],
				'default'   => 'center',
				'toggle'    => true,
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'general',
			[
				'label'         => esc_html__( 'General', 'mfolio-lite' ),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'hover_bg_color',
			[
				'label'         => esc_html__( 'Portfolio Item Hover Background', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .portfolio_item.style-4:before' => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'portfolio_grid_style' => '3' ],
			]
        );

        $this->add_control(
			'gap_style',
			[
				'label'     => esc_html__( 'Item Gap Type', 'mfolio-lite' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'default',
				'options'   => [
					'default'        => esc_html__( 'Default', 'mfolio-lite' ),
					'custom'         => esc_html__( 'Custom', 'mfolio-lite' ),
				],
			]
		);

		$this->add_responsive_control(
			'item_margin',
			[
				'label'         => esc_html__( 'Item Margin', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .foliodon-no-gutters .portfolio-grid-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'     => [ 'gap_style'   =>  'custom' ]
			]
        );

		$this->add_responsive_control(
			'item_padding',
			[
				'label'         => esc_html__( 'Item Padding', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .foliodon-no-gutters .portfolio-grid-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'     => [ 'gap_style'   =>  'custom' ]
			]
        );

		$this->add_responsive_control(
			'parent_margin',
			[
				'label'         => esc_html__( 'Parent Margin', 'mfolio-lite' ),
				'description'	=> esc_html__( 'The Padding You Set On Item Padding Give A Minus Value Here For Working Properly','mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .foliodon-no-gutters' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'     => [ 'gap_style'   =>  'custom' ]
			]
        );

		$this->end_controls_section();

        $this->start_controls_section(
			'post_title_style_section',
			[
				'label'         => esc_html__( 'Title', 'mfolio-lite' ),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'wrapper_background_color',
			[
				'label'         => esc_html__( 'Wrapper Background Color', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .portfolio_item.style-1 .portfolio_info' => 'background-color: {{VALUE}}',
				],
				'condition'		=> [ 'portfolio_grid_style'	=> '1' ]
			]
        );

        $this->add_control(
			'post_title_color',
			[
				'label'         => esc_html__( 'Title Color', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .portfolio_item .portfolio_info h4,{{WRAPPER}} .portfolio_item .portfolio_info h4 a,{{WRAPPER}} .project-item.agency .project-info h2 a' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'post_title_color_on_hover',
			[
				'label'         => esc_html__( 'Title Color On Hover', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .portfolio_item .portfolio_info h4:hover,{{WRAPPER}} .portfolio_item .portfolio_info h4 a:hover,{{WRAPPER}} .portfolio-grid-item .project-item.agency .project-info h2 a:hover' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'portfolio_grid_style!'	=> '1' ]
			]
        );

        $this->add_control(
			'post_title_color_on_hover_image',
			[
				'label'         => esc_html__( 'Title Color On Hover Image', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .project-item.agency:hover .project-info h2 a' => 'color: {{VALUE}}',
				],
				'condition'		=> [ 'portfolio_grid_style'	=> '4' ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'post_title_typography',
				'label'         => esc_html__( 'Title Typography', 'mfolio-lite' ),
				'selector'      => '{{WRAPPER}} .portfolio_item .portfolio_info h4,{{WRAPPER}} .project-item.agency .project-info h2 a',
			]
        );

        $this->add_responsive_control(
			'post_title_margin',
			[
				'label'         => esc_html__( 'Title Margin', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}}  .portfolio_item .portfolio_info h4,{{WRAPPER}} .project-item.agency .project-info h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'post_title_padding',
			[
				'label'         => esc_html__( 'Title Padding', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .portfolio_item .portfolio_info h4,{{WRAPPER}} .project-item.agency .project-info h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'category_style_section',
			[
				'label'         => esc_html__( 'Category', 'mfolio-lite' ),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'category_color',
			[
				'label' 		=> esc_html__( 'Category Color', 'mfolio-lite' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .portfolio_item .portfolio_info .cat-links a,{{WRAPPER}} .portfolio_item .portfolio_info .cat-links,{{WRAPPER}} .project-item.agency .project-info p a' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'category_color_on_hover',
			[
				'label' 		=> esc_html__( 'Category Color On Hover', 'mfolio-lite' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .portfolio_item .portfolio_info .cat-links a:hover,{{WRAPPER}} .portfolio_item .portfolio_info .cat-links:hover,{{WRAPPER}} .project-item.agency .project-info p a:hover' => 'color: {{VALUE}}',
                ],
				'condition'		=> [ 'portfolio_grid_style!'	=> '1' ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'category_typography',
				'label' 	=> esc_html__( 'Category Typography', 'mfolio-lite' ),
                'selector' 	=> '{{WRAPPER}} .portfolio_item .portfolio_info .cat-links a,{{WRAPPER}} .portfolio_item .portfolio_info .cat-links,{{WRAPPER}} .project-item.agency .project-info p a',
			]
        );

        $this->add_responsive_control(
			'category_margin',
			[
				'label' 			=> esc_html__( 'Category Margin', 'mfolio-lite' ),
				'type' 				=> Controls_Manager::DIMENSIONS,
				'size_units' 		=> [ 'px', '%', 'em' ],
				'selectors' 		=> [
					'{{WRAPPER}} .portfolio_item .portfolio_info .cat-links a,{{WRAPPER}} .portfolio_item .portfolio_info .cat-links,{{WRAPPER}} .project-item.agency .project-info p a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'category_padding',
			[
				'label' 		=> esc_html__( 'Category Padding', 'mfolio-lite' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .portfolio_item .portfolio_info .cat-links a,{{WRAPPER}} .portfolio_item .portfolio_info .cat-links,{{WRAPPER}} .project-item.agency .project-info p a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'pagination_style_section',
			[
				'label'         => esc_html__( 'Pagination', 'mfolio-lite' ),
				'tab'           => Controls_Manager::TAB_STYLE,
                'condition'     => [ 'show_pagination'  => 'yes' ]
			]
        );

        $this->add_control(
			'pagination_color',
			[
				'label' 		=> esc_html__( 'Pagination Color', 'mfolio-lite' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .foliodon-pagination a.page-numbers' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'pagination_color_on_hover',
			[
				'label' 		=> esc_html__( 'Pagination Color On Hover', 'mfolio-lite' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .foliodon-pagination a.page-numbers:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'pagination_typography',
				'label' 	=> esc_html__( 'Pagination Typography', 'mfolio-lite' ),
                'selector' 	=> '{{WRAPPER}} .foliodon-pagination a.page-numbers,{{WRAPPER}} .foliodon-pagination > *.current',
			]
        );

        $this->add_responsive_control(
			'pagination_margin',
			[
				'label' 			=> esc_html__( 'Pagination Margin', 'mfolio-lite' ),
				'type' 				=> Controls_Manager::DIMENSIONS,
				'size_units' 		=> [ 'px', '%', 'em' ],
				'selectors' 		=> [
					'{{WRAPPER}} .foliodon-pagination .page-numbers' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'pagination_padding',
			[
				'label' 		=> esc_html__( 'Pagination Padding', 'mfolio-lite' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .foliodon-pagination .page-numbers' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->add_control(
			'active_pagination_color',
			[
				'label' 		=> esc_html__( 'Active Pagination Color', 'mfolio-lite' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .foliodon-pagination > *.current' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'active_pagination_bgcolor',
			[
				'label' 		=> esc_html__( 'Active Pagination Bg Color', 'mfolio-lite' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .foliodon-pagination > *.current' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->end_controls_section();

    }

	// Get Categories
    public function mfolio_get_categories() {
        $cats = get_terms(array(
            'taxonomy' 		=> 'portfolio_category',
            'hide_empty' 	=> false,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = esc_html__( $singlecat->name, 'mfolio-lite' );
        }

        return $catarr;
    }

	// Get Tags
    public function mfolio_get_tags() {
        $cats = get_terms(array(
            'taxonomy'      => 'portfolio_tag',
            'hide_empty'    => false,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = esc_html__( $singlecat->name, 'mfolio-lite' );
        }

        return $catarr;
    }

	// Get Specific Post
	public function mfolio_post_id(){
		$args = array(
			'post_type'         => 'mfolio_portfolio',
			'posts_per_page'    => -1,
		);

		$mfolio_post = new WP_Query( $args );

		$postarray = [];

		while( $mfolio_post->have_posts() ){
			$mfolio_post->the_post();
			$postarray[get_the_Id()] = get_the_title();
		}
		wp_reset_postdata();
        return $postarray;
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		// Exclude Post Id
		$exclude_post_id =  $settings['exclude_post_id'];

        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

        if( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'         	=> 'mfolio_portfolio',
                'posts_per_page'    	=> esc_attr( $settings['portfolio_grid_count'] ),
                'order'             	=> esc_attr( $settings['portfolio_grid_order'] ),
                'orderby'           	=> esc_attr( $settings['portfolio_grid_order_by'] ),
                'ignore_sticky_posts'   => true,
				'tax_query'				=> array(
					array(
						'taxonomy' => 'portfolio_category',
			            'field'    => 'term_id',
			            'terms'    => $settings['exclude_cats'],
			            'operator' => 'NOT IN'
					),
				),
                'paged'                 =>  $paged
            );
        } elseif( !empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'         => 'mfolio_portfolio',
                'posts_per_page'    => esc_attr( $settings['portfolio_grid_count'] ),
                'order'             => esc_attr( $settings['portfolio_grid_order'] ),
                'orderby'           => esc_attr( $settings['portfolio_grid_order_by'] ),
                'ignore_sticky_posts'   => true,
				'tax_query'				=> array(
					'relation' 			=> 'AND',
					array(
						'taxonomy' => 'portfolio_category',
			            'field'    => 'term_id',
			            'terms'    => $settings['exclude_cats'],
			            'operator' => 'NOT IN'
					),
					array(
						'taxonomy' => 'portfolio_tag',
			            'field'    => 'term_id',
			            'terms'    => $settings['exclude_tags'],
			            'operator' => 'NOT IN'
					),
				),
                'paged'                 =>  $paged
            );
        } elseif( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'         => 'mfolio_portfolio',
                'posts_per_page'    => esc_attr( $settings['portfolio_grid_count'] ),
                'order'             => esc_attr( $settings['portfolio_grid_order'] ),
                'orderby'           => esc_attr( $settings['portfolio_grid_order_by'] ),
                'ignore_sticky_posts'   => true,
				'tax_query'				=> array(
					array(
						'taxonomy' => 'portfolio_category',
			            'field'    => 'term_id',
			            'terms'    => $settings['exclude_cats'],
			            'operator' => 'NOT IN'
					),
				),
                'post__not_in'      => $exclude_post_id,
                'paged'             => $paged
            );
        }elseif( !empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'         => 'mfolio_portfolio',
                'posts_per_page'    => esc_attr( $settings['portfolio_grid_count'] ),
                'order'             => esc_attr( $settings['portfolio_grid_order'] ),
                'orderby'           => esc_attr( $settings['portfolio_grid_order_by'] ),
                'ignore_sticky_posts'   => true,
				'tax_query'				=> array(
					array(
						'taxonomy' => 'portfolio_category',
			            'field'    => 'term_id',
			            'terms'    => $settings['exclude_cats'],
			            'operator' => 'NOT IN'
					),
					array(
						'taxonomy' => 'portfolio_tag',
			            'field'    => 'term_id',
			            'terms'    => $settings['exclude_tags'],
			            'operator' => 'NOT IN'
					),
				),
                'post__not_in'      => $exclude_post_id,
                'paged'             => $paged
            );
        }
        elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'         => 'mfolio_portfolio',
                'posts_per_page'    => esc_attr( $settings['portfolio_grid_count'] ),
                'order'             => esc_attr( $settings['portfolio_grid_order'] ),
                'orderby'           => esc_attr( $settings['portfolio_grid_order_by'] ),
                'ignore_sticky_posts'   => true,
				'tax_query'				=> array(
					array(
						'taxonomy' => 'portfolio_category',
			            'field'    => 'term_id',
			            'terms'    => $settings['exclude_cats'],
			            'operator' => 'NOT IN'
					),
				),
                'post__not_in'      => $exclude_post_id,
                'paged'             => $paged
            );
        } elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'         => 'mfolio_portfolio',
                'posts_per_page'    => esc_attr( $settings['portfolio_grid_count'] ),
                'order'             => esc_attr( $settings['portfolio_grid_order'] ),
                'orderby'           => esc_attr( $settings['portfolio_grid_order_by'] ),
                'ignore_sticky_posts'   => true,
				'tax_query'				=> array(
					array(
						'taxonomy' => 'portfolio_tag',
			            'field'    => 'term_id',
			            'terms'    => $settings['exclude_tags'],
			            'operator' => 'NOT IN'
					),
				),
                'paged'                 =>  $paged
            );
        } elseif( empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'         	=> 'mfolio_portfolio',
                'posts_per_page'    	=> esc_attr( $settings['portfolio_grid_count'] ),
                'order'             	=> esc_attr( $settings['portfolio_grid_order'] ),
                'orderby'           	=> esc_attr( $settings['portfolio_grid_order_by'] ),
                'ignore_sticky_posts'   => true,
                'post__not_in'      	=> $exclude_post_id,
                'paged'                 => $paged
            );
        } else {
            $args = array(
                'post_type'         => 'mfolio_portfolio',
                'posts_per_page'    => esc_attr( $settings['portfolio_grid_count'] ),
                'order'             => esc_attr( $settings['portfolio_grid_order'] ),
                'orderby'           => esc_attr( $settings['portfolio_grid_order_by'] ),
                'ignore_sticky_posts'   => true,
                'paged'                 =>  $paged
            );
        }


        $portfoliogrid = new WP_Query( $args );

        $column = $settings['portfolio_column'];

        $gap_style = $settings['gap_style'];

        if( $gap_style == 'default' ){
            $gap_amount = ' foliodon-gutters-60';
        }else{
            $gap_amount = ' foliodon-no-gutters';
        }

        if( $portfoliogrid->have_posts() ) {
            echo '<div class="foliodon-wrapper">';
			if( $settings['portfolio_grid_style'] == '2' ){
				echo '<div class="foliodon-row foliodon-row-cols-'.esc_attr( $column.$gap_amount ).' foliodon-masonry">';
				while( $portfoliogrid->have_posts() ) {
					$portfoliogrid->the_post();
                    echo '<div class="portfolio-grid-item">';
                        echo '<!-- Portfolio -->';
                        echo '<div class="portfolio_item style-3">';
                            if( has_post_thumbnail() ){
                                echo '<div class="portfolio_image">';
                                    echo '<a href="'.esc_url( get_the_permalink() ).'">';
                                        the_post_thumbnail();
                                    echo '</a>';
                                echo '</div>';
                            }
                            echo '<div class="portfolio_info '.esc_attr( $settings['text_align'] ).'">';
                            $portfolio_cat_terms = get_the_terms( get_the_ID() , 'portfolio_category' );
                                if( !empty( $portfolio_cat_terms ) ){
                                    echo '<span class="cat-links">';
                                        foreach( $portfolio_cat_terms as $terms ){
                                            echo '<a href="'.esc_url( get_term_link( $terms ) ).'"> '.esc_html( ucfirst( $terms->name ) ).' </a>';
                                        }
                                    echo '</span>';
                                }
                                if( get_the_title() ){
                                    echo '<h4><a href="'.esc_url( get_the_permalink() ).'">'.wp_kses_post( get_the_title() ).'</a></h4>';
                                }
                            echo '</div>';
                        echo '</div>';
                        echo '<!-- Portfolio -->';
                    echo '</div>';
				}
				wp_reset_postdata();
				echo '</div>';
			}else{
                echo '<div class="foliodon-row foliodon-row-cols-'.esc_attr( $column.$gap_amount ).' foliodon-masonry">';
					while( $portfoliogrid->have_posts() ) {
						$portfoliogrid->the_post();
						echo '<div class="portfolio-grid-item">';
							echo '<!-- Portfolio -->';
								echo '<div class="project-item agency">';
								if( has_post_thumbnail() ){
									echo '<div class="project-image">';
										the_post_thumbnail();
									echo '</div>';
								}
								echo '<div class="project-info '.esc_attr( $settings['text_align'] ).'">';
                                    if( get_the_title() ){
    									echo '<h2>';
    										echo '<a href="'.esc_url( get_the_permalink() ).'"> '.wp_kses_post( get_the_title() ).'</a>';
    									echo '</h2>';
                                    }
    								$portfolio_cat_terms = get_the_terms( get_the_ID() , 'portfolio_category' );
									if( !empty( $portfolio_cat_terms ) ){
                                        echo '<p>';
    										foreach( $portfolio_cat_terms as $terms ){
                                                echo '<a href="'.esc_url( get_term_link( $terms ) ).'"> '.esc_html( ucfirst( $terms->name ) ).'</a>';
                                            }
                                        echo '</p>';
                                    }
								echo '</div>';
							echo '</div>';
							echo '<!-- Portfolio -->';
						echo '</div>';
					}
					wp_reset_postdata();
				echo '</div>';
            }
			if( $settings['show_pagination'] == 'yes' ){
				$total_pages = $portfoliogrid->max_num_pages;
				if ( $total_pages > 1 ){
			        $current_page = max( 1, get_query_var('paged') );
                    $prev 	= '<img class="svg" src="'.esc_url( MFOLIO_LITE_PLUGDIRURI.'assets/img/long-arrow-left.svg' ).'"/>'.esc_html__( 'PREV','mfolio-lite' ).'';
                    $next 	= ''.esc_html__( 'NEXT','mfolio-lite' ).' <img class="svg" src="'.esc_url( MFOLIO_LITE_PLUGDIRURI.'assets/img/long-arrow-right.svg' ).'"/>';
					echo '<div class="foliodon-row">';
    					echo '<div class="foliodon-col">';
        					echo '<div class="foliodon-pagination">';
        				        echo paginate_links(array(
        				            'base' 			=> get_pagenum_link(1) . '%_%',
        				            'format' 		=> '/page/%#%',
        				            'current' 		=> $current_page,
        				            'total' 		=> $total_pages,
        				            'prev_text'    	=> $prev,
        				            'next_text'    	=> $next,
        				        ));
        					echo '</div>';
        				echo '</div>';
        			echo '</div>';
			    }
			}
            echo '</div>';
        }else{
            echo esc_html__( 'Create Some Portfolio Or Select Perfect Option To Show Portfolio', 'mfolio-lite' );
        }
	}
}