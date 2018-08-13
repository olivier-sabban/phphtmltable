<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Samoussa\PhpHtmlTable\caption;

final class captionTest extends TestCase
{
    public function testMethod()
    {

        $caption = new caption('test');
        $render = $caption->generate();
        $this->assertTrue($render == '<caption>test</caption>', $render);
    }
}