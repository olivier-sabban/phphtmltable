<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Samoussa\PhpHtmlTable\col;

final class colTest extends TestCase
{
    public function testMethod()
    {

        $col = new col(['span'=>2]);
        $render = $col->generate();
        $this->assertTrue($render == '<col span="2">', $render);
    }
}