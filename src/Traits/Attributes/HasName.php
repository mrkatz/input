<?php


namespace Mrkatz\Input\Traits\Attributes;

trait HasName
{
    private $name;

    /**
     * @param bool $html
     *
     * @return string
     */
    public function getName($html = false)
    {
        if ($html) {
            return $this->formatName($this->name,$this->getMultiple());
        }
        return $this->name;
    }

    /**
     * @param $name
     *
     * @return string
     */
    public function formatName($name, $multiple = false)
    {
        if ($multiple) return "name=\"{$name}[]\"";
        return "name=\"{$name}\"";
    }

    /**
     * @param mixed $name
     *
     * @return HasName
     */
    public function name($name)
    {
        $this->name = $name;

        return $this;
    }
}