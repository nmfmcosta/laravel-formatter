<?php
namespace LB\Formatter\Parsers;

use InvalidArgumentException;

class ArrayParser extends Parser {

	/**
	 * @var mixed
	 */
	private $array;

	/**
	 * @param $data
	 */
	public function __construct($data) {
		if (is_string($data)) {
			$data = unserialize($data);
		}

		if (is_array($data) || is_object($data)) {
			$this->array = (array) $data;
		} else {
			throw new InvalidArgumentException(
				'ArrayParser only accepts (optionally serialized) [object, array] for $data.'
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
