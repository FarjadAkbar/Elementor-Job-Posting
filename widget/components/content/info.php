<?php
require_once EJP_PLUGIN_PATH . "widget/utils/constants.php";
require_once EJP_PLUGIN_PATH . "widget/components/content/helper.php";

use Elementor\Controls_Manager;

function listingInfo($that, $date) {
    // Define an array of custom words keys
    $custom_words_keys = [
        'elementor_job_posting_custom_word_0', 'elementor_job_posting_custom_word_1',
        'elementor_job_posting_custom_word_2', 'elementor_job_posting_custom_word_3',
        'elementor_job_posting_custom_word_4', 'elementor_job_posting_custom_word_5',
        'elementor_job_posting_custom_word_6', 'elementor_job_posting_custom_word_7',
        'elementor_job_posting_custom_word_8', 'elementor_job_posting_custom_word_9',
        'elementor_job_posting_custom_word_10', 'elementor_job_posting_custom_word_11',
        'elementor_job_posting_custom_word_12', 'elementor_job_posting_custom_word_14',
        'elementor_job_posting_custom_word_15', 'elementor_job_posting_custom_word_16',
        'elementor_job_posting_custom_word_17'
    ];

    // Fetch custom words from options
    $custom_words = array_map('get_option', $custom_words_keys);

    // Define default values
    $default_words = [
        'Full time', 'Part time', 'Contractor', 'Temporary position',
        'Practice', 'Volunteer', 'Day job', 'Miscellaneous',
        'Hour', 'Week', 'Month', 'Year', 'Remote', 'Work Place',
        'Employment type', 'Salary', 'Application Until'
    ];

    // Assign custom words or default values
    $words = array_map(function($custom_word, $default_word) {
        return !empty($custom_word) ? $custom_word : $default_word;
    }, $custom_words, $default_words);

    // Destructure assigned words for easier access
    [
        $full_time, $part_time, $contractor, $temporary_position,
        $practice, $volunteer, $day_job, $miscellaneous,
        $hour, $week, $month, $year, $remote, $work_place,
        $employment_type, $salary, $application_until
    ] = $words;

    // Start the info section
    $that->start_controls_section(
        'info_section',
        [
            'label' => esc_html('Further information'),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    // Add employment type heading and control
    add_heading_control($that, 'posting_job_heading_type', $employment_type, 'before');
    add_icon_control($that, 'job_type_icon', 'fas fa-hourglass', 'solid');
    add_select_control($that, 'posting_job_type', $employment_type, $full_time, [
        '' => esc_html('None'),
        $full_time => $full_time,
        $part_time => $part_time,
        $contractor => $contractor,
        $temporary_position => $temporary_position,
        $practice => $practice,
        $volunteer => $volunteer,
        $day_job => $day_job,
        $miscellaneous => $miscellaneous,
    ]);

    // Add duration heading and controls
    add_heading_control($that, 'posting_job_heading_date', 'Duration', 'before');
    add_icon_control($that, 'date_icon', 'fas fa-calendar-check', 'solid');
    add_expiry_date_control($that, 'posting_job_expire_date', $application_until, $date);

    // Add work place heading and controls
    add_heading_control($that, 'posting_job_heading_location', $work_place, 'before');
    add_icon_control($that, 'location_icon', 'fas fa-map-marker', 'solid');
    add_icon_control($that, 'remote_icon', 'fas fa-globe', 'solid');
    add_switcher_control($that, 'posting_job_remote', $remote, 'Yes', 'No', 'yes');
    add_search_select_control($that, 'posting_job_country', 'Country', 'Deutschland', states());
    add_conditional_text_control($that, 'posting_job_street', 'Street', 'posting_job_remote', '');
    add_conditional_text_control($that, 'posting_job_city', 'City', 'posting_job_remote', '');
    add_conditional_text_control($that, 'posting_job_zip_code', 'Postal Code', 'posting_job_remote', '');

    // Add salary heading and controls
    add_heading_control($that, 'posting_job_heading_pricing', $salary, 'before');
    add_icon_control($that, 'salary_icon', 'fas fa-money-bill-wave', 'solid');
    add_number_control($that, 'posting_job_price', $salary . ' (Minimum / Standard)', 1, 100000, 1, 1000);
    add_number_control($that, 'posting_job_max_price', $salary . ' (Maximum / Optional)', 1, 100000, 1, 5000);
    add_select_control($that, 'posting_job_currency', 'Currency', '€', states());
    add_select_control($that, 'posting_job_per', $salary . ' pro', $hour, [
        '' => esc_html('None'),
        $hour => $hour,
        $week => $week,
        $month => $month,
        $year => $year,
    ]);

    // End the info section
    $that->end_controls_section();
}

function add_heading_control($that, $name, $label, $separator) {
    $that->add_control(
        $name,
        [
            'label' => esc_html($label),
            'type' => Controls_Manager::HEADING,
            'separator' => $separator,
        ]
    );
}



function add_select_control($that, $name, $label, $default, $options) {
    $that->add_control(
        $name,
        [
            'label' => esc_html($label),
            'type' => Controls_Manager::SELECT,
            'default' => $default,
            'options' => $options,
        ]
    );
}

function add_expiry_date_control($that, $name, $label, $default) {
    $that->add_control(
        $name,
        [
            'label' => esc_html($label),
            'type' => Controls_Manager::DATE_TIME,
            'default' => $default,
        ]
    );
}

function add_switcher_control($that, $name, $label, $label_on, $label_off, $return_value) {
    $that->add_control(
        $name,
        [
            'label' => esc_html($label),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html($label_on),
            'label_off' => esc_html($label_off),
            'return_value' => $return_value,
            'default' => '',
        ]
    );
}

function add_search_select_control($that, $name, $label, $default, $options) {
    $that->add_control(
        $name,
        [
            'label' => esc_html($label),
            'type' => Controls_Manager::SELECT2,
            'default' => $default,
            'options' => $options,
        ]
    );
}

function add_conditional_text_control($that, $name, $label, $condition_field, $condition_value) {
    $that->add_control(
        $name,
        [
            'label' => esc_html($label),
            'type' => Controls_Manager::TEXT,
            'condition' => [
                $condition_field => $condition_value,
            ],
        ]
    );
}

function add_number_control($that, $name, $label, $min, $max, $step, $default) {
    $that->add_control(
        $name,
        [
            'label' => esc_html($label),
            'type' => Controls_Manager::NUMBER,
            'min' => $min,
            'max' => $max,
            'step' => $step,
            'default' => $default,
        ]
    );
}
