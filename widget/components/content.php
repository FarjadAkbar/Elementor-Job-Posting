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
            'default' => date('Y-m-d H:i'), // Set the default value to the current date and time
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
    $custom_word_0 = get_option('elementor_job_posting_custom_word_0');
    $custom_word_1 = get_option('elementor_job_posting_custom_word_1');
    $custom_word_2 = get_option('elementor_job_posting_custom_word_2');
    $custom_word_3 = get_option('elementor_job_posting_custom_word_3');
    $custom_word_4 = get_option('elementor_job_posting_custom_word_4');
    $custom_word_5 = get_option('elementor_job_posting_custom_word_5');
    $custom_word_6 = get_option('elementor_job_posting_custom_word_6');
    $custom_word_7 = get_option('elementor_job_posting_custom_word_7');

    $custom_word_8 = get_option('elementor_job_posting_custom_word_8');
    $custom_word_9 = get_option('elementor_job_posting_custom_word_9');
    $custom_word_10 = get_option('elementor_job_posting_custom_word_10');
    $custom_word_11 = get_option('elementor_job_posting_custom_word_11');

    $vollzeit = !empty($custom_word_0) ? $custom_word_0 : 'Vollzeit';
    $teilzeit = !empty($custom_word_1) ? $custom_word_1 : 'Teilzeit';
    $auftragnehmer = !empty($custom_word_2) ? $custom_word_2 : 'Auftragnehmer';
    $befristete = !empty($custom_word_3) ? $custom_word_3 : 'Befristete Stelle';
    $praktikum = !empty($custom_word_4) ? $custom_word_4 : 'Praktikum';
    $voluntär = !empty($custom_word_5) ? $custom_word_5 : 'Voluntär';
    $tagesjob = !empty($custom_word_6) ? $custom_word_6 : 'Tagesjob';
    $sonstiges = !empty($custom_word_7) ? $custom_word_7 : 'Sonstiges';

    $stunde = !empty($custom_word_8) ? $custom_word_8 : 'Stunde';
    $woche = !empty($custom_word_9) ? $custom_word_9 : 'Woche';
    $monat = !empty($custom_word_10) ? $custom_word_10 : 'Monat';
    $jahr = !empty($custom_word_11) ? $custom_word_11 : 'Jahr';
    

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
            'default' => $vollzeit,
            'options' => [
                '' => esc_html( 'None' ),
                    $vollzeit => $vollzeit,
                    $teilzeit  => $teilzeit,
                    $auftragnehmer => $auftragnehmer,
                    $befristete => $befristete,
                    $praktikum => $praktikum,
                    $voluntär => $voluntär,
                    $tagesjob => $tagesjob,
                    $sonstiges => $sonstiges,
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

    $sevenDaysFromNow = date('Y-m-d H:i', strtotime('+3 months'));
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
            'type' => Controls_Manager::SELECT2,
            'default' => 'Deutschland',
            'options' => [
                '' => esc_html( 'None' ),
                "AF" => "Afghanistan",
                "AL" => "Albania",
                "DZ" => "Algeria",
                "AS" => "American Samoa",
                "AD" => "Andorra",
                "AO" => "Angola",
                "AI" => "Anguilla",
                "AQ" => "Antarctica",
                "AG" => "Antigua and Barbuda",
                "AR" => "Argentina",
                "AM" => "Armenia",
                "AW" => "Aruba",
                "AU" => "Australia",
                "AT" => "Austria",
                "AZ" => "Azerbaijan",
                "BS" => "Bahamas",
                "BH" => "Bahrain",
                "BD" => "Bangladesh",
                "BB" => "Barbados",
                "BY" => "Belarus",
                "BE" => "Belgium",
                "BZ" => "Belize",
                "BJ" => "Benin",
                "BM" => "Bermuda",
                "BT" => "Bhutan",
                "BO" => "Bolivia",
                "BA" => "Bosnia and Herzegovina",
                "BW" => "Botswana",
                "BV" => "Bouvet Island",
                "BR" => "Brazil",
                "BQ" => "British Antarctic Territory",
                "IO" => "British Indian Ocean Territory",
                "VG" => "British Virgin Islands",
                "BN" => "Brunei",
                "BG" => "Bulgaria",
                "BF" => "Burkina Faso",
                "BI" => "Burundi",
                "KH" => "Cambodia",
                "CM" => "Cameroon",
                "CA" => "Canada",
                "CT" => "Canton and Enderbury Islands",
                "CV" => "Cape Verde",
                "KY" => "Cayman Islands",
                "CF" => "Central African Republic",
                "TD" => "Chad",
                "CL" => "Chile",
                "CN" => "China",
                "CX" => "Christmas Island",
                "CC" => "Cocos [Keeling] Islands",
                "CO" => "Colombia",
                "KM" => "Comoros",
                "CG" => "Congo - Brazzaville",
                "CD" => "Congo - Kinshasa",
                "CK" => "Cook Islands",
                "CR" => "Costa Rica",
                "HR" => "Croatia",
                "CU" => "Cuba",
                "CY" => "Cyprus",
                "CZ" => "Czech Republic",
                "CI" => "Côte d’Ivoire",
                "DK" => "Denmark",
                "DJ" => "Djibouti",
                "DM" => "Dominica",
                "DO" => "Dominican Republic",
                "NQ" => "Dronning Maud Land",
                "DD" => "East Germany",
                "EC" => "Ecuador",
                "EG" => "Egypt",
                "SV" => "El Salvador",
                "GQ" => "Equatorial Guinea",
                "ER" => "Eritrea",
                "EE" => "Estonia",
                "ET" => "Ethiopia",
                "FK" => "Falkland Islands",
                "FO" => "Faroe Islands",
                "FJ" => "Fiji",
                "FI" => "Finland",
                "FR" => "France",
                "GF" => "French Guiana",
                "PF" => "French Polynesia",
                "TF" => "French Southern Territories",
                "FQ" => "French Southern and Antarctic Territories",
                "GA" => "Gabon",
                "GM" => "Gambia",
                "GE" => "Georgia",
                "DE" => "Germany",
                "GH" => "Ghana",
                "GI" => "Gibraltar",
                "GR" => "Greece",
                "GL" => "Greenland",
                "GD" => "Grenada",
                "GP" => "Guadeloupe",
                "GU" => "Guam",
                "GT" => "Guatemala",
                "GG" => "Guernsey",
                "GN" => "Guinea",
                "GW" => "Guinea-Bissau",
                "GY" => "Guyana",
                "HT" => "Haiti",
                "HM" => "Heard Island and McDonald Islands",
                "HN" => "Honduras",
                "HK" => "Hong Kong SAR China",
                "HU" => "Hungary",
                "IS" => "Iceland",
                "IN" => "India",
                "ID" => "Indonesia",
                "IR" => "Iran",
                "IQ" => "Iraq",
                "IE" => "Ireland",
                "IM" => "Isle of Man",
                "IL" => "Israel",
                "IT" => "Italy",
                "JM" => "Jamaica",
                "JP" => "Japan",
                "JE" => "Jersey",
                "JT" => "Johnston Island",
                "JO" => "Jordan",
                "KZ" => "Kazakhstan",
                "KE" => "Kenya",
                "KI" => "Kiribati",
                "KW" => "Kuwait",
                "KG" => "Kyrgyzstan",
                "LA" => "Laos",
                "LV" => "Latvia",
                "LB" => "Lebanon",
                "LS" => "Lesotho",
                "LR" => "Liberia",
                "LY" => "Libya",
                "LI" => "Liechtenstein",
                "LT" => "Lithuania",
                "LU" => "Luxembourg",
                "MO" => "Macau SAR China",
                "MK" => "Macedonia",
                "MG" => "Madagascar",
                "MW" => "Malawi",
                "MY" => "Malaysia",
                "MV" => "Maldives",
                "ML" => "Mali",
                "MT" => "Malta",
                "MH" => "Marshall Islands",
                "MQ" => "Martinique",
                "MR" => "Mauritania",
                "MU" => "Mauritius",
                "YT" => "Mayotte",
                "FX" => "Metropolitan France",
                "MX" => "Mexico",
                "FM" => "Micronesia",
                "MI" => "Midway Islands",
                "MD" => "Moldova",
                "MC" => "Monaco",
                "MN" => "Mongolia",
                "ME" => "Montenegro",
                "MS" => "Montserrat",
                "MA" => "Morocco",
                "MZ" => "Mozambique",
                "MM" => "Myanmar [Burma]",
                "NA" => "Namibia",
                "NR" => "Nauru",
                "NP" => "Nepal",
                "NL" => "Netherlands",
                "AN" => "Netherlands Antilles",
                "NT" => "Neutral Zone",
                "NC" => "New Caledonia",
                "NZ" => "New Zealand",
                "NI" => "Nicaragua",
                "NE" => "Niger",
                "NG" => "Nigeria",
                "NU" => "Niue",
                "NF" => "Norfolk Island",
                "KP" => "North Korea",
                "VD" => "North Vietnam",
                "MP" => "Northern Mariana Islands",
                "NO" => "Norway",
                "OM" => "Oman",
                "PC" => "Pacific Islands Trust Territory",
                "PK" => "Pakistan",
                "PW" => "Palau",
                "PS" => "Palestinian Territories",
                "PA" => "Panama",
                "PZ" => "Panama Canal Zone",
                "PG" => "Papua New Guinea",
                "PY" => "Paraguay",
                "YD" => "People's Democratic Republic of Yemen",
                "PE" => "Peru",
                "PH" => "Philippines",
                "PN" => "Pitcairn Islands",
                "PL" => "Poland",
                "PT" => "Portugal",
                "PR" => "Puerto Rico",
                "QA" => "Qatar",
                "RO" => "Romania",
                "RU" => "Russia",
                "RW" => "Rwanda",
                "RE" => "Réunion",
                "BL" => "Saint Barthélemy",
                "SH" => "Saint Helena",
                "KN" => "Saint Kitts and Nevis",
                "LC" => "Saint Lucia",
                "MF" => "Saint Martin",
                "PM" => "Saint Pierre and Miquelon",
                "VC" => "Saint Vincent and the Grenadines",
                "WS" => "Samoa",
                "SM" => "San Marino",
                "SA" => "Saudi Arabia",
                "SN" => "Senegal",
                "RS" => "Serbia",
                "CS" => "Serbia and Montenegro",
                "SC" => "Seychelles",
                "SL" => "Sierra Leone",
                "SG" => "Singapore",
                "SK" => "Slovakia",
                "SI" => "Slovenia",
                "SB" => "Solomon Islands",
                "SO" => "Somalia",
                "ZA" => "South Africa",
                "GS" => "South Georgia and the South Sandwich Islands",
                "KR" => "South Korea",
                "ES" => "Spain",
                "LK" => "Sri Lanka",
                "SD" => "Sudan",
                "SR" => "Suriname",
                "SJ" => "Svalbard and Jan Mayen",
                "SZ" => "Swaziland",
                "SE" => "Sweden",
                "CH" => "Switzerland",
                "SY" => "Syria",
                "ST" => "São Tomé and Príncipe",
                "TW" => "Taiwan",
                "TJ" => "Tajikistan",
                "TZ" => "Tanzania",
                "TH" => "Thailand",
                "TL" => "Timor-Leste",
                "TG" => "Togo",
                "TK" => "Tokelau",
                "TO" => "Tonga",
                "TT" => "Trinidad and Tobago",
                "TN" => "Tunisia",
                "TR" => "Turkey",
                "TM" => "Turkmenistan",
                "TC" => "Turks and Caicos Islands",
                "TV" => "Tuvalu",
                "UM" => "U.S. Minor Outlying Islands",
                "PU" => "U.S. Miscellaneous Pacific Islands",
                "VI" => "U.S. Virgin Islands",
                "UG" => "Uganda",
                "UA" => "Ukraine",
                "SU" => "Union of Soviet Socialist Republics",
                "AE" => "United Arab Emirates",
                "GB" => "United Kingdom",
                "US" => "United States",
                "ZZ" => "Unknown or Invalid Region",
                "UY" => "Uruguay",
                "UZ" => "Uzbekistan",
                "VU" => "Vanuatu",
                "VA" => "Vatican City",
                "VE" => "Venezuela",
                "VN" => "Vietnam",
                "WK" => "Wake Island",
                "WF" => "Wallis and Futuna",
                "EH" => "Western Sahara",
                "YE" => "Yemen",
                "ZM" => "Zambia",
                "ZW" => "Zimbabwe",
                "AX" => "Åland Islands",
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
            'label' => esc_html( 'Gehalts (Minimum / Standard)' ),
            'type' => Controls_Manager::NUMBER,
            'min' => 1,
            'max' => 100000,
            'step' => 1,
            'default' => 1000,
        ]
    );

    
    $that->add_control(
        'posting_job_max_price',
        [
            'label' => esc_html( 'Gehalts (Minimum / Optional)' ),
            'type' => Controls_Manager::NUMBER,
            'min' => 1,
            'max' => 100000,
            'step' => 1,
            'default' => 5000,
        ]
    );

    $that->add_control(
        'posting_job_currency',
        [
            'label' => esc_html( 'Währung' ),
            'type' => Controls_Manager::SELECT2,
            'default' => '€',
            'options' => [
                '' => esc_html( 'None' ),
                "AED" => "United Arab Emirates dirham",
    "AFN" => "Afghan afghani",
    "ALL" => "Albanian lek",
    "AMD" => "Armenian dram",
    "ANG" => "Netherlands Antillean guilder",
    "AOA" => "Angolan kwanza",
    "ARS" => "Argentine peso",
    "AUD" => "Australian dollar",
    "AWG" => "Aruban florin",
    "AZN" => "Azerbaijani manat",
    "BAM" => "Bosnia and Herzegovina convertible mark",
    "BBD" => "Barbados dollar",
    "BDT" => "Bangladeshi taka",
    "BGN" => "Bulgarian lev",
    "BHD" => "Bahraini dinar",
    "BIF" => "Burundian franc",
    "BMD" => "Bermudian dollar",
    "BND" => "Brunei dollar",
    "BOB" => "Boliviano",
    "BRL" => "Brazilian real",
    "BSD" => "Bahamian dollar",
    "BTN" => "Bhutanese ngultrum",
    "BWP" => "Botswana pula",
    "BYN" => "New Belarusian ruble",
    "BYR" => "Belarusian ruble",
    "BZD" => "Belize dollar",
    "CAD" => "Canadian dollar",
    "CDF" => "Congolese franc",
    "CHF" => "Swiss franc",
    "CLF" => "Unidad de Fomento",
    "CLP" => "Chilean peso",
    "CNY" => "Renminbi|Chinese yuan",
    "COP" => "Colombian peso",
    "CRC" => "Costa Rican colon",
    "CUC" => "Cuban convertible peso",
    "CUP" => "Cuban peso",
    "CVE" => "Cape Verde escudo",
    "CZK" => "Czech koruna",
    "DJF" => "Djiboutian franc",
    "DKK" => "Danish krone",
    "DOP" => "Dominican peso",
    "DZD" => "Algerian dinar",
    "EGP" => "Egyptian pound",
    "ERN" => "Eritrean nakfa",
    "ETB" => "Ethiopian birr",
    "EUR" => "Euro",
    "FJD" => "Fiji dollar",
    "FKP" => "Falkland Islands pound",
    "GBP" => "Pound sterling",
    "GEL" => "Georgian lari",
    "GHS" => "Ghanaian cedi",
    "GIP" => "Gibraltar pound",
    "GMD" => "Gambian dalasi",
    "GNF" => "Guinean franc",
    "GTQ" => "Guatemalan quetzal",
    "GYD" => "Guyanese dollar",
    "HKD" => "Hong Kong dollar",
    "HNL" => "Honduran lempira",
    "HRK" => "Croatian kuna",
    "HTG" => "Haitian gourde",
    "HUF" => "Hungarian forint",
    "IDR" => "Indonesian rupiah",
    "ILS" => "Israeli new shekel",
    "INR" => "Indian rupee",
    "IQD" => "Iraqi dinar",
    "IRR" => "Iranian rial",
    "ISK" => "Icelandic króna",
    "JMD" => "Jamaican dollar",
    "JOD" => "Jordanian dinar",
    "JPY" => "Japanese yen",
    "KES" => "Kenyan shilling",
    "KGS" => "Kyrgyzstani som",
    "KHR" => "Cambodian riel",
    "KMF" => "Comoro franc",
    "KPW" => "North Korean won",
    "KRW" => "South Korean won",
    "KWD" => "Kuwaiti dinar",
    "KYD" => "Cayman Islands dollar",
    "KZT" => "Kazakhstani tenge",
    "LAK" => "Lao kip",
    "LBP" => "Lebanese pound",
    "LKR" => "Sri Lankan rupee",
    "LRD" => "Liberian dollar",
    "LSL" => "Lesotho loti",
    "LYD" => "Libyan dinar",
    "MAD" => "Moroccan dirham",
    "MDL" => "Moldovan leu",
    "MGA" => "Malagasy ariary",
    "MKD" => "Macedonian denar",
    "MMK" => "Myanmar kyat",
    "MNT" => "Mongolian tögrög",
    "MOP" => "Macanese pataca",
    "MRO" => "Mauritanian ouguiya",
    "MUR" => "Mauritian rupee",
    "MVR" => "Maldivian rufiyaa",
    "MWK" => "Malawian kwacha",
    "MXN" => "Mexican peso",
    "MXV" => "Mexican Unidad de Inversion",
    "MYR" => "Malaysian ringgit",
    "MZN" => "Mozambican metical",
    "NAD" => "Namibian dollar",
    "NGN" => "Nigerian naira",
    "NIO" => "Nicaraguan córdoba",
    "NOK" => "Norwegian krone",
    "NPR" => "Nepalese rupee",
    "NZD" => "New Zealand dollar",
    "OMR" => "Omani rial",
    "PAB" => "Panamanian balboa",
    "PEN" => "Peruvian Sol",
    "PGK" => "Papua New Guinean kina",
    "PHP" => "Philippine peso",
    "PKR" => "Pakistani rupee",
    "PLN" => "Polish złoty",
    "PYG" => "Paraguayan guaraní",
    "QAR" => "Qatari riyal",
    "RON" => "Romanian leu",
    "RSD" => "Serbian dinar",
    "RUB" => "Russian ruble",
    "RWF" => "Rwandan franc",
    "SAR" => "Saudi riyal",
    "SBD" => "Solomon Islands dollar",
    "SCR" => "Seychelles rupee",
    "SDG" => "Sudanese pound",
    "SEK" => "Swedish krona",
    "SGD" => "Singapore dollar",
    "SHP" => "Saint Helena pound",
    "SLL" => "Sierra Leonean leone",
    "SOS" => "Somali shilling",
    "SRD" => "Surinamese dollar",
    "SSP" => "South Sudanese pound",
    "STD" => "São Tomé and Príncipe dobra",
    "SVC" => "Salvadoran colón",
    "SYP" => "Syrian pound",
    "SZL" => "Swazi lilangeni",
    "THB" => "Thai baht",
    "TJS" => "Tajikistani somoni",
    "TMT" => "Turkmenistani manat",
    "TND" => "Tunisian dinar",
    "TOP" => "Tongan paʻanga",
    "TRY" => "Turkish lira",
    "TTD" => "Trinidad and Tobago dollar",
    "TWD" => "New Taiwan dollar",
    "TZS" => "Tanzanian shilling",
    "UAH" => "Ukrainian hryvnia",
    "UGX" => "Ugandan shilling",
    "USD" => "United States dollar",
    "UYI" => "Uruguay Peso en Unidades Indexadas",
    "UYU" => "Uruguayan peso",
    "UZS" => "Uzbekistan som",
    "VEF" => "Venezuelan bolívar",
    "VND" => "Vietnamese đồng",
    "VUV" => "Vanuatu vatu",
    "WST" => "Samoan tala",
    "XAF" => "Central African CFA franc",
    "XCD" => "East Caribbean dollar",
    "XOF" => "West African CFA franc",
    "XPF" => "CFP franc",
    "XXX" => "No currency",
    "YER" => "Yemeni rial",
    "ZAR" => "South African rand",
    "ZMW" => "Zambian kwacha",
    "ZWL" => "Zimbabwean dollar"
            ],
        ]
    );

    $that->add_control(
        'posting_job_per',
        [
            'label' => esc_html( 'Gehalt pro' ),
            'type' => Controls_Manager::SELECT,
            'default' => $stunde,
            'options' => [
                '' => esc_html( 'None' ),
                $stunde => $stunde,
                $woche => $woche,
                $monat => $monat,
                $jahr => $jahr,
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