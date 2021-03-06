<?php

namespace Mimic\Test;

use PHPUnit_Framework_TestCase;
use Mimic\Functional as F;

/**
 * Unit Test for collectionNumberOperation Mimic library function.
 *
 * @since 0.1.0
 *
 * @todo Need to use QuickTest library.
 */
class CollectionNumberOperationFuncTest extends PHPUnit_Framework_TestCase {
	public function dataProvider() {
		return array(
			array(1, 0, 1, true),
			array(1.25, 0, 1.25, true),
			array('1', 0, '1', true),
			array('1.25', 0, '1.25', true),
			array('something', 1, 1, false),
		);
	}

	/**
	 * @dataProvider dataProvider
	 * @covers ::Mimic\Functional\collectionNumberOperation
	 */
	public function testCallbackIsCalledAndPassesResult($element, $current, $expected, $willBeCalled) {
		$called = false;
		$callback = function($element) use (&$called) {
			$called = true;
			return $element;
		};
		$operation = F\collectionNumberOperation($callback);
		$actual = $operation($element, $current);
		$this->assertEquals($willBeCalled, $called);
		$this->assertEquals($expected, $actual);
	}
}
