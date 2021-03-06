<?php

namespace Mimic\Test;

use PHPUnit_Framework_TestCase;
use Mimic\Functional as F;

use ArrayIterator;

/**
 * Unit Test for sort Mimic library function.
 *
 * @since 0.1.0
 */
class SortFuncTest extends PHPUnit_Framework_TestCase {
	public function dataProvider() {
		return array(
			array(false, F\sortable(), array(4, 2, 1, 3), array(1, 2, 3, 4)),
			array(true, F\sortable(), array(4, 2, 1, 3), array(2 => 1, 1 => 2, 3 => 3, 0 => 4)),
			array(false, F\sortable(),
				array('2', '1', 'world', 'hello'),
				array('1', '2', 'hello', 'world')
			),
			array(true, F\sortable(),
				array('2', '1', 'world', 'hello'),
				array(1 => '1', 0 => '2', 3 => 'hello', 2 => 'world')
			),
			array(false, F\sortable(), new ArrayIterator(array(4, 2, 1, 3)), array(1, 2, 3, 4)),
			array(true, F\sortable(), new ArrayIterator(array(4, 2, 1, 3)), array(2 => 1, 1 => 2, 3 => 3, 0 => 4)),
			array(false, F\sortable(),
				new ArrayIterator(array('2', '1', 'world', 'hello')),
				array('1', '2', 'hello', 'world')
			),
			array(true, F\sortable(),
				new ArrayIterator(array('2', '1', 'world', 'hello')),
				array(1 => '1', 0 => '2', 3 => 'hello', 2 => 'world')
			),
		);
	}

	/**
	 * @dataProvider dataProvider
	 * @covers ::Mimic\Functional\sort
	 */
	public function testResults($preserveKeys, $callback, $collection, $expected) {
		$this->assertEquals($expected, F\sort($collection, $callback, $preserveKeys));
	}
}
