<?php


namespace Mrkatz\Input\Traits\Attributes;


use Mrkatz\Input\Input;

trait HasClass
{
    private $class = [];
    private $errorClass = [];

    /**
     * @param bool $html
     *
     * @return array|string
     */
    public function getClass($html = false)
    {
        if ($html) {
            return $this->formatClass($this->class);
        }

        return $this->class;
    }

    public function formatClass($class)
    {
        $classes = $class;
        if (is_array($class)) {
            if (count($class) == 0) return '';

            $classes = implode(' ', $class);
        }
        if ($class == '') return '';

        return "class=\"{$classes}\"";
    }

    /**
     * @param string|array $class
     * @param bool $replace
     *
     * @return $this
     */
    public function class($class, $replace = false)
    {
        if (is_string($class)) {
            $class = explode(' ', $class);
        }

        if ($class == null) {
            $class = [];
        }

        if ($replace) {
            $this->class = $class;
        } else {
            $this->class = array_filter(array_merge($this->class, $class));
        }

        return $this;
    }

    /**
     * @param string|array $class
     * @param bool $replace
     *
     * @return $this
     */
    public function errorClass($class, $replace = false)
    {
        if (is_string($class)) {
            $class = explode(' ', $class);
        }

        if ($class == null) {
            $class = [];
        }

        if ($replace) {
            $this->errorClass = $class;
        } else {
            $this->errorClass = array_filter(array_merge($this->errorClass, $class));
        }

        return $this;
    }
}