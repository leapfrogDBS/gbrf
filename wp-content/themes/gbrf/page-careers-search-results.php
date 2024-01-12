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
            <div class="row mt-48 mb-8">
                <div class="col text-blue uppercase mb-8">
                    <p class="font-bold mb-0">Career Opportunities</p>
                    <h2 class="md:text-6xl lg:text-8xl">Job Listing</h2>
                </div>
                <div class="col lg:max-w-[60%] text-black">
                    <p class="font-bold">Here are our current job openings. Please click on the job title for more information, and apply if you are interested.</p>

                </div>
            </div>

            <div class="row mt-12 mb-12 lg:mb-24">
                <div class="col">
                    <?php


                    $curlCategory = initiate_curl_b("https://api.icims.com/customers/9027/search/portals/17/filters");
                    $response = curl_exec($curlCategory);
                    $err = curl_error($curlCategory);
                    curl_close($curlCategory);
                    if ($err) {
                        echo "cURL Error #:" . $err;
                    } else {
                        //Create an array of objects from the JSON returned by the API
                        $jsonObj = json_decode($response);

                        $categories = $jsonObj->filters[0]->options;
                        $locations = $jsonObj->filters[1]->options;


                        $pageHTML .= "<form action='" . home_url() . "/careers-search-results' method='post'>";




                        $pageHTML .= "<div class='lg:grid lg:grid-cols-8 gap-x-6 mt-6 xxl:grid-cols-7'>";
                        $pageHTML .= "<div class='flex flex-col col-span-2 mb-6 lg:mb-0'>";
                        $pageHTML .= "<label class='block text-lg text-blue font-bold' for='search'>Search</label>";
                        $pageHTML .= "<input class='h-11 block w-full border-blue border-2 bg-white px-4 py-1' type='text' id='search' name='search' placeholder='Start your job search here'>";
                        $pageHTML .= "</div>";

                        $pageHTML .= "<div class='flex flex-col col-span-2 justify-center mb-6 lg:mb-0'>";
                        $pageHTML .= "<label class='block text-lg text-blue font-bold' for='job-categories'>Category</label>";
                        $pageHTML .= "<select class='px-4 h-11 block bg-white border-blue border-2 w-full py-1' name='job-categories' id='job-categories'>";

                        $pageHTML .= "<option value='all'>All</option>";
                        foreach ($categories as $category) {
                            $pageHTML .= "<option value='" . $category->id . "'>" . $category->value . "</option>";
                        }
                        $pageHTML .= "</select>";
                        $pageHTML .= "</div>";

                        $pageHTML .= "<div class='flex flex-col col-span-2 justify-center'>";
                        $pageHTML .= "<label class='block text-lg text-blue font-bold' for='job-locations'>Location</label>";
                        $pageHTML .= "<select class='px-4 h-11 block bg-white border-blue border-2 w-full py-1' name='job-locations' id='job-locations'>";
                        $pageHTML .= "<option value='all'>All</option>";
                        foreach ($locations as $location) {
                            $pageHTML .= "<option value='" . $location->id . "'>" . $location->value . "</option>";
                        }
                        $pageHTML .= "</select>";
                        $pageHTML .= "</div>";

                        $pageHTML .= "<div class='flex flex-col col-span-2 xxl:col-span-1 lg:items-center lg:justify-end'>";
                        $pageHTML .= "<input class='submit-button invisible' type='submit' value='Search'>";
                        $pageHTML .= "<div class='flex'><div onclick='submitForm()' class='btn orange-btn orange-btn-2 flex justify-center hover:bg-blue hover:text-white relative z-10'>Search<img class='btn-icon' src='" . get_template_directory_uri() . "/img/arrow-white-right.svg'><img class='btn-icon-hover hidden' src='" . get_template_directory_uri() . "/img/arrow-white-right.svg'></div></div>";
                        $pageHTML .= "</div>";
                        $pageHTML .= "</div>";





                        $pageHTML .= "</form>";

                        echo $pageHTML;
                    }
                    ?>
                </div>
            </div>



            <div class="row mb-12">
                <div class="col">
                    <h2 class="text-blue uppercase font-extrabold text-3xl lg:text-6xl">Results</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <?php

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

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // collect values of input field
                        $searchTerm = $_POST['search'];
                        $jobCategory = $_POST['job-categories'];
                        $jobLocation = $_POST['job-locations'];

                        $searchString = '{"filters":[';

                        if ($searchTerm != "") {
                            $searchString .= '{"name":"job.portalkeywordsearch","value":["' . $searchTerm . '"],"operator":"="}, ';
                        }

                        if ($jobCategory != "all") {
                            $searchString .= '{"name":"job.positioncategory","value":["' . $jobCategory . '"],"operator":"="}, ';
                        }
                        if ($jobLocation != "all") {
                            $searchString .= ' {"name":"job.joblocation.companyid","value":["' . $jobLocation . '"],"operator":"="}';
                        }

                        $searchString .= ']}';

                        if ($jobLocation == "all" && $jobCategory == "all" && $searchTerm == "") {
                            $searchString = '';
                        }

                        $afterEncode =  rawurlencode($searchString);

                        $resultsEndpoints = array();

                        $portals = array("17", "18", "184", "2874");

                        foreach ($portals as $portal) {

                            $baseUrl = "https://api.icims.com/customers/9027/search/portals/" . $portal . "?searchJson=";
                            $curlCategory = initiate_curl_b($baseUrl . $afterEncode);
                            console_log($baseUrl . $afterEncode);
                            $response = curl_exec($curlCategory);
                            $err = curl_error($curlCategory);
                            curl_close($curlCategory);
                            if ($err) {
                                echo "cURL Error #:" . $err;
                            } else {
                                $jsonObj = json_decode($response);

                                $results = $jsonObj->searchResults;

                                foreach ($results as $result) {
                                    array_push($resultsEndpoints, ['endpoint' => $result->self, 'portalUrl' => $result->portalUrl]);
                                }
                            }
                        }
                        if (!$resultsEndpoints) { ?>
                            <h3 class="text-orange text-bold">Sorry, there are no job listings matching your search.</h3>
                            <?php
                        } else {

                            foreach ($resultsEndpoints as $endpoint) {
                                $curlJob = initiate_curl_b($endpoint['endpoint']);
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
                            ?>
                                    <div class="job-container border-b-2 border-grey-500 pb-12 mb-12">
                                        <p class="text-lilac uppercase font-extrabold mb-0"><?php echo $jobLocation; ?></p>
                                        <h3 class="font-bold text-blue mb-0"><?php echo $jobTitle; ?></h3>
                                        <div class="row lg:grid lg:grid-cols-12">
                                            <div class="col col-span-9">
                                                <p class="text-black text-lg body-text  "><?php echo $jobOverview; ?></p>
                                                <p class="text-sm text-lilac">Job ID: <?php echo $jobID; ?> | Posted: <?php echo $jobPostedDate; ?></p>
                                            </div>
                                            <div class="col col-span-3 lg:flex flex-col gap-y-3 lg:items-end">
                                                <a class=" my-6 lg:my-0 mr-6 btn orange-btn-outline" href="<?php echo $endpoint['portalUrl']; ?>">Apply Now<img class="btn-icon" src="<?php echo get_template_directory_uri(); ?>/img/arrow-orange-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri(); ?>/img/arrow-white-right.svg"></a>
                                                <a class="btn white-btn" href="<?php echo home_url(); ?>/careers-job-details?endpoint=<?php echo $endpoint['endpoint'] ?>&portalUrl=<?php echo $endpoint['portalUrl']; ?>">Find Out More<img class="btn-icon" src="<?php echo get_template_directory_uri(); ?>/img/arrow-blue-right.svg"><img class="btn-icon-hover hidden" src="<?php echo get_template_directory_uri(); ?>/img/arrow-white-right.svg"></a>

                                            </div>
                                        </div>
                                    </div>

                    <?php
                                }
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
?>

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

<script>
    function submitForm() {
        document.querySelector(".submit-button").click();
    }
</script>

<?php
include(locate_template('template-parts/footer.php'));
get_footer();
