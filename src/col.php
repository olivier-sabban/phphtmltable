<?php

namespace Samoussa\PhpHtmlTable;

class col extends html
{
    /**
     * col constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    /**
     * @return string
     */
    public function generate(): string
    {
        return '<col' . $this->renderAttributes() . '>';
    }
}
