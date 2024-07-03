<?php
use Elementor\Controls_Manager;

function listingContent($that) {
    // Start the content section for Job Description
    $that->start_controls_section(
        'content_section',
        [
            'label' => esc_html('Job Description'),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    // Add the job description control
    add_wysiwyg_control(
        $that, 
        'posting_job_description', 
        'Description', 
        '<strong>Job Description:</strong> A UI/UX (User Interface/User Experience) designer is responsible for designing and creating engaging and effective interfaces for software and web applications. This includes designing the layout, visual design, and interactivity of the user interface.
        
        <strong>Job Responsibility:</strong> Collaborating with cross-functional teams: UI/UX designers often work closely with other teams, including product management, engineering, and marketing, to ensure that the user interface is aligned with business and technical requirements. You will need to be able to effectively communicate your design ideas and gather feedback from other team members.
        <ul>
            <li>Conducting user research and testing to understand user needs and behaviors.</li>
            <li>Designing wireframes, prototypes, and high-fidelity mockups.</li>
            <li>Developing and maintaining design systems and style guides.</li>
            <li>Collaborating with cross-functional teams, including product management, engineering, and marketing.</li>
            <li>Staying up-to-date with the latest design trends and technologies.</li>
            <li>Gathering and analyzing user requirements to inform the design of new software or web applications.</li>
        </ul>', 
        'Type your description here'
    );

    // End the content section
    $that->end_controls_section();
}

function add_wysiwyg_control($that, $name, $label, $default, $placeholder) {
    $that->add_control(
        $name,
        [
            'label' => esc_html($label),
            'type' => Controls_Manager::WYSIWYG,
            'default' => $default,
            'placeholder' => esc_html($placeholder),
        ]
    );
}
