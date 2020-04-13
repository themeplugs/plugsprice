<?php
if ( ! defined( 'ABSPATH' ) ) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;

class PlugsPriceTwo extends \Elementor\Widget_Base {

	public function get_name() {
        return "plugspricetwo";
    }

	public function get_title() {
        return esc_html__( "Pricing Style 2","plugsprice");
    }

	public function get_icon() {
		return 'fas fa-table';
	}

	public function get_categories() {
        return array('pricingtable');
    }

	protected function _register_controls() {
        $this->start_controls_section(
			'pricing_title',
			[
				'label' => esc_html__( 'Pricing Title', 'plugsprice' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'pl_style',
			[
				'label' => esc_html__( 'Pricing Title', 'plugsprice' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'solid'  => esc_html__( 'Solid', 'plugsprice' ),
					'dashed' => esc_html__( 'Dashed', 'plugsprice' ),
				],
			]
		);
		
		$this->add_control(
			'pl_select_hidden',
			[
				'label' => esc_html__( 'Pricing Title', 'plugsprice' ),
				'type' => Controls_Manager::HIDDEN,
				'default'=> 'pl_select_hidden'
			]
		);

		$this->add_control(
			'pl_pricetitle',
			[
				'label' => esc_html__( 'Pricing Title', 'plugsprice' ),
				'type' => Controls_Manager::TEXT,
				'default'=> esc_html__("Basic","plugsprice"),
				'placeholder' => esc_html__( 'Enter pricing title', 'plugsprice' ),
			]
		);
		$this->add_control(
			'pl_price_subtitle',
			[
				'label' 		=> esc_html__( 'Pricing Sub Title', 'plugsprice' ),
				'type' 			=> Controls_Manager::TEXT,
				'default'		=> esc_html__("Most Popular","plugsprice"),
				'placeholder' 	=> esc_html__( 'Enter pricing Sub title', 'plugsprice' ),
			]
		);
		$this->add_control(
			'pl_title_shape',
			[
				'label' => esc_html__( 'Show title shape', 'plugsprice' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'plugsprice' ),
				'label_off' => esc_html__( 'Hide', 'plugsprice' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'pricing_price',
			[
				'label' => esc_html__( 'Priceing Price', 'plugsprice' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'pl_price',
			[
				'label' => esc_html__( 'Price', 'plugsprice' ),
				'type' => Controls_Manager::TEXT,
				'default'=> esc_html__("90","plugsprice"),
				'placeholder' => esc_html__( 'enter your price', 'plugsprice' ),
			]
		);

		$this->add_control(
			'pl_price_currency',
			[
				'label' => esc_html__( 'Currency', 'plugsprice' ),
				'type' => Controls_Manager::TEXT,
				'default'=> esc_html__("$","plugsprice"),
				'placeholder' => esc_html__( 'Enter your currency', 'plugsprice' ),
			]
		);
		$this->add_control(
			'pl_price_duration',
			[
				'label' => esc_html__( 'Duration', 'plugsprice' ),
				'type' => Controls_Manager::TEXT,
				'default'=> esc_html__("/ mo","plugsprice"),
				'placeholder' => esc_html__( 'Enter Your heading', 'plugsprice' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'feature_list',
			[
				'label' => esc_html__( 'Feature List', 'plugsprice' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'pl_feature_list_title', [
				'label' => esc_html__( 'Feature Title', 'plugsprice' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '2 Domain Name' , 'plugsprice' ),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'pl_feature_icon',
			[
				'label' => esc_html__( 'Feature Icon', 'plugsprice' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'solid',
				],
			]
		);
		
		$repeater->add_control(
			'pl_hidden_icon',
			[
				'label' => esc_html__( 'Pricing Title', 'plugsprice' ),
				'type' => Controls_Manager::HIDDEN,
				'default'=> 'pl_hidden_icon'
			]
		);

		$repeater->add_control(
			'pl_item_description',
			[
				'label' => esc_html__( 'Description', 'plugsprice' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Default description', 'plugsprice' ),
				'placeholder' => esc_html__( 'Type your description here', 'plugsprice' ),
			]
		);


		$this->add_control(
			'feature_list_item',
			[
				'label' => esc_html__( 'Feature List', 'plugsprice' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'pl_feature_list_title' => esc_html__( '2 Domain Name', 'plugsprice' ),
						'pl_feature_icon'  	 => [
							'value'     => 'fas fa-check',
							'library'   => 'fa-solid',
						],
					],
					[
						'pl_feature_list_title' => esc_html__( '30 GB Storage', 'plugsprice' ),
						'pl_feature_icon'  	 => [
							'value'     => 'fas fa-check',
							'library'   => 'fa-solid',
						],
					],
					[
						'pl_feature_list_title' => esc_html__( 'Unlimited Data transfer', 'plugsprice' ),
						'pl_feature_icon'  	 => [
							'value'     => 'fas fa-check',
							'library'   => 'fa-solid',
						],
					],
				],
				'title_field' => '{{{ pl_feature_list_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'pricing_button',
			[
				'label' => esc_html__( 'Pricing Button', 'plugsprice' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'pl_price_btn',
			[
				'label' => esc_html__( 'Button Text', 'plugsprice' ),
				'type' => Controls_Manager::TEXT,
				'default'=> esc_html__("Bye Now","plugsprice"),
				'placeholder' => esc_html__( 'Enter Button Text', 'plugsprice' ),
			]
		);

		$this->add_control(
			'pl_price_btn_url',
			[
				'label' => esc_html__( 'Button Link', 'plugsprice'),
				'type' => Controls_Manager::URL,
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'pricing_settings',
			[
				'label' => esc_html__( 'Settings', 'plugsprice' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		
		$this->add_responsive_control(
			'pl_table_text_align', [
				'label'			 => esc_html__( 'Text Alignment', 'plugsprice' ),
				'type'			 => Controls_Manager::CHOOSE,
				'options'		 => [

					'left'		 => [
						'title'	 => esc_html__( 'Left', 'plugsprice' ),
						'icon'	 => 'fa fa-align-left',
					],
					'center'	 => [
						'title'	 => esc_html__( 'Center', 'plugsprice' ),
						'icon'	 => 'fa fa-align-center',
					],
					'right'		 => [
						'title'	 => esc_html__( 'Right', 'plugsprice' ),
						'icon'	 => 'fa fa-align-right',
					],
					'justify'	 => [
						'title'	 => esc_html__( 'Justified', 'plugsprice' ),
						'icon'	 => 'fa fa-align-justify',
					],
				],
				'default'		 => 'center',
                'selectors' => [
                    '{{WRAPPER}} .price .single-price' => 'text-align: {{VALUE}};',
				],
			]
        );

		$this->end_controls_section();

		//style
        $this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Pricing Style', 'plugsprice' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		); 

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'pl_header_bg',
				'label' => esc_html__( 'Background', 'plugsprice' ),
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .price .price-head.bg-gradient',
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'pl_price_typo',
				'label' => esc_html__( 'Price Typography', 'plugsprice' ),
				'scheme' => Elementor\Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .price .price-head',
			]
		);
		
		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'pl_title_typo',
				'label' => esc_html__( 'Title Typography', 'plugsprice' ),
				'scheme' => Elementor\Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .price .price-title',
			]
		);

		$this->add_control(
			'pl_title_color',
			[
				'label' => esc_html__( 'Title Color', 'plugsprice' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .price .price-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pl_price_shadow',
				'label' => esc_html__( 'Box Shadow', 'plugsprice' ),
				'selector' => '{{WRAPPER}} .price .single-price',
			]
		);

		$this->end_controls_section();

		//style
        $this->start_controls_section(
			'btn_style_section',
			[
				'label' => esc_html__( 'Button Style', 'plugsprice' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		); 

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'pl_button_typo',
				'label' => esc_html__( 'Button Typography', 'plugsprice' ),
				'scheme' => Elementor\Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .price .btn',
			]
		);
		
		
		$this->start_controls_tabs(
			'btn_tabs'
		);

		$this->start_controls_tab(
			'btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'plugsprice' ),
			]
		);
		$this->add_control(
			'pl_button_color',
			[
				'label' => __( 'Button Color', 'plugsprice' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .price .btn' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'btn_bg',
				'label' => esc_html__( 'Background', 'plugsprice' ),
				'types' => [ 'classic'],
				'selector' => '{{WRAPPER}} .price .btn',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'plugsprice' ),
			]
		);
		$this->add_control(
			'pl_button_hov_color',
			[
				'label' => __( 'Button Color', 'plugsprice' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .price .btn:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'btn_bov_bg',
				'label' => esc_html__( 'Background', 'plugsprice' ),
				'types' => [ 'classic'],
				'selector' => '{{WRAPPER}} .price .btn:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'btn_border',
				'label' => esc_html__( 'Border', 'plugsprice'),
				'selector' => '{{WRAPPER}} .price .btn:hover',
				'seperator'=> 'after',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

    }

	protected function render() {
        $settings = $this->get_settings_for_display();
        $pl_title = $settings['pl_pricetitle'];
		$pl_price = $settings['pl_price'];
		$pl_price_currency = $settings['pl_price_currency'];
		$pl_price_duration = $settings['pl_price_duration'];
		$pl_price_btn = $settings['pl_price_btn'];
		$pl_price_btn_url = $settings['pl_price_btn_url']['url'];
		$pl_feature_list = $settings['feature_list_item'];
		?>

		<!-- price -->
		<div class="price price-a-alt">
			<div class="single-price">
				<div class="price-head bg-gradient">
					<p>
						<?php echo esc_html($pl_price_currency); echo esc_html($pl_price); ?><span class="duration"><?php echo esc_html($pl_price_duration);  ?></span>	
					</p>	
				</div>
				<div class="price-content">
					<h5 class="price-title">
						<?php 
							echo esc_html($pl_title); 
							if ( 'yes' === $settings['pl_title_shape'] ) {
								?>
									<span class="shape">&nbsp;</span>
								<?php 
							}
						?>
					</h5>
					<?php 
						if($pl_feature_list){
							?>
								<ul>
									<?php 
										foreach($pl_feature_list as $item){
											?>
												<li><?php echo $item['pl_feature_list_title']; ?></li>
											<?php
										}
									?>
									
								</ul>
							<?php 
						}
					?>
					<a class="btn" href="<?php echo esc_url($pl_price_btn_url); ?>" target="_blank"><?php echo esc_html($pl_price_btn); ?></a>
				</div>
			</div>
		</div><!-- /.price -->
		<?php 
		
    }

	protected function _content_template() {}

}