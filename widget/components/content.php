<?php
use Elementor\Controls_Manager;
use Elementor\Utils;



function listingHeader($that){
    $that->start_controls_section(
        'header_section',
        [
            'label' => esc_html( 'Kopfzeile', 'elementor-job-posting' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    $that->add_control(
        'posting_job_title',
        [
            'label' => esc_html( 'Jobtitle', 'elementor-job-posting' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html( 'Titel der Stellenanzeige', 'elementor-job-posting' ),
            'placeholder' => esc_html( 'Titel der Stellenanzeige', 'elementor-job-posting' ),
        ]
    );

    $that->add_control(
        'posting_job_company',
        [
            'label' => esc_html( 'Company', 'elementor-job-posting' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html( 'Firmenname', 'elementor-job-posting' ),
            'placeholder' => esc_html( 'Firmenname', 'elementor-job-posting' ),
        ]
    );
    
    $that->add_control(
        'posting_job_link',
        [
            'label' => esc_html( 'Company URL', 'elementor-job-posting' ),
            'type' => Controls_Manager::URL,
            'placeholder' => esc_html( 'URL der Firma', 'elementor-job-posting' ),
            'options' => [ 'url', 'is_external', 'nofollow' ],
            'label_block' => true,
        ]
    );

    $that->add_control(
        'posting_job_image',
        [
            'label' => esc_html( 'Logo wählen', 'elementor-job-posting'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
        ]
    );
    
    
    $that->add_control(
        'date_post_icon',
        [
            'label' => __( 'Icon', 'text-domain' ),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-calendar-check',
                'library' => 'solid',
            ],
        ]
    );

    $that->add_control(
        'posting_job_post_date',
        [
            'label' => esc_html( 'Post Date', 'elementor-job-posting' ),
            'type' => Controls_Manager::DATE_TIME,
            'default' => '2023-11-02 00:00'
        ]
    );
    $that->end_controls_section();
}

function listingContent($that){
    $that->start_controls_section(
        'content_section',
        [
            'label' => esc_html( 'Job Beschreibung', 'elementor-job-posting' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );
    $that->add_control(
        'posting_job_description',
        [
            'label' => esc_html( 'Description', 'elementor-job-posting' ),
            'type' => Controls_Manager::WYSIWYG,
            'default' => '<strong>Job Description:</strong> A UI/UX (User Interface/User Experience) designer is responsible for designing and creating engaging and effective interfaces for software and web applications. This includes designing the layout, visual design, and interactivity of the user interface.
            
            <strong>Job Responsibility:</strong> Collaborating with cross-functional teams: UI/UX designers often work closely with other teams, including product management, engineering, and marketing, to ensure that the user interface is aligned with business and technical requirements. You will need to be able to effectively communicate your design ideas and gather feedback from other team members.
            <ul> <li>Conducting user research and testing to understand user needs and behaviors.</li> <li>Designing wireframes, prototypes, and high-fidelity mockups.</li> <li>Developing and maintaining design systems and style guides.</li> <li>Collaborating with cross-functional teams, including product management, engineering, and marketing.</li> <li>Staying up-to-date with the latest design trends and technologies.</li> <li>Gathering and analyzing user requirements to inform the design of new software or web applications.</li></ul>',
            'placeholder' => esc_html( 'Type your description here', 'elementor-job-posting' ),
        ]
    );
    $that->end_controls_section();
}


function listingInfo($that){
    $that->start_controls_section(
        'info_section',
        [
            'label' => esc_html( 'Weitere Infos', 'elementor-job-posting' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    $that->add_control(
        'posting_job_heading_type',
        [
            'label' => esc_html( 'Anstellungsart', 'elementor-job-posting' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $that->add_control(
        'job_type_icon',
        [
            'label' => esc_html( 'Icon', 'elementor-job-posting' ),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-hourglass',
                'library' => 'fa-solid',
            ],
        ]
    );


    $that->add_control(
        'posting_job_type',
        [
            'label' => esc_html( 'Anstellungsart', 'elementor-job-posting' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'Vollzeit',
            'options' => [
                '' => esc_html( 'None', 'elementor-job-posting' ),
                'Vollzeit' => esc_html( 'Vollzeit', 'elementor-job-posting' ),
                'Teilzeit'  => esc_html( 'Teilzeit', 'elementor-job-posting' ),
                'Auftragnehmer' => esc_html( 'Auftragnehmer', 'elementor-job-posting' ),
                'Befristete Stelle' => esc_html( 'Befristete Stelle', 'elementor-job-posting' ),
                'Praktikum' => esc_html( 'Praktikum', 'elementor-job-posting' ),
                'Voluntär' => esc_html( 'Voluntär', 'elementor-job-posting' ),
                'Tagesjob' => esc_html( 'Tagesjob', 'elementor-job-posting' ),
                'Sonstiges' => esc_html( 'Sonstiges', 'elementor-job-posting' ),
            ],
        ]
    );


    $that->add_control(
        'posting_job_heading_date',
        [
            'label' => esc_html( 'Laufzeit', 'elementor-job-posting' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $that->add_control(
        'date_icon',
        [
            'label' => __( 'Icon', 'text-domain' ),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-calendar-check',
                'library' => 'solid',
            ],
        ]
    );

    $sevenDaysFromNow = date('Y-m-d H:i', strtotime('+7 days'));
    $that->add_control(
        'posting_job_expire_date',
        [
            'label' => esc_html( 'Bewerbung bis', 'elementor-job-posting' ),
            'type' => Controls_Manager::DATE_TIME,
            'default' => $sevenDaysFromNow
        ]    
    );
    

    

    $that->add_control(
        'posting_job_heading_location',
        [
            'label' => esc_html( 'Arbeitsort', 'elementor-job-posting' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $that->add_control(
        'location_icon',
        [
            'label' => __( 'Icon', 'elementor-job-posting' ),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-map-marker',
                'library' => 'solid',
            ],
        ]
    );


    $that->add_control(
        'remote_icon',
        [
            'label' => __( 'Remote Type Icon', 'elementor-job-posting' ),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-globe',
                'library' => 'solid',
            ],
        ]
    );


    $that->add_control(
        'posting_job_remote',
        [
            'label' => esc_html( 'Remote', 'elementor-job-posting' ),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html( 'Yes', 'elementor-job-posting' ),
            'label_off' => esc_html( 'No', 'elementor-job-posting' ),
            'return_value' => 'yes',
            'default' => '',
        ]
    );
    
    $that->add_control(
        'posting_job_country',
        [
            'label' => esc_html( 'Land', 'elementor-job-posting' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'Deutschland',
            'options' => [
                '' => esc_html( 'None', 'elementor-job-posting' ),
                'Deutschland' => esc_html( 'Deutschland', 'elementor-job-posting' ),
                'Österreich'  => esc_html( 'Österreich', 'elementor-job-posting' ),
                'Schweiz' => esc_html( 'Schweiz', 'elementor-job-posting' )
            ]
        ]
    );
    
    $that->add_control(
        'posting_job_street',
        [
            'label' => esc_html( 'Straße', 'elementor-job-posting' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html( 'Straße', 'elementor-job-posting' ),
            'placeholder' => esc_html( 'Straße', 'elementor-job-posting' ),
            'condition' => [
                'posting_job_remote' => '',
            ],
        ],
    );

    $that->add_control(
        'posting_job_city',
        [
            'label' => esc_html( 'Stadt', 'elementor-job-posting' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html( 'Stadt', 'elementor-job-posting' ),
            'placeholder' => esc_html( 'Stadt', 'elementor-job-posting' ),
            'condition' => [
                'posting_job_remote' => '',
            ],
        ],
    );

    $that->add_control(
        'posting_job_zip_code',
        [
            'label' => esc_html( 'PLZ', 'elementor-job-posting' ),
            'type' => Controls_Manager::TEXT,
            'placeholder' => esc_html( 'Postleitzahl', 'elementor-job-posting' ),
            'condition' => [
                'posting_job_remote' => '',
            ],
        ],
    );

    $that->add_control(
        'posting_job_heading_pricing',
        [
            'label' => esc_html( 'Gehalt', 'elementor-job-posting' ),            
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $that->add_control(
        'salary_icon',
        [
            'label' => __( 'Icon', 'elementor-job-posting' ),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-money-bill-wave',
                'library' => 'solid',
            ],
        ]
    );

    $that->add_control(
        'posting_job_price',
        [
            'label' => esc_html( 'Höhe des Gehalts', 'elementor-job-posting' ),
            'type' => Controls_Manager::NUMBER,
            'min' => 1,
            'max' => 100000,
            'step' => 1,
            'default' => 1000,
        ]
    );
    $that->add_control(
        'posting_job_currency',
        [
            'label' => esc_html( 'Währung', 'elementor-job-posting' ),
            'type' => Controls_Manager::SELECT,
            'default' => '€',
            'options' => [
            
                '' => esc_html( 'None', 'elementor-job-posting' ),
                '€' => esc_html( '€', 'elementor-job-posting' ),
                'CHF'  => esc_html( 'CHF', 'elementor-job-posting' ),
            ],
        ]
    );

    $that->add_control(
        'posting_job_per',
        [
            'label' => esc_html( 'Gehalt pro', 'elementor-job-posting' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'Stunde',
            'options' => [
            
                '' => esc_html( 'None', 'elementor-job-posting' ),
                'Stunde' => esc_html( 'Stunde', 'elementor-job-posting' ),
                'Woche'  => esc_html( 'Woche', 'elementor-job-posting' ),
                'Monat'  => esc_html( 'Monat', 'elementor-job-posting' ),
                'Jahr'  => esc_html( 'Jahr', 'elementor-job-posting' ),
            ],
        ]
    );
    $that->end_controls_section();
}


function content_setting($that){
    listingHeader($that);
    listingContent($that);
    listingInfo($that);
}