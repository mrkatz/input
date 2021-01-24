<?php

namespace Mrkatz\Input\Traits\Attributes;

use Mrkatz\Input\Input;

trait HasMax
{
    private $max;

    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getMax($html = false)
    {
        if ($html && $this->max != null) {
            return $this->formatMax($this->max);
        }

        return $this->max;
    }

    /**
     * @param $max
     *
     * @return string
     */
    public function formatMax($max)
    {
        return isset($max) ? "max=\"{$max}\"" : '';
    }

    /**
     * @param $max
     *
     * @return Input
     */
    public function max($max)
    {
        $this->max = $max;

        return $this->return();
    }
}
