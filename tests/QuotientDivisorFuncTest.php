<?php

use Mimic\Functional as F;

/**
 * Unit Test for quotientDivisor Mimic library function.
 *
 * @since 0.1.0
 */
class QuotientDivisorFuncTest extends PHPUnit_Framework_TestCase {
	public function dataProvider() {
		return array(
			array(null, -1, array(1, 2, 3, 4, 5)),
			array(null, -1, array(-1, -2, -3, -4, -5)),
			array(null, -1, array(-1, -2, -3, -4, -5, 0)),
			array(null, -1, array(1.5, 2.5, 3.5, 4.5, 5.5)),
			array(null, -1, array(-1.5, -2.5, -3.5, -4.5, -5.5)),
			array(null, -1, array(-1.5, -2.5, -3.5, -4.5, -5.5, 0.0)),
			array(null, 1,  array('', 'something5', 'else', 'what')),
			array(5, -1, array(1, 2, 3, 4, 5)),
			array(5, -1, array(-1, -2, -3, -4, -5)),
			array(5, -1, array(-1, -2, -3, -4, -5, 0)),
			array(5, -1, array(1.5, 2.5, 3.5, 4.5, 5.5)),
			array(5, -1, array(-1.5, -2.5, -3.5, -4.5, -5.5)),
			array(5, -1, array(-1.5, -2.5, -3.5, -4.5, -5.5, 0.0)),
			array(5, 1,  array('', 'something5', 'else', 'what')),
		);
	}

	/**
	 * @dataProvider dataProvider
	 */
	public function testResults($initial, $result, $collection) {
		if ($initial === null) {
			$this->assertEquals($result, F\quotientDivisor($collection));
		}
		else {
			$this->assertEquals($result, F\quotientDivisor($collection, $initial));
		}
	}
}
