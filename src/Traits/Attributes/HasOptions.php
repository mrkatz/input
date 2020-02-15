<?php


namespace Mrkatz\Input\Traits\Attributes;


trait HasOptions
{
    /**
     * @var array
     *           ['value' => ['label',attributes]]
     */
    private $options;

    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getOptions($html = false)
    {
        if ($html) {
            $result = '';

            $selected = $this->getValueAttribute();
            if (isset($selected)) {
//                dd($selected);
            }
            if ($selected == null && is_array($this->options)) {
                foreach ($this->options as $key => $prop) {
                    if (is_array($prop) && isset($prop[1]['selected']) && $prop[1]['selected']) {
                        $selected = $key;
                    }
                }
            }

            if ($this->getPlaceholder() != null) {
                $props  = [
                    'text'     => $this->getPlaceholder(),
                    'disabled' => $this->formatDisabled(true),
                    'hidden'   => $this->formatHidden(true),
                    'selected' => isset($selected) ? null : $this->formatSelected(true),
                ];
                $result .= $this->formatOption($props);
            }

            if (!isset($this->options)) return $result;


            foreach ($this->options as $key => $props) {

                $option = ['value' => $this->formatValue($key),];
                if (is_array($props)) {
                    $option['text'] = $props[0];
                    if (isset($props[1]['disabled'])) $option['disabled'] = $this->formatDisabled($props[1]['disabled']);
                    if (isset($props[1]['hidden'])) $option['hidden'] = $this->formatHidden($props[1]['hidden']);

                    if (is_array($selected)) {
                        dd('yes1');
                    } else {
                        if ($selected == $key) {
                            $option['selected'] = $this->formatSelected(true);
                        } elseif (isset($props[1]['selected'])) {
                            $option['selected'] = $this->formatSelected($props[1]['selected']);
                        }
                    }

                } else {
                    $option['text'] = $props;
                    if (is_array($selected)) {
                        if (in_array($key, $selected)) {
                            $option['selected'] = $this->formatSelected(true);
                        }
                    } else {
                        $option['selected'] = $this->formatSelected($selected == $key);
                    }

                }

                $result .= $this->formatOption($option);
            }

            return $result;

        }
        return $this->options;
    }

    /**
     * @param null $value
     * @param null $text
     * @param $attributes
     *
     * @return string
     */
    public function formatOption($attributes = [])
    {
        $props = [
            'value'    => '',
            'text'     => '',
            'selected' => '',
            'disabled' => '',
            'onclick'  => '',
            'hidden'   => '',
        ];
        $props = array_merge($props, $attributes);

        $stub = $this->config('stubs.option');

        foreach ($props as $prop => $value) {
            $stub = $value == '' ? str_replace("{{$prop}}", "{$value}", $stub) : str_replace("{{$prop}}", "{$value} ", $stub);
        }
        return $stub;
    }

    /**
     * @param array $options
     *
     * @return HasOptions
     */
    public function options($options)
    {
        $this->options = $options;

        return $this;
    }

    public function addOption($value, $text, $attributes = null)
    {
        if (is_array($value)) {
            array_push($this->options, $value);
        } else {
            $this->options[$value] = isset($attributes) ? [$text, $attributes] : $text;
        }

        return $this;
    }
}