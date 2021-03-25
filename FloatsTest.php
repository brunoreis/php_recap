<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class FloatsTest extends TestCase
{
  public function testHasFloatingPointPrecision(): void {
    $this->assertEquals(7, floor((0.1+0.7)*10)); // this should be 8 if precise
  }

  public function testCanBeDeclaredWithUnderlines(): void {
    $this->assertEquals(17.2, 1_7.2);
  }

  public function testCanBeCastedFromNumericStrings(): void {
    $floatFromString = (float)"14.2";
    $this->assertEquals(14.2, $floatFromString);
  }

  public function testCanBeCastedFromBoolean(): void {
    //For values of other types (other than strings), the conversion is performed by converting the value to int first and then to float.
    // As certain types have undefined behavior when converting to int, this is also the case when converting to float.
    $this->assertEquals(1.0,(float)true);
    $this->assertEquals(0.0, (float) false);
  }

}
