<?php


namespace Mrkatz\Input\Traits;


trait HasDefaults
{
    protected function typeDefaults()
    {
        if (count($this->class) == 0) {
            $this->class($this->config("{$this->getType()}.class", $this->config("default.class")));
        }

        if (count($this->errorClass) == 0) {
            $this->errorClass($this->config("{$this->getType()}.errorClass", $this->config("default.errorClass")));
        }
    }

    protected function configDefaults()
    {
        $this->errorMessagePosition = $this->config('global.errors');
    }
}