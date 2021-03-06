<?php

namespace Mrkatz\Input\Traits\Attributes;

use Mrkatz\Input\Input;

trait HasPlaceholder
{
    private $placeholder;

    /**
     * @param bool $html
     *
     * @return string
     */
    public function getPlaceholder($html = false)
    {
        if ($html) {
            return $this->formatPlaceholder($this->placeholder);
        }

        return $this->placeholder;
    }

    /**
     * @param mixed $placeholder
     *
     * @return string
     */
    public function formatPlaceholder($placeholder)
    {
        return isset($placeholder) ? "placeholder=\"{$placeholder}\"" : '';
    }

    /**
     * @param string $placeholder
     *
     * @return Input
     */
    public function placeholder($placeholder)
    {
        $this->placeholder = $placeholder;

        return $this->return();
    }
}
