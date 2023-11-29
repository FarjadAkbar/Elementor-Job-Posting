<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;


function dimension($that, $section_id, $label, $selector, $usage){
    $that->add_responsive_control(
        'schema_'.$section_id,
        [
            'label' => esc_html__( $label, 'textdomain' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
            'selectors' => [
                '{{WRAPPER}} ' . $selector => $usage . ': {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
}

function slider($that, $section_id, $label, $selector, $usage){
    $that->add_responsive_control(
        'schema_'.$section_id,
        [
            'label' => esc_html__( $label, 'listing-schema-generator' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} ' . $selector  => $usage . ': {{SIZE}}{{UNIT}};',
            ],
        ]
    );
}

function color($that, $section_id, $label, $selector, $usage){
    $that->add_responsive_control(
        'schema_'.$section_id,
        [
            'label' => esc_html__( $label, 'listing-schema-generator' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} ' . $selector => $usage . ': {{VALUE}};',
            ],
        ]
    );
}
function add_text_controls( $that, $section_id, $label, $selector ) {
    $that->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name'     => $section_id . '_typography',
            'label'    => esc_html__( $label . ' Typography', 'listing-schema-generator' ),
            'selector' => '{{WRAPPER}} ' . $selector,
        ]
    );

    $that->add_responsive_control(
        $section_id . '_color',
        [
            'label'     => esc_html__( $label . ' Color', 'listing-schema-generator' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} ' . $selector => 'color: {{VALUE}}',
            ],
        ]
    );
}

function add_background_border_control( $that, $control_id, $label, $selector ) {
    $that->add_responsive_control(
        $control_id . '_backgroundcolor',
        [
            'label' => esc_html__( $label . ' Background Color',  'listing-schema-generator' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} '. $selector => 'background-color: {{VALUE}}',
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


// Header
function listingHeaderStyle($that){
    $that->start_controls_section(
        'schema_header',
        [
            'label' => __( 'Header', 'listing-schema-generator' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    
    dimension($that, 'header_padding', 'Padding', '.job-header', 'padding');
    $that->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name' => 'schema_header_background',
            'types' => [ 'classic', 'gradient', 'video' ],
            'selector' => '{{WRAPPER}} .job-header',
        ]
    );

    $that->add_control(
        'job_style_heading_image',
        [
            'label' => esc_html__( 'Image', 'listing-schema-generator' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'none',
        ]
    );
    slider($that, 'image_width', 'Width', '.job-header .company-logo', 'width');
    slider($that, 'image_height', 'Height', '.job-header .company-logo', 'height');
    slider($that, 'image_border_radius', 'Border Radius', '.job-header .company-logo', 'border-radius');


    $that->add_control(
        'job_style_heading_title',
        [
            'label' => esc_html__( 'Title', 'listing-schema-generator' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    dimension($that, 'title_header_margin', 'Margin', '.job-header .job-title', 'margin');
    dimension($that, 'title_header_padding', 'Padding', '.job-header .job-title', 'padding');

    add_text_controls($that, 'schema_header_title', 'Title', '.job-header .job-title');
    add_background_border_control($that, 'schema_header_title', 'Title', '.job-header .job-title');


    $that->add_control(
        'job_style_heading_company',
        [
            'label' => esc_html__( 'Company', 'listing-schema-generator' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    dimension($that, 'company_header_margin', 'Margin', '.job-header .job-company', 'margin');
    dimension($that, 'company_header_padding', 'Padding', '.job-header .job-company', 'padding');

    add_text_controls($that, 'schema_header_company', 'Company', '.job-header .job-company');
    add_background_border_control($that, 'schema_header_company', 'Company', '.job-header .job-company');


    $that->add_control(
        'job_style_heading_date',
        [
            'label' => esc_html__( 'Date', 'listing-schema-generator' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    dimension($that, 'date_header_margin', 'Margin', '.job-header .job-date', 'margin');
    dimension($that, 'date_header_padding', 'Padding', '.job-header .job-date', 'padding');

    add_text_controls($that, 'schema_header_date', 'Date', '.job-header .job-date');
    add_background_border_control($that, 'schema_header_date', 'Date', '.job-header .job-date');

    $that->end_controls_section();
}

// Content
function listingContentStyle($that){
    $that->start_controls_section(
        'schema_style_content',
        [
            'label' => __( 'Content', 'listing-schema-generator' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    $that->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name' => 'schema_content_background',
            'types' => [ 'classic', 'gradient', 'video' ],
            'selector' => '{{WRAPPER}} .job-detail',
        ]
    );


    dimension($that, 'description_padding', 'Padding', '.job-detail', 'padding');

    add_text_controls($that, 'schema_description', 'Description', '.job-detail');
    add_background_border_control($that, 'schema_description', 'Description', '.job-detail');

    $that->end_controls_section();
}

// More Info
function listingInfoStyle($that){
    $that->start_controls_section(
        'schema_more_infobox',
        [
            'label' => __( 'More Info', 'listing-schema-generator' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    dimension($that, 'infobox_padding', 'Padding', '.info-box', 'padding');

    $that->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name' => 'schema_infobox_background',
            'types' => [ 'classic', 'gradient', 'video' ],
            'selector' => '{{WRAPPER}} .info-box',
        ]
    );


    $that->add_control(
        'job_style_heading_icon',
        [
            'label' => esc_html__( 'Icon', 'listing-schema-generator' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    dimension($that, 'infobox_icon', 'Padding', '.info-box .at-icon-box-icon', 'padding');
    
    slider($that, 'infobox_icon_size', 'Icon Size', '.info-box .at-icon-box-icon', 'font-size');
    color($that, 'infobox_icon_color', 'Icon Color', '.info-box .at-icon-box-icon', 'color');



    add_background_border_control($that, 'schema_infobox_icon', 'Icon', '.info-box .at-icon-box-icon');

    slider($that, 'infobox_icon_width', 'Icon Width', '.info-box .at-icon-box-icon', 'width');
    slider($that, 'infobox_icon_height', 'Icon Height', '.info-box .at-icon-box-icon', 'height');

    dimension($that, 'infobox_icon_margin', 'Margin', '.info-box .at-icon-box-icon', 'margin');
    dimension($that, 'infobox_icon_padding', 'Padding', '.info-box .at-icon-box-icon', 'padding');


    
    

    $that->add_control(
        'job_style_heading_info_title',
        [
            'label' => esc_html__( 'Title', 'listing-schema-generator' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    add_text_controls($that, 'schema_infobox_title', 'Title', '.info-box .at-icon-text .box-title');

    

    $that->add_control(
        'job_style_heading_info_description',
        [
            'label' => esc_html__( 'Description', 'listing-schema-generator' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    add_text_controls($that, 'schema_infobox_description', 'Description', '.info-box .at-icon-text .box-description');


    $that->end_controls_section();
}

function styling_setting($that){
    listingHeaderStyle($that);
    listingContentStyle($that);
    listingInfoStyle($that);
}