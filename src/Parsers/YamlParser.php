<?php
namespace LB\Formatter\Parsers;

use InvalidArgumentException;
use Spyc;

class YamlParser extends Parser {

	/**
	 * @var mixed
	 */
	private $array;

	/**
	 * @param $data
	 */
	public function __construct($data) {
		if (is_string($data)) {
			$this->array = Spyc::YAMLLoadString($data);
		} else {
			throw new InvalidArgumentException(
				'YamlParser only accepts (string) [yaml] for $data.'
			);
		}
	}

	/**
	 * @return mixed
	 */
	public function toArray() {
		return $this->array;
	}

}
