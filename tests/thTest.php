<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Samoussa\PhpHtmlTable\th;

final class thTest extends TestCase
{
    public function testMethod()
    {

        $th = new th(4);
        $render = $th->generate();
        $this->assertTrue($render == '<th>4</th>', $render);
    }
}