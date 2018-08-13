<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Samoussa\PhpHtmlTable\td;

final class tdTest extends TestCase
{
    public function testMethod()
    {

        $td = new td(4);
        $render = $td->generate();
        $this->assertTrue($render == '<td>4</td>', $render);
    }
}