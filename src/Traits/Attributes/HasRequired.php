<?php

namespace Mrkatz\Input\Traits\Attributes;

use Mrkatz\Input\Input;

trait HasRequired
{
    private $required;

    /**
     * @param bool $html
     *
     * @return string
     */
    public function getRequired($html = false)
    {
        if ($html) {
            return $this->formatRequired($this->required);
        }

        return $this->required;
    }

    /**
     * @param mixed $required
     *
     * @return string
     */
    public function formatRequired($required)
    {
        return $required ? 'required' : '';
    }

    /**
     * @param bool $required
     *
     * @return Input
     */
    public function required($required = true)
    {
        $this->required = $required;

        return $this->return();
    }
}
