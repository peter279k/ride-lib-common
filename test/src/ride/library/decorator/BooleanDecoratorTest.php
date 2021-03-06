<?php

namespace ride\library\decorator;

use PHPUnit\Framework\TestCase;

class BooleanDecoratorTest extends TestCase {

    /**
     * @dataProvider providerDecorate
     */
    public function testDecorate($expected, $value) {
        $decorator = new BooleanDecorator();

        $this->assertEquals($expected, $decorator->decorate($value));
    }

    public function providerDecorate() {
        return array(
            array('no', 0),
            array('no', ''),
            array('no', false),
            array('yes', "test"),
            array('yes', -500),
            array('yes', $this),
        );
    }

}
