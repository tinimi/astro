<?php

namespace tests;
use PHPUnit\Framework\TestCase;
use tests\lib\CsvFileIterator;

final class AstroTest extends TestCase {
	protected $astro = null;

	public function setUp() {
		if (!$this->astro) {
			$this->astro = new \Astro();
		}
	}

	/**
	 * @dataProvider data_h2d
	 */
	public function test_h2d($input, $expected) {
		$this->assertEquals($expected, $this->astro->h2d($input), '', 0.0000001);
	}

	public function data_h2d() {
		return new CsvFileIterator(dirname(__FILE__) . '/data/h2d.csv');
	}

	/**
	 * @dataProvider data_d2h
	 */
	public function test_h2d2($input, $expected) {
		$this->assertEquals($expected, $this->astro->h2d($input), '', 0.0000001);
	}

	/**
	 * @dataProvider data_d2h
	 */
	public function test_d2h($expected, $input) {
		$this->assertEquals($expected, $this->astro->d2h($input));
	}

	public function data_d2h() {
		return new CsvFileIterator(dirname(__FILE__) . '/data/d2h.csv');
	}

	/**
	 * @dataProvider data_d2h
	 */
	public function test_h2d_d2h_100($input, $expected) {
		$in = $input;
		for ($x = 0; $x < 100; $x++) {
			$in = $this->astro->d2h($this->astro->h2d($input));
		}
		$this->assertEquals($input, $in);
		$this->assertEquals($expected, $this->astro->h2d($in), '', 0.0000001);
	}

}

