<?php
namespace LB\Formatter\Test\Parsers;

use LB\Formatter\Parsers\Parser;
use LB\Formatter\Parsers\XmlParser;
use LB\Formatter\Parsers\YamlParser;
use LB\Formatter\Test\TestCase;

class YamlParserTest extends TestCase {

	public function testYamlParserIsInstanceOfParserInterface() {
		$parser = new YamlParser('');
		$this->assertTrue($parser instanceof Parser);
	}

	public function testtoArrayReturnsArrayRepresenationOfYamlObject() {
		$expected = ['foo' => 'bar'];
		$parser   = new XmlParser('<xml><foo>bar</foo></xml>');
		$x        = new YamlParser($parser->toYaml());
		$this->assertEquals($expected, $x->toArray());
	}

}
