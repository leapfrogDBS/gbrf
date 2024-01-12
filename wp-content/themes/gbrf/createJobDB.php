<?php
$portals = ["17", "18", "184", "2874"];
// 
function initiate_curl($url)
{
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
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
	$response = curl_exec($curl);
	if ($response === false) {
		$error = curl_error($curl);
		$error_code = curl_errno($curl);
		$responseArray = array(
			"errors" => array(
				array(
					"errorMessage" => $error,
					"errorCode" => $error_code
				)
			)
		);
	} else {
		$responseArray = json_decode($response, true);
	}
	curl_close($curl);
	return $responseArray;
}


function is_valid_json($string)
{
	json_decode($string);
	return json_last_error() === JSON_ERROR_NONE;
}




function saveJson($data, $field)
{
	if ($field == 'error_log') {
		delete_option('error_log');
	}

	global $wpdb;
	$table_name = $wpdb->prefix . $field;
	$charset_collate = $wpdb->get_charset_collate();

	// Create table if not exists
	$sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        json_data longtext NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);

	// Encode the data to JSON and remove any '//', '///'
	$json_data = json_encode($data);
	$json_data = str_replace(['//', '///', '////'], '', $json_data); // Remove // and ///

	// Replace the row with ID = 1
	$wpdb->replace(
		$table_name,
		array(
			'id' => 1, // Always use the ID = 1
			'json_data' => $json_data,
		),
		array(
			'%d', // data type of 'id'
			'%s', // data type of 'json_data'
		)
	);
}



function createJobDB()
{
	if (fetchLocationAndCats()) {
		fetchAllJobData();
	} else {
		echo 'Error occurred in fetchLocationAndCats. Unable to proceed with other functions.';
	}
}


function crossReferencCategory()
{
	updateLocationsCategories('job.positioncategory', 'category');
}

function crossReferenceLocation()
{
	updateLocationsCategories('job.joblocation.companyid', 'location');
}



function get_job_fields($field)
{
	global $wpdb;
	$table_name = $wpdb->prefix . $field;
	// Fetch the data from the database
	$read_data = $wpdb->get_row("SELECT json_data FROM $table_name WHERE id = 1", ARRAY_A);

	if (!empty($read_data)) {
		return json_decode($read_data['json_data']);
	} else {
		//return new WP_REST_Response(json_encode(['message' => 'Data not found']), 404); // Return JSON-encoded error message
	}
}



function updateLocationsCategories($filterNameParam, $updateField)
{

	
	global $portals;
	$allJobs = get_job_fields('portal_data');
	$filterArray = get_job_fields('filters');

	$index = $filterNameParam == 'job.joblocation.companyid' ? 1 : 0;


	if (!$filterArray) {
	
		return;
	}

	foreach ($portals as $portalId) {
		foreach ($filterArray as $filterItem) {
			$filterName = $filterItem[$index]->name;

			if ($filterName === $filterNameParam) {

				$filterOptions = $filterItem[$index]->options;
				foreach ($filterOptions as $option) {
					$searchString = '{"filters":[';
					$searchString .= '{"name":"' . $filterName . '","value":["' . $option->id . '"],"operator":"="}, ';
					$searchString .= ']}';
					$afterEncode = rawurlencode($searchString);
					echo $afterEncode . '</br>';

					$baseUrl = "https://api.icims.com/customers/9027/search/portals/" . $portalId . "?searchJson=";
					// works till here

					echo $baseUrl . '</br>';

					$data = initiate_curl($baseUrl . $afterEncode);

					if ($data && isset($data['searchResults'])) {
						foreach ($data['searchResults'] as $result) {
							$jobId = $result['id'];

							foreach ($allJobs as $index => $job) {
								if ($job->portalData->id === $jobId) {
									if (!isset($allJobs[$index]->portalData->$updateField)) {
										$allJobs[$index]->portalData->$updateField = [];
									}
									if (!in_array($option->id, $allJobs[$index]->portalData->$updateField)) {

										$allJobs[$index]->portalData->checked = true;
										$allJobs[$index]->portalData->$updateField[] = $option->id;
									}
								}
							}
						}
					}
				}
			}
		}
	}

	saveJson($allJobs, 'portal_data');
}


