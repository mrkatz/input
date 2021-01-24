<?php

namespace Mrkatz\Input\Traits\Attributes;

use Mrkatz\Input\Input;

trait HasOnClick
{
    private $onClick;

    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getOnclick($html = false)
    {
        if ($html) {
            return $this->formatOnClick($this->onClick);
        }

        return $this->onClick;
    }

    /**
     * @param $onClick
     *
     * @return string
     */
    public function formatOnClick($onClick)
    {
        return isset($onClick) ? "onclick=\"{$onClick}\"" : '';
    }

    /**
     * @param mixed $onClick
     *
     * @return Input
     */
    public function onclick($onClick)
    {
        $this->onClick = $onClick;

        return $this->return();
    }
}
