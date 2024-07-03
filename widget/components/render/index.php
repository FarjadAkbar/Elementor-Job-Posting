<?php
use Elementor\Icons_Manager;

require_once EJP_PLUGIN_PATH . "widget/components/render/helper.php";

// Function to render icon box
function renderIconBox($condition, $icon, $custom_word_1, $custom_word_2, $default_word_1, $description_1 = '', $description_2 = '') {
    if ($condition): ?>
        <div class="col-lg-4 col-md-6 col-12 position-relative icon-box">
            <div class="row gap-2">
                <div class="col-md-3 px-0">
                    <div class="at-icon-box-icon">
                        <?php Icons_Manager::render_icon($icon, ['aria-hidden' => 'true']); ?>
                    </div>
                </div>
                <div class="col-md-9 px-0">
                    <div class="at-icon-text">
                        <h5 class="box-title"><?php echo !empty($custom_word_1) ? $custom_word_1 : $default_word_1; ?></h5>
                        <p class="box-description"><?php echo !empty($custom_word_2) ? $custom_word_2 : $description_1; ?></p>
                        <?php if ($description_2): ?>
                            <p class="box-description"><?php echo $description_2; ?></p>
                        <?php endif; ?>
                    </div>    
                </div>
            </div>
        </div>
    <?php endif;
}

function renderHtml($settings){
    extract($settings);

    // Retrieve the stored date and format it
    $post_date = get_option('my_custom_widget_posting_job_post_date');
    $validThrough = dateformating($posting_job_expire_date, $posting_job_date_format);

    // Format the posting date
    $datePosted = formatPostingDate($posting_job_post_date, $posting_job_date_format, $post_date);

    // Retrieve custom words
    $custom_words = getCustomWords([
        'elementor_job_posting_custom_word_12',
        'elementor_job_posting_custom_word_13',
        'elementor_job_posting_custom_word_14',
        'elementor_job_posting_custom_word_15',
        'elementor_job_posting_custom_word_16',
        'elementor_job_posting_custom_word_17',
    ]);

    ?>
<div class="container job-listing-container m-0 p-0">
    <div class="job-header">
        <div class="row">
            <div class="col-auto">
                <img src="<?php echo esc_url($posting_job_image['url']); ?>" alt="" class="company-logo" />
            </div>
            <div class="col-md-7">
                <p class="job-date">
                    <?php Icons_Manager::render_icon($date_post_icon, ['aria-hidden' => 'true']); ?>
                    <?php echo $datePosted; ?>
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
            <?php renderIconBox($posting_job_remote, $remote_icon, $custom_words[0], $custom_words[1], 'Remote', 'Home Office'); ?>
            <?php renderIconBox($posting_job_city || $posting_job_street || $posting_job_zip_code, $location_icon, $custom_words[2], '', 'Work Place', $posting_job_street, $posting_job_zip_code . ' ' . $posting_job_city); ?>
            <?php renderIconBox($posting_job_type, $job_type_icon, $custom_words[3], '', 'Employment type', $posting_job_type); ?>
            <?php renderIconBox($posting_job_price, $salary_icon, $custom_words[4], '', 'Salary', $posting_job_price . ($posting_job_max_price != '' ? "-$posting_job_max_price" : '') . ' ' . $posting_job_currency . ' / ' . $posting_job_per); ?>
            <?php renderIconBox($posting_job_expire_date, $date_icon, $custom_words[5], '', 'Application Until', $validThrough); ?>
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