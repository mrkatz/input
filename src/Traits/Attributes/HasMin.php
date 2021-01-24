<?php

namespace Mrkatz\Input\Traits\Attributes;

use Mrkatz\Input\Input;

trait HasMin
{
    private $min;

    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getMin($html = false)
    {
        if ($html) {
            return $this->formatMin($this->min);
        }

        return $this->min;
    }

    public function formatMin($min)
    {
        return isset($min) ? "min=\"{$min}\"" : '';
    }

    /**
     * @param mixed $min
     *
     * @return Input
     */
    public function min($min)
    {
        $this->min = $min;

        return $this->return();
    }
}
