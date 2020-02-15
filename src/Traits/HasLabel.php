<?php


namespace Mrkatz\Input\Traits;


trait HasLabel
{
    protected $label;
    protected $labelOptions = null;
    protected $labelPosition = null;

    /**
     * @param $text           //Text
     * @param $option1        //attributes | Position
     * @param string $option2 //Position
     *
     * @return HasLabel
     */
    public function label($text = null, $option1 = null, $option2 = 'above')
    {
        if (is_bool($text)) {
            $this->labelPosition = $text ? $option2 : null;
            $this->label         = $this->getName();
        } else {
            $this->label = $text;
        }

        if (is_array($option1)) {
            foreach ($option1 as $opt => $val) {
                switch ($opt) {
                    case 'class':
                        $this->labelOptions['class'] = $this->formatClass($val);
                        break;
                }
            }
            $this->labelPosition = $option2;
        }

        if (is_string($option1)) {
            $this->labelPosition = $option1;
        }

        return $this;
    }

    /**
     * @param bool $html
     *
     * @return string|null
     */
    public function getLabel($html = false)
    {
        if ($html) {
            if (!is_array($this->labelOptions)) {
                $this->labelOptions = [];
            }

            if ($this->getId() != null) {
                $this->labelOptions['for'] = $this->formatFor($this->getId());
            }

            return $this->formatLabel(array_merge($this->labelOptions, ['value' => $this->label]), $this->labelPosition);
        }
        return $this->labelPosition;
    }

    public function formatLabel($label, $position)
    {
        $stub = $this->config('stubs.label');

        $props = [
            'value'   => '',
            'for'     => '',
            'class'   => '',
            'title'   => '',
            'onclick' => '',
        ];

        if (is_array($label)) {
            $properties = array_merge($props, $label);
        } else {
            $properties          = $props;
            $properties['value'] = $label;
        }

        foreach ($this->config('slots.label') as $attribute) {
            $stub = str_replace("{{$attribute}}", $properties[$attribute], $stub);
        }

        if (in_array($position, ['above', 'left', 'top'])) {
            return $stub . '{input}';
        }
        if (in_array($position, ['below', 'right', 'bottom'])) {
            return '{input}' . $stub;
        }

        return $stub;
    }

    public function hasLabel()
    {
        return $this->labelPosition !== null;
    }
}