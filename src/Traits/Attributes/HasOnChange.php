<?php

namespace Mrkatz\Input\Traits\Attributes;

use Mrkatz\Input\Input;

trait HasOnChange
{
    private $onChange;

    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getOnchange($html = false)
    {
        if ($html) {
            return $this->formatOnChange($this->onChange);
        }

        return $this->onChange;
    }

    /**
     * @param $onChange
     *
     * @return string
     */
    public function formatOnChange($onChange)
    {
        return isset($onChange) ? "onchange=\"{$onChange}\"" : '';
    }

    /**
     * @param mixed $onChange
     *
     * @return Input
     */
    public function onchange($onChange)
    {
        $this->onChange = $onChange;

        return $this->return();
    }
}
