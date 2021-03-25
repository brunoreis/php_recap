<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class StringsTest extends TestCase
{
  public function testCanBeSingleQuoted(): void {
    $sqString = 'This is a string';
    $this->assertTrue(is_string($sqString));
  }

  public function testCanBeSingleQuotedWithMultipleLines(): void {
    $sqString = 'This is a single quoted
string with multiple lines';
    $this->assertEquals($sqString, "This is a single quoted\nstring with multiple lines");
  }

  public function testSingleQuotedStringOnlyAcceptBackslashedBackslashes(): void {
    $sqString = '\n';// this is not escaped
    $this->assertEquals($sqString, "\\n");
    $sqString = '\\'; // this is escaped
    $this->assertEquals($sqString, "\\");
  }

  public function testDoubleQuotedStringEscapesSpecialChars(): void {
    $dqString = "\n";// this is not escaped
    $sqString = "
";
    $this->assertEquals($sqString, $dqString);
  }

  public function testHeredocStrings(): void {
    $name = "heredoc";
    $heredocString = <<<XYZ
no new line before this one
this is the "$name" test
no new line after this one
XYZ; // this cannot be idented
    $dqString = "no new line before this one\nthis is the \"heredoc\" test\nno new line after this one";
    $this->assertEquals($heredocString, $dqString);
  }

  public function testNowdocStrings(): void {
    $heredocString = <<<'XYZ'
no new line before this one
this is the "$name" test
no new line after this one
XYZ; // this cannot be idented
    $dqString = "no new line before this one\nthis is the \"\$name\" test\nno new line after this one";
    $this->assertEquals($heredocString, $dqString);
  }

  public function testSimpleSyntaxVariableScaping(): void {
    $name = "Paulo";
    $var = "Hi $name";
    $this->assertEquals($var, "Hi Paulo");
  }

  public function testComplexSyntaxVariableScaping(): void {
    $name = "Paulo";
    $var = "Hi ${name}s";// to explicitly specify the end of the variable name
    $this->assertEquals($var, "Hi Paulos");
  }

  public function testSimpleSyntaxVariableScapingWithObjectsAndArrays(): void {
    $fruits = ["banana", "apple"];
    $banana = (object) array("color" => "yellow");
    $var = "The fruit $fruits[0] is $banana->color";
    $this->assertEquals($var, "The fruit banana is yellow");
  }

  public function testAccessThirdStringChar(): void {
    $b = "banana";
    $this->assertEquals($b[2], "n");
  }

  public function testAccessPenultimateChar(): void {
    $b = "mango";
    $this->assertEquals($b[-2], "g");
  }

  public function testChangePenultimateChar(): void {
    $b = "bola";
    $b[-2] = "t";
    $this->assertEquals($b, "bota");
  }

  public function testDynamicAccessToClassProps(): void {
    $foo = (object)array('bar'=>'foobar');
    $baz = array('foo', 'bar', 'baz', 'quux');
    $this->assertEquals("{$foo->{$baz[1]}}", "foobar");
  }
}
