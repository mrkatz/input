<?php


namespace Mrkatz\Input\Traits\Attributes;


trait HasHidden
{
    private $hidden;


    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getHidden($html = false)
    {
        if ($html) {
            return $this->formatHidden($this->hidden);
        }
        return $this->hidden;
    }

    public function formatHidden($hidden)
    {
        return $hidden ? 'hidden' : '';
    }


    /**
     * @param mixed $hidden
     *
     * @return HasHidden
     */
    public function hiddenA($hidden = true)
    {
        $this->hidden = $hidden;

        return $this;
    }
}