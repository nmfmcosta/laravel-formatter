<?php
namespace LB\Formatter\Test\Parsers;

use LB\Formatter\Parsers\Parser;
use LB\Formatter\Parsers\XmlParser;
use LB\Formatter\Test\TestCase;

class XmlParserTest extends TestCase {

	public function testXmlParserIsInstanceOfParserInterface() {
		$parser = new XmlParser('');
		$this->assertTrue($parser instanceof Parser);
	}

	public function testtoArrayReturnsArrayRepresenationOfXmlObject() {
		$expected = ['foo' => 'bar'];
		$parser   = new XmlParser('<xml><foo>bar</foo></xml>');
		$this->assertEquals($expected, $parser->toArray());
	}

	public function testtoJsonReturnsJsonRepresentationOfXmlObject() {
		$expected = '{"foo":"bar"}';
		$parser   = new XmlParser('<xml><foo>bar</foo></xml>');
		$this->assertEquals($expected, $parser->toJson());
	}
}
