<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class BooleansTest extends TestCase
{
    public function testAssertCorrectBooleans(): void {
        $b = true;
        $this->assertTrue(is_bool($b));
        $c = false;
        $this->assertTrue(is_bool($c));
    }

    public function testAssertNotBooleans(): void {
        $b = "igor";
        $this->assertFalse(is_bool($b));
    }

    public function testEmptyStringsCastToFalse(): void {
        $b = "";
        $this->assertFalse((bool)$b);
    }

    public function testNotEmptyStringsCastToTrue(): void {
        $b = "not empty";
        $this->assertTrue((bool)$b);
    }

    public function testZeroIntegerWillCastToFalse(): void {
        $b = 0;
        $this->assertFalse((bool)$b);
    }

    public function testNonZeroIntegersWillCastToTrue(): void {
        $positiveInteger = 1;
        $this->assertTrue((bool)$positiveInteger);
        $negativeInteger = -7;
        $this->assertTrue((bool) $negativeInteger);
    }

    public function testNonEmptyStringWillCastToTrue(): void {
        $nonEmptyString = "Igor";
        $this->assertTrue((bool)$nonEmptyString);
    }

    public function testZeroFloatWillCastToFalse(): void {
        $zeroFloat = 0.0;
        $this->assertFalse((bool)$zeroFloat);
    }

    public function testNonZeroFloatsWillCastToTrue(): void {
        $nonZeroFloat = 1.99;
        $this->assertTrue((bool)$nonZeroFloat);
    }

    public function testNonEmptyArrayWillCastToTrue(): void {
        $nonEmptyArray = [0];
        $this->assertTrue((bool)$nonEmptyArray);
    }

    public function testEmptyArrayWillCastToFalse(): void {
        $emptyArray = [];
        $this->assertFalse((bool)$emptyArray);
    }

    public function testFalseStringCastToTrue(): void {
        $falseString = "false";
        $this->assertTrue((bool) $falseString);
    }
}
