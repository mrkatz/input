<?php


namespace Mrkatz\Input\Traits\Attributes;


trait HasChecked
{
    private $checked;

    /**
     * @param bool $html
     *
     * @return mixed
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
     * @return HasChecked
     */
    public function checked($checked = true)
    {
        $this->checked = $checked;

        return $this;
    }
}