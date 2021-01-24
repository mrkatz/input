<?php

namespace Mrkatz\Input\Traits\Attributes;

use Mrkatz\Input\Input;

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
     * @return Input
     */
    public function selected($selected = true)
    {
        $this->selected = $selected;

        return $this->return();
    }
}
