<?php

namespace Mrkatz\Input\Traits\Attributes;

trait HasDisabled
{
    private $disabled;

    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getDisabled($html = false)
    {
        if ($html) {
            return $this->formatDisabled($this->disabled);
        }
        return $this->disabled;
    }

    public function formatDisabled($disabled)
    {
        return $disabled ? 'disabled' : '';
    }

    /**
     * @param boolean $disabled
     *
     * @return HasDisabled
     */
    public function disabled($disabled = true)
    {
        $this->disabled = $disabled;

        return $this->return();
    }

}