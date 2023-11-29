<?php
use Elementor\Icons_Manager;

function renderHtml($settings){
    extract($settings);
    ?>
<div class="container job-listing-container m-0 p-0">

    <div class="job-header">
        <div class="row">
            <div class="col-auto">
                <img src="<?php echo $schema_job_image['url']; ?>" alt="" class="company-logo" />
            </div>

            <div class="col-md-7">
                <h2><a class="job-title" href="<?php echo $schema_job_link; ?>"><?php echo $schema_job_title; ?></a></h2>
                <p class="job-company mb-3"><?php echo $schema_job_company; ?></p>

                <p class="job-date">
                    <?php Icons_Manager::render_icon( $date_icon, [ 'aria-hidden' => 'true' ] ); ?>
                    <?php
                    if (!empty($schema_job_post_date)) {
                        $date = new DateTime($schema_job_post_date);
                        echo $date->format("d F, Y");
                    } else {
                        echo '-';
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
    
    <div class="job-detail">
        <?php echo nl2br($schema_job_description); ?>
    </div>

    <div class="info-box">
        <div class="row">
            <?php if ($schema_job_remote): ?>
            <div class="col-md-3 position-relative">
                <div class="row">
                    <div class="col-md-2">
                        <div class="at-icon-box-icon">
                            <?php Icons_Manager::render_icon( $remote_icon, [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="at-icon-text">
                            <h5 class="box-title">Remote</h5>
                            <p class="box-description">Home Office</p>
                        </div>    
                    </div>
                </div>
            </div>
            <?php endif; ?> 

            <?php if ($schema_job_city || $schema_job_street || $schema_job_zip_code): ?>
            <div class="col-md-3 position-relative">
                <div class="row">
                    <div class="col-md-2">
                        <div class="at-icon-box-icon">
                            <?php Icons_Manager::render_icon( $location_icon, [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="at-icon-text">
                            <h5 class="box-title">Location</h5>
                            <p class="box-description"><?= $schema_job_street . ', ' . $schema_job_zip_code . ', '  . ucfirst(strtolower($schema_job_city)); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?> 


            <?php if ($schema_job_type): ?>
            <div class="col-md-3 position-relative">
                <div class="row">
                    <div class="col-md-2">
                        <div class="at-icon-box-icon">
                            <?php Icons_Manager::render_icon( $job_type_icon, [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="at-icon-text">
                            <h5 class="box-title">Employment Type</h5>
                            <p class="box-description"><?= str_replace('_', ' ', $schema_job_type); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?> 


            <?php if ($schema_job_price): ?>
            <div class="col-md-3 position-relative">
                <div class="row">
                    <div class="col-md-2">
                        <div class="at-icon-box-icon">
                            <?php Icons_Manager::render_icon( $salary_icon, [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="at-icon-text">
                            <h5 class="box-title">Location</h5>
                            <p class="box-description"><?= $schema_job_price . ucfirst(strtolower($schema_job_currency)); ?> / <?= ucfirst(strtolower($schema_job_per)); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?> 


            
            <?php if ($schema_job_expire_date): ?>
            <div class="col-md-3 position-relative">
                <div class="row">
                    <div class="col-md-2">
                        <div class="at-icon-box-icon">
                            <?php Icons_Manager::render_icon( $date_icon, [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="at-icon-text">
                            <h5 class="box-title">Expiration</h5>
                            <p class="box-description"><?= date_format(date_create($schema_job_expire_date), 'm-d-Y'); ?></p>
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
        "@context" => "https://schema.org/",
        "@type" => "JobPosting",
        "title" => $schema_job_title,
        "description" => nl2br($schema_job_description),
        "hiringOrganization" => array(
            "@type" => "Organization",
            "name" => $schema_job_company,
            "sameAs" => (!empty($schema_job_link['url'])) ? $schema_job_link['url'] : null,
            "logo" => (!empty($schema_job_image['url'])) ? $schema_job_image['url'] : null
        ),
        "employmentType" => (!empty($schema_job_image['url'])) ? $schema_job_type : null,
        "datePosted" => date_format(date_create($schema_job_post_date), 'Y/m/d H:i:s'),
        "validThrough" => date_format(date_create($schema_job_expire_date), 'Y/m/d H:i:s'),
        "applicantLocationRequirements" => array(
            "@type" => "Country",
            "name" => ($schema_job_remote == 'yes') ? $schema_job_country : null
        ),
        "jobLocationType" => ($schema_job_remote == 'yes') ? "TELECOMMUTE" : null,
        "jobLocation" => ($schema_job_remote != 'yes') ? array(
            "@type" => "Place",
            "address" => array(
                "@type" => "PostalAddress",
                "streetAddress" => $schema_job_street,
                "addressLocality" => $schema_job_city,
                "postalCode" => $schema_job_zip_code,
                "addressCountry" => $schema_job_country
            )
        ) : null,
        "baseSalary" => (!empty($schema_job_price)) ? array(
            "@type" => "MonetaryAmount",
            "currency" => $schema_job_currency,
            "value" => array(
                "@type" => "QuantitativeValue",
                "value" => $schema_job_price,
                "unitText" => $schema_job_per
            )
        ) : null
    );

    // Convert the array to a JSON string using JSON.stringify
    $json_ld_script = json_encode($structured_data, JSON_PRETTY_PRINT);
    ?>

    // Output the JSON-LD script
    <?php echo $json_ld_script; ?>;
</script>
<?php
}