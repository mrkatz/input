<?php

namespace Mrkatz\Input\Traits\Attributes;

use Mrkatz\Input\Input;

trait HasType
{
    private $type;

    /**
     * @param mixed $type
     *
     * @return HasType
     */
    public function type($type)
    {
        $this->type = $type;

        $this->traitMethodLoader('typeUpdate_');

        return $this->return();
    }

    /**
     * @param bool $html
     *
     * @return string
     */
    public function getType($html = false)
    {
        if ($html) {
            return $this->formatType($this->type);
        }
        return $this->type;
    }

    public function formatType($type)
    {
        return "type=\"{$type}\"";
    }
}