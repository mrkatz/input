<?php

namespace Mrkatz\Input\Traits\Attributes;


trait HasSelected
{
    private $selected;

    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getSelected($html = false)
    {
        if ($html) {
            return $this->formatSelected($this->selected);
        }
        return $this->selected;
    }

    protected function formatSelected($selected)
    {
        return $selected ? 'selected' : '';
    }

    /**
     * @param bool $selected
     *
     * @return HasSelected
     */
    public function selected($selected = true)
    {
        $this->selected = $selected;

        return $this->return();
    }
}