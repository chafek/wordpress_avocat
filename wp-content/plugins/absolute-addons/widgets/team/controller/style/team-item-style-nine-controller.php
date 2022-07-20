<?php

use AbsoluteAddons\Controls\Group_Control_ABSP_Foreground;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	die();
}

$suffix = '_nine';

$this->start_controls_section(
	'section_style_team_body' . $suffix,
	[
		'label'     => esc_html__( 'Body Area', 'absolute-addons' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => [ 'team_style_variation' => 'nine' ],
	]
);

$this->start_controls_tabs(
	'section_style_team_body_tab' . $suffix
);

$this->start_controls_tab(
	'section_style_team_body_normal_tab' . $suffix,
	[
		'label' => __( 'Normal', 'absolute-addons' ),
	]
);

$this->add_group_control(
	Group_Control_Background::get_type(),
	[
		'name'     => 'section_style_team_body_background' . $suffix,
		'label'    => __( 'Background', 'absolute-addons' ),
		'types'    => [ 'classic', 'gradient', 'video' ],
		'selector' => '{{WRAPPER}} .absp-wrapper .absp-team',

	]
);

$this->add_group_control(
	Group_Control_Border::get_type(),
	[
		'name'      => 'body_border' . $suffix,
		'label'     => __( 'Body Border', 'absolute-addons' ),
		'selectors' => [
			'{{WRAPPER}} .absp-wrapper .absp-team',
		],

	]
);

$this->add_responsive_control(
	'body_section_border_radius' . $suffix,
	[
		'label'      => esc_html__( 'Body Section Border Radius', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-wrapper .absp-team' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	[
		'name'     => 'body_box_shadow' . $suffix,
		'label'    => __( 'Box Shadow', 'absolute-addons' ),
		'selector' => '{{WRAPPER}} .absp-wrapper .absp-team',
	]
);

$this->add_responsive_control(
	'body_section_padding' . $suffix,
	[
		'label'      => esc_html__( 'Padding', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-wrapper .absp-team' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_responsive_control(
	'body_section_margin' . $suffix,
	[
		'label'      => esc_html__( 'Margin', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-wrapper .absp-team' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->end_controls_tab();

$this->start_controls_tab(
	'section_style_team_body_hover_tab' . $suffix,
	[
		'label' => __( 'Hover', 'absolute-addons' ),
	]
);

$this->add_group_control(
	Group_Control_Background::get_type(),
	[
		'name'     => 'section_style_team_body_background_hover' . $suffix,
		'label'    => __( 'Background', 'absolute-addons' ),
		'types'    => [ 'classic', 'gradient', 'video' ],
		'selector' => '{{WRAPPER}} .absp-wrapper .absp-team:hover',
	]
);

$this->add_group_control(
	Group_Control_Border::get_type(),
	[
		'name'     => 'body_border_hover' . $suffix,
		'label'    => __( 'Body Border', 'absolute-addons' ),
		'selector' => '{{WRAPPER}} .absp-wrapper .absp-team:hover',

	]
);

$this->add_responsive_control(
	'body_section_border_radius_hover' . $suffix,
	[
		'label'      => esc_html__( 'Body Section Border Radius', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-wrapper .absp-team:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	[
		'name'     => 'body_box_shadow_hover' . $suffix,
		'label'    => __( 'Box Shadow', 'absolute-addons' ),
		'selector' => '{{WRAPPER}} .absp-wrapper .absp-team:hover',
	]
);

$this->add_responsive_control(
	'body_section_padding_hover' . $suffix,
	[
		'label'      => esc_html__( 'Padding', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-wrapper .absp-team:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_responsive_control(
	'body_section_margin_hover' . $suffix,
	[
		'label'      => esc_html__( 'Margin', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-wrapper .absp-team:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();

/**
 * Team Member Name Style
 */
$this->start_controls_section(
	'section_style_team_Member_Name' . $suffix,
	array(
		'label'     => esc_html__( 'Name', 'absolute-addons' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => [ 'team_style_variation' => 'nine' ],
	)

);

$this->start_controls_tabs(
	'section_style_team_name_tab' . $suffix
);

$this->start_controls_tab(
	'section_style_team_name_normal_tab' . $suffix,
	[
		'label' => __( 'Normal', 'absolute-addons' ),
	]
);

$this->add_group_control(
	Group_Control_Typography:: get_type(),
	[
		'label'       => esc_html__( 'Name Typography', 'absolute-addons' ),
		'name'        => 'name_typography' . $suffix,
		'selector'    => '{{WRAPPER}} .absp-team.element-nine .absp-team-title',
		'description' => esc_html__( 'Select Name Font Style.', 'absolute-addons' ),
	]
);

$this->add_control(
	'name_color' . $suffix,
	[
		'label'       => esc_html__( ' Name Color', 'absolute-addons' ),
		'type'        => Controls_Manager::COLOR,
		'selectors'   => [
			'{{WRAPPER}} .absp-team.element-nine .absp-team-title' => 'color: {{VALUE}}',
		],
		'description' => esc_html__( 'Select Name Text color.', 'absolute-addons' ),
	]
);

$this->add_responsive_control(
	'name_section_padding' . $suffix,
	[
		'label'      => esc_html__( 'Padding', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-team.element-nine .absp-team-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_responsive_control(
	'name_section_margin' . $suffix,
	[
		'label'      => esc_html__( 'Margin', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-team.element-nine .absp-team-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->end_controls_tab();

$this->start_controls_tab(
	'section_style_team_Member_hover_Name_tab' . $suffix,
	[
		'label' => __( 'Hover', 'absolute-addons' ),
	]
);

$this->add_group_control(
	Group_Control_Typography:: get_type(),
	[
		'label'       => esc_html__( 'Name Typography', 'absolute-addons' ),
		'name'        => 'name_typography_hover' . $suffix,
		'selector'    => '{{WRAPPER}} .absp-team.element-nine .absp-team-title:hover',
		'description' => esc_html__( 'Select Name Font Style.', 'absolute-addons' ),
	]
);

$this->add_control(
	'name_color_hover' . $suffix,
	[
		'label'       => esc_html__( ' Name Color', 'absolute-addons' ),
		'type'        => Controls_Manager::COLOR,
		'selectors'   => [
			'{{WRAPPER}} .absp-team.element-nine .absp-team-title:hover' => 'color: {{VALUE}}',
		],
		'description' => esc_html__( 'Select Name Text color.', 'absolute-addons' ),
	]
);

$this->add_responsive_control(
	'name_section_padding_hover' . $suffix,
	[
		'label'      => esc_html__( 'Padding', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-team.element-nine .absp-team-title:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_responsive_control(
	'name_section_margin_hover' . $suffix,
	[
		'label'      => esc_html__( 'Margin', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-team.element-nine .absp-team-title:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();

/**
 *  Designation Style
 */
$this->start_controls_section(
	'section_style_team_designation' . $suffix,
	[
		'label'     => __( 'Designation', 'absolute-addons' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => [ 'team_style_variation' => 'nine' ],
	]
);

$this->start_controls_tabs(
	'section_style_team_designation_tab' . $suffix
);

$this->start_controls_tab(
	'section_style_team_designation_normal_tab' . $suffix,
	[
		'label' => __( 'Normal', 'absolute-addons' ),
	]
);

$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'    => esc_html__( 'Designation Typography', 'absolute-addons' ),
		'name'     => 'designation_typography' . $suffix,
		'selector' => '{{WRAPPER}} .absp-team.element-nine .absp-team-designation',
	)
);

$this->add_group_control(
	Group_Control_ABSP_Foreground::get_type(),
	[
		'name'           => 'designation_color' . $suffix,
		'fields_options' => [
			'color_type' => [
				'default' => 'gradient',
				'label'   => _x( 'Designation Color', 'Background Control', 'absolute-addons' ),
			],
			'color'      => [
				'default' => '#BE6EFF',
			],
			'color_b'    => [
				'default' => '#4641FF',
			],
		],
		'selector'       => '{{WRAPPER}}  .absp-team.element-nine .absp-team-designation',
	]
);

$this->add_responsive_control(
	'designation_section_padding' . $suffix,
	[
		'label'      => esc_html__( 'Padding', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}}  .absp-team.element-nine .absp-team-designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_responsive_control(
	'designation_section_margin' . $suffix,
	[
		'label'      => esc_html__( 'Margin', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}}  .absp-team.element-nine .absp-team-designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

		],
	]
);

$this->end_controls_tab();

$this->start_controls_tab(
	'section_style_team_designation_hover_tab' . $suffix,
	[
		'label' => __( 'Hover', 'absolute-addons' ),
	]
);

$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'    => esc_html__( 'Designation Typography', 'absolute-addons' ),
		'name'     => 'designation_typography_hover' . $suffix,
		'selector' => '{{WRAPPER}} .absp-team.element-nine:hover.absp-team-designation',
	)
);

$this->add_group_control(
	Group_Control_ABSP_Foreground::get_type(),
	[
		'name'           => 'designation_color_hover' . $suffix,
		'fields_options' => [
			'color_type' => [
				'default' => 'gradient',
				'label'   => _x( 'Designation Color', 'Background Control', 'absolute-addons' ),
			],
			'color'      => [
				'default' => '#000',
			],
			'color_b'    => [
				'default' => '#eee',
			],
		],
		'selector'       => '{{WRAPPER}}  .absp-team.element-nine:hover.absp-team-designation',

	]
);

$this->add_responsive_control(
	'designation_section_padding_hover' . $suffix,
	[
		'label'      => esc_html__( 'Padding', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-team.element-nine:hover.absp-team-designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_responsive_control(
	'designation_section_margin_hover' . $suffix,
	[
		'label'      => esc_html__( 'Margin', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-team.element-nine:hover.absp-team-designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

		],
	]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();

// Content Style

$this->start_controls_section(
	'section_style_team_content_nine',
	[
		'label'     => __('Content', 'absolute-addons'),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => [ 'team_style_variation' => 'nine' ],
	]
);

$this->add_group_control(
	Group_Control_Typography:: get_type(),
	array(
		'label'    => esc_html__('Content Typography', 'absolute-addons'),
		'name'     => 'content_typography_nine',
		'selector' => '{{WRAPPER}} .absp-team.element-nine .absp-team-content ,{{WRAPPER}} .absp-team.element-nine .absp-team-content p ',

	)
);

$this->add_control(
	'content_color_nine',
	array(
		'label'       => esc_html__(' Content Color', 'absolute-addons'),
		'type'        => Controls_Manager::COLOR,
		'selectors'   => array(
			'{{WRAPPER}} .absp-team.element-nine .absp-team-content, {{WRAPPER}} .absp-team.element-nine .absp-team-content p  ' => 'color: {{VALUE}}',
		),
		'description' => esc_html__('Select Content Text color.', 'absolute-addons'),
	)
);

$this->add_responsive_control(
	'content_section_padding_nine',
	[
		'label'      => esc_html__('Padding', 'absolute-addons'),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'.absp-team.element-nine .absp-team-content ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_responsive_control(
	'content_section_margin_nine',
	[
		'label'      => esc_html__('Margin', 'absolute-addons'),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-team.element-nine .absp-team-content  ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->end_controls_section();

// button

$this->start_controls_section(
	'section_name_team_button',
	array(
		'label'      => esc_html__( 'Button', 'absolute-addons' ),
		'tab'        => Controls_Manager::TAB_STYLE,
		'conditions' => [
			'relation' => 'and',
			'terms'    => [
				[
					'name'     => 'team_style_variation',
					'operator' => '==',
					'value'    => 'nine',
				],
			],
		],
	)
);

$this->start_controls_tabs(
	'section_name_team_button_tabs'
);

$this->start_controls_tab(
	'team_social_normal_tab',
	[
		'label' => __( 'Normal', 'absolute-addons' ),
	]
);

$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	[
		'name'     => 'button_box_shadow',
		'label'    => __( 'Box Shadow', 'absolute-addons' ),
		'selector' => '{{WRAPPER}} .absp-team.element-nine .absp-team-btn',
	]
);

$this->add_group_control(
	Group_Control_Typography:: get_type(),
	array(
		'label'    => esc_html__( 'Button Typography', 'absolute-addons' ),
		'name'     => 'button_typography',
		'selector' => '{{WRAPPER}} .absp-team.element-nine .absp-team-btn > a',
	)
);

$this->add_control(
	'section_style_team_button_text_color',
	array(
		'label'     => esc_html__( 'Button Text Color', 'absolute-addons' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => [
			'{{WRAPPER}} .absp-team.element-nine .absp-team-btn' => 'color:{{VALUE}}',
		],
	)
);

$this->add_group_control(
	Group_Control_Background::get_type(),
	[
		'name'     => 'section_style_team_button_background',
		'label'    => __( 'Background', 'absolute-addons' ),
		'types'    => [ 'classic', 'gradient', 'video' ],
		'selector' => '{{WRAPPER}} .absp-team.element-nine .absp-team-btn',
	]
);

$this->add_group_control(
	Group_Control_Border::get_type(),
	[
		'name'     => 'button_border',
		'label'    => __( 'Body Border', 'absolute-addons' ),
		'selector' => '{{WRAPPER}} .absp-team.element-nine .absp-team-btn',
	]
);

$this->add_responsive_control(
	'button_section_padding',
	[
		'label'      => esc_html__( 'Padding', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-team.element-nine .absp-team-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_responsive_control(
	'button_section_margin',
	[
		'label'      => esc_html__( 'Margin', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-team.element-nine .absp-team-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->end_controls_tab();

//Hover Design
$this->start_controls_tab(
	'team_social_hover_tab',
	[
		'label' => __( 'Hover', 'absolute-addons' ),
	]
);

$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	[
		'name'     => 'button_box_shadow_hover',
		'label'    => __( 'Box Shadow', 'absolute-addons' ),
		'selector' => '{{WRAPPER}} .absp-team.element-nine .absp-team-btn:hover',
	]
);

$this->add_group_control(
	Group_Control_Typography:: get_type(),
	array(
		'label'    => esc_html__( 'Button  Typography', 'absolute-addons' ),
		'name'     => 'button_typography_hover',
		'selector' => '{{WRAPPER}} .absp-team.element-nine .absp-team-btn > a:hover',
	)
);

$this->add_group_control(
	Group_Control_Background::get_type(),
	[
		'name'     => 'section_style_team_button_background_hover',
		'label'    => __( 'Background', 'absolute-addons' ),
		'types'    => [ 'classic', 'gradient', 'video' ],
		'selector' => '{{WRAPPER}} .absp-team.element-nine .absp-team-btn:hover',
	]
);

$this->add_group_control(
	Group_Control_Border::get_type(),
	[
		'name'     => 'button_border_hover',
		'label'    => __( 'Body Border', 'absolute-addons' ),
		'selector' => '{{WRAPPER}} .absp-team.element-nine .absp-team-btn:hover',
	]
);

$this->add_responsive_control(
	'button_section_padding_hover',
	[
		'label'      => esc_html__( 'Padding', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-team.element-nine .absp-team-btn:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->add_responsive_control(
	'button_section_margin_hover',
	[
		'label'      => esc_html__( 'Margin', 'absolute-addons' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => [ 'px', 'em', '%' ],
		'selectors'  => [
			'{{WRAPPER}} .absp-team.element-nine .absp-team-btn:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		],
	]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();
