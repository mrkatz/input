<?php


namespace Mrkatz\Input\Traits\Attributes;


trait HasMultiple
{
    private $multiple;

    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getMultiple($html = false)
    {
        if ($html) {
            return $this->formatMultiple($this->multiple);
        }
        return $this->multiple;
    }

    public function formatMultiple($multiple)
    {
        return $multiple ? 'multiple' : '';
    }

    /**
     * @param bool $multiple
     *
     * @return HasMultiple
     */
    public function multiple($multiple = true)
    {
        $this->multiple = true;

        return $this->return();
    }
}