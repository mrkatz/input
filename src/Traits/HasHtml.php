<?php

namespace Mrkatz\Input\Traits;

trait HasHtml
{
    /**
     * @return string
     */
    public function html()
    {
        $stub = $this->setWrap();

        $stub = $this->setLabel($stub);
        $stub = $this->setErrors($stub);

        return $this->setInput($stub);
    }

    public function setWrap($html = '{input}')
    {
        $wrapType = isset($this->wrap['type']) ? $this->wrap['type'] : null;
        $wrapFormat = isset($this->wrap['format']) ? $this->wrap['format'] : null;

        if (! isset($wrapType) && ! isset($wrapFormat)) {
            return $html;
        }

        $wrapClass = $this->formatClass($this->wrap['class']);

        if (isset($wrapFormat)) {
            $stub = $wrapFormat;

            if (strpos($stub, '{class}')) {
                return str_replace('{class}', $wrapClass, $stub);
            }

            return $stub;
        }

        return "<{$wrapType} {$wrapClass}>{$html}</{$wrapType}>";
    }

    public function setLabel($html)
    {
        if (! $this->hasLabel()) {
            return str_replace('{label}', '', $html);
        }

        if (strpos($html, '{label}')) {
            $this->labelPosition = 'wrap';

            return str_replace('{label}', $this->getLabel(true), $html);
        }

        return str_replace('{input}', $this->getLabel(true), $html);
    }

    public function setErrors($stub)
    {
        if (! $this->hasError($this->getName()) || $this->errorMessagePosition == null) {
            return $stub;
        }

        if (strpos($stub, '{error}')) {
            return str_replace('{error}', $this->formatError(), $stub);
        }

        if (in_array($this->errorMessagePosition, ['above', 'top'])) {
            return str_replace('{input}', $this->formatError().'{input}', $stub);
        }

        return str_replace('{input}', '{input}'.$this->formatError(), $stub);
    }

    public function setInput($html)
    {
        $stub = str_replace('{input}', $this->getStub(), $html);

        foreach ($this->config("slots.{$this->getType()}") as $attribute) {
            $function = 'get'.ucfirst($attribute);
            $value = $this->$function(true);

            if ($value != '') {
                $value .= ' ';
            }
            $stub = str_replace("{{$attribute}}", $value, $stub);
        }

        return $stub;
    }
}
