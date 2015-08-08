<?php
/**
 * Interview task for Afilias
 * User: xingda Wang
 * Date: 8/7/15
 * Time: 8:40 PM
 */

namespace Kata\Test;

use Kata\StringCalculator;

class StringCalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test for the 2 number
     */
    public function testAddTwo(){

        // Arrange
        $simpleTest = new StringCalculator();

        // Test cases
        $expected = "8";
        $result = $simpleTest->Add("3,5");

        // Assert
        $this->assertEquals($expected, $result);
    }

    /**
     * Test for the 3 number
     */
    public function testAddThree(){

        // Arrange
        $simpleTest = new StringCalculator();

        // Test cases
        $expected = "6";
        $result = $simpleTest->Add("1,2,3");

        // Assert
        $this->assertEquals($expected, $result);
    }

    /**
     * Test for the n (e.g.5) number
     */
    public function testAddN(){

        // Arrange
        $simpleTest = new StringCalculator();

        // Test cases
        $expected = "15";
        $result = $simpleTest->Add("1,2,3,4,5");

        // Assert
        $this->assertEquals($expected, $result);
    }

    /**
     * Test for the /n scenario
     */
    public function testAddSlashN(){

        // Arrange
        $simpleTest = new StringCalculator();

        // Test cases
        $expected = "6";
        $result = $simpleTest->Add("1\n2,3");

        // Assert
        $this->assertEquals($expected, $result);
    }

    /**
     * Test for the 1,\n scenario
     */
    public function testAddOneAndSlashN(){

        // Arrange
        $simpleTest = new StringCalculator();

        // Test cases
        $expected = "The following input is NOT ok";
        $result = $simpleTest->Add("1,\n");

        // Assert
        $this->assertEquals($expected, $result);
    }

    /**
     * Test for the //;\n1;2 scenario
     */
    public function testAddDelimiter(){

        // Arrange
        $simpleTest = new StringCalculator();

        // Test cases
        $expected = ";3";
        $result = $simpleTest->Add("//;\n1;2");

        // Assert
        $this->assertEquals($expected, $result);
    }

    /**
     * Test for the -1 scenario
     */
    public function testAddNegative(){

        // Arrange
        $simpleTest = new StringCalculator();

        // Test cases
        $expected = "something went wrong -1";
        $result = $simpleTest->Add("-1");

        // Assert
        $this->assertEquals($expected, $result);
    }

    /**
     * Test for the 1,3,2000 scenario
     */
    public function testAddBigNumber(){

        // Arrange
        $simpleTest = new StringCalculator();

        // Test cases
        $expected = "4";
        $result = $simpleTest->Add("1,3,2000");

        // Assert
        $this->assertEquals($expected, $result);
    }

}