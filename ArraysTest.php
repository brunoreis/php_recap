<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class ArraysTest extends TestCase
{
  public function testCreateWithArrayConstruct(): void {
    $ar = array();
    $this->assertTrue(is_array($ar));
  }

  public function testCreateWithArrayConstructKeysAndValues(): void {
    $ar = array(
      'name' => 'dude',
      'age' => 43,
    );
    $this->assertTrue(is_array($ar));
  }

  public function testAccessArrayValue(): void {
    $ar = array(
      'name' => 'dude',
      'age' => 43,
    );
    $this->assertEquals($ar['age'], 43);
  }

  public function testDuplicatedAndCastedDuplicatedKeysWillResultInASingleValue(): void {
    $ar = array(
      '1' => 'dude',
      1 => 43,
    );
    $this->assertEquals($ar['1'], 43);
    $this->assertEquals(sizeof($ar), 1);
  }

  public function testCreateWithSquareBrackets(): void {
    $ar = [
      'name' => 'dude',
    ];
    $this->assertEquals($ar['name'], 'dude');
  }


  public function testRemoveElementFromArray(): void {
    $ar = [
      'name' => 'dude',
      'age' => 43
    ];
    $this->assertEquals(sizeof($ar), 2);
    unset($ar['age']);
    $this->assertEquals(sizeof($ar), 1);
  }

  public function testChangeArrayByReference(): void {
    $ar = [
      'name' => 'dude',
      'size' => 'tall'
    ];
    foreach($ar as &$value) {
      $value = strtoupper($value);
    }
    $this->assertEquals($ar,['name' => 'DUDE', 'size' => 'TALL']);
  }
}
