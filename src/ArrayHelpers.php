<?php
namespace LB\Formatter;

use Illuminate\Support\Arr;

class ArrayHelpers {
	/**
	 * @param $array
	 */
	public static function isAssociative($array) {
		return array_keys($array) !== range(0, count($array) - 1);
	}

	/**
	 * @param array $data
	 */
	public static function dotKeys(array $data) {
		return array_keys(Arr::dot($data));
	}

	/**
	 * @param array $data
	 */
	public static function dot(array $data) {
		return Arr::dot($data);
	}

	/**
	 * @param $data
	 * @param $key
	 * @param $value
	 */
	public static function set(array &$data, $key, $value) {
		Arr::set($data, $key, $value);
	}

}
