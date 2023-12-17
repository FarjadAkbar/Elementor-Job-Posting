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
        wp_enqueue_style('style_local', plugin_dir_url(__DIR__) . '/assets/css/style.css', array(), '5.2.3');
        wp_enqueue_style('bootstrap_local', plugin_dir_url(__DIR__) . '/assets/css/bootstrap.min.css', array(), '5.2.3');
        wp_enqueue_style('fontawesome_local', plugin_dir_url(__DIR__) . '/assets/css/font-awesome.min.css', array(), '6.5.1');

        return ['style_local', 'bootstrap_local', 'fontawesome_local'];
    }

    public function get_script_depends() {
        wp_enqueue_script('script_local', plugin_dir_url(__DIR__) . '/assets/js/script.css', array(), '5.2.3');
        
        return ['script_local'];
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