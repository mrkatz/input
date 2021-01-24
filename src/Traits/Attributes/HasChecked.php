<?php

namespace Mrkatz\Input\Traits\Attributes;

use Mrkatz\Input\Input;

trait HasChecked
{
    private $checked;

    /**
     * @param bool $html
     *
     * @return string|bool
     */
    public function getChecked($html = false)
    {
        if ($html) {
            return $this->formatChecked($this->checked);
        }

        return $this->checked;
    }

    /**
     * @param $checked
     *
     * @return string
     */
    public function formatChecked($checked)
    {
        return $checked ? 'checked' : '';
    }

    /**
     * @param mixed $checked
     *
     * @return Input
     */
    public function checked($checked = true)
    {
        $this->checked = $checked;

        return $this->return();
    }
}
