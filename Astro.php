<?php

class Astro {
	/**
	 * Convert hours to degrees, : separated
	 * Formats:
	 * hh:mm:ss, hh:mm:ss.sss
	 * mm:ss, mm:ss.sss
	 * ss, ss.sss
	 *
	 * @param string $time time to convert
	 * @param string $delemiter delemiter used, : by default
	 *
	 * @return float angle in degrees
	 */
	function h2d($time, $delimiter = ':') {
		$arr = explode($delimiter, $time);
		$arr = array_reverse($arr);

		$negative = trim($time)[0] == '-' ? true : false;

		$s = abs($arr[0]);
		$m = isset($arr[1]) ? abs($arr[1]) : 0;
		$h = isset($arr[2]) ? abs($arr[2]) : 0;

		if ($negative) {
			$h = -abs($h);
			$m = -abs($m);
			$s = -abs($s);
		}

		$t = $h + $m/60 + $s/3600;

		return $t*15;
	}

	/**
	 * Converts degrees to hours.
	 * Values >360 converted as >24h
	 * precission - number of digits after dot in seconds
	 *
	 * @param float $deg Degrees to convert
	 * @param int $precesion Number of decimal points for seconds
	 *
	 * @return string time in hh:mm:ss.ss format
	 */
	function d2h($deg, $precision = 2) {
		$h = floor($deg / 15);
		$deg = $deg - $h * 15;

		$m = floor(($deg / 15) * 60);
		$deg = $deg - $m * 15 / 60;

		$s = ($deg / 15) * 3600;

		$s = number_format($s, $precision, '.', '');

		$m = str_pad($m, 2, '0', STR_PAD_LEFT);
		$s = '' . $s;
		if (strpos($s, '.') === 1) {
			$s = '0' . $s;
		}

		if (strpos($s, '.') === false) {
			$s = str_pad($s, 2, '0', STR_PAD_LEFT);
		}
		
		return "$h:$m:$s";

	}

}
