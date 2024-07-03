<?php
require_once EJP_PLUGIN_PATH . "widget/components/style/header.php";
require_once EJP_PLUGIN_PATH . "widget/components/style/content.php";
require_once EJP_PLUGIN_PATH . "widget/components/style/info.php";

function apply_styling_settings($widget_instance) {
    // Apply header styles
    listingHeaderStyle($widget_instance);

    // Apply content styles
    listingContentStyle($widget_instance);

    // Apply information box styles
    listingInfoStyle($widget_instance);
}
