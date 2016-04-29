<?php

namespace TDD;

class TestSuite extends \PHPUnit_Framework_TestCase
{
    public function testPrimalFactors()
    {
        $this->assertEquals($this->findPrimalFactors(1), array());
        $this->assertEquals($this->findPrimalFactors(2), array(2));
        $this->assertEquals($this->findPrimalFactors(3), array(3));
        $this->assertEquals($this->findPrimalFactors(4), array(2, 2));
        $this->assertEquals($this->findPrimalFactors(5), array(5));
        $this->assertEquals($this->findPrimalFactors(6), array(2, 3));
        $this->assertEquals($this->findPrimalFactors(7), array(7));
        $this->assertEquals($this->findPrimalFactors(8), array(2, 2, 2));
        $this->assertEquals($this->findPrimalFactors(9), array(3, 3));
        $this->assertEquals(
            $this->findPrimalFactors(2 * 2 * 2 * 2 * 3 * 3 * 3 * 5 * 5 * 7 * 7 * 7),
            array(2, 2, 2, 2, 3, 3, 3, 5, 5, 7, 7, 7));
    }

    public function findPrimalFactors($n)
    {
        $result = array();
        for ($div = 2; $n > 1; $div++) {
            for (; $n % $div == 0; $n /= $div) {
                $result[] = $div;
            }
        }
        return $result;
    }
}
