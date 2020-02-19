<?php


namespace Mrkatz\Input\Traits\Attributes;


use Mrkatz\Input\Input;

trait HasSize
{
    private $size;

    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getSize($html = false)
    {
        if ($html) {
            return $this->formatSize($this->size);
        }
        return $this->size;
    }

    /**
     * @param mixed $size
     *
     * @return string
     */
    public function formatSize($size)
    {
        return isset($size) ? "size=\"{$size}\"" : '';
    }

    /**
     * @param $size
     *
     * @return Input
     */
    public function size($size)
    {
        $this->size = $size;

        return $this->return();
    }
}