<?php
namespace LB\Formatter;

use InvalidArgumentException;
use LB\Formatter\Formatter as Formatter;
use LB\Formatter\Parsers\ArrayParser;
use LB\Formatter\Parsers\CsvParser;
use LB\Formatter\Parsers\JsonParser;
use LB\Formatter\Parsers\XmlParser;
use LB\Formatter\Parsers\YamlParser;

class Formatter {
	/**
	 * Add class constants that help define input format
	 */
	const CSV  = 'csv';
	const JSON = 'json';
	const XML  = 'xml';
	const ARR  = 'array';
	const YAML = 'yaml';

	private static $supportedTypes = [self::CSV, self::JSON, self::XML, self::ARR, self::YAML];

	/**
	 * @var Parser
	 */
	private $parser;

	/**
	 * Make: Returns an instance of formatter initialized with data and type
	 *
	 * @param  mixed       $data      The data that formatter should parse
	 * @param  string      $type      The type of data formatter is expected to parse
	 * @param  string      $delimiter The delimitation of data formatter to csv
	 * @return Formatter
	 */
	public static function make($data, $type, $delimiter = null) {
		if (in_array($type, self::$supportedTypes)) {
			$parser = null;
			switch ($type) {
				case self::CSV:
					$parser = new CsvParser($data, $delimiter);
					break;
				case self::JSON:
					$parser = new JsonParser($data);
					break;
				case self::XML:
					$parser = new XmlParser($data);
					break;
				case self::ARR:
					$parser = new ArrayParser($data);
					break;
				case self::YAML:
					$parser = new YamlParser($data);
					break;
			}
			return new Formatter($parser, $type);
		}
		throw new InvalidArgumentException(
			'make function only accepts [csv, json, xml, array] for $type but ' . $type . ' was provided.'
		);
	}

	/**
	 * @param $parser
	 */
	private function __construct($parser) {
		$this->parser = $parser;
	}

	/**
	 * @return mixed
	 */
	public function toJson() {
		return $this->parser->toJson();
	}

	/**
	 * @return mixed
	 */
	public function toArray() {
		return $this->parser->toArray();
	}

	/**
	 * @return mixed
	 */
	public function toYaml() {
		return $this->parser->toYaml();
	}

	/**
	 * @param $baseNode
	 * @param $encoding
	 * @param $formated
	 * @return mixed
	 */
	public function toXml($baseNode = 'xml', $encoding = 'utf-8', $formated = false) {
		return $this->parser->toXml($baseNode, $encoding, $formated);
	}

	/**
	 * @param $newline
	 * @param $delimiter
	 * @param $enclosure
	 * @param $escape
	 * @return mixed
	 */
	public function toCsv($newline = "\n", $delimiter = ",", $enclosure = '"', $escape = "\\") {
		return $this->parser->toCsv($newline, $delimiter, $enclosure, $escape);
	}
}
