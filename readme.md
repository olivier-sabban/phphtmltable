[![Build Status](https://travis-ci.org/samoussa/phphtmltable.svg?branch=master)](https://travis-ci.org/samoussa/PhpHtmlTable) [![Coverage Status](https://coveralls.io/repos/github/samoussa/PhpHtmlTable/badge.svg?branch=master)](https://coveralls.io/github/samoussa/PhpHtmlTable?branch=master)

# PHP HTML TABLE

This repository allows to manipulate html tables in php

## Concepts

The project covers these concepts:

https://www.w3schools.com/html/html_tables.asp
 
## Requirements

PHP 7.0 or higher.
 
## Installation

Include repositroy in your project by adding it to your composer.json file.
```
composer require samoussa/phphtmltable
```

## Usage

### HTML Table - Adding a Caption
``` php 
$table = new \Samoussa\PhpHtmlTable\table();
$table->setCaption("My table")
    ->addTr([1, "2", "tree"])
    ->addTr([4, "5", ["six",["style" => "color:red;"]]])
    ->render(true);
```
### Defining an HTML Table
``` php 
$table = new \Samoussa\PhpHtmlTable\table(["style" => "width:100%"]);
$tr = new \Samoussa\PhpHtmlTable\tr();
$tr->addTh("Firstname")
    ->addTh("Lastname")
    ->addTh("Age");
$table->addTr($tr)
    ->addTr(["Jill", "Smith", "50"])
    ->addTr([new td("Eve"), new td("Jackson"), new td("94",["style" => "color:red;"])])
    ->render(true);
```
### HTML Table - Cells that Span Many Columns
``` php 
$table = new \Samoussa\PhpHtmlTable\table(["style" => "width:100%"]);
$tr = new \Samoussa\PhpHtmlTable\tr();
$tr->addTh("Name")
    ->addTh(["Telephone", ["colspan" => 2]]);
$table->addTr($tr)
    ->addTr(["Bill Gates", 55577854, 55577855])
    ->render(true);
```

### HTML Table - Cells that Span Many Rows
``` php 
$table = new \Samoussa\PhpHtmlTable\table(["style" => "width:100%"]);
$table->addTr([new \Samoussa\PhpHtmlTable\th('Telephone', ['rowspan' => 2]), 555778545]);
$tr = new \Samoussa\PhpHtmlTable\tr();
$tr->addTh("Name")
    ->addTd("Bill Gates");
$table->addTr($tr)
    ->addTr(['55577855'])
    ->render(true);
```

### A Special Style for One Table (Exemple twitter bootstrap) 3
``` php 
$table = new \Samoussa\PhpHtmlTable\table(['class' => 'table table-striped']);
$table->addTr([1, "2", "tree"])
    ->addTr([4, "5", ["six", ["style" => "color:red;"]]])
    ->render(true);
```

### Specifies a group of one or more columns in a table for formatting
``` php 
$table = new \Samoussa\PhpHtmlTable\table();
$table->addTr(new \Samoussa\PhpHtmlTable\tr(['ISBN', 'Title', 'Price']))
    ->addTr([3476896, 'My first HTML', "$53"])
    ->addTr([4, '5', "six"])
    ->colgroup()
    ->addCol(new \Samoussa\PhpHtmlTable\col(['span' => 2, 'style' => 'background-color:red']))
    ->addCol(new \Samoussa\PhpHtmlTable\col(['style' => 'background-color:yellow']));
$table->render(true);
```
https://getbootstrap.com/docs/4.0/content/tables/#table-head-options
``` php 
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
```

