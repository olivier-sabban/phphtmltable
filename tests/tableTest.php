<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Samoussa\PhpHtmlTable\table;
use Samoussa\PhpHtmlTable\tableRender;
use Samoussa\PhpHtmlTable\td;
use Samoussa\PhpHtmlTable\tr;

final class tableHtmlTest extends TestCase
{
    public function testMethod()
    {

        $table = new table();

        $table->setCaption('test');
        $table->addTr(['2', '3', '4'])
            ->addTr([5, 6, 7])
            ->addTr([[8, ['colspan' => 2]], 9, [10, ['class' => 'trClass']]]);
        $table->addAttributes(['class'=>'tableClass']);
        $render = $table->html();
        $this->assertTrue($render == '<table class="tableClass"><tr><td>2</td><td>3</td><td>4</td></tr><tr><td>5</td><td>6</td><td>7</td></tr><tr><td colspan="2">8</td><td>9</td><td class="trClass">10</td></tr></table>', $render);


        $table = new table();
        $table->setCaption('test');
        $table->thead(['A', 'B', 'C']);
        $table->tbody(['2', '3', '4'])
            ->addTr([5, 6, 7])
            ->addTr([[8, ['colspan' => 2]], 9, [10, ['class' => 'trClass']]]);

        $tr = new tr();
        $tr->addTd('R');
        $tr->addTd(9);
        $tr->addTd([10, ['class' => 'trClass']]);

        $table->tfoot($tr);
        $table->addAttributes(['class'=>'tableClass']);
        $render = $table->render();
        $this->assertTrue($render == '<table class="tableclass"><caption>test</caption><thead><tr><td>a</td><td>b</td><td>c</td></tr></thead><tbody><tr><td>2</td><td>3</td><td>4</td></tr><tr><td>5</td><td>6</td><td>7</td></tr><tr><td colspan="2">8</td><td>9</td><td class="trclass">10</td></tr></tbody><tfoot><tr><td>r</td><td>9</td><td class="trclass">10</td></tr></tfoot></table>', $render);

        $table = new table();
        $table->setCaption('test');
        $table->tbody([new td(2), '3', '4']);
        $table->addTr([new td(2),[2,['style'=>'color:red;']],4]);
        $render = $table->render();
        $this->assertTrue($render == '<table><caption>test</caption><tbody><tr><td>2</td><td>3</td><td>4</td></tr></tbody><tr><td>2</td><td style="color:red;">2</td><td>4</td></tr></table>', $render);


    }
}
