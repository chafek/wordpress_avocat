<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$this->start_controls_section(
	'section_content_seven',
	[
		'label'     => esc_html__( 'Counter Section', 'absolute-addons' ),
		'condition' => [
			'absolute_counter' => 'seven',
		],
	]
);

$this->add_responsive_control(
	'counter_column_seven',
	[
		'label'           => esc_html__( 'Counter Column', 'absolute-addons' ),
		'type'            => Controls_Manager::SELECT,
		'default'         => '4',
		'options'         => [
			'1' => esc_html__( '1 Column', 'absolute-addons' ),
			'2' => esc_html__( '2 Column', 'absolute-addons' ),
			'3' => esc_html__( '3 Column', 'absolute-addons' ),
			'4' => esc_html__( '4 Column', 'absolute-addons' ),
			'5' => esc_html__( '5 Column', 'absolute-addons' ),
			'6' => esc_html__( '6 Column', 'absolute-addons' ),
		],
		'devices'         => [ 'desktop', 'tablet', 'mobile' ],
		'desktop_default' => 4,
		'tablet_default'  => 3,
		'mobile_default'  => 1,
		'prefix_class'    => 'counter-grid%s-',
		'style_transfer'  => true,
		'selectors'       => [
			'(desktop+){{WRAPPER}} .counter-item .counter-grid-col' => 'grid-template-columns: repeat({{counter_column_seven.VALUE}}, 1fr);',
			'(tablet){{WRAPPER}} .counter-item .counter-grid-col'   => 'grid-template-columns: repeat({{counter_column_seven_tablet.VALUE}}, 1fr);',
			'(mobile){{WRAPPER}} .counter-item .counter-grid-col'   => 'grid-template-columns: repeat({{counter_column_seven_mobile.VALUE}}, 1fr);',
		],
	]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'counter_title_seven',
	[
		'label'       => esc_html__( 'Counter Title', 'absolute-addons' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
		'default'     => esc_html__( 'Social / Twitter', 'absolute-addons' ),
	]
);

$repeater->add_control(
	'counter_number_seven',
	[
		'label'   => esc_html__( 'Counter Number', 'absolute-addons' ),
		'type'    => Controls_Manager::TEXT,
		'default' => esc_html__( '2,530', 'absolute-addons' ),
	]
);

$repeater->add_control(
	'counter_number_inline_color_seven',
	[
		'label'     => esc_html__( 'Number Color', 'absolute-addons' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .absp-counter .counter-item .counter-box > {{CURRENT_ITEM}} > h2'   => 'color: {{VALUE}}',
			'{{WRAPPER}} .absp-counter .counter-item .counter-box > {{CURRENT_ITEM}} > span' => 'color: {{VALUE}}',
		],
	]
);

$repeater->add_control(
	'counter_suffix_seven',
	[
		'label'       => esc_html__( 'Counter Suffix', 'absolute-addons' ),
		'type'        => Controls_Manager::TEXT,
		'placeholder' => esc_html__( 'Plus', 'absolute-addons' ),
		'default'     => esc_html__( 'm', 'absolute-addons' ),
	]
);

$repeater->add_control(
	'counter_number_speed_seven',
	[
		'label'   => esc_html__( 'Counter Number Speed', 'absolute-addons' ),
		'type'    => Controls_Manager::NUMBER,
		'default' => esc_html__( '1500', 'absolute-addons' ),
	]
);

$repeater->add_control(
	'counter_icon_select_seven',
	[
		'label'   => esc_html__( 'Select Icon', 'absolute-addons' ),
		'type'    => Controls_Manager::SELECT,
		'options' => [
			'true'  => esc_html__( 'Yes', 'absolute-addons' ),
			'false' => esc_html__( 'No', 'absolute-addons' ),
		],
		'default' => 'true',
	]
);

$repeater->add_control(
	'counter_icon_seven',
	[
		'label'            => esc_html__( 'Icon', 'absolute-addons' ),
		'type'             => Controls_Manager::ICONS,
		'fa4compatibility' => 'absolute-addons',
		'default'          => [
			'value'   => 'fab fa-twitter',
			'library' => 'solid',
		],
		'condition'        => [
			'counter_icon_select_seven' => 'true',
		],
	]
);

$repeater->add_group_control(
	Group_Control_Background::get_type(),
	[
		'name'      => 'counter_icon_bg_seven',
		'label'     => esc_html__( 'Background', 'absolute-addons' ),
		'types'     => [ 'classic', 'gradient' ],
		'default'   => [ 'gradient' ],
		'selector'  => '{{WRAPPER}} .absp-counter .counter-item {{CURRENT_ITEM}} > i',
		'condition' => [
			'counter_icon_select_seven' => 'true',
		],
	]
);

$repeater->add_control(
	'counter_number_icon_color_seven',
	[
		'label'     => esc_html__( 'Color', 'absolute-addons' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .absp-counter .counter-item {{CURRENT_ITEM}} > i' => 'color: {{VALUE}}',
		],
		'condition' => [
			'counter_icon_select_seven' => 'true',
		],
	]
);

$this->add_control(
	'counter_repeater_seven',
	[
		'label'       => esc_html__( 'Counter Item', 'absolute-addons' ),
		'type'        => Controls_Manager::REPEATER,
		'fields'      => $repeater->get_controls(),
		'default'     => [
			[
				'counter_title_seven'               => esc_html__( 'Social / Twitter', 'absolute-addons' ),
				'counter_suffix_seven'              => esc_html__( 'm', 'absolute-addons' ),
				'counter_number_seven'              => esc_html__( '65', 'absolute-addons' ),
				'counter_number_inline_color_seven' => '#32D2E6',
				'counter_icon_seven'                => [
					'value' => 'fab fa-twitter',
				],
			],
			[
				'counter_title_seven'               => esc_html__( 'Social / Facebook', 'absolute-addons' ),
				'counter_suffix_seven'              => esc_html__( 'm', 'absolute-addons' ),
				'counter_number_seven'              => esc_html__( '986', 'absolute-addons' ),
				'counter_number_inline_color_seven' => '#8264FF',
				'counter_icon_seven'                => [ 'value' => 'fab fa-facebook-f' ],
			],
			[
				'counter_title_seven'               => esc_html__( 'Social / Linkedin', 'absolute-addons' ),
				'counter_suffix_seven'              => esc_html__( 'm', 'absolute-addons' ),
				'counter_number_seven'              => esc_html__( '4', 'absolute-addons' ),
				'counter_number_inline_color_seven' => '#FF6482',
				'counter_icon_seven'                => [ 'value' => 'fab fa-linkedin-in' ],
			],
			[
				'counter_title_seven'               => esc_html__( 'Social / Instagram', 'absolute-addons' ),
				'counter_suffix_seven'              => esc_html__( 'm', 'absolute-addons' ),
				'counter_number_seven'              => esc_html__( '9', 'absolute-addons' ),
				'counter_number_inline_color_seven' => '#FFA028',
				'counter_icon_seven'                => [ 'value' => 'fab fa-instagram' ],
			],

		],
		'title_field' => '{{{ counter_title_seven }}}',
		'condition'   => [
			'absolute_counter' => 'seven',
		],
	]
);

$this->end_controls_section();

