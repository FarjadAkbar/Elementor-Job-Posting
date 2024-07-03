<?php
require_once EJP_PLUGIN_PATH . "widget/components/content/header.php";
require_once EJP_PLUGIN_PATH . "widget/components/content/content.php";
require_once EJP_PLUGIN_PATH . "widget/components/content/info.php";

function content_setting($that) {
    // Option names to store the dates
    $option_post_date = 'my_custom_widget_posting_job_post_date';
    $option_expiry_date = 'my_custom_widget_posting_job_expire_date';

    // Retrieve and set default dates
    $default_post_date = get_or_set_default_date($option_post_date, 'Y-m-d H:i');
    $default_expiry_date = get_or_set_default_date($option_expiry_date, 'Y-m-d H:i', '+3 months');

    // Call listing functions with the appropriate dates
    listingHeader($that, $default_post_date);
    listingContent($that);
    listingInfo($that, $default_expiry_date);
}

function get_or_set_default_date($option_name, $format, $modify = null) {
    // Retrieve the stored date
    $date = get_option($option_name);

    // Check if the date is already set
    if ($date === false) {
        // Set the initial date to now or modified date if provided
        $default_date = $modify ? date($format, strtotime($modify)) : date($format);
        // Store the date in the options
        update_option($option_name, $default_date);
        return $default_date;
    } else {
        // Use the stored date
        return $date;
    }
}
