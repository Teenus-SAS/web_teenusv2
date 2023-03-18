<?php
//define('SDK_DIR', __DIR__ . '/..'); // Path to the SDK directory
//$loader = include SDK_DIR . '/vendor/autoload.php';

//require __DIR__ . '/vendor/autoload.php';

use FacebookAds\Api;
use FacebookAds\Logger\CurlLogger;
use FacebookAds\Object\ServerSide\Content;
use FacebookAds\Object\ServerSide\CustomData;
use FacebookAds\Object\ServerSide\Event;
use FacebookAds\Object\ServerSide\EventRequest;
use FacebookAds\Object\ServerSide\Gender;
use FacebookAds\Object\ServerSide\UserData;

// Configuration.
// Should fill in value before running this script
$access_token = "EAAykIvc91doBAIcvJOZBWhHZBE2DZBoe0AseoKNvbdSs9No2w1ald70W9LmLCHGxXeOZBk5XMhvHmlBqol7hNzJ2ypvN2hX6osVQr6NOkq3UZB9hNdhIu5ZBAXEy1dKEXEAGfq3WIRPcAAz6ZBvKnsmajhoOU3IA4mlCglAuvs2zM2tuPa6ym6HrjBbRQeaj7wZD";
$pixel_id = "488699820106746";

if (is_null($access_token) || is_null($pixel_id)) {
  throw new Exception(
    'You must set your access token and pixel id before executing'
  );
}

// Initialize
Api::init(null, null, $access_token);
$api = Api::instance();
$api->setLogger(new CurlLogger());

$events = array();

$user_data_0 = (new UserData())
  ->setEmails(array("7b17fb0bd173f625b58636fb796407c22b3d16fc78302d79f0fd30c2fc2fc068"))
  ->setPhones(array());

$custom_data_0 = (new CustomData())
  ->setValue(142.52)
  ->setCurrency("USD");

$event_0 = (new Event())
  ->setEventName("Purchase")
  ->setEventTime(1678754699)
  ->setUserData($user_data_0)
  ->setCustomData($custom_data_0)
  ->setActionSource("website");
array_push($events, $event_0);

$request = (new EventRequest($pixel_id))
  ->setEvents($events);

$request->execute();
