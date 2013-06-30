<?php

namespace pallo\library\decorator;

use \PHPUnit_Framework_TestCase;

class StorageSizeDecoratorTest extends PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider providerDecorate
	 */
    public function testDecorate($expected, $value) {
        $decorator = new StorageSizeDecorator();

        $this->assertEquals($expected, $decorator->decorate($value));
    }

    public function providerDecorate() {
    	return array(
    		array("test", "test"),
    		array(-500, -500),
    		array("0 bytes", 0),
    		array("765 bytes", 765),
    		array("1 Kb", 1024),
    		array("5 Kb", 5000),
    		array("1 Mb", 1000000),
    	);
    }

}