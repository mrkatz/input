<?php

namespace Mrkatz\Input;

use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Mrkatz\Input\Traits\HasAttributes;
use Mrkatz\Input\Traits\HasDefaults;
use Mrkatz\Input\Traits\HasErrorHandling;
use Mrkatz\Input\Traits\HasFormatting;
use Mrkatz\Input\Traits\HasHtml;
use Mrkatz\Input\Traits\HasInputHelpers;
use Mrkatz\Input\Traits\HasLabel;

class Input
{
    use HasAttributes, HasErrorHandling, HasFormatting, HasInputHelpers, HasLabel, HasHtml;

    /**
     * The session store implementation.
     *
     * @var Session
     */
    protected $session;
    private $continue;
    /**
     * @var Factory
     */
    private $view;
    /**
     * @var Request
     */
    private $request;
    private $csrfToken;

    /**
     * Input constructor.
     *
     * @param Factory $view
     * @param $csrfToken
     * @param Request $request
     */
    public function __construct(Factory $view, $csrfToken, Request $request)
    {
        $this->view      = $view;
        $this->csrfToken = $csrfToken;
        $this->request   = $request;
        $this->errors    = $this->view->shared('errors');

        $this->traitMethodLoader('constructor_');
    }

    protected function traitMethodLoader($methodTag)
    {
        $class = static::class;

        $booted = [];

        foreach (class_uses_recursive($class) as $trait) {
            $method = $methodTag . class_basename($trait);

            if (method_exists($class, $method) && !in_array($method, $booted)) {
                forward_static_call([$class, $method]);

                $booted[] = $method;
            }
        }
    }

    public function __toString()
    {
        return $this->html();
    }

    public function getStub()
    {
        return $this->config("stubs.{$this->getType()}");
    }

    protected function config($key, $default = null)
    {
        return config('input.' . $key, $default);
    }

    /**
     * @param string $type
     * @param string $name
     * @param string|integer|array|null $prop1
     * @param array|boolean|null $prop2
     * @param boolean|null $prop3
     *
     * @return Input
     */
    protected function filterInputs($type, $name, $prop1 = null, $prop2 = null, $prop3 = null)
    {
        $this->type($type);
        $this->name($name);

        if ($type == 'select') {
            if (is_array($prop1)) {
                $this->options($prop1);
            }
        } else {
            if (is_string($prop1) | is_integer($prop1) | $prop1 instanceof Carbon) {
                $this->value($prop1);
            }

            if (is_array($prop1)) {
                $this->setAttributes($prop1);
            }
        }

        if (is_array($prop2)) {
            $this->setAttributes($prop2);
        }

        if (is_bool($prop2)) {
            $this->continue = $prop2;
        }

        if (is_bool($prop3)) {
            $this->continue = $prop3;
        }

        if ($this->continue) {
            return $this->return();
        }

        return $this->html();
    }

    /**
     * @return Input
     */
    public function return()
    {
        return $this;
    }

}
