<?php

namespace Samoussa\PhpHtmlTable;

class td extends html
{
    private $value = '';
    protected $attributes = [];

    /**
     * td constructor.
     *
     * @param $value
     * @param array $attributes
     */
    public function __construct($value, array $attributes = [])
    {
        $this->value = $value;
        $this->attributes = $attributes;
    }

    /**
     * @return string
     */
    public function generate(): string
    {
        return $this->html('td', $this->value);
    }
}
