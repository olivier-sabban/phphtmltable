<?php

namespace Samoussa\PhpHtmlTable;

class colGroup extends html
{
    protected $cols = [];

    /**
     * @param col $col
     *
     * @return $this
     */
    public function addCol(col $col): self
    {
        $this->cols[] = $col;

        return $this;
    }

    /**
     * @return string
     */
    public function generate(): string
    {
        return $this->html(
            'colgroup',
            array_map(function (col $col) {
                return $col->generate();
            }, $this->cols)
        );
    }
}
