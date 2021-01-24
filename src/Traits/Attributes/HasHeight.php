<?php

namespace Mrkatz\Input\Traits\Attributes;

use Mrkatz\Input\Input;

trait HasHeight
{
    private $height;

    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getHeight($html = false)
    {
        if ($html) {
            return $this->formatHeight($this->height);
        }

        return $this->height;
    }

    /**
     * @param mixed $height
     *
     * @return string
     */
    public function formatHeight($height)
    {
        return isset($height) ? "height=\"{$height}\"" : '';
    }

    /**
     * @param mixed $height
     *
     * @return Input
     */
    public function height($height)
    {
        $this->height = $height;

        return $this->return();
    }
}
