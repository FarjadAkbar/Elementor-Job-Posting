<?php

/**
 * Elementor Job Posting Widget
 *
 * @package ElementorGrid
 *
 * Plugin Name: Elementor Job Posting
 * Description: Dieses Elementor Addon fügt deiner Jobseite automatisch Strukturierte Daten / Schema Markup für JobPostings hinzu.
 * Plugin URI:  https://www.fiverr.com/farjadakbar
 * Version:     1.1.3
 * Author:      Farjad Akbar
 * Author URI:  https://www.fiverr.com/farjadakbar
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
$updateChecker->setAuthentication('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');

function register_schema_widget($widgets_manager)
{
    require_once(__DIR__ . '/widget/index.php');
    $widgets_manager->register(new \Elementor_Job_Posting_Widget());
}
add_action('elementor/widgets/register', 'register_schema_widget');