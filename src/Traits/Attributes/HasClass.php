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
            if ($this->hasError()) {
                return $this->formatClass($this->errorClass);
            } else {
                return $this->formatClass($this->class);
            }
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
        if ($class == '' | $class == null) return '';

        return "class=\"{$classes}\"";
    }

    public function typeUpdate_HasClass()
    {
        if (count($this->class) == 0) {
            $this->class($this->config("{$this->getType()}.class", $this->config("default.class")));
        }

        if (count($this->errorClass) == 0) {
            $this->errorClass($this->config("{$this->getType()}.errorClass", $this->config("default.errorClass")));
        }
    }

    /**
     * @param string|array $class
     * @param bool $replace
     *
     * @return Input|HasClass
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
            $this->class = array_filter(array_unique(array_merge($this->class, $class)));
        }

        return $this->return();
    }

    /**
     * @param string|array $class
     * @param bool $replace
     *
     * @return Input|HasClass
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
            $this->errorClass = array_filter(array_unique(array_merge($this->errorClass, $class)));
        }

        return $this->return();
    }
}