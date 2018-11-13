<?php
function getService()
{
  // Creates and returns the Analytics service object.
  // Load the Google API PHP Client Library.
  require_once 'google-api-php-client/src/Google/autoload.php';
  
  // Create and configure a new client object.
/*  $client = new \Google_Client();
  putenv('GOOGLE_APPLICATION_CREDENTIALS=My-Project-03545e378318.json');
  $client->useApplicationDefaultCredentials();
  $client->addScope('https://www.googleapis.com/auth/analytics.readonly');
  return new \Google_Service_Analytics($client);*/
  
  $client_email = '228198928735-compute@developer.gserviceaccount.com';
$private_key = file_get_contents('aspenservice-fe937f190a9e.p12');
$scopes = array('https://www.googleapis.com/auth/analytics.readonly');
$credentials = new Google_Auth_AssertionCredentials(
    $client_email,
    $scopes,
    $private_key
);
}
function getFirstprofileId(&$analytics) {
  // Get the user's first view (profile) ID.
  // Get the list of accounts for the authorized user.
  $accounts = $analytics->management_accounts->listManagementAccounts();
  if (count($accounts->getItems()) > 0) {
    $items = $accounts->getItems();
    $firstAccountId = $items[0]->getId();
    // Get the list of properties for the authorized user.
    $properties = $analytics->management_webproperties
        ->listManagementWebproperties($firstAccountId);
    if (count($properties->getItems()) > 0) {
      $items = $properties->getItems();
      $firstPropertyId = $items[0]->getId();
      // Get the list of views (profiles) for the authorized user.
      $profiles = $analytics->management_profiles
          ->listManagementProfiles($firstAccountId, $firstPropertyId);
      if (count($profiles->getItems()) > 0) {
        $items = $profiles->getItems();
        // Return the first view (profile) ID.
        return $items[0]->getId();
      } else {
        throw new Exception('No views (profiles) found for this user.');
      }
    } else {
      throw new Exception('No properties found for this user.');
    }
  } else {
    throw new Exception('No accounts found for this user.');
  }
}
function getResults(&$analytics, $profileId) {
  // Calls the Core Reporting API and queries for the number of sessions
  // for the last seven days.
   return $analytics->data_ga->get(
       'ga:' . $profileId,
       '7daysAgo',
       'today',
       'ga:sessions');
}
function printResults(&$results) {
  // Parses the response from the Core Reporting API and prints
  // the profile name and total sessions.
  if (count($results->getRows()) > 0) {
    // Get the profile name.
    $profileName = $results->getProfileInfo()->getProfileName();
    // Get the entry for the first entry in the first row.
    $rows = $results->getRows();
    $sessions = $rows[0][0];
    // Print the results.
    print "First view (profile) found: $profileName\n";
    print "Total sessions: $sessions\n";
  } else {
    print "No results found.\n";
  }
}
$analytics = getService();
print_r($analytics);die;
$profile = getFirstProfileId($analytics);
//print_r($profile);die;
$results = getResults($analytics, $profile);
printResults($results);