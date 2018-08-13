<?php

namespace Samoussa\PhpHtmlTable;

class tr extends html
{
    private $tds = [];

    /**
     * tr constructor.
     *
     * @param array|null $attributes
     */
    public function __construct(array $tds = null)
    {
        if ($tds) {
            array_walk($tds, function ($cel) {
                if ($cel instanceof td or $cel instanceof th) {
                    $this->addCellule($cel);
                } else {
                    $this->addTd($cel);
                }
            });
        }
    }

    /**
     * @param $value
     * @param array $attributes
     *
     * @return $this
     */
    public function addTd($value, array $attributes = []): self
    {
        if ($value instanceof td) {
            $this->addCellule($value);
        } else {
            if ($cel = $this->guessValueAttributes($value)) {
                list($value, $attributes) = $cel;
            }
            $this->addCellule(new td((string) $value, $attributes));
        }

        return $this;
    }

    /**
     * @param $value
     * @param array $attributes
     *
     * @return $this
     */
    public function addTh($value, array $attributes = []): self
    {
        if ($value instanceof th) {
            $this->addCellule($value);
        } else {
            if ($cel = $this->guessValueAttributes($value, $attributes)) {
                list($value, $attributes) = $cel;
            }
            $this->addCellule(new th((string) $value, $attributes));
        }

        return $this;
    }

    /**
     * @param $values
     * @param array $attributes
     *
     * @return array|null
     */
    private function guessValueAttributes($values, $attributes = []): ?array
    {
        if (is_array($values)) {
            $value = (string) array_shift($values);
            $attributes = count($values) ? (array) array_shift($values) : $attributes;

            return [$value, $attributes];
        }

        return null;
    }

    /**
     * @param $cel
     */
    private function addCellule($cel): void
    {
        if ($cel instanceof td or $cel instanceof th) {
            $this->tds[] = $cel;
        } else {
            throw new \Exception('$td must be TD or TH');
        }
    }

    /**
     * @return string
     */
    public function generate(): string
    {
        return $this->html(
            'tr',
            array_map(function ($td) {
                if ($td instanceof td or $td instanceof th) {
                    return $td->generate();
                }
                throw new \Exception('$td must be TD or TH');
            }, $this->tds)
        );
    }
}
