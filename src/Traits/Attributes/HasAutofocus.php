<?php


namespace Mrkatz\Input\Traits\Attributes;


trait HasAutofocus
{
    private $autofocus;


    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getAutofocus($html = false)
    {
        if ($html) {
            return $this->formatAutofocus($this->autofocus);
        }
        return $this->autofocus;
    }

    public function formatAutofocus($autofocus)
    {
        return $autofocus ? 'autofocus' : '';
    }


    /**
     * @param mixed $autofocus
     *
     * @return HasAutofocus
     */
    public function autofocus($autofocus = true)
    {
        $this->autofocus = $autofocus;

        return $this->return();
    }
}