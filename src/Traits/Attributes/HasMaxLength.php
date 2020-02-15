<?php


namespace Mrkatz\Input\Traits\Attributes;


use Mrkatz\Input\Input;

trait HasMaxLength
{
    private $maxlength;

    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getMaxlength($html = false)
    {
        if ($html) {
            return $this->formatMaxLength($this->maxlength);
        }
        return $this->maxlength;
    }

    /**
     * @param $maxlength
     *
     * @return string
     */
    public function formatMaxLength($maxlength)
    {
        return isset($maxlength) ? "maxlength=\"{$maxlength}\"" : '';
    }

    /**
     * @param $maxlength
     *
     * @return HasMaxLength
     */
    public function maxlength($maxlength)
    {
        $this->maxlength = $maxlength;

        return $this;
    }
}