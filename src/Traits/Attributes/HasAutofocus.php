<?php


namespace Mrkatz\Input\Traits\Attributes;


use Mrkatz\Input\Input;

trait HasAutofocus
{
    private $autofocus;

    /**
     * @param bool $html
     *
     * @return string|boolean
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
     * @return Input
     */
    public function autofocus($autofocus = true)
    {
        $this->autofocus = $autofocus;

        return $this->return();
    }
}