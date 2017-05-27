#!/usr/bin/php
<?php

define("LAT", "46.96");
define("LON", "31.95");
define("TZ", "Europe/Kiev");

date_default_timezone_set(TZ);

$date = time();

$sun_info = date_sun_info($date, LAT, LON);
asort($sun_info);
foreach ($sun_info as $key => $val) {
	echo "$key: " . date("H:i:s", $val) . "\n";
}

