<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Samoussa\PhpHtmlTable\col;
use Samoussa\PhpHtmlTable\colGroup;

final class colGroupTest extends TestCase
{
    public function testMethod()
    {
        $colGroup = new colGroup();
        $colGroup->addCol(new col(['span'=>2]));
        $render = $colGroup->generate();
        $this->assertTrue($render == '<colgroup><col span="2"></colgroup>', $render);
    }
}