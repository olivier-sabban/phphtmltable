<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Samoussa\PhpHtmlTable\td;
use Samoussa\PhpHtmlTable\th;
use Samoussa\PhpHtmlTable\tr;

final class trTest extends TestCase
{
    public function testMethod()
    {

        $tr = new tr([1, 2, 3]);
        $render = $tr->generate();
        $this->assertTrue($render == '<tr><td>1</td><td>2</td><td>3</td></tr>', $render);

        $tr = new tr([1, [2], 3]);
        $render = $tr->generate();
        $this->assertTrue($render == '<tr><td>1</td><td>2</td><td>3</td></tr>', $render);

        $tr = new tr([1, [2, ['colspan' => 2]], 3]);
        $render = $tr->generate();
        $this->assertTrue($render == '<tr><td>1</td><td colspan="2">2</td><td>3</td></tr>', $render);

        $tr = new tr();
        $tr->addTh(new th(55, ['colspan' => 2]));
        $render = $tr->generate();
        $this->assertTrue($render == '<tr><th colspan="2">55</th></tr>', $render);

        $tr->addTd(new td(66, ['colspan' => 3]));
        $render = $tr->generate();
        $this->assertTrue($render == '<tr><th colspan="2">55</th><td colspan="3">66</td></tr>', $render);

        $tr = new tr();
        $tr->addTh(55)
            ->addTd(22);
        $render = $tr->generate();
        $this->assertTrue($render == '<tr><th>55</th><td>22</td></tr>', $render);
    }
}