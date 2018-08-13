<?php

namespace Samoussa\PhpHtmlTable;

class table extends tableRender
{
    protected $thead = false;
    protected $tbody = false;
    protected $tfoot = false;
    protected $colgroup = false;
    protected $caption = false;

    /**
     * table constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->addAttributes($attributes);
    }

    /**
     * @param string $caption
     *
     * @return $this
     */
    public function setCaption(string $caption): self
    {
        $this->caption = new caption($caption);

        return $this;
    }

    /**
     * @return colGroup
     */
    public function colgroup(): colGroup
    {
        if (!$this->colgroup) {
            $this->colgroup = new colGroup();
        }

        return $this->colgroup;
    }

    /**
     * @param null $tr
     *
     * @return tableRender
     */
    public function thead($tr = null): tableRender
    {
        if (!$this->thead) {
            $this->thead = new tableRender($tr);
        }

        return $this->thead;
    }

    /**
     * @param null $tr
     *
     * @return tableRender
     */
    public function tbody($tr = null): tableRender
    {
        if (!$this->tbody) {
            $this->tbody = new tableRender($tr);
        }

        return $this->tbody;
    }

    /**
     * @param null $tr
     *
     * @return tableRender
     */
    public function tfoot($tr = null): tableRender
    {
        if (!$this->tfoot) {
            $this->tfoot = new tableRender($tr);
        }

        return $this->tfoot;
    }

    /**
     * @param $returnOutput
     *
     * @return string
     */
    public function render($displayOutput = false): string
    {
        $before = '';

        if ($this->caption) {
            $before .= $this->caption->generate();
        }

        if ($this->colgroup) {
            $before .= $this->colgroup->generate();
        }

        foreach (['thead', 'tbody', 'tfoot'] as $meta) {
            if ($this->{$meta}) {
                $this->{$meta} = $this->{$meta}->html($meta);
            }
        }

        if ($this->thead or $this->tbody or $this->tfoot) {
            $output = $this->html(
                'table',
                $before .
                ($this->thead ?? '') .
                ($this->tbody ?? '') .
                ($this->tfoot ?? '')
            );
        } else {
            $output = $this->html('table', $before);
        }

        if ($displayOutput) {
            echo $output;
        }

        return $output;
    }
}