function fetchAllJobData()
{
	$portalData = array();
	$index = 0;
	global $portals;
	foreach ($portals as $portalId) {
		$apiUrl = 'https://api.icims.com/customers/9027/search/portals/' . $portalId;
		$data = initiate_curl($apiUrl);
		if ($data && isset($data['searchResults'])) {


			foreach ($data['searchResults'] as $result) {

				// if ($result['id'] == 2393) {
				// 	break;
				// }

				$portalUrl = $result['self'];
				$portalResponse = initiate_curl($portalUrl);
				$exists = false;
				foreach ($portalData as $existingData) {

					if (isset($existingData['portalData']['id']) && $existingData['portalData']['id'] == $result['id']) {
						$exists = true;
						break;
					}
				}
				if (!$exists) {

					// // Validate Description
					// if (!isset($portalResponse['description']) || !is_array($portalResponse['description'])) {
					// 	echo "Invalid description format";
					// 	break;
					// }
					// foreach ($portalResponse['description'] as $descriptionItem) {
					// 	if (!isset($descriptionItem['label'], $descriptionItem['value'])) {
					// 		echo "Description item missing label or value";
					// 		break;
					// 	}
					// }

					array_push($portalData, $portalResponse);
					$portalData[$index]['portalData'] = $result;
					$index++;
				}
			}
		}
	}
	saveJson($portalData, 'portal_data');
	//delete_option('portal_data');
	return true;
}

function fetchLocationAndCats()
{
	$filterData = initiate_curl('https://api.icims.com/customers/9027/search/portals/17/filters');

	// Check if the API call was successful and contains the "filters" key
	if ($filterData && is_array($filterData) && array_key_exists("filters", $filterData)) {
		saveJson($filterData, 'filters');
		return true;
	} else {
		// Save the error data for debugging
		saveJson($filterData, 'error_log');

		// Prepare the email details
		$to = 'hello@simonproudfoot.com';
		$subject = 'API Data Error';

		// Add a timestamp to the email message
		$currentDateTime = date("Y-m-d H:i:s");
		$message = "Error: Failed to fetch data or received unexpected response.\nTimestamp: $currentDateTime";

		// Mail header
		$headers = array('Content-Type: text/html; charset=UTF-8');

		// Send the email
		wp_mail($to, $subject, $message, $headers);

		return false;
	}
}





// SPLIT THESE TO PREVENT SERVER TIMEOUT 

// Schedule the cron job to run once per day at a specific time (e.g., 1:00 AM)
add_action('init', 'schedule_daily_cron_job');
function schedule_daily_cron_job()
{
	if (!wp_next_scheduled('run_careers_page_download')) {
		$timestamp = strtotime('today 00:00:00');
		wp_schedule_event($timestamp, 'daily', 'run_careers_page_download');
	}
}
// Hook the callback function to the cron job event
add_action('run_careers_page_download', 'createJobDB');


// Schedule the cron job to run once per day at a specific time (e.g., 1:00 AM)
add_action('init', 'schedule_daily_cron_crossRefCategory');
function schedule_daily_cron_crossRefCategory()
{
	if (!wp_next_scheduled('run_careers_page_crossRefCategory')) {
		$timestamp = strtotime('today 00:15:00');
		wp_schedule_event($timestamp, 'daily', 'run_careers_page_crossRefCategory');
	}
}
// Hook the callback function to the cron job event
add_action('run_careers_page_crossRefCategory', 'crossReferencCategory');


// Schedule the cron job to run once per day at a specific time (e.g., 1:00 AM)
add_action('init', 'schedule_daily_cron_crossRefLocation');
function schedule_daily_cron_crossRefLocation()
{
	if (!wp_next_scheduled('run_careers_page_crossRefLocation')) {
		$timestamp = strtotime('today 00:30:00');
		wp_schedule_event($timestamp, 'daily', 'run_careers_page_crossRefLocation');
	}
}
// Hook the callback function to the cron job event
add_action('run_careers_page_crossRefLocation', 'crossReferenceLocation');
