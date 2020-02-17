<?php


namespace Mrkatz\Input\Traits;


trait HasErrorHandling
{
    public $errors;
    protected $errorMessagePosition;

    public function errors($position = 'below')
    {
        $this->errorMessagePosition = $position;

        return $this->return();
    }

    public function formatError($errorMessage = null, $name = null)
    {
        if ($errorMessage == null) $errorMessage = $this->getErrorMessage();
        if ($name == null) $name = $this->getName();

        if ($this->hasError($this->getName())) {
            return str_replace('{message}', $errorMessage, $this->config('stubs.error'));
        }
        return '';
    }

    protected function getErrorMessage()
    {
        return $this->errors->first($this->getName());
    }

    public function hasError($name = null)
    {
        if ($this->errors == null) return false;

        if ($name == null) {
            return $this->errors->any();
        }

        return $this->errors->has($name);
    }
}