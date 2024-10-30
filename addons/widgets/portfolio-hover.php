<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
/**
 *
 * Portfolio Post Widget .
 *
 */
class Mfolio_Portfolio_Hover extends Widget_Base {

	public function get_name() {
		return 'mfolioportfoliohover';
	}

	public function get_title() {
		return esc_html__( 'Portfolio Hover', 'mfolio-lite' );
	}

	public function get_icon() {
		return 'icon-Group-825';
    }

	public function get_categories() {
		return [ 'mfolio-lite' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'portfolio_hover_section',
			[
				'label'     => esc_html__( 'Portfolio Hover', 'mfolio-lite' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'portfolio_hover_count',
			[
				'label'     => esc_html__( 'No of Post to show', 'mfolio-lite' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => 6,
			]
        );

        $this->add_control(
			'portfolio_hover_order',
			[
				'label'         => esc_html__( 'Order', 'mfolio-lite' ),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'ASC'           => esc_html__( 'ASC','mfolio-lite' ),
                    'DESC'          => esc_html__( 'DESC','mfolio-lite' ),
                ],
                'default'       => 'DESC'
			]
        );

        $this->add_control(
			'portfolio_hover_order_by',
			[
				'label'         => esc_html__( 'Order By', 'mfolio-lite' ),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'ID'            => esc_html__( 'ID','mfolio-lite' ),
                    'author'        => esc_html__( 'Author','mfolio-lite' ),
                    'title'         => esc_html__( 'Title','mfolio-lite' ),
                    'date'          => esc_html__( 'Date','mfolio-lite' ),
                    'rand'          => esc_html__( 'Random','mfolio-lite' ),
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

        $this->end_controls_section();

        $this->start_controls_section(
			'post_title_style_section',
			[
				'label'         => esc_html__( 'Title', 'mfolio-lite' ),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'post_title_color',
			[
				'label'         => esc_html__( 'Title Color', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .foliodon-wrapper a.portfolio_title' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'post_title_color_on_hover',
			[
				'label'         => esc_html__( 'Title Color On Hover', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .foliodon-wrapper a.portfolio_title:hover' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'post_title_text_stroke_color_on_hover',
			[
				'label'         => esc_html__( 'Title Text Stroke Color On Hover', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .portfolio_tabs [data-portfolio-tab-select].active a' => '-webkit-text-stroke:1px {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'post_title_typography',
				'label'         => esc_html__( 'Title Typography', 'mfolio-lite' ),
				'selector'      => '{{WRAPPER}} .foliodon-wrapper a.portfolio_title',
			]
        );

        $this->add_responsive_control(
			'post_title_margin',
			[
				'label'         => esc_html__( 'Title Margin', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .foliodon-wrapper .tab-btn ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .foliodon-wrapper .tab-btn ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'post_number_style_section',
			[
				'label'         => esc_html__( 'Number', 'mfolio-lite' ),
				'tab'           => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'post_number_color',
			[
				'label'         => esc_html__( 'Number Color', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .foliodon-wrapper .tab-btn ul li span' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'post_number_color_on_hover',
			[
				'label'         => esc_html__( 'Number Color On Hover', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .foliodon-wrapper .tab-btn ul li:hover span' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'post_number_text_stroke_color_on_hover',
			[
				'label'         => esc_html__( 'Number Text Stroke Color On Hover', 'mfolio-lite' ),
				'type'          => Controls_Manager::COLOR,
				'selectors'     => [
					'{{WRAPPER}} .portfolio_tabs [data-portfolio-tab-select].active span' => '-webkit-text-stroke:1px {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'post_number_typography',
				'label'         => esc_html__( 'Number Typography', 'mfolio-lite' ),
				'selector'      => '{{WRAPPER}} .foliodon-wrapper .tab-btn ul li span',
			]
        );

        $this->add_responsive_control(
			'post_number_margin',
			[
				'label'         => esc_html__( 'Number Margin', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .foliodon-wrapper .tab-btn ul li span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'post_number_padding',
			[
				'label'         => esc_html__( 'Number Padding', 'mfolio-lite' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .foliodon-wrapper .tab-btn ul li span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

    }

	// Get Categories
    public function mfolio_get_categories() {
        $cats = get_terms(array(
            'taxonomy' 		=> 'portfolio_category',
            'hide_empty' 	=> true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = esc_html__( $singlecat->name,'mfolio-lite' );
        }

        return $catarr;
    }

	// Get Tags
    public function mfolio_get_tags() {
        $cats = get_terms(array(
            'taxonomy' => 'portfolio_tag',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = esc_html__($singlecat->name,'mfolio-lite');
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

        if( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'         	=> 'mfolio_portfolio',
                'posts_per_page'    	=> esc_attr( $settings['portfolio_hover_count'] ),
                'order'             	=> esc_attr( $settings['portfolio_hover_order'] ),
                'orderby'           	=> esc_attr( $settings['portfolio_hover_order_by'] ),
                'ignore_sticky_posts'   => true,
				'tax_query'				=> array(
					array(
						'taxonomy' => 'portfolio_category',
			            'field'    => 'term_id',
			            'terms'    => $settings['exclude_cats'],
			            'operator' => 'NOT IN'
					),
				),
            );
        } elseif( !empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'         => 'mfolio_portfolio',
                'posts_per_page'    => esc_attr( $settings['portfolio_hover_count'] ),
                'order'             => esc_attr( $settings['portfolio_hover_order'] ),
                'orderby'           => esc_attr( $settings['portfolio_hover_order_by'] ),
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
            );
        }elseif( ! empty( $settings['exclude_cats'] ) && ! empty( $settings['exclude_tags'] ) && ! empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'         => 'mfolio_portfolio',
                'posts_per_page'    => esc_attr( $settings['portfolio_hover_count'] ),
                'order'             => esc_attr( $settings['portfolio_hover_order'] ),
                'orderby'           => esc_attr( $settings['portfolio_hover_order_by'] ),
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
                'post__not_in'      => $exclude_post_id
            );
        } elseif( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'         => 'mfolio_portfolio',
                'posts_per_page'    => esc_attr( $settings['portfolio_hover_count'] ),
                'order'             => esc_attr( $settings['portfolio_hover_order'] ),
                'orderby'           => esc_attr( $settings['portfolio_hover_order_by'] ),
                'ignore_sticky_posts'   => true,
				'tax_query'				=> array(
					array(
						'taxonomy' => 'portfolio_category',
			            'field'    => 'term_id',
			            'terms'    => $settings['exclude_cats'],
			            'operator' => 'NOT IN'
					),
				),
                'post__not_in'      => $exclude_post_id
            );
        } elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'         => 'mfolio_portfolio',
                'posts_per_page'    => esc_attr( $settings['portfolio_hover_count'] ),
                'order'             => esc_attr( $settings['portfolio_hover_order'] ),
                'orderby'           => esc_attr( $settings['portfolio_hover_order_by'] ),
                'ignore_sticky_posts'   => true,
				'tax_query'				=> array(
					array(
						'taxonomy' => 'portfolio_category',
			            'field'    => 'term_id',
			            'terms'    => $settings['exclude_cats'],
			            'operator' => 'NOT IN'
					),
				),
                'post__not_in'      => $exclude_post_id
            );
        } elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'         => 'mfolio_portfolio',
                'posts_per_page'    => esc_attr( $settings['portfolio_hover_count'] ),
                'order'             => esc_attr( $settings['portfolio_hover_order'] ),
                'orderby'           => esc_attr( $settings['portfolio_hover_order_by'] ),
                'ignore_sticky_posts'   => true,
				'tax_query'				=> array(
					array(
						'taxonomy' => 'portfolio_tag',
			            'field'    => 'term_id',
			            'terms'    => $settings['exclude_tags'],
			            'operator' => 'NOT IN'
					),
				),
            );
        } elseif( empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'         	=> 'mfolio_portfolio',
                'posts_per_page'    	=> esc_attr( $settings['portfolio_hover_count'] ),
                'order'             	=> esc_attr( $settings['portfolio_hover_order'] ),
                'orderby'           	=> esc_attr( $settings['portfolio_hover_order_by'] ),
                'ignore_sticky_posts'   => true,
                'post__not_in'      	=> $exclude_post_id
            );
        } else {
            $args = array(
                'post_type'         => 'mfolio_portfolio',
                'posts_per_page'    => esc_attr( $settings['portfolio_hover_count'] ),
                'order'             => esc_attr( $settings['portfolio_hover_order'] ),
                'orderby'           => esc_attr( $settings['portfolio_hover_order_by'] ),
                'ignore_sticky_posts'   => true
            );
        }

        $portfoliofilter = new WP_Query( $args );

        if( $portfoliofilter->have_posts() ) {
            echo '<div class="foliodon-wrapper">';
                echo '<div class="foliodon-row">';
                    echo '<div class="foliodon-col">';
                        echo '<div class="portfolio_tabs">';
                            echo '<div class="foliodon-row">';
                                echo '<div class="col-lg-6">';
                                    echo '<!-- Tab Buttons -->';
                                    echo '<div class="tab_buttons">';
                                        echo '<div class="tab-btn">';
                                            echo '<ul>';
                                                $x = 1;
                                                while( $portfoliofilter->have_posts() ){
                                                    $portfoliofilter->the_post();
                                                    if( $x == 1 ){
                                                        $active_class = 'active';
                                                    }else{
                                                        $active_class = '';
                                                    }
                                                    if( get_the_title() ){
                                                        echo '<li data-portfolio-tab-select="'.esc_attr( $x ).'" class="'.esc_attr( $active_class ).'">';
                                                            echo '<a href="'.esc_url( get_the_permalink() ).'" class="portfolio_title">'.wp_kses_post( get_the_title() ).'</a>';
                                                            echo '<span>';
                                                                if( $x < 10 ){
                                                                    echo esc_html__( '0', 'mfolio-lite' );
                                                                    echo esc_html__( $x.'.','mfolio-lite' );
                                                                }else{
                                                                    echo esc_html__( $x.'.','mfolio-lite' );
                                                                }
                                                            echo '</span>';
                                                        echo '</li>';
                                                    }
                                                    $x++;
                                                }
                                            echo '</ul>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<!-- End of Tab Buttons -->';
                                echo '</div>';
                                echo '<div class="col-lg-6 d-flex justify-content-lg-end">';
                                    echo '<!-- Tab Content -->';
                                    echo '<div class="tab-content">';
                                        $x = 1;
                                        while( $portfoliofilter->have_posts() ){
                                            $portfoliofilter->the_post();
                                                echo '<div data-portfolio-tab="'.esc_attr( $x ).'">';
                                                    if( has_post_thumbnail() ){
                                                        the_post_thumbnail();
                                                    }
                                                echo '</div>';
                                            $x++;
                                        }
                                    echo '</div>';
                                    echo '<!-- End of Tab Content -->';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }else{
            echo esc_html__( 'Create Some Portfolio Or Select Perfect Option To Show Portfolio', 'mfolio-lite' );
        }
	}
}