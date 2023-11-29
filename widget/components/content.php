<?php
use Elementor\Controls_Manager;
use Elementor\Utils;



function listingHeader($that){
    $that->start_controls_section(
        'header_section',
        [
            'label' => esc_html__( 'Header', 'listing-schema-generator' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    $that->add_control(
        'schema_job_title',
        [
            'label' => esc_html__( 'Title', 'listing-schema-generator' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( 'Senior Software Engineer', 'listing-schema-generator' ),
            'placeholder' => esc_html__( 'Type your title here', 'listing-schema-generator' ),
        ]
    );

    $that->add_control(
        'schema_job_company',
        [
            'label' => esc_html__( 'Company', 'listing-schema-generator' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( 'Abc.Tech Group Ltd', 'listing-schema-generator' ),
            'placeholder' => esc_html__( 'Type your company here', 'listing-schema-generator' ),
        ]
    );
    
    $that->add_control(
        'schema_job_link',
        [
            'label' => esc_html__( 'Link', 'listing-schema-generator' ),
            'type' => Controls_Manager::URL,
            'options' => [ 'url', 'is_external', 'nofollow' ],
            'default' => [
                'url' => 'https://www.fiverr.com/farjadakbar',
                'is_external' => true,
                'nofollow' => true,
            ],
            'label_block' => true,
        ]
    );

    $that->add_control(
        'schema_job_image',
        [
            'label' => esc_html__( 'Choose Image', 'listing-schema-generator'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
        ]
    );
    $that->end_controls_section();
}

function listingContent($that){
    $that->start_controls_section(
        'content_section',
        [
            'label' => esc_html__( 'Content', 'listing-schema-generator' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );
    $that->add_control(
        'schema_job_description',
        [
            'label' => esc_html__( 'Description', 'listing-schema-generator' ),
            'type' => Controls_Manager::WYSIWYG,
            'default' => '<strong>Job Description:</strong> A UI/UX (User Interface/User Experience) designer is responsible for designing and creating engaging and effective interfaces for software and web applications. This includes designing the layout, visual design, and interactivity of the user interface.
            
            <strong>Job Responsibility:</strong> Collaborating with cross-functional teams: UI/UX designers often work closely with other teams, including product management, engineering, and marketing, to ensure that the user interface is aligned with business and technical requirements. You will need to be able to effectively communicate your design ideas and gather feedback from other team members.
            <ul> <li>Conducting user research and testing to understand user needs and behaviors.</li> <li>Designing wireframes, prototypes, and high-fidelity mockups.</li> <li>Developing and maintaining design systems and style guides.</li> <li>Collaborating with cross-functional teams, including product management, engineering, and marketing.</li> <li>Staying up-to-date with the latest design trends and technologies.</li> <li>Gathering and analyzing user requirements to inform the design of new software or web applications.</li></ul>',
            'placeholder' => esc_html__( 'Type your description here', 'listing-schema-generator' ),
        ]
    );
    $that->end_controls_section();
}


function listingInfo($that){
    $that->start_controls_section(
        'info_section',
        [
            'label' => esc_html__( 'More Info', 'listing-schema-generator' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

    $that->add_control(
        'schema_job_heading_type',
        [
            'label' => esc_html__( 'Type', 'listing-schema-generator' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $that->add_control(
        'job_type_icon',
        [
            'label' => esc_html__( 'Icon', 'textdomain' ),
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
            'label' => esc_html__( 'Type', 'listing-schema-generator' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'Full_Time',
            'options' => [
                'Full_Time' => esc_html__( 'Full Time', 'listing-schema-generator' ),
                'Part_Time'  => esc_html__( 'Part Time', 'listing-schema-generator' ),
                'Contractor' => esc_html__( 'Contractor', 'listing-schema-generator' ),
                'Temporary' => esc_html__( 'Temporary', 'listing-schema-generator' ),
                'Intern' => esc_html__( 'Intern', 'listing-schema-generator' ),
                'Volunteer' => esc_html__( 'Volunteer', 'listing-schema-generator' ),
                'Perdiem' => esc_html__( 'Perdiem', 'listing-schema-generator' ),
                'Other' => esc_html__( 'Other', 'listing-schema-generator' ),
            ],
        ]
    );


    $that->add_control(
        'schema_job_heading_date',
        [
            'label' => esc_html__( 'Date', 'listing-schema-generator' ),
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

    $that->add_control(
        'schema_job_post_date',
        [
            'label' => esc_html__( 'Post Date', 'listing-schema-generator' ),
            'type' => Controls_Manager::DATE_TIME,
            'default' => '2023-11-02 00:00'
        ]
    );
    
    $that->add_control(
        'schema_job_expire_date',
        [
            'label' => esc_html__( 'Expire Date', 'listing-schema-generator' ),
            'type' => Controls_Manager::DATE_TIME,
            'default' => '2023-11-02 00:00'
        
	]    
  );
    

    

    $that->add_control(
        'schema_job_heading_location',
        [
            'label' => esc_html__( 'Location', 'listing-schema-generator' ),
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
            'label' => esc_html__( 'Remote', 'listing-schema-generator' ),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'listing-schema-generator' ),
            'label_off' => esc_html__( 'No', 'listing-schema-generator' ),
            'return_value' => 'yes',
            'default' => '',
        ]
    );
    
    $that->add_control(
        'schema_job_country',
        [
            'label' => esc_html__( 'Country', 'listing-schema-generator' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'DE',
            'options' => [
                'DE' => esc_html__( 'Germany', 'listing-schema-generator' ),
                'AT'  => esc_html__( 'Austria', 'listing-schema-generator' ),
                'CH' => esc_html__( 'Swiss', 'listing-schema-generator' )
            ]
        ]
    );
    
    $that->add_control(
        'schema_job_street',
        [
            'label' => esc_html__( 'Street', 'listing-schema-generator' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( '9G72+XC Schönefeld', 'listing-schema-generator' ),
            'placeholder' => esc_html__( 'Type your data here', 'listing-schema-generator' ),
            'condition' => [
                'schema_job_remote' => '',
            ],
        ],
    );

    $that->add_control(
        'schema_job_city',
        [
            'label' => esc_html__( 'City', 'listing-schema-generator' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( 'Berlin', 'listing-schema-generator' ),
            'placeholder' => esc_html__( 'Type your data here', 'listing-schema-generator' ),
            'condition' => [
                'schema_job_remote' => '',
            ],
        ],
    );

    $that->add_control(
        'schema_job_zip_code',
        [
            'label' => esc_html__( 'Zip Code', 'listing-schema-generator' ),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( '87776', 'listing-schema-generator' ),
            'placeholder' => esc_html__( 'Type your data here', 'listing-schema-generator' ),
            'condition' => [
                'schema_job_remote' => '',
            ],
        ],
    );

    $that->add_control(
        'schema_job_heading_pricing',
        [
            'label' => esc_html__( 'Pricing', 'listing-schema-generator' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
    $that->add_control(
        'salary_icon',
        [
            'label' => __( 'Salary Icon', 'listing-schema-generator' ),
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
            'label' => esc_html__( 'Price', 'listing-schema-generator' ),
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
            'label' => esc_html__( 'Currency', 'listing-schema-generator' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'EUR',
            'options' => [
                'EUR' => esc_html__( 'EUR', 'listing-schema-generator' ),
                'CHF'  => esc_html__( 'CHF', 'listing-schema-generator' ),
            ],
        ]
    );

    $that->add_control(
        'schema_job_per',
        [
            'label' => esc_html__( 'Period', 'listing-schema-generator' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'HOUR',
            'options' => [
                'HOUR' => esc_html__( 'Hour', 'listing-schema-generator' ),
                'WEEK'  => esc_html__( 'Week', 'listing-schema-generator' ),
                'MONTH'  => esc_html__( 'Month', 'listing-schema-generator' ),
                'YEAR'  => esc_html__( 'Year', 'listing-schema-generator' ),
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