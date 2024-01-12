<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package icims
 */

get_header();
?>

<div id="fullpage" class="icims-template">

    <div class="section header-orange header-bg-white bg-white header-orange">
        <div class="container">

            <?php

            $endpoint = $_GET['endpoint'];
            $portalUrl = $_GET['portalUrl'];
            

            function initiate_curl_b($endpoint)
            {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => $endpoint,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "Authorization: Basic WWFyZENyZWF0aXZlQVBJOmlJNHZINWFLM2JZM2JWMXk="
                    ),
                ));
                return $curl;
            }

            $curlJob = initiate_curl_b($endpoint);
            $jobResponse = curl_exec($curlJob);
            $jobErr = curl_error($curlJob);
            curl_close($curlJob);



            if ($jobErr) {
                echo "cURL Error #:" . $err;
            } else {
                $jsonJobsObj = json_decode($jobResponse);

                $jobHeader = $jsonJobsObj->header;
                $jobDescription = $jsonJobsObj->description;

                $jobTitle =  $jobHeader[0]->value;
                $jobID = $jobHeader[1]->value;
                $jobLocation = $jobHeader[3]->value;
                $jobPostedDate = $jobHeader[6]->value;

                $jobOverview =  $jobDescription[0]->value;
                $jobResponsibilities =  $jobDescription[1]->value;
                $jobQualifications =  $jobDescription[2]->value;
            ?>

                <div class="row lg:grid grid-cols-12 mt-32 lg:mt-48">
                    <div class="col col-span-9">
                        <p class="font-bold mb-0 text-blue uppercase"><?= $jobLocation; ?></p>
                        <h2 class="mb-6 text-blue uppercase"><?= $jobTitle; ?></h2>
                        <p class="text-blue text-sm">Job ID: <?= $jobLocation; ?> | Posted: <?= $jobPostedDate; ?></p>
                    </div>
                    <div class="hidden col col-span-3 mt-6 lg:flex lg:mt-0 lg:flex-col gap-y-3 gap-x-6 lg:items-end justify-center">
                        <a class="my-6 lg:my-0 mr-6 btn orange-btn" href="<?= $portalUrl; ?>">Apply Now<img class="btn-icon" src="<?= get_template_directory_uri(); ?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden" src="<?= get_template_directory_uri(); ?>/img/arrow-blue-right.svg"></a>
                        <a class="btn white-btn" href="mailto:?subject=Vacancy GBRF - <?= $jobTitle; ?>&amp;body=Check out this job vacancy for <?= $jobTitle; ?> - <?= $portalUrl; ?>">Share by Email<img class="btn-icon" src="<?= get_template_directory_uri(); ?>/img/arrow-blue-right.svg"><img class="btn-icon-hover hidden" src="<?= get_template_directory_uri(); ?>/img/arrow-white-right.svg"></a>
                    </div>
                </div>
                <div class="col text-black mt-8 lg:mt-16">
                    <?php if (strlen($jobOverview) > 10) : ?>
                        <h3 class="font-bold">Overview</h3>
                        <p class="text-lg"><?= $jobOverview; ?></p>
                    <?php endif; ?>
                    <?php if (strlen($jobResponsibilities) > 10) : ?>
                        <h3 class="font-bold">Responsibilities</h3>
                        <p class="text-lg"><?= $jobResponsibilities; ?></p>
                    <?php endif; ?>
                    <?php if (strlen($jobQualifications) > 10) : ?>
                        <h3 class="font-bold">Qualifications</h3>
                        <p class="text-lg"><?= $jobQualifications; ?></p>
                    <?php endif; ?>
                </div>
                <div class="col flex items-end flex-col md:flex-row gap-x-6 md:items-center mt-6 md:mt-12 mb-32">
                    <a class="my-6 lg:my-0 mr-6 btn orange-btn" href="<?= $portalUrl; ?>">Apply Now<img class="btn-icon" src="<?= get_template_directory_uri(); ?>/img/arrow-white-right.svg"><img class="btn-icon-hover hidden" src="<?= get_template_directory_uri(); ?>/img/arrow-blue-right.svg"></a>
                    <a class="btn white-btn" href="mailto:?subject=Vacancy GBRF - <?= $jobTitle; ?>&amp;body=Check out this job vacancy for <?= $jobTitle; ?> - <?= $portalUrl; ?>">Share by Email<img class="btn-icon" src="<?= get_template_directory_uri(); ?>/img/arrow-blue-right.svg"><img class="btn-icon-hover hidden" src="<?= get_template_directory_uri(); ?>/img/arrow-white-right.svg"></a>
                </div>
        </div>
    <?php
            }

    ?>


    </div>
</div>
</div>

<script>
    var logo = document.querySelector('#logo-container img');
    var orangeLogo = logo.getAttribute('data-orange');
    var searchIcon = document.querySelector('#search-icon')
    var orangeSearchIcon = searchIcon.getAttribute('data-orange');
    document.querySelector('.desktop-header-container').classList.add('orange');
    document.querySelector('.desktop-header-container nav').style.background = "#fff";
    logo.src = orangeLogo;
    searchIcon.src = orangeSearchIcon;
</script>

<?php
include(locate_template('template-parts/footer.php'));
get_footer();
