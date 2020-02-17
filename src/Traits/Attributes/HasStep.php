<?php


namespace Mrkatz\Input\Traits\Attributes;


use Mrkatz\Input\Input;

trait HasStep
{
    private $step;

    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getStep($html = false)
    {
        if ($html) {
            return $this->formatStep($this->step);
        }
        return $this->step;
    }

    public function formatStep($step)
    {
        return isset($step) ? "step=\"{$step}\"" : '';
    }


    /**
     * @param mixed $step
     *
     * @return HasStep
     */
    public function step($step)
    {
        $this->step = $step;

        return $this->return();
    }
}