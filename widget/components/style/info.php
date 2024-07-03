<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;

require_once EJP_PLUGIN_PATH . "widget/components/style/helper.php";

// More Info
function listingInfoStyle($that) {
    $that->start_controls_section(
        'posting_more_infobox',
        [
            'label' => esc_html('Further information'),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

    add_dimension_control($that, 'infobox_padding', 'Padding', '.info-box', 'padding');

    add_slider_control($that, 'infobox_icon_box_row_gap', 'Row Gap', '.info-box .icon-box', 'margin-bottom', ['px'], ['px' => ['min' => 0, 'max' => 100, 'step' => 1]]);

    $that->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name' => 'posting_infobox_background',
            'types' => ['classic', 'gradient', 'video'],
            'selector' => '{{WRAPPER}} .info-box',
        ]
    );

    $that->add_control(
        'job_style_heading_icon',
        [
            'label' => esc_html('Icon'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    add_slider_control($that, 'infobox_icon_size', 'Size', '.info-box .at-icon-box-icon i, .info-box .at-icon-box-icon svg', 'font-size', ['px'], ['px' => ['min' => 0, 'max' => 100, 'step' => 1]]);
    add_color_control($that, 'infobox_icon_color', 'Color', '.info-box .at-icon-box-icon i, .info-box .at-icon-box-icon svg', 'color');

    add_background_border_control($that, 'posting_infobox_icon', 'Icon', '.info-box .at-icon-box-icon');
    add_slider_control($that, 'infobox_icon_width', 'Icon Box Width', '.info-box .at-icon-box-icon', 'width');
    add_slider_control($that, 'infobox_icon_height', 'Icon Box Height', '.info-box .at-icon-box-icon', 'height');
    add_dimension_control($that, 'infobox_icon_padding', 'Padding', '.info-box .at-icon-box-icon', 'padding');
    add_dimension_control($that, 'infobox_icon_margin', 'Margin', '.info-box .at-icon-box-icon', 'margin');

    $that->add_control(
        'job_style_heading_info_title',
        [
            'label' => esc_html('Title'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    add_text_controls($that, 'posting_infobox_title', 'Title', '.info-box .at-icon-text .box-title');
    add_dimension_control($that, 'infobox_title_padding', 'Padding', '.info-box .at-icon-text', 'padding');

    $that->add_control(
        'job_style_heading_info_description',
        [
            'label' => esc_html('Description'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    add_text_controls($that, 'posting_infobox_description', 'Description', '.info-box .at-icon-text .box-description');
    add_dimension_control($that, 'infobox_description_padding', 'Padding', '.info-box .at-icon-text .box-description', 'padding');

    $that->end_controls_section();
}