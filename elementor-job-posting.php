<?php

/**
 * Elementor Job Posting Widget
 *
 * @package ElementorGrid
 *
 * Plugin Name: Elementor Job Posting
 * Description: Dieses Elementor Addon fügt deiner Jobseite automatisch Strukturierte Daten / Schema Markup für JobPostings hinzu.
 * Plugin URI:  https://github.com/FarjadAkbar/Elementor-Job-Posting.git
 * Version:     1.1.9
 * Author:      Farjad Akbar
 * Author URI:  https://www.seohit.de/
 * Text Domain: elementor-job-posting
 */


if (!defined('ABSPATH')) {
    exit;
}

require 'plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$updateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/FarjadAkbar/Elementor-Job-Posting',
	__FILE__,
	'elementor-job-posting'
);
$updateChecker->setBranch('main');

// Step 1: Create a settings page in WordPress admin
function elementor_job_posting_settings_page() {
    add_options_page( 'Elementor Job Posting Settings', 'Elementor Job Posting', 'manage_options', 'elementor-job-posting-settings', 'elementor_job_posting_settings_page_content' );
}
add_action( 'admin_menu', 'elementor_job_posting_settings_page' );

// Step 2: Add fields to input custom words
function elementor_job_posting_settings_page_content() {
    ?>
    <div class="wrap">
        <h2>Elementor Job Posting Settings</h2>
        <form method="post" action="options.php">
            <?php settings_fields( 'elementor-job-posting-settings-group' ); ?>
            <?php do_settings_sections( 'elementor-job-posting-settings-group' ); ?>
            <input type="submit" class="button-primary" value="Save Changes">
        </form>
    </div>
    <?php
}

function elementor_job_posting_settings_section_callback() {
    echo '<p>Enter custom words separated by comma.</p>';
}

function elementor_job_posting_settings_init() {
    $arr = [
    'Full time',
    'Part time',
    'Contractor',
    'Temporary position',
    'Practice',
    'Volunteer',
    'Day job',
    'Miscellaneous',
    'Hour',
    'Week',
    'Month',
    'Year',
    'Remote',
    'Home Office',
    'Work Place',
    'Employment type',
    'Salary',
    'Application Until',
    'Further information',
    'Duration',
    'Country',
    'Street',
    'City',
    'Postal Code',
    'Currency'
];

    // Register settings for each custom word
    foreach ($arr as $key => $value) {
        register_setting('elementor-job-posting-settings-group', "elementor_job_posting_custom_word_$key");
    }

    add_settings_section('elementor-job-posting-settings-section', 'Custom Words', 'elementor_job_posting_settings_section_callback', 'elementor-job-posting-settings-group');

    // Add settings fields for each custom word
    foreach ($arr as $key => $value) {
        add_settings_field(
            "elementor-job-posting-custom-word-$key-field",
            $value,
            function() use ($key) {
                $custom_word = get_option("elementor_job_posting_custom_word_$key");
                echo '<input type="text" name="elementor_job_posting_custom_word_' . $key . '" value="' . esc_attr($custom_word) . '">';
            },
            'elementor-job-posting-settings-group',
            'elementor-job-posting-settings-section'
        );
    }
}
add_action('admin_init', 'elementor_job_posting_settings_init');


function register_schema_widget($widgets_manager)
{
    require_once(__DIR__ . '/widget/index.php');
    $widgets_manager->register(new \Elementor_Job_Posting_Widget());
}
add_action('elementor/widgets/register', 'register_schema_widget');