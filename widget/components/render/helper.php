<?php
function dateformating($date, $date_formatting){
    $date = date_create($date);
    $formatted_date = '';

    switch ($date_formatting) {
        case 'mm/dd/yyyy':
            $formatted_date = date_format($date, 'm/d/Y');
            break;
        case 'yyyy/mm/dd':
            $formatted_date = date_format($date, 'Y/m/d');
            break;
        case 'dd-mm-yyyy':
            $formatted_date = date_format($date, 'd-m-Y');
            break;
        case 'mm-dd-yyyy':
            $formatted_date = date_format($date, 'm-d-Y');
            break;
        case 'yyyy-mm-dd':
            $formatted_date = date_format($date, 'Y-m-d');
            break;
        case 'dd.mm.yyyy':
            $formatted_date = date_format($date, 'd.m.Y');
            break;
        case 'mm.dd.yyyy':
            $formatted_date = date_format($date, 'm.d.Y');
            break;
        case 'yyyy.mm.dd':
            $formatted_date = date_format($date, 'Y.m.d');
            break;
        default:
            $formatted_date = date_format($date, 'd/m/Y'); // Default format
            break;
    }

    return $formatted_date;    
}

function is_elementor_editor() {
    if (isset($_GET['elementor-preview']) || isset($_GET['action']) && $_GET['action'] === 'elementor') {
        return true;
    }
    return false;
}

function formatPostingDate($post_date, $date_format, $stored_date) {
    if ($post_date != "") {
        return dateformating($post_date, $date_format);
    }
    return is_elementor_editor() ? $stored_date : 'xx/xx/xxxx';
}

// Function to get custom words
function getCustomWords($keys) {
    $words = [];
    foreach ($keys as $key) {
        $words[] = get_option($key);
    }
    return $words;
}