<?php
function findFirstEmptyRow($values) {
	$rowCount = count($values);

	for ($i = 0; $i < $rowCount; $i++) {
		$row = $values[$i];
		$isEmptyRow = true;

		foreach ($row as $cell) {
			if (!empty($cell)) {
				$isEmptyRow = false;
				break;
			}
		}

		if ($isEmptyRow) {
			return $i + 1;
		}
	}
	return $rowCount + 1;
}