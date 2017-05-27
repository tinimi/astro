<?php

namespace tests;

use PHPUnit\Framework\TestCase;

final class AstroTest extends TestCase {
	protected $astro = null;
	public function setUp() {
		if (!$this->astro) {
			$this->astro = new \Astro();
		}
	}
	public function test_h2d() {
		$this->assertEquals(180, $this->astro->h2d("12:00:00"));

	}
}

