<?php


namespace Mrkatz\Input\Traits\Attributes;


trait HasWidth
{
    private $width;

    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getWidth($html = false)
    {
        if ($html) {
            return isset($this->width) ? "width=\"{$this->width}\"" : '';
        }
        return $this->width;
    }

    public function formatWidth($width)
    {
        return isset($width) ? "width=\"{$width}\"" : '';
    }

    /**
     * @param mixed $width
     *
     * @return HasWidth
     */
    public function width($width)
    {
        $this->width = $width;

        return $this;
    }
}