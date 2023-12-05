<?php
use Elementor\Controls_Manager;
use Elementor\Utils;



function listingHeader($that){
    $that->start_controls_section(
        'header_section',
        [
            'label' => esc_html( 'Kopfzeile', 'listing-schema-generator' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    $that->add_control(
        'schema_job_title',
        [
            'label' => esc_html( 'Jobtitle', 'listing-schema-generator' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html( 'Titel der Stellenanzeige', 'listing-schema-generator' ),
            'placeholder' => esc_html( 'Titel der Stellenanzeige', 'listing-schema-generator' ),
        ]
    );

    $that->add_control(
        'schema_job_company',
        [
            'label' => esc_html( 'Company', 'listing-schema-generator' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html( 'Firmenname', 'listing-schema-generator' ),
            'placeholder' => esc_html( 'Firmenname', 'listing-schema-generator' ),
        ]
    );
    
    $that->add_control(
        'schema_job_link',
        [
            'label' => esc_html( 'Company URL', 'listing-schema-generator' ),
            'type' => Controls_Manager::URL,
            'placeholder' => esc_html( 'URL der Firma', 'listing-schema-generator' ),
            'options' => [ 'url', 'is_external', 'nofollow' ],
            'label_block' => true,
        ]
    );

    $that->add_control(
        'schema_job_image',
        [
            'label' => esc_html( 'Logo wählen', 'listing-schema-generator'),
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
        'schema_job_post_date',
        [
            'label' => esc_html( 'Post Date', 'listing-schema-generator' ),
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
            'label' => esc_html( 'Job Beschreibung', 'listing-schema-generator' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );
    $that->add_control(
        'schema_job_description',
        [
            'label' => esc_html( 'Description', 'listing-schema-generator' ),
            'type' => Controls_Manager::WYSIWYG,
            'default' => '<strong>Job Description:</strong> A UI/UX (User Interface/User Experience) designer is responsible for designing and creating engaging and effective interfaces for software and web applications. This includes designing the layout, visual design, and interactivity of the user interface.
            
            <strong>Job Responsibility:</strong> Collaborating with cross-functional teams: UI/UX designers often work closely with other teams, including product management, engineering, and marketing, to ensure that the user interface is aligned with business and technical requirements. You will need to be able to effectively communicate your design ideas and gather feedback from other team members.
            <ul> <li>Conducting user research and testing to understand user needs and behaviors.</li> <li>Designing wireframes, prototypes, and high-fidelity mockups.</li> <li>Developing and maintaining design systems and style guides.</li> <li>Collaborating with cross-functional teams, including product management, engineering, and marketing.</li> <li>Staying up-to-date with the latest design trends and technologies.</li> <li>Gathering and analyzing user requirements to inform the design of new software or web applications.</li></ul>',
            'placeholder' => esc_html( 'Type your description here', 'listing-schema-generator' ),
        ]
    );
    $that->end_controls_section();
}


function listingInfo($that){
    $that->start_controls_section(
        'info_section',
        [
            'label' => esc_html( 'Weitere Infos', 'listing-schema-generator' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    $that->add_control(
        'schema_job_heading_type',
        [
            'label' => esc_html( 'Anstellungsart', 'listing-schema-generator' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $that->add_control(
        'job_type_icon',
        [
            'label' => esc_html( 'Icon', 'listing-schema-generator' ),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-hourglass',
                'library' => 'fa-solid',
            ],
        ]
    );


    $that->add_control(
        'schema_job_type',
        [
            'label' => esc_html( 'Anstellungsart', 'listing-schema-generator' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'Vollzeit',
            'options' => [
                '' => esc_html( 'None', 'listing-schema-generator' ),
                'Vollzeit' => esc_html( 'Vollzeit', 'listing-schema-generator' ),
                'Teilzeit'  => esc_html( 'Teilzeit', 'listing-schema-generator' ),
                'Auftragnehmer' => esc_html( 'Auftragnehmer', 'listing-schema-generator' ),
                'Befristete Stelle' => esc_html( 'Befristete Stelle', 'listing-schema-generator' ),
                'Praktikum' => esc_html( 'Praktikum', 'listing-schema-generator' ),
                'Voluntär' => esc_html( 'Voluntär', 'listing-schema-generator' ),
                'Tagesjob' => esc_html( 'Tagesjob', 'listing-schema-generator' ),
                'Sonstiges' => esc_html( 'Sonstiges', 'listing-schema-generator' ),
            ],
        ]
    );


    $that->add_control(
        'schema_job_heading_date',
        [
            'label' => esc_html( 'Laufzeit', 'listing-schema-generator' ),
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
        'schema_job_expire_date',
        [
            'label' => esc_html( 'Bewerbung bis', 'listing-schema-generator' ),
            'type' => Controls_Manager::DATE_TIME,
            'default' => $sevenDaysFromNow
        ]    
    );
    

    

    $that->add_control(
        'schema_job_heading_location',
        [
            'label' => esc_html( 'Arbeitsort', 'listing-schema-generator' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $that->add_control(
        'location_icon',
        [
            'label' => __( 'Icon', 'listing-schema-generator' ),
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
            'label' => __( 'Remote Type Icon', 'listing-schema-generator' ),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-globe',
                'library' => 'solid',
            ],
        ]
    );


    $that->add_control(
        'schema_job_remote',
        [
            'label' => esc_html( 'Remote', 'listing-schema-generator' ),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html( 'Yes', 'listing-schema-generator' ),
            'label_off' => esc_html( 'No', 'listing-schema-generator' ),
            'return_value' => 'yes',
            'default' => '',
        ]
    );
    
    $that->add_control(
        'schema_job_country',
        [
            'label' => esc_html( 'Land', 'listing-schema-generator' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'Deutschland',
            'options' => [
                '' => esc_html( 'None', 'listing-schema-generator' ),
                'Deutschland' => esc_html( 'Deutschland', 'listing-schema-generator' ),
                'Österreich'  => esc_html( 'Österreich', 'listing-schema-generator' ),
                'Schweiz' => esc_html( 'Schweiz', 'listing-schema-generator' )
            ]
        ]
    );
    
    $that->add_control(
        'schema_job_street',
        [
            'label' => esc_html( 'Straße', 'listing-schema-generator' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html( 'Straße', 'listing-schema-generator' ),
            'placeholder' => esc_html( 'Straße', 'listing-schema-generator' ),
            'condition' => [
                'schema_job_remote' => '',
            ],
        ],
    );

    $that->add_control(
        'schema_job_city',
        [
            'label' => esc_html( 'Stadt', 'listing-schema-generator' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html( 'Stadt', 'listing-schema-generator' ),
            'placeholder' => esc_html( 'Stadt', 'listing-schema-generator' ),
            'condition' => [
                'schema_job_remote' => '',
            ],
        ],
    );

    $that->add_control(
        'schema_job_zip_code',
        [
            'label' => esc_html( 'PLZ', 'listing-schema-generator' ),
            'type' => Controls_Manager::TEXT,
            'placeholder' => esc_html( 'Postleitzahl', 'listing-schema-generator' ),
            'condition' => [
                'schema_job_remote' => '',
            ],
        ],
    );

    $that->add_control(
        'schema_job_heading_pricing',
        [
            'label' => esc_html( 'Gehalt', 'listing-schema-generator' ),            
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $that->add_control(
        'salary_icon',
        [
            'label' => __( 'Icon', 'listing-schema-generator' ),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-money-bill-wave',
                'library' => 'solid',
            ],
        ]
    );

    $that->add_control(
        'schema_job_price',
        [
            'label' => esc_html( 'Höhe des Gehalts', 'listing-schema-generator' ),
            'type' => Controls_Manager::NUMBER,
            'min' => 1,
            'max' => 100000,
            'step' => 1,
            'default' => 1000,
        ]
    );
    $that->add_control(
        'schema_job_currency',
        [
            'label' => esc_html( 'Währung', 'listing-schema-generator' ),
            'type' => Controls_Manager::SELECT,
            'default' => '€',
            'options' => [
            
                '' => esc_html( 'None', 'listing-schema-generator' ),
                '€' => esc_html( '€', 'listing-schema-generator' ),
                'CHF'  => esc_html( 'CHF', 'listing-schema-generator' ),
            ],
        ]
    );

    $that->add_control(
        'schema_job_per',
        [
            'label' => esc_html( 'Gehalt pro', 'listing-schema-generator' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'Stunde',
            'options' => [
            
                '' => esc_html( 'None', 'listing-schema-generator' ),
                'Stunde' => esc_html( 'Stunde', 'listing-schema-generator' ),
                'Woche'  => esc_html( 'Woche', 'listing-schema-generator' ),
                'Monat'  => esc_html( 'Monat', 'listing-schema-generator' ),
                'Jahr'  => esc_html( 'Jahr', 'listing-schema-generator' ),
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