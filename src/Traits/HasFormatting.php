<?php

namespace Mrkatz\Input\Traits;

use Mrkatz\Input\Input;

trait HasFormatting
{
    protected $wrap = [
        'type'   => null,
        'class'  => null,
        'format' => null,
    ];

    /**
     * Wrap input in.
     *
     * Clear wrap = wrap();
     * New wrap = wrap('div',form-control)
     * New format = wrap ('format',[class => form-control,labelClass => 'bold'],'<div><div {labelClass}>{label}</div><div {class}>{input}</div></div>']
     *
     * @param null $type  //eg. div
     * @param null $class // eg. 'form-control'|['form-control]
     * @param null $format
     *
     * @return Input
     */
    public function wrap($type = null, $class = null, $format = null)
    {
        $this->wrap = ['type'   => $type,
            'class'  => $class,
            'format' => $format, ];

        return $this->return();
    }
}
