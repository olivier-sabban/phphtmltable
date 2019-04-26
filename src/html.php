<?php

namespace Samoussa\PhpHtmlTable;

class html
{
    protected $attributes = [];

    /**
     * @return string
     */
    protected function renderAttributes(): string
    {
        if (count($this->attributes)) {
            return ' ' . implode(
                    ' ',
                    array_map(function ($value, $key) {
                        return $key . '="' . $value . '"';
                    }, $this->attributes, array_keys($this->attributes))
                );
        }

        return '';
    }

    /**
     * @param array $attributes
     *
     * @return $this
     */
    public function addAttributes(array $attributes): self
    {
        $this->attributes = array_merge($this->attributes, $attributes);

        return $this;
    }

    /**
     * Generate HTML ENTITIES
     * innerHtml could be array.
     *
     * @param $dom
     * @param $innerHtml
     *
     * @return string
     */
    public function html(string $dom, $innerHtml): string
    {
        if (is_array($innerHtml)) {
            $innerHtml = implode('', $innerHtml);
        }

        return '<' . $dom . $this->renderAttributes() . '>' . (string) $innerHtml . '</' . $dom . '>';
    }
}
