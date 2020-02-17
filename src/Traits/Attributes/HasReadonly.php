<?php


namespace Mrkatz\Input\Traits\Attributes;


use Mrkatz\Input\Input;

trait HasReadonly
{
    private $readonly;

    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getReadonly($html = false)
    {
        if ($html) {
            return $this->formatReadonly($this->readonly);
        }

        return $this->readonly;
    }

    /**
     * @param mixed $readonly
     *
     * @return string
     */
    public function formatReadonly($readonly)
    {
        return $readonly ? 'readonly' : '';
    }

    /**
     * @param bool $readonly
     *
     * @return HasReadonly
     */
    public function readonly($readonly = true)
    {
        $this->readonly = $readonly;

        return $this->return();
    }
}