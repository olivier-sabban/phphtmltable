<?php

namespace Samoussa\PhpHtmlTable;

class tableRender extends html
{
    protected $trs = [];
    /**
     * @var bool
     */
    private $lower = false;

    /**
     * tableRender constructor.
     * @param null $tr
     * @param bool $lower
     * @throws \Exception
     */
    public function __construct($tr = null, $lower = false)
    {
        if ($tr) {
            $this->addTr($tr);
        }

        $this->lower = false;

    }


    /**
     * @param $tr
     * @param array $attributes
     * @return tableRender
     * @throws \Exception
     */
    public function addTr($tr, array $attributes = []): self
    {
        if ($tr instanceof tr) {
            $this->trs[] = $tr;
        } elseif (is_array($tr)) {
            $this->trs[] = new tr($tr, $attributes);
        } else {
            throw new \Exception('Impossible de definir tr');
        }

        return $this;
    }


    /**
     * @param string $dom
     * @param string $innerHtml
     * @param $lower
     * @return string
     */
    public function html(string $dom = 'table', $innerHtml = '', $lower = null): string
    {
        if ($this->trs) {
            $innerHtml .= implode(
                '',
                array_map(function (tr $tr) {
                    return $tr->generate();
                }, $this->trs)
            );
        }

        $html = '<' . $dom . $this->renderAttributes() . '>' . $innerHtml . '</' . $dom . '>';

        if ($lower === null && $this->lower) {
            return mb_strtolower($html);
        } elseif ($lower) {
            return mb_strtolower($html);
        } else {
            return $html;
        }

    }
}
