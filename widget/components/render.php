<?php
use Elementor\Icons_Manager;


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
function renderHtml($settings){
    extract($settings);
    
    $validThrough = dateformating($posting_job_expire_date, $posting_job_date_format);
    $datePosted = dateformating($posting_job_post_date, $posting_job_date_format);

    $custom_word_12 = get_option('elementor_job_posting_custom_word_12');
    $custom_word_13 = get_option('elementor_job_posting_custom_word_13');
    $custom_word_14 = get_option('elementor_job_posting_custom_word_14');
    $custom_word_15 = get_option('elementor_job_posting_custom_word_15');
    $custom_word_16 = get_option('elementor_job_posting_custom_word_16');
    $custom_word_17 = get_option('elementor_job_posting_custom_word_17');
    ?>
<div class="container job-listing-container m-0 p-0">

    <div class="job-header">
        <div class="row">
            <div class="col-auto">
                <img src="<?php echo esc_url( $posting_job_image['url'] ); ?>" alt="" class="company-logo" />
            </div>

            <div class="col-md-7">
            <p class="job-date">
                    <?php Icons_Manager::render_icon( $date_post_icon, [ 'aria-hidden' => 'true' ] ); ?>
                    <?php
                    if (!empty($posting_job_post_date)) {
                        echo $datePosted;
                    } else {
                        echo '-';
                    }
                    ?>
                </p>
                <a class="job-title" href="<?php echo !empty($posting_job_link['url']) ? $posting_job_link : '#'; ?>">
                    <h2 class="m-0"><?php echo $posting_job_title; ?></h2>
                </a>
                <p class="job-company"><?php echo $posting_job_company; ?></p>
            </div>
        </div>
    </div>
    
    <div class="job-detail">
        <?php echo nl2br($posting_job_description); ?>
    </div>

    <div class="info-box">
        <div class="d-flex flex-wrap">
            <?php if ($posting_job_remote): ?>
            <div class="col-lg-auto col-md-6 col-12 position-relative icon-box">
                <div class="row gap-2">
                    <div class="col-md-3">
                        <div class="at-icon-box-icon">
                            <?php Icons_Manager::render_icon( $remote_icon, [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                    </div>
                    <div class="col-md-9 px-lg-1 px-0">
                        <div class="at-icon-text">
                            <h5 class="box-title"><?php echo !empty($custom_word_12) ? $custom_word_12 : 'Remote'; ?></h5>
                            <p class="box-description"><?php echo !empty($custom_word_13) ? $custom_word_13 : 'Home Office'; ?></p>
                        </div>    
                    </div>
                </div>
            </div>
            <?php endif; ?> 

            <?php if ($posting_job_city || $posting_job_street || $posting_job_zip_code): ?>
            <div class="col-lg-auto col-md-6 col-12 position-relative icon-box">
                <div class="row gap-2">
                    <div class="col-md-3">
                        <div class="at-icon-box-icon">
                            <?php Icons_Manager::render_icon( $location_icon, [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                    </div>
                    <div class="col-md-9 px-lg-1 px-0">
                        <div class="at-icon-text">
                            <h5 class="box-title"><?php echo !empty($custom_word_14) ? $custom_word_14 : 'Work Place'; ?></h5>
                            <p class="box-description"><?php echo $posting_job_street; ?></p><p class="box-description"><?php echo $posting_job_zip_code . ' ' . $posting_job_city; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?> 


            <?php if ($posting_job_type): ?>
            <div class="col-lg-auto col-md-6 col-12 position-relative icon-box">
                <div class="row gap-2">
                    <div class="col-md-3">
                        <div class="at-icon-box-icon">
                            <?php Icons_Manager::render_icon( $job_type_icon, [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                    </div>
                    <div class="col-md-9 px-lg-1 px-0">
                        <div class="at-icon-text">
                            <h5 class="box-title"><?php echo !empty($custom_word_15) ? $custom_word_15 : 'Employment type'; ?></h5>
                            <p class="box-description"><?php echo $posting_job_type; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?> 


            <?php if ($posting_job_price): ?>
            <div class="col-lg-auto col-md-6 col-12 position-relative icon-box">
                <div class="row gap-2">
                    <div class="col-md-3">
                        <div class="at-icon-box-icon">
                            <?php Icons_Manager::render_icon( $salary_icon, [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                    </div>
                    <div class="col-md-9 px-lg-1 px-0">
                        <div class="at-icon-text">
                            <h5 class="box-title"><?php echo !empty($custom_word_16) ? $custom_word_16 : 'Salary'; ?></h5>
                            <p class="box-description">
                                <?php echo $posting_job_price ?> 
                                <?php echo $posting_job_max_price != '' ? "-$posting_job_max_price" : ''; ?> 
                                <?php echo $posting_job_currency; ?> / <?php echo $posting_job_per; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?> 


            
            <?php if ($posting_job_expire_date): ?>
            <div class="col-lg-auto col-md-6 col-12 position-relative icon-box">
                <div class="row">
                    <div class="col-md-3">
                        <div class="at-icon-box-icon">
                            <?php Icons_Manager::render_icon( $date_icon, [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                    </div>
                    <div class="col-md-9 px-lg-1 px-0">
                        <div class="at-icon-text">
                            <h5 class="box-title"><?php echo !empty($custom_word_17) ? $custom_word_17 : 'Application Until'; ?></h5>
                            <p class="box-description"><?php echo $validThrough; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?> 

        </div>
    </div>
</div>

<script type="application/ld+json">
    <?php
    $structured_data = array(
        "@context" => "http://schema.org/",
        "@type" => "JobPosting",
        "title" => $posting_job_title,
        "description" => nl2br($posting_job_description),
        "hiringOrganization" => array(
            "@type" => "Organization",
            "name" => $posting_job_company,
            "sameAs" => (!empty($posting_job_link['url'])) ? $posting_job_link['url'] : null,
            "logo" => (!empty($posting_job_image['url'])) ? $posting_job_image['url'] : null
        ),
        "employmentType" => (!empty($posting_job_image['url'])) ? $posting_job_type : null,
        
        "datePosted" => date_format(date_create($posting_job_post_date), "Y-m-d"),
        "validThrough" => date_format(date_create($posting_job_expire_date), "Y-m-d"),
        "applicantLocationRequirements" => array(
            "@type" => "Country",
            "name" => ($posting_job_remote == 'yes') ? $posting_job_country : null
        ),
        "jobLocationType" => ($posting_job_remote == 'yes') ? "TELECOMMUTE" : null,
        "jobLocation" => ($posting_job_remote != 'yes') ? array(
            "@type" => "Place",
            "address" => array(
                "@type" => "PostalAddress",
                "streetAddress" => $posting_job_street,
                "addressLocality" => $posting_job_city,
                "postalCode" => $posting_job_zip_code,
                "addressCountry" => $posting_job_country
            )
        ) : null,
        "baseSalary" => (!empty($posting_job_price) && empty($posting_job_max_price)) ? array(
        "@type" => "MonetaryAmount",
        "currency" => $posting_job_currency,
        "value" => array(
            "@type" => "QuantitativeValue",
            "value" => $posting_job_price,
            "unitText" => $posting_job_per
        )
        ) : (
            (!empty($posting_job_price) && !empty($posting_job_max_price)) ? array(
                "@type" => "MonetaryAmount",
                "currency" => $posting_job_currency,
                "value" => array(
                    "@type" => "QuantitativeValue",
                    "minValue" => $posting_job_price,
                    "maxValue" => $posting_job_max_price,
                    "unitText" => $posting_job_per
                )
            ) : null
        )
    );

    // Convert the array to a JSON string using JSON.stringify
    $json_ld_script = json_encode($structured_data, JSON_PRETTY_PRINT);
    ?>

    // Output the JSON-LD script
    <?php echo $json_ld_script; ?>;
</script>
<?php
}