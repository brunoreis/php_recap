<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class IntegersTest extends TestCase
{
  public function testAssertMaxValueIs9223372036854775807(): void {
    // The size of an int is platform-dependent
    $this->assertEquals(PHP_INT_MAX, 9223372036854775807);
  }

  public function testIntegerCanBeDeclaredWithUnderlines(): void {
    $int = 3_234;
    $this->assertTrue( is_integer($int) );
    $this->assertEquals($int, 3234);
  }

  public function testAssertMinValueIsMinus9223372036854775808(): void {
    // The size of an int is platform-dependent
    $this->assertEquals(PHP_INT_MIN, -9223372036854775808);
  }

  public function testAssertIntSizeIs8(): void {
    // The size of an int is platform-dependent
    $this->assertEquals(PHP_INT_SIZE, 8);
  }

  public function testANumberGreaterThanMaxIntegerWillBeAFloat(): void {
    $this->assertTrue(is_integer(PHP_INT_MAX));
    $this->assertTrue(is_integer(PHP_INT_MAX-1));
    $this->assertTrue(is_float(PHP_INT_MAX+1));
  }

  public function testADivisionOfTwoIntegersResultInAFloatIfThereIsARest(): void {
    $this->assertTrue(is_float(3/2));
    $this->assertTrue(is_integer(4/2));
  }

  public function testBooleanTrueCastTo1(): void {
    $integerFromTrue = (integer)true;
    $this->assertEquals(1, $integerFromTrue);
  }

  public function testBooleanFalseCastTo0(): void {
    $integerFromFalse = (integer)false;
    $this->assertEquals(0, $integerFromFalse);
  }

  public function testFloatToIntegerRoundsTowardsZero(): void {
    $integerFromFloat = (integer)1.9;
    $this->assertEquals(1, $integerFromFloat);
  }

  public function testNullCastsToZero(): void {
    $integerFromNull = (integer)null;
    $this->assertEquals(0, $integerFromNull);
  }

  public function testNumericStringsCastToValue(): void {
    $integerFromString = (integer)"34bolas";
    $this->assertEquals(34, $integerFromString);
    $integerFromString = (integer) "bolas34";
    $this->assertEquals(0, $integerFromString);
    $integerFromString = (integer) "_34";
    $this->assertEquals(0, $integerFromString);
    $integerFromString = (integer) "034"; // not an octal
    $this->assertEquals(34, $integerFromString);
  }



}
