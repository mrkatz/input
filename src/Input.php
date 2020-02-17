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
    use HasAttributes, HasErrorHandling, HasFormatting, HasInputHelpers, HasLabel, HasDefaults, HasHtml;

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

        $this->configDefaults();
    }

    public function __toString()
    {
        return $this->html();
    }

//    public function html()
//    {
//        $stub = null;
//        if ($this->config('global.wrap')) {
//            $stub = $this->config('global.wrap');
//            if (!in_array($this->config('global.wrap-class'), ['', null])) {
//                $stub = str_replace("{class}", "class=\"{$this->config('global.wrap-class')}\"", $stub);
//            } else {
//                $stub = str_replace("{class}", "", $stub);
//            }
//
//            $stub = str_replace("{input}", $this->getStub(), $stub);
//        } else {
//            if (isset($this->wrap['type']) || isset($this->wrap['format'])) {
//
//                $wrap       = $this->wrap;
//                $wrapType   = $wrap['type'];
//                $wrapClass  = isset($wrap['class']) ? "class=\"{$wrap['class']}\"" : '';
//                $wrapFormat = $wrap['format'];
//
//                if (isset($wrapFormat)) {
//                    $stub = $wrapFormat;
//
//                    if (strpos($stub, '{class}')) {
//                        $stub = str_replace('{class}', $wrapClass, $stub);
//                    }
//
//                    if (strpos($stub, '{label}')) {
//                        $this->labelPosition = 'wrap';
//                        $stub                = str_replace('{label}', $this->getLabel(true), $stub);
//                    }
//
//                    $stub = str_replace('{input}', $this->getStub(), $stub);
//                } else {
//
//                    if ($this->hasLabel()) {
//                        $label = str_replace('{input}', $this->getStub(), $this->getLabel(true));
//
//                        $stub = str_replace('{input}', $label, "<{$wrapType} {$wrapClass}>{input}</{$wrapType}>");
//                    } else {
//                        $stub = "<{$wrapType} {$wrapClass}>{$this->getStub()}</{$wrapType}>";
//                    }
//                }
//            } else {
//
//                if ($this->hasLabel()) {
//
//                    $stub = str_replace('{input}', $this->getStub(), $this->getLabel(true));
//                } else {
//                    $stub = $this->getStub();
//                }
//
//            }
//        }
//
//
//        foreach ($this->config("slots.{$this->getType()}") as $attribute) {
//            $function = 'get' . ucfirst($attribute);
//            $value    = $this->$function(true);
//
//            if ($value != '') $value .= ' ';
//            $stub = str_replace("{{$attribute}}", $value, $stub);
//        }
//
//        return $stub;
//    }

    protected function config($key, $default = null)
    {
        return config('input.' . $key, $default);
    }

    public function getStub()
    {
        return $this->config("stubs.{$this->getType()}");
    }

    /**
     * @param string $type
     * @param string $name
     * @param string|integer|array|null $prop1
     * @param array|boolean|null $prop2
     * @param boolean|null $prop3
     *
     * @return $this|void
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

    public function return()
    {
        return $this;
    }

}
