<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

// Helper function to add dimension controls
function add_dimension_control($that, $section_id, $label, $selector, $usage) {
    $that->add_responsive_control(
        'posting_' . $section_id,
        [
            'label' => esc_html($label),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em', 'rem', 'custom'],
            'default' => [''],
            'selectors' => [
                '{{WRAPPER}} ' . $selector => "$usage: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;",
            ],
        ]
    );
}

// Helper function to add slider controls
function add_slider_control($that, $section_id, $label, $selector, $usage, $units = ['px'], $range = ['px' => ['min' => 0, 'max' => 100, 'step' => 1]]) {
    $that->add_responsive_control(
        'posting_' . $section_id,
        [
            'label' => esc_html($label),
            'type' => Controls_Manager::SLIDER,
            'size_units' => $units,
            'range' => $range,
            'selectors' => [
                '{{WRAPPER}} ' . $selector => "$usage: {{SIZE}}{{UNIT}} !important;",
            ],
        ]
    );
}

// Helper function to add color controls
function add_color_control($that, $section_id, $label, $selector, $usage) {
    $that->add_responsive_control(
        'posting_' . $section_id,
        [
            'label' => esc_html($label),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} ' . $selector => "$usage: {{VALUE}} !important;",
            ],
        ]
    );
}

// Helper function to add text controls
function add_text_controls($that, $section_id, $label, $selector) {
    $that->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => $section_id . '_typography',
            'label' => esc_html($label . ' Typography'),
            'selector' => '{{WRAPPER}} ' . $selector,
            'global' => [
                'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
            ],
        ]
    );

    $that->add_responsive_control(
        $section_id . '_color',
        [
            'label' => esc_html($label . ' Color'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} ' . $selector => 'color: {{VALUE}} !important',
            ],
        ]
    );
}

// Helper function to add background and border controls
function add_background_border_control($that, $control_id, $label, $selector) {
    $that->add_responsive_control(
        $control_id . '_background_color',
        [
            'label' => esc_html($label . ' Background Color'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} ' . $selector => 'background-color: {{VALUE}} !important',
            ],
        ]
    );

    $that->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => $control_id . '_border',
            'selector' => '{{WRAPPER}} ' . $selector,
        ]
    );
}