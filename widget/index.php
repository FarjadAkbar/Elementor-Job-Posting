<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;


require_once "components/content.php";
require_once "components/style.php";
require_once "components/render.php";

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Elementor_Job_Posting_Widget extends Widget_Base{
/**
     * Retrieve Widget Name.
     *
     * @since 1.0.0
     * @access public
     */
    public function get_name()
    {
        return 'elementor-job-posting';
    }


    /**
     * Retrieve Widget Title.
     *
     * @since 1.0.0
     * @access public
     */
    public function get_title()
    {
        return esc_html('Job Posting', 'elementor-job-posting');
    }

    public function get_icon()
    {
        return 'eicon-table-of-contents';
    }


    /**
     * Retrieve Widget Keywords.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget keywords.
     */
    public function get_keywords()
    {
        return array('job-listing', 'schema-generator', 'list');
    }

    public function get_style_depends() {
        wp_enqueue_style('listing_style', plugins_url('../assets/css/style.css', __FILE__), '', '1.0');
        wp_enqueue_style('bootstrap_cdn', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', array(), '2.3.3');

        return ['listing_style', 'bootstrap_cdn'];
    }

    public function get_script_depends() {
        wp_enqueue_script('listing_script', plugins_url('../assets/js/script.js', __FILE__),  array('jquery'), '1.0');

        return ['listing_script'];
    }


    public function get_categories()
    {
        return ['general'];
    }


    public function get_custom_help_url()
    {
        return 'https://www.fiverr.com/farjadakbar';
    }

    

    protected function register_controls()
    {
        content_setting($this);
        styling_setting($this);
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        renderHtml($settings);
    }
}