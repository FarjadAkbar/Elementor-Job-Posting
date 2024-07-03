<?php

use Elementor\Controls_Manager;
function add_icon_control($that, $name, $value, $library) {
    $that->add_control(
        $name,
        [
            'label' => esc_html('Icon'),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => $value,
                'library' => $library,
            ],
        ]
    );
}