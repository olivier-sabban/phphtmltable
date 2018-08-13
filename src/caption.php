<?php

namespace Samoussa\PhpHtmlTable;

class caption extends html
{
    private $value = '';
    protected $attributes = [];

    /**
     * td constructor.
     *
     * @param string $value
     * @param array  $attributes
     */
    public function __construct(string $value, array $attributes = [])
    {
        $this->value = $value;
        $this->attributes = $attributes;
    }

    /**
     * @return string
     */
    public function generate(): string
    {
        return $this->html('caption', $this->value);
    }
}
