<?php
/**
 * Created by PhpStorm.
 * User: shijosap
 * Date: 18-02-2017
 * Time: 06:52
 */
require_once 'vendor/autoload.php';
$secret_file = "MotherT-e9423b34632e.json";
$calendar_id = "alanee.com_a6po4i297u0h97t5ci4ukv5eh4@group.calendar.google.com";
$client = new Google_Client();


$client->setAuthConfig($secret_file);
$client->addScope(Google_Service_Calendar::CALENDAR);
//$client->setAuthConfig('/path/to/client_credentials.json');

$service = new Google_Service_Calendar($client);
 $events = $service->events->listEvents($calendar_id);
//$events = $service->events->get($calendar_id,'qsgg96g5e0j4idtb7dhl7ncijk');
echo '<pre>';
foreach ($events->getItems() as $event) {
  //  print_r($event);
    echo $event->getSummary();
}

?>