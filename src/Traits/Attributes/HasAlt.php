<?php

namespace Mrkatz\Input\Traits\Attributes;

trait HasAlt
{
    private $alt;

    /**
     * @param bool $html
     *
     * @return string|bool
     */
    public function getAlt($html = false)
    {
        if ($html) {
            return $this->formatAlt($this->alt);
        }

        return $this->alt;
    }

    /**
     * @param $alt
     *
     * @return string
     */
    public function formatAlt($alt)
    {
        return isset($this->alt) ? "alt=\"{$this->alt}\"" : '';
    }

    /**
     * @param mixed $alt
     *
     * @return HasAlt
     */
    public function alt($alt)
    {
        $this->alt = $alt;

        return $this->return();
    }
}
