<?php


namespace Mrkatz\Input\Traits\Attributes;


use Mrkatz\Input\Input;

trait HasAutoComplete
{
    private $autocomplete;


    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getAutoComplete($html = false)
    {
        if ($html) {
            return $this->formatAutoComplete($this->autocomplete);
        }
        return $this->autocomplete;
    }

    public function formatAutoComplete($autoComplete)
    {
        if (!isset($autoComplete)) return '';

        if (in_array($autoComplete, ['on', true, 'yes'])) {
            return "autocomplete=\"on\"";
        }

        if (in_array($autoComplete, ['off', false, 'no'])) {
            return "autocomplete=\"off\"";
        }

        return '';
    }


    /**
     * @param bool $autocomplete
     *
     * @return Input
     */
    public function autocomplete($autocomplete = true)
    {
        $this->autocomplete = $autocomplete;

        return $this->return();
    }
}