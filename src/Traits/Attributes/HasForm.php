<?php


namespace Mrkatz\Input\Traits\Attributes;

use Mrkatz\Input\Input;

trait HasForm
{
    private $form;
    private $formaction;
    private $formenctype;
    private $formmethod;
    private $formtarget;
    private $formnovalidate;


    /**
     * @param bool $html
     *
     * @return string
     */
    public function getForm($html = false)
    {
        if ($html) {
            return $this->formatForm($this->form);
        }

        return $this->form;
    }

    /**
     * @param $form
     *
     * @return string
     */
    public function formatForm($form)
    {
        return isset($form) ? "form=\"{$form}\"" : '';
    }

    /**
     * @param string $form
     *
     * @return Input
     */
    public function form($form)
    {
        $this->form = $form;

        return $this->return();
    }

    /**
     * @param bool $html
     *
     * @return string
     */
    public function getFormaction($html = false)
    {

        if ($html) {
            return $this->formatFormAction($this->formaction);
        }
        return $this->formaction;
    }

    /**
     * @param $formAction
     *
     * @return string
     */
    public function formatFormAction($formAction)
    {
        return isset($formAction) ? "formaction=\"{$formAction}\"" : '';
    }

    /**
     * @param string $formaction
     *
     * @return Input
     */
    public function formaction($formaction)
    {
        $this->formaction = $formaction;

        return $this->return();
    }

    /**
     * @param bool $html
     *
     * @return string
     */
    public function getFormenctype($html = false)
    {
        if ($html) {
            return $this->formatFormEnctype($this->formenctype);
        }
        return $this->formenctype;
    }

    /**
     * @param $formAction
     *
     * @return string
     */
    public function formatFormEnctype($formEnctype)
    {
        return isset($formEnctype) ? "formenctype=\"{$formEnctype}\"" : '';
    }

    /**
     * @param string $formenctype
     *
     * @return Input
     */
    public function formenctype($formenctype = 'default')
    {
        switch ($formenctype) {
            default:
            case 'default':
                $this->formenctype = 'application/x-www-form-urlencoded';
                break;
            case 'multipart':
            case 'multi':
                $this->formenctype = 'multipart/form-data';
                break;
            case 'text':
            case 'plain':
                $this->formenctype = 'text/plain';
                break;
        }

        return $this->return();
    }

    /**
     * @param bool $html
     *
     * @return string
     */
    public function getFormmethod($html = false)
    {

        if ($html) {
            return $this->formatFormMethod($this->formmethod);
        }
        return $this->formmethod;
    }

    /**
     * @param $formMethod
     *
     * @return string
     */
    public function formatFormMethod($formMethod)
    {
        return isset($formMethod) ? "formmethod=\"{$formMethod}\"" : '';
    }

    /**
     * @param string $formmethod
     *
     * @return Input
     */
    public function formmethod($formmethod = 'post')
    {
        switch ($formmethod) {
            default:
                $this->formmethod = 'post';
                break;
            case 'get':
                $this->formmethod = 'get';
                break;
        }


        return $this->return();
    }

    /**
     * @param bool $html
     *
     * @return string
     */
    public function getFormtarget($html = false)
    {
        if ($html) {
            return $this->formatFormTarget($this->formtarget);
        }
        return $this->formtarget;
    }

    /**
     * @param $formTarget
     *
     * @return string
     */
    public function formatFormTarget($formTarget)
    {
        return isset($formTarget) ? "formtarget=\"{$formTarget}\"" : '';
    }

    /**
     * @param string $formtarget
     *
     * @return Input
     */
    public function formtarget($formtarget = 'default')
    {
        switch ($formtarget) {
            case 'blank':
            case 'new':
                $this->formtarget = '_blank';
                break;
            case 'self':
            case 'default':
                $this->formtarget = '_self';
                break;
            case 'parent':
                $this->formtarget = '_parent';
                break;
            case 'top':
                $this->formtarget = '_top';
                break;
            default:
                $this->formtarget = $formtarget;
        }

        return $this->return();
    }

    /**
     * @param bool $html
     *
     * @return string
     */
    public function getFormnovalidate($html = false)
    {
        if ($html) {
            return $this->formatFormNoValidate($this->formnovalidate);
        }
        return $this->formnovalidate;
    }

    /**
     * @param $formNoValidate
     *
     * @return string
     */
    public function formatFormNoValidate($formNoValidate)
    {
        return $formNoValidate ? "formnovalidate" : '';
    }

    /**
     * @param boolean $formnovalidate
     *
     * @return Input
     */
    public function formnovalidate($formnovalidate = true)
    {
        $this->formnovalidate = $formnovalidate;

        return $this->return();
    }
}