<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Samoussa\PhpHtmlTable\tableRender;
use Samoussa\PhpHtmlTable\tr;

final class tableRenderTest extends TestCase
{
    public function testMethod()
    {

        $tableRender = new tableRender([[8, ['colspan' => 2]], 9, [10, ['class' => 'trClass']]]);
        $render = $tableRender->html();
        $this->assertTrue($render == '<table><tr><td colspan="2">8</td><td>9</td><td class="trClass">10</td></tr></table>', $render);

        $tableRender = new tableRender();
        $tableRender
            ->addTr(['2', '3', '4'])
            ->addTr([5, 6, 7])
            ->addTr([[8, ['colspan' => 2]], 9, [10, ['class' => 'trClass']]]);
        $tableRender->addAttributes(['tableClass']);
        $render = $tableRender->html();
        $this->assertTrue($render == '<table 0="tableClass"><tr><td>2</td><td>3</td><td>4</td></tr><tr><td>5</td><td>6</td><td>7</td></tr><tr><td colspan="2">8</td><td>9</td><td class="trClass">10</td></tr></table>', $render);

        $tableRender = new tableRender();
        $tr = new tr([8, ['colspan' => 2], 9, [10, ['class' => 'trClass']]]);
        $tableRender->addTr($tr);
        $tableRender->addAttributes(['tableClass']);
        $render = $tableRender->html();
        $this->assertTrue($render == '<table 0="tableClass"><tr><td>8</td><td>2</td><td>9</td><td class="trClass">10</td></tr></table>', $render);

    }
}
