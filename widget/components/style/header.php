<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;

require_once EJP_PLUGIN_PATH . "widget/components/style/helper.php";


function listingHeaderStyle($that) {
    $that->start_controls_section(
        'posting_header',
        [
            'label' => esc_html('Header'),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    add_dimension_control($that, 'header_padding', 'Padding', '.job-header', 'padding');
    $that->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name' => 'posting_header_background',
            'types' => ['classic', 'gradient', 'video'],
            'selector' => '{{WRAPPER}} .job-header',
        ]
    );

    $that->add_control(
        'job_style_heading_image',
        [
            'label' => esc_html('Image'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'none',
        ]
    );

    add_slider_control($that, 'image_width', 'Width', '.job-header .company-logo', 'width');
    add_slider_control($that, 'image_height', 'Height', '.job-header .company-logo', 'height');
    add_slider_control($that, 'image_border_radius', 'Border Radius', '.job-header .company-logo', 'border-radius');

    $that->add_control(
        'job_style_heading_title',
        [
            'label' => esc_html('Title'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    add_dimension_control($that, 'title_header_padding', 'Padding', '.job-header .job-title h2', 'padding');
    add_text_controls($that, 'posting_header_title', 'Title', '.job-header .job-title h2');
    add_background_border_control($that, 'posting_header_title', 'Title', '.job-header .job-title h2');

    $that->add_control(
        'job_style_heading_company',
        [
            'label' => esc_html('Company'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    add_dimension_control($that, 'company_header_padding', 'Padding', '.job-header .job-company', 'padding');
    add_text_controls($that, 'posting_header_company', 'Company', '.job-header .job-company');
    add_background_border_control($that, 'posting_header_company', 'Company', '.job-header .job-company');

    $that->add_control(
        'job_style_heading_date',
        [
            'label' => esc_html('Date'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    add_dimension_control($that, 'date_header_padding', 'Padding', '.job-header .job-date', 'padding');
    add_text_controls($that, 'posting_header_date', 'Date', '.job-header .job-date');
    add_background_border_control($that, 'posting_header_date', 'Date', '.job-header .job-date');

    $that->end_controls_section();
}