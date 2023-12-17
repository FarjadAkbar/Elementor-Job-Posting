<?php
use Elementor\Controls_Manager;
use Elementor\Utils;



function listingHeader($that){
    $that->start_controls_section(
        'header_section',
        [
            'label' => esc_html( 'Kopfzeile' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    $that->add_control(
        'posting_job_title',
        [
            'label' => esc_html( 'Jobtitle' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html( 'Titel der Stellenanzeige' ),
            'placeholder' => esc_html( 'Titel der Stellenanzeige' ),
        ]
    );

    $that->add_control(
        'posting_job_company',
        [
            'label' => esc_html( 'Company' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html( 'Firmenname' ),
            'placeholder' => esc_html( 'Firmenname' ),
        ]
    );
    
    $that->add_control(
        'posting_job_link',
        [
            'label' => esc_html( 'Company URL' ),
            'type' => Controls_Manager::URL,
            'placeholder' => esc_html( 'URL der Firma' ),
            'options' => [ 'url', 'is_external', 'nofollow' ],
            'label_block' => true,
        ]
    );

    $that->add_control(
        'posting_job_image',
        [
            'label' => esc_html( 'Logo wählen'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
        ]
    );
    
    
    $that->add_control(
        'date_post_icon',
        [
            'label' => esc_html( 'Icon' ),
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
            'label' => esc_html( 'Post Date' ),
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
            'label' => esc_html( 'Job Beschreibung' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );
    $that->add_control(
        'posting_job_description',
        [
            'label' => esc_html( 'Description' ),
            'type' => Controls_Manager::WYSIWYG,
            'default' => '<strong>Job Description:</strong> A UI/UX (User Interface/User Experience) designer is responsible for designing and creating engaging and effective interfaces for software and web applications. This includes designing the layout, visual design, and interactivity of the user interface.
            
            <strong>Job Responsibility:</strong> Collaborating with cross-functional teams: UI/UX designers often work closely with other teams, including product management, engineering, and marketing, to ensure that the user interface is aligned with business and technical requirements. You will need to be able to effectively communicate your design ideas and gather feedback from other team members.
            <ul> <li>Conducting user research and testing to understand user needs and behaviors.</li> <li>Designing wireframes, prototypes, and high-fidelity mockups.</li> <li>Developing and maintaining design systems and style guides.</li> <li>Collaborating with cross-functional teams, including product management, engineering, and marketing.</li> <li>Staying up-to-date with the latest design trends and technologies.</li> <li>Gathering and analyzing user requirements to inform the design of new software or web applications.</li></ul>',
            'placeholder' => esc_html( 'Type your description here' ),
        ]
    );
    $that->end_controls_section();
}


function listingInfo($that){
    $that->start_controls_section(
        'info_section',
        [
            'label' => esc_html( 'Weitere Infos' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    $that->add_control(
        'posting_job_heading_type',
        [
            'label' => esc_html( 'Anstellungsart' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $that->add_control(
        'job_type_icon',
        [
            'label' => esc_html( 'Icon' ),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-hourglass',
                'library' => 'solid',
            ],
        ]
    );


    $that->add_control(
        'posting_job_type',
        [
            'label' => esc_html( 'Anstellungsart' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'Vollzeit',
            'options' => [
                '' => esc_html( 'None' ),
                'Vollzeit' => esc_html( 'Vollzeit' ),
                'Teilzeit'  => esc_html( 'Teilzeit' ),
                'Auftragnehmer' => esc_html( 'Auftragnehmer' ),
                'Befristete Stelle' => esc_html( 'Befristete Stelle' ),
                'Praktikum' => esc_html( 'Praktikum' ),
                'Voluntär' => esc_html( 'Voluntär' ),
                'Tagesjob' => esc_html( 'Tagesjob' ),
                'Sonstiges' => esc_html( 'Sonstiges' ),
            ],
        ]
    );


    $that->add_control(
        'posting_job_heading_date',
        [
            'label' => esc_html( 'Laufzeit' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $that->add_control(
        'date_icon',
        [
            'label' => esc_html( 'Icon' ),
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
            'label' => esc_html( 'Bewerbung bis' ),
            'type' => Controls_Manager::DATE_TIME,
            'default' => $sevenDaysFromNow
        ]    
    );
    

    

    $that->add_control(
        'posting_job_heading_location',
        [
            'label' => esc_html( 'Arbeitsort' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $that->add_control(
        'location_icon',
        [
            'label' => esc_html( 'Icon' ),
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
            'label' => esc_html( 'Remote Type Icon' ),
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
            'label' => esc_html( 'Remote' ),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html( 'Yes' ),
            'label_off' => esc_html( 'No' ),
            'return_value' => 'yes',
            'default' => '',
        ]
    );
    
    $that->add_control(
        'posting_job_country',
        [
            'label' => esc_html( 'Land' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'Deutschland',
            'options' => [
                '' => esc_html( 'None' ),
                'Deutschland' => esc_html( 'Deutschland' ),
                'Österreich'  => esc_html( 'Österreich' ),
                'Schweiz' => esc_html( 'Schweiz' )
            ]
        ]
    );
    
    $that->add_control(
        'posting_job_street',
        [
            'label' => esc_html( 'Straße' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html( 'Straße' ),
            'placeholder' => esc_html( 'Straße' ),
            'condition' => [
                'posting_job_remote' => '',
            ],
        ],
    );

    $that->add_control(
        'posting_job_city',
        [
            'label' => esc_html( 'Stadt' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html( 'Stadt' ),
            'placeholder' => esc_html( 'Stadt' ),
            'condition' => [
                'posting_job_remote' => '',
            ],
        ],
    );

    $that->add_control(
        'posting_job_zip_code',
        [
            'label' => esc_html( 'PLZ' ),
            'type' => Controls_Manager::TEXT,
            'placeholder' => esc_html( 'Postleitzahl' ),
            'condition' => [
                'posting_job_remote' => '',
            ],
        ],
    );

    $that->add_control(
        'posting_job_heading_pricing',
        [
            'label' => esc_html( 'Gehalt' ),            
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $that->add_control(
        'salary_icon',
        [
            'label' => esc_html( 'Icon' ),
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
            'label' => esc_html( 'Höhe des Gehalts' ),
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
            'label' => esc_html( 'Währung' ),
            'type' => Controls_Manager::SELECT,
            'default' => '€',
            'options' => [
            
                '' => esc_html( 'None' ),
                '€' => esc_html( '€' ),
                'CHF'  => esc_html( 'CHF' ),
            ],
        ]
    );

    $that->add_control(
        'posting_job_per',
        [
            'label' => esc_html( 'Gehalt pro' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'Stunde',
            'options' => [
            
                '' => esc_html( 'None' ),
                'Stunde' => esc_html( 'Stunde' ),
                'Woche'  => esc_html( 'Woche' ),
                'Monat'  => esc_html( 'Monat' ),
                'Jahr'  => esc_html( 'Jahr' ),
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