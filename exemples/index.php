<?php

use Samoussa\PhpHtmlTable\td;
use Samoussa\PhpHtmlTable\tr;

require __DIR__ . "/../vendor/autoload.php";

# HTML Table - Adding a Caption
$table = new \Samoussa\PhpHtmlTable\table();
$table->setCaption("My table")
    ->addTr([1, "2", "tree"])
    ->addTr([4, "5", ["six",["style" => "color:red;"]]])
    ->render(true);

# Defining an HTML Table
$table = new \Samoussa\PhpHtmlTable\table(["style" => "width:100%"]);
$tr = new \Samoussa\PhpHtmlTable\tr();
$tr->addTh("Firstname")
    ->addTh("Lastname")
    ->addTh("Age");
$table->addTr($tr)
    ->addTr(["Jill", "Smith", "50"])
    ->addTr([new td("Eve"), new td("Jackson"), new td("94",["style" => "color:red;"])])
    ->render(true);

#HTML Table - Cells that Span Many Columns
$table = new \Samoussa\PhpHtmlTable\table(["style" => "width:100%"]);
$tr = new \Samoussa\PhpHtmlTable\tr();
$tr->addTh("Name")
    ->addTh(["Telephone", ["colspan" => 2]]);
$table->addTr($tr)
    ->addTr(["Bill Gates", 55577854, 55577855])
    ->render(true);

#HTML Table - Cells that Span Many Rows
$table = new \Samoussa\PhpHtmlTable\table(["style" => "width:100%"]);
$table->addTr([new \Samoussa\PhpHtmlTable\th('Telephone', ['rowspan' => 2]), 555778545]);
$tr = new \Samoussa\PhpHtmlTable\tr();
$tr->addTh("Name")
    ->addTd("Bill Gates");
$table->addTr($tr)
    ->addTr(['55577855'])
    ->render(true);

#A Special Style for One Table (Exemple twitter bootstrap) 3
$table = new \Samoussa\PhpHtmlTable\table(['class' => 'table table-striped']);
$table->addTr([1, "2", "tree"])
    ->addTr([4, "5", ["six", ["style" => "color:red;"]]])
    ->render(true);

#Specifies a group of one or more columns in a table for formatting
$table = new \Samoussa\PhpHtmlTable\table();
$table->addTr(new \Samoussa\PhpHtmlTable\tr(['ISBN', 'Title', 'Price']))
    ->addTr([3476896, 'My first HTML', "$53"])
    ->addTr([4, '5', "six"])
    ->colgroup()
    ->addCol(new \Samoussa\PhpHtmlTable\col(['span' => 2, 'style' => 'background-color:red']))
    ->addCol(new \Samoussa\PhpHtmlTable\col(['style' => 'background-color:yellow']));
$table->render(true);

#A Special Style for One Table (Exemple twitter bootstrap) 4
$table = new \Samoussa\PhpHtmlTable\table(["class" => "table"]);
$table->thead(['class' => 'thead-light'])
    ->addTr(
        [
            new \Samoussa\PhpHtmlTable\th('#', ['scope' => "col"]),
            new \Samoussa\PhpHtmlTable\th('First', ['scope' => "col"]),
            new \Samoussa\PhpHtmlTable\th('Last', ['scope' => "col"]),
            new \Samoussa\PhpHtmlTable\th('Handle', ['scope' => "col"]),
        ]
    );
$table->tbody()
    ->addTr([new \Samoussa\PhpHtmlTable\th('1', ['scope' => "col"]), 'Mark', 'Otto', '@mdo'])
    ->addTr([new \Samoussa\PhpHtmlTable\th('2', ['scope' => "col"]), 'Jacob', 'Thornton', '@fat'])
    ->addTr([new \Samoussa\PhpHtmlTable\th('3', ['scope' => "col"]), 'Larry', 'the Bird', '@twitter']);
$table->render(true);





