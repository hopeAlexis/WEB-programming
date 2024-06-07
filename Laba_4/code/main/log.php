<?php
function logError($errorMessage) {
	$logFile = fopen('Log/error.log', 'a');

	fwrite($logFile, date('Y-m-d H:i:s') . ' ' . $errorMessage . PHP_EOL);
	fclose($logFile);
}