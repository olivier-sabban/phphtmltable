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
        $this->assertTrue($render=='<test keyattribute1="valueattribute1">abc</test>', $render);

        $render = $html->html('test',['a','b','c']);
        $this->assertTrue($render=='<test keyattribute1="valueattribute1">abc</test>', $render);

        $html->addAttributes(['KeyAttribute2' => 'valueAttribute2']);
        $render = $html->html('test','abc');
        $this->assertTrue($render=='<test keyattribute1="valueattribute1" keyattribute2="valueattribute2">abc</test>', $render);

    }
}