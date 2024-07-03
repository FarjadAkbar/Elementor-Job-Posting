<?php
use Elementor\Controls_Manager;
use Elementor\Utils;

require_once EJP_PLUGIN_PATH . "widget/components/content/helper.php";

function listingHeader($that, $date) {
    $that->start_controls_section(
        'header_section',
        [
            'label' => esc_html('Header'),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    add_text_control($that, 'posting_job_title', 'Job Title', 'Titel der Stellenanzeige', 'Titel der Stellenanzeige');
    add_text_control($that, 'posting_job_company', 'Company', 'Firmenname', 'Firmenname');
    add_url_control($that, 'posting_job_link', 'Company URL');
    add_media_control($that, 'posting_job_image', 'Choose Logo', Utils::get_placeholder_image_src());
    add_icon_control($that, 'date_post_icon', 'Icon', 'fas fa-calendar-check', 'solid');
    add_date_control($that, 'posting_job_post_date', 'Post Date', $date);
    add_date_format_control($that, 'posting_job_date_format', 'Date Format');

    $that->end_controls_section();
}

function add_text_control($that, $name, $label, $default, $placeholder) {
    $that->add_control(
        $name,
        [
            'label' => esc_html($label),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html($default),
            'placeholder' => esc_html($placeholder),
        ]
    );
}

function add_url_control($that, $name, $label) {
    $that->add_control(
        $name,
        [
            'label' => esc_html($label),
            'type' => Controls_Manager::URL,
            'options' => ['url', 'is_external', 'nofollow'],
            'label_block' => true,
        ]
    );
}

function add_media_control($that, $name, $label, $default_url) {
    $that->add_control(
        $name,
        [
            'label' => esc_html($label),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => $default_url,
            ],
        ]
    );
}

function add_date_control($that, $name, $label, $default_date) {
    $that->add_control(
        $name,
        [
            'label' => esc_html($label),
            'type' => Controls_Manager::DATE_TIME,
            // 'default' => $default_date, // Uncomment if you want to set the default date
        ]
    );
}

function add_date_format_control($that, $name, $label) {
    $that->add_control(
        $name,
        [
            'label' => esc_html($label),
            'type' => Controls_Manager::SELECT,
            'description' => esc_html('Choose the appropriate date format for your country'),
            'default' => 'dd/mm/yyyy',
            'options' => [
                'dd/mm/yyyy' => 'dd/mm/yyyy',
                'mm/dd/yyyy' => 'mm/dd/yyyy',
                'yyyy/mm/dd' => 'yyyy/mm/dd',
                'dd-mm-yyyy' => 'dd-mm-yyyy',
                'mm-dd-yyyy' => 'mm-dd-yyyy',
                'yyyy-mm-dd' => 'yyyy-mm-dd',
                'dd.mm.yyyy' => 'dd.mm.yyyy',
                'mm.dd.yyyy' => 'mm.dd.yyyy',
                'yyyy.mm.dd' => 'yyyy.mm.dd',
            ],
        ]
    );
}
