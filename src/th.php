<?php

namespace Samoussa\PhpHtmlTable;

class th extends html
{
    private $value = '';
    protected $attributes = [];

    /**
     * th constructor.
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
        return $this->html('th', $this->value);
    }
}
