#!/usr/bin/php
<?php

date_default_timezone_set("Europe/Kiev");

$sun_info = date_sun_info(time(), "46.96", "31.95");
asort($sun_info);
foreach ($sun_info as $key => $val) {
	echo "$key: " . date("H:i:s", $val) . "\n";
}

