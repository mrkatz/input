<?php


namespace Mrkatz\Input\Traits;


trait HasFormating
{
    protected $wrap = [
        'type'   => null,
        'class'  => null,
        'format' => 'null',
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
     * @return $this
     */
    public function wrap($type = null, $class = null, $format = null)
    {
        if ($this->removeWrap($type, $class, $format)) return $this;

        if ($format != null && is_array($class) && $type == 'format') {
            preg_match_all("/\\{(.*?)\\}/", $format, $matches);

            $props = array_diff($matches[1], ['input', 'label']);
            $stub  = $format;
            foreach ($props as $prop) {
                $stub = str_replace('{' . $prop . '}', $class[$prop], $stub);
            }
            $this->wrap = [
                'type'   => $type,
                'class'  => $class,
                'format' => $format,
                'stub'   => $stub,
            ];

            return $this;
        }

        $this->wrap = [
            'type'   => $type,
            'class'  => $class,
            'format' => $format,
        ];

        return $this;
    }

    /**
     * @param $type
     * @param $class
     * @param $format
     *
     * @return bool
     */
    public function removeWrap($type, $class, $format)
    {
        if ($type == null && $class == null && $format == null) {
            $this->wrap = null;
        }

        return false;
    }
}