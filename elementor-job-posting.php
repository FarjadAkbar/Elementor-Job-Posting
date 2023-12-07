<?php

/**
 * Elementor Job Posting Widget
 *
 * @package ElementorGrid
 *
 * Plugin Name: Elementor Job Posting
 * Description: Dieses Elementor Addon fügt deiner Jobseite automatisch Strukturierte Daten / Schema Markup für JobPostings hinzu.
 * Plugin URI:  https://www.fiverr.com/farjadakbar
 * Version:     1.0.2
 * Author:      Farjad Akbar
 * Author URI:  https://www.fiverr.com/farjadakbar
 * Text Domain: elementor-job-posting
 */


if (!defined('ABSPATH')) {
    exit;
}

require 'plugin-update-checker/plugin-update-checker.php';
require 'vendor/autoload.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$GITHUB_TOKEN = $_ENV['GITHUB_TOKEN'];

$updateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/FarjadAkbar/elementor-job-posting',
	__FILE__,
	'elementor-job-posting'
);
$updateChecker->setBranch('main');

//Optional: If you're using a private repository, specify the access token like this:
$updateChecker->setAuthentication($GITHUB_TOKEN);


function register_schema_widget($widgets_manager)
{
    require_once(__DIR__ . '/widget/index.php');
    $widgets_manager->register(new \Elementor_Job_Posting_Widget());
}
add_action('elementor/widgets/register', 'register_schema_widget');