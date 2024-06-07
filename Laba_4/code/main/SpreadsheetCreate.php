<?php
session_start();

include 'log.php';
include 'posFirstFreeCell.php';
require __DIR__.'/../../vendor/autoload.php';

use Google\Client as Google_Client;
use Google\Spreadsheet\ServiceRequestFactory;
use Google\Spreadsheet\DefaultServiceRequest;

function redirectToHome(): void {
	header('Location: index.php');
	exit();
}

try{
	$client = new Google_Client;
	$client->setApplicationName("LAB_4");
	$client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
	$client->addScope('https://www.googleapis.com/auth/spreadsheets');
	$client->setAuthConfig(__DIR__.'/credentials.json');
	$client->setAccessType("offline");
	$client->useApplicationDefaultCredentials();

	$service = new Google_Service_Sheets($client);
	$spreadsheetId = '1HnhePehd26rSoRnGOVVx0wFPcxQFDO55MSqkU4-4ONc';

	$response = $service->spreadsheets_values->get($spreadsheetId, 'Лист1!A1:D');
	$values = $response->getValues();

	$row = findFirstEmptyRow($values);

	$range = "Лист1!A$row:D$row";

	$values = [
		[$_POST["email"], $_POST["category"],$_POST["title"], $_POST["description"]]
	];

	try{
		$response = $service->spreadsheets_values->get($spreadsheetId, $range);
		$lastRowNumber = sizeof($response->getValues());

		$body = new Google_Service_Sheets_ValueRange(['values' => $values]);

		$options = ['valueInputOption' => 'RAW'];

		$response = $service->spreadsheets_values->update($spreadsheetId, $range, $body, $options);

	} catch (Exception $e) {
		logError($e->getMessage() . ' ' . $e->getLine() . ' ' . $e->getFile() . ' ' . $e->getCode);
	}
}catch(Exception $e){
	logError($e->getMessage() . ' ' . $e->getLine() . ' ' . $e->getFile() . ' ' . $e->getCode);
}
redirectToHome();