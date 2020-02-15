<?php


namespace Mrkatz\Input\Traits;


trait HasErrorHandling
{
    private $errors;
    
    protected function hasError()
    {
        return count($this->errors) > 0;
    }

    protected function getErrorMessage()
    {
        return $this->errors->first($this->getName());
    }
}