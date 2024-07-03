<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;

require_once EJP_PLUGIN_PATH . "widget/components/style/helper.php";

// Content
function listingContentStyle($that) {
    $that->start_controls_section(
        'posting_style_content',
        [
            'label' => esc_html('Job Description'),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $that->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name' => 'posting_content_background',
            'types' => ['classic', 'gradient', 'video'],
            'selector' => '{{WRAPPER}} .job-detail',
        ]
    );

    add_dimension_control($that, 'description_padding', 'Padding', '.job-detail', 'padding');
    add_text_controls($that, 'posting_description', 'Description', '.job-detail');
    add_background_border_control($that, 'posting_description', 'Description', '.job-detail');

    $that->end_controls_section();
}