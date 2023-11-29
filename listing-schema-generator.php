<?php

/**
 * Elementor Pricing Widget
 *
 * @package ElementorGrid
 *
 * Plugin Name: Listing Schema Generator
 * Description: schema generator plugin
 * Plugin URI:  https://www.fiverr.com/farjadakbar
 * Version:     1.0.0
 * Author:      Farjad Akbar
 * Author URI:  https://www.fiverr.com/farjadakbar
 * Text Domain: listing-schema-generator
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
	'https://github.com/FarjadAkbar/Listing-Schema-Generator',
	__FILE__,
	'listing-schema-generator'
);
$updateChecker->setBranch('main');

//Optional: If you're using a private repository, specify the access token like this:
$updateChecker->setAuthentication($GITHUB_TOKEN);


function register_schema_widget($widgets_manager)
{
    require_once(__DIR__ . '/widget/index.php');
    $widgets_manager->register(new \Elementor_Schema_Generator_Widget());
}
add_action('elementor/widgets/register', 'register_schema_widget');