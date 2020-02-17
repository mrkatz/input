<?php

namespace Mrkatz\Input\Traits;

use Mrkatz\Input\Traits\Attributes\HasAlt;
use Mrkatz\Input\Traits\Attributes\HasAutoComplete;
use Mrkatz\Input\Traits\Attributes\HasAutofocus;
use Mrkatz\Input\Traits\Attributes\HasChecked;
use Mrkatz\Input\Traits\Attributes\HasClass;
use Mrkatz\Input\Traits\Attributes\HasDisabled;
use Mrkatz\Input\Traits\Attributes\HasForm;
use Mrkatz\Input\Traits\Attributes\HasHeight;
use Mrkatz\Input\Traits\Attributes\HasHidden;
use Mrkatz\Input\Traits\Attributes\HasID;
use Mrkatz\Input\Traits\Attributes\HasMax;
use Mrkatz\Input\Traits\Attributes\HasMaxLength;
use Mrkatz\Input\Traits\Attributes\HasMin;
use Mrkatz\Input\Traits\Attributes\HasMultiple;
use Mrkatz\Input\Traits\Attributes\HasName;
use Mrkatz\Input\Traits\Attributes\HasOnChange;
use Mrkatz\Input\Traits\Attributes\HasOnClick;
use Mrkatz\Input\Traits\Attributes\HasOptions;
use Mrkatz\Input\Traits\Attributes\HasPattern;
use Mrkatz\Input\Traits\Attributes\HasPlaceholder;
use Mrkatz\Input\Traits\Attributes\HasReadonly;
use Mrkatz\Input\Traits\Attributes\HasRequired;
use Mrkatz\Input\Traits\Attributes\HasSelected;
use Mrkatz\Input\Traits\Attributes\HasSize;
use Mrkatz\Input\Traits\Attributes\HasSrc;
use Mrkatz\Input\Traits\Attributes\HasStep;
use Mrkatz\Input\Traits\Attributes\HasTitle;
use Mrkatz\Input\Traits\Attributes\HasType;
use Mrkatz\Input\Traits\Attributes\HasValue;
use Mrkatz\Input\Traits\Attributes\HasWidth;

trait HasAttributes
{
    use HasAlt, HasAutofocus, HasAutoComplete, HasChecked, HasClass, HasDisabled, HasForm, HasHeight, HasMax, HasMaxLength, HasMin, HasMultiple, HasName, HasHidden,
        HasOptions, HasPattern, HasPlaceholder, HasSelected, HasReadonly, HasRequired, HasSize, HasSrc, HasStep, HasTitle, HasType, HasValue, HasWidth, HasID, HasOnChange, HasOnClick;

    /**
     * @param array|null $attributes
     *
     * @return HasAttributes
     */
    protected function setAttributes($attributes)
    {
        foreach ($attributes as $att => $value) {

            switch ($att) {
                case 'id':
                    $this->id($value);
                    break;
                case 'class':
                    $this->class($value);
                    break;
                case 'errorClass':
                case 'errorclass':
                    $this->errorClass($value);
                    break;
                case 'name':
                    $this->name($value);
                    break;
                case 'type':
                    $this->type($value);
                    break;
                case 'value':
                    $this->value($value);
                    break;
                case 'required':
                    $this->required($value);
                    break;
                case 'form':
                    $this->form($value);
                    break;
                case 'min':
                    $this->min($value);
                    break;
                case 'max':
                    $this->max($value);
                    break;
                case 'placeholder':
                    $this->placeholder($value);
                    break;
                case 'step':
                    $this->step($value);
                    break;
                case 'size':
                    $this->size($value);
                    break;
                case 'maxlength':
                    $this->maxlength($value);
                    break;
                case 'autofocus':
                    $this->autofocus($value);
                    break;
                case 'autocomplete':
                    $this->autocomplete($value);
                    break;
                case 'src':
                    $this->src($value);
                    break;
                case 'alt':
                    $this->alt($value);
                    break;
                case 'width':
                    $this->width($value);
                    break;
                case 'height':
                    $this->height($value);
                    break;
                case 'hidden':
                    $this->hidden($value);
                    break;
                case 'options':
                    $this->options($value);
                    break;
                case 'multiple':
                    $this->multiple($value);
                    break;
                case 'pattern':
                    $this->pattern($value);
                    break;
                case 'title':
                    $this->title($value);
                    break;
                case 'readonly':
                    $this->readonly($value);
                    break;
                case 'disabled':
                case 'disable':
                    $this->disabled($value);
                    break;
//                case 'list':
//                    $this->list($value);
//                    break;
                case 'checked':
                    $this->checked($value);
                    break;
                case 'onchange':
                    $this->onchange($value);
                    break;
                case 'onclick':
                    $this->onclick($value);
                    break;


                case 'formaction':
                    $this->formaction($value);
                    break;
                case 'formenctype':
                    $this->formenctype($value);
                    break;
                case 'formmethod':
                    $this->formmethod($value);
                    break;
                case 'formnovalidate':
                    $this->formnovalidate($value);
                    break;
                case 'formtarget':
                    $this->formtarget($value);
                    break;
            }
        }

        return $this->return();
    }
}