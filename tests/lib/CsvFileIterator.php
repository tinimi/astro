<?php
namespace tests\lib;
use Iterator;

class CsvFileIterator implements Iterator {
	protected $file;
	protected $key = 0;
	protected $current;

	public function __construct($file) {
		$this->file = fopen($file, 'r');
	}

	public function __destruct() {
		fclose($this->file);
	}

	public function rewind() {
		rewind($this->file);
		// Skip empty lines and comments (lines started with "#")
		do {
			$this->current = fgetcsv($this->file);
		} while (is_array($this->current) and (NULL == $this->current[0] || '#' == $this->current[0][0]));

		$this->key = 0;
	}

	public function valid() {
		return !feof($this->file);
	}

	public function key() {
		return $this->key;
	}

	public function current() {
		return $this->current;
	}

	public function next() {
		// Skip empty lines and comments (lines started with "#");
		do {
			$this->current = fgetcsv($this->file);
			$this->key++;
		} while(is_array($this->current) and (NULL == $this->current[0] || '#' == $this->current[0][0]));
	}
}
