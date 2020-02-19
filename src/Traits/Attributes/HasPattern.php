<?php


namespace Mrkatz\Input\Traits\Attributes;


use Mrkatz\Input\Input;

trait HasPattern
{
    private $pattern;

    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getPattern($html = false)
    {
        if ($html) {
            return $this->formatPattern($this->pattern);
        }

        return $this->pattern;
    }

    /**
     * @param mixed $pattern
     *
     * @return string
     */
    public function formatPattern($pattern)
    {
        return isset($pattern) ? "pattern=\"{$pattern}\"" : '';
    }

    /**
     * @param mixed $pattern
     *
     * @return Input
     */
    public function pattern($pattern)
    {
        $this->pattern = $pattern;

        return $this->return();
    }
}