<?php


namespace Mrkatz\Input\Traits\Attributes;


use Arr;
use Carbon\Carbon;
use DateTime;
use Mrkatz\Input\Input;

trait HasValue
{
    private $value;


    /**
     * @param bool $html
     *
     * @return string
     */
    public function getValue($html = false)
    {
        $value = $this->getValueAttribute();

        if ($html && $value != '') {
            return $this->formatValue($value, $this->getType());
        }
        return $this->value;
    }

    protected function getValueAttribute()
    {
        $name  = $this->getName();
        $value = $this->value;

        if (is_null($name)) {
            return $value;
        }

        $old = $this->getOldValue();

        if (!is_null($old) && $name !== '_method') {
            return $old;
        }

        $request = $this->request($name);
        if (!is_null($request) && $name != '_method') {
            return $request;
        }

        if (!is_null($value)) {
            return $value;
        }
    }

    /**
     * Return Old Value
     *
     * @return mixed
     */
    protected function getOldValue()
    {
        return old($this->name);
    }

    /**
     * Get value from current Request
     *
     * @param $name
     *
     * @return array|null|string
     */
    protected function request($name)
    {
        if (!isset($this->request)) {
            return null;
        }

        return $this->request->input($this->transformKey($name));
    }

    /**
     * Transform key from array to dot syntax.
     *
     * @param string $key
     *
     * @return mixed
     */
    protected function transformKey($key)
    {
        return str_replace(['.', '[]', '[', ']'], ['_', '', '.', ''], $key);
    }

    public function formatValue($value, $type = 'default')
    {
        if (!isset($value)) return '';

        switch ($type) {
            default:
                return "value=\"{$value}\"";

            case 'textarea':
            case 'button':
            case 'reset':
            case 'submit':
            case 'label':
            case 'attribute':
                return $value;
        }
    }

    /**
     * @param string|Carbon $value
     *
     * @return $this
     */
    public function value($value)
    {
        if ($value instanceof Carbon) {
            switch ($this->getType()) {
                case 'datetime-local':
                    $this->value = $value->toDateTimeLocalString();
                    break;
                case 'date':
                    $this->value = $value->toDateString();
                    break;
                case 'month':
                    $this->value = $value->format('Y-m');
                    break;
                case 'week':
                    $this->value = $value->format('Y-\WW');
                    break;
                case 'time':
                    $this->value = $value->toTimeString();
                    break;
            }

        } else {
            $this->value = $value;
        }

        return $this;
    }

}