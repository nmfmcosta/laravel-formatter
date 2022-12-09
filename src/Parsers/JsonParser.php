<?php
namespace LB\Formatter\Parsers;

class JsonParser extends Parser {

	/**
	 * @var mixed
	 */
	private $json;

	/**
	 * @param $data
	 */
	public function __construct($data) {
		$this->json = json_decode(trim($data), true);
	}

	/**
	 * @return mixed
	 */
	public function toArray() {
		return $this->json;
	}

}
