<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Samoussa\PhpHtmlTable\html;

final class TableTest extends TestCase
{
    public function testMethod()
    {

        $html = new html();

        $html->addAttributes(['KeyAttribute1' => 'valueAttribute1']);
        $render = $html->html('test','abc');
        $this->assertTrue($render=='<test KeyAttribute1="valueAttribute1">abc</test>', $render);

        $render = $html->html('test',['a','b','c']);
        $this->assertTrue($render=='<test KeyAttribute1="valueAttribute1">abc</test>', $render);

        $html->addAttributes(['KeyAttribute2' => 'valueAttribute2']);
        $render = $html->html('test','abc');
        $this->assertTrue($render=='<test KeyAttribute1="valueAttribute1" KeyAttribute2="valueAttribute2">abc</test>', $render);

    }
}
