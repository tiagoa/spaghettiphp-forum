<?php
/**
 *  Test Case de Validation
 *
 *  @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 *  @copyright Copyright 2008-2009, Spaghetti* Framework (http://spaghettiphp.org/)
 *
 */

class TestValidation extends UnitTestCase {
    public function testValidAlphanumeric() {
        $value = "SpaghettiPHP02";
        $this->assertTrue(Validation::alphanumeric($value));
    }
    public function testInvalidAlphanumeric() {
        $value = "Spaghetti* PHP 0.2";
        $this->assertFalse(Validation::alphanumeric($value));
    }
    public function testValidNumeric() {
        $value = "+42.053e25";
        $this->assertTrue(Validation::numeric($value));
    }
    public function testInvalidNumeric() {
        $value = "+-42.0asd53e25";
        $this->assertFalse(Validation::numeric($value));
    }
    public function testValidDecimalWithPoint() {
        $value = "42.123";
        $this->assertTrue(Validation::decimal($value));
    }
    public function testValidDecimalWithSignal() {
        $value = "+42.0";
        $this->assertTrue(Validation::decimal($value));
    }
    public function testValidDecimalWithScientificFloat() {
        $value = "42.60e-10";
        $this->assertTrue(Validation::decimal($value));
    }
    public function testValidDecimalWithFixedPlaces() {
        $value = "42.60";
        $this->assertTrue(Validation::decimal($value, 2));
    }
    public function testInvalidDecimalWithoutPoint() {
        $value = "42";
        $this->assertFalse(Validation::decimal($value));
    }
    public function testInvalidDecimalWithJustPoint() {
        $value = "42.";
        $this->assertFalse(Validation::decimal($value));
    }
}

?>