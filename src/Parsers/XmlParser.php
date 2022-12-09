<?php
namespace LB\Formatter\Parsers;

class XmlParser extends Parser {
	/**
	 * @var mixed
	 */
	private $xml;

	/**
	 * Ported from laravel-formatter
	 * https://github.com/LB/laravel-formatter
	 *
	 * @author  Daniel Berry <daniel@danielberry.me>
	 * @license MIT License (see LICENSE.readme included in the bundle)
	 */
	private function objectify($value) {
		$temp = is_string($value) ?
		simplexml_load_string($value, 'SimpleXMLElement', LIBXML_NOCDATA) :
		$value;

		$result = [];

		foreach ((array) $temp as $key => $value) {
			if ($key === "@attributes") {
				$result['_' . key($value)] = $value[key($value)];
			} else if (is_array($value) && count($value) < 1) {
				$result[$key] = '';
			} else {
				$result[$key] = (is_array($value) or is_object($value)) ? $this->objectify($value) : $value;
			}
		}

		return $result;
	}

	/**
	 * @param $data
	 */
	public function __construct($data) {
		$this->xml = $this->objectify($data);
	}

	public function toArray() {
		return (array) $this->xml;
	}
}
