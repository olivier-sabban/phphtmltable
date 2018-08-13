<?php

namespace Samoussa\PhpHtmlTable;

class tableRender extends html
{
    protected $trs = [];

    /**
     * tableRender constructor.
     *
     * @param null $tr
     *
     * @throws \Exception
     */
    public function __construct($tr = null)
    {
        if ($tr) {
            $this->addTr($tr);
        }
    }

    /**
     * @param $tr
     *
     * @throws \Exception
     *
     * @return $this
     */
    public function addTr($tr): self
    {
        if ($tr instanceof tr) {
            $this->trs[] = $tr;
        } elseif (is_array($tr)) {
            $this->trs[] = new tr($tr);
        } else {
            throw new \Exception('Impossible de definir tr');
        }

        return $this;
    }

    /**
     * @param $dom
     * @param bool $innerHtml
     *
     * @return string
     */
    public function html(string $dom = 'table', $innerHtml = ''): string
    {
        if ($this->trs) {
            $innerHtml .= implode(
                '',
                array_map(function (tr $tr) {
                    return $tr->generate();
                }, $this->trs)
            );
        }

        return mb_strtolower('<' . $dom . $this->renderAttributes() . '>' . $innerHtml . '</' . $dom . '>');
    }
}
