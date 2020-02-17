<?php

return [
    /*
        |--------------------------------------------------------------------------
        | Global Options
        |--------------------------------------------------------------------------
        */
    'global' => [
        'errors' => 'bottom' //null, top, bottom, wrap


    ],

    /*
    |--------------------------------------------------------------------------
    | Input Stubs
    |--------------------------------------------------------------------------
    */
    'stubs'  => [
        'label'          => '<label {class}{title}{onclick}{for}>{value}</label>',
        'button'         => '<button {name}{type}{id}{class}{title}{form}{autofocus}{hidden}{disabled}{formaction}{formenctype}{formmethod}{formnovalidate}{formtarget}{maxlength}{onchange}{onclick}{readonly}{size}>{value}</button>',
        'checkbox'       => '<input {name}{type}{id}{value}{class}{title}{form}{autofocus}{hidden}{checked}{disabled}{onchange}{onclick}{readonly}{required}{size}>',
        'color'          => '<input {name}{type}{id}{value}{class}{title}{form}{autocomplete}{autofocus}{hidden}{disabled}{onchange}{onclick}{readonly}{size}>',
        'date'           => '<input {name}{type}{id}{value}{class}{title}{form}{autocomplete}{autofocus}{hidden}{disabled}{max}{maxlength}{min}{onchange}{onclick}{placeholder}{readonly}{required}{size}{step}>',
        'datetime-local' => '<input {name}{type}{id}{value}{class}{title}{form}{autocomplete}{autofocus}{hidden}{disabled}{max}{maxlength}{min}{onchange}{onclick}{placeholder}{readonly}{required}{size}{step}>',
        'email'          => '<input {name}{type}{id}{value}{class}{title}{form}{autocomplete}{autofocus}{hidden}{disabled}{maxlength}{multiple}{onchange}{onclick}{pattern}{placeholder}{readonly}{required}{size}>',
        'file'           => '<input {name}{type}{id}{value}{class}{title}{form}{autofocus}{hidden}{disabled}{maxlength}{multiple}{onchange}{onclick}{readonly}{required}{size}>',
        'hidden'         => '<input {name}{type}{id}{value}{form}{autofocus}{onchange}{readonly}>',
        'image'          => '<input {name}{type}{id}{class}{src}{title}{form}{alt}{autofocus}{hidden}{disabled}{formaction}{formenctype}{formmethod}{formtarget}{height}{maxlength}{onchange}{onclick}{readonly}{size}{width}>',
        'month'          => '<input {name}{type}{id}{value}{class}{title}{form}{autocomplete}{autofocus}{hidden}{disabled}{max}{maxlength}{min}{onchange}{onclick}{placeholder}{readonly}{required}{size}{step}>',
        'number'         => '<input {name}{type}{id}{value}{class}{title}{form}{autofocus}{hidden}{disabled}{max}{maxlength}{min}{onchange}{onclick}{placeholder}{readonly}{required}{size}{step}>',
        'password'       => '<input {name}{type}{id}{class}{title}{form}{autocomplete}{autofocus}{hidden}{disabled}{maxlength}{onchange}{onclick}{pattern}{placeholder}{readonly}{required}{size}>',
        'radio'          => '<input {name}{type}{id}{value}{class}{title}{form}{autofocus}{hidden}{disabled}{maxlength}{onchange}{onclick}{readonly}{required}{size}>',
        'range'          => '<input {name}{type}{id}{value}{class}{title}{form}{autocomplete}{autofocus}{hidden}{disabled}{max}{maxlength}{min}{onchange}{onclick}{readonly}{size}{step}>',
        'reset'          => '<button {name}{type}{id}{class}{title}{form}{autofocus}{hidden}{disabled}{maxlength}{onchange}{onclick}{readonly}{size}>{value}</button>',
        'search'         => '<input {name}{type}{id}{value}{class}{title}{form}{autocomplete}{autofocus}{hidden}{disabled}{maxlength}{onchange}{onclick}{pattern}{placeholder}{readonly}{required}{size}>',
        'submit'         => '<button {name}{type}{id}{class}{title}{form}{autofocus}{hidden}{disabled}{formaction}{formenctype}{formmethod}{formnovalidate}{formtarget}{maxlength}{onchange}{onclick}{readonly}{size}>{value}</button>',
        'tel'            => '<input {name}{type}{id}{value}{class}{title}{form}{autocomplete}{autofocus}{hidden}{disabled}{max}{maxlength}{min}{onchange}{onclick}{pattern}{placeholder}{readonly}{required}{size}>',
        'text'           => '<input {name}{type}{id}{value}{class}{title}{form}{autocomplete}{autofocus}{hidden}{disabled}{maxlength}{onchange}{onclick}{pattern}{placeholder}{readonly}{required}{size}>',
        'textarea'       => '<textarea {name}{id}{class}{title}{form}{autocomplete}{autofocus}{hidden}{disabled}{maxlength}{onchange}{onclick}{placeholder}{readonly}{required}{size}>{value}</textarea>',
        'time'           => '<input {name}{type}{id}{value}{class}{title}{form}{autofocus}{hidden}{disabled}{max}{maxlength}{min}{onchange}{onclick}{placeholder}{readonly}{required}{size}{step}>',
        'url'            => '<input {name}{type}{id}{value}{class}{title}{form}{autocomplete}{autofocus}{hidden}{disabled}{maxlength}{onchange}{onclick}{pattern}{placeholder}{readonly}{required}{size}>',
        'week'           => '<input {name}{type}{id}{value}{class}{title}{form}{autocomplete}{autofocus}{hidden}{disabled}{max}{maxlength}{min}{onchange}{onclick}{placeholder}{readonly}{required}{size}{step}>',

        'select' => '<select {name}{id}{class}{title}{form}{size}{multiple}{onchange}{onclick}{autofocus}{hidden}{disabled}{required}>{options}</select>', //placeholder = <option value="" disabled selected hidden>Please Choose...</option>
        'option' => '<option {value}{selected}{disabled}{onclick}{hidden}>{text}</option>',

        'progress' => '<progress {id}{class}{title}{value}{max}></progress>',
        'meter'    => '<meter {id}{class}{min}{max}{value}{form}></meter>',

        'error' => '<div class="invalid-feedback">{message}</div>',


    ],

    /*
|--------------------------------------------------------------------------
| Input Stubs
|--------------------------------------------------------------------------
*/
    'slots'  => [
        'label'          => ['class', 'title', 'onclick', 'value', 'for'],
        'button'         => ['name', 'type', 'id', 'value', 'class', 'title', 'form', 'autofocus', 'hidden', 'disabled', 'formaction', 'formenctype', 'formmethod', 'formnovalidate', 'formtarget', 'maxlength', 'onchange', 'onclick', 'readonly', 'size',],
        'checkbox'       => ['name', 'type', 'id', 'value', 'class', 'title', 'form', 'autofocus', 'hidden', 'checked', 'disabled', 'onchange', 'onclick', 'readonly', 'required', 'size',],
        'color'          => ['name', 'type', 'id', 'value', 'class', 'title', 'form', 'autocomplete', 'autofocus', 'hidden', 'disabled', 'onchange', 'onclick', 'readonly', 'size',],
        'date'           => ['name', 'type', 'id', 'value', 'class', 'title', 'form', 'autocomplete', 'autofocus', 'hidden', 'disabled', 'max', 'maxlength', 'min', 'onchange', 'onclick', 'placeholder', 'readonly', 'required', 'size', 'step',],
        'datetime-local' => ['name', 'type', 'id', 'value', 'class', 'title', 'form', 'autocomplete', 'autofocus', 'hidden', 'disabled', 'max', 'maxlength', 'min', 'onchange', 'onclick', 'placeholder', 'readonly', 'required', 'size', 'step',],
        'email'          => ['name', 'type', 'id', 'value', 'class', 'title', 'form', 'autocomplete', 'autofocus', 'hidden', 'disabled', 'maxlength', 'multiple', 'onchange', 'onclick', 'pattern', 'placeholder', 'readonly', 'required', 'size',],
        'file'           => ['name', 'type', 'id', 'value', 'class', 'title', 'form', 'autofocus', 'hidden', 'disabled', 'maxlength', 'multiple', 'onchange', 'onclick', 'readonly', 'required', 'size',],
        'hidden'         => ['name', 'type', 'id', 'value', 'form', 'autofocus', 'onchange', 'readonly',],
        'image'          => ['name', 'type', 'id', 'class', 'title', 'src', 'form', 'alt', 'autofocus', 'hidden', 'disabled', 'formaction', 'formenctype', 'formmethod', 'formtarget', 'height', 'maxlength', 'onchange', 'onclick', 'readonly', 'size', 'width',],
        'month'          => ['name', 'type', 'id', 'value', 'class', 'title', 'form', 'autocomplete', 'autofocus', 'hidden', 'disabled', 'max', 'maxlength', 'min', 'onchange', 'onclick', 'placeholder', 'readonly', 'required', 'size', 'step',],
        'number'         => ['name', 'type', 'id', 'value', 'class', 'title', 'form', 'autofocus', 'hidden', 'disabled', 'max', 'maxlength', 'min', 'onchange', 'onclick', 'placeholder', 'readonly', 'required', 'size', 'step',],
        'password'       => ['name', 'type', 'id', 'class', 'title', 'form', 'autocomplete', 'autofocus', 'hidden', 'disabled', 'maxlength', 'onchange', 'onclick', 'pattern', 'placeholder', 'readonly', 'required', 'size',],
        'radio'          => ['name', 'type', 'id', 'value', 'class', 'title', 'form', 'autofocus', 'hidden', 'disabled', 'maxlength', 'onchange', 'onclick', 'readonly', 'required', 'size',],
        'range'          => ['name', 'type', 'id', 'value', 'class', 'title', 'form', 'autocomplete', 'autofocus', 'hidden', 'disabled', 'max', 'maxlength', 'min', 'onchange', 'onclick', 'readonly', 'size', 'step',],
        'reset'          => ['name', 'type', 'id', 'value', 'class', 'title', 'form', 'autofocus', 'hidden', 'disabled', 'maxlength', 'onchange', 'onclick', 'readonly', 'size',],
        'search'         => ['name', 'type', 'id', 'value', 'class', 'title', 'form', 'autocomplete', 'autofocus', 'hidden', 'disabled', 'maxlength', 'onchange', 'onclick', 'pattern', 'placeholder', 'readonly', 'required', 'size',],
        'submit'         => ['name', 'type', 'id', 'value', 'class', 'title', 'form', 'autofocus', 'hidden', 'disabled', 'formaction', 'formenctype', 'formmethod', 'formnovalidate', 'formtarget', 'maxlength', 'onchange', 'onclick', 'readonly', 'size',],
        'tel'            => ['name', 'type', 'id', 'value', 'class', 'title', 'form', 'autocomplete', 'autofocus', 'hidden', 'disabled', 'max', 'maxlength', 'min', 'onchange', 'onclick', 'pattern', 'placeholder', 'readonly', 'required', 'size',],
        'text'           => ['name', 'type', 'id', 'value', 'class', 'title', 'form', 'autocomplete', 'autofocus', 'hidden', 'disabled', 'maxlength', 'onchange', 'onclick', 'pattern', 'placeholder', 'readonly', 'required', 'size',],
        'textarea'       => ['name', 'id', 'value', 'class', 'title', 'form', 'autocomplete', 'autofocus', 'hidden', 'disabled', 'maxlength', 'onchange', 'onclick', 'placeholder', 'readonly', 'required', 'size',],
        'time'           => ['name', 'type', 'id', 'value', 'class', 'title', 'form', 'autofocus', 'hidden', 'disabled', 'max', 'maxlength', 'min', 'onchange', 'onclick', 'placeholder', 'readonly', 'required', 'size', 'step',],
        'url'            => ['name', 'type', 'id', 'value', 'class', 'title', 'form', 'autocomplete', 'autofocus', 'hidden', 'disabled', 'maxlength', 'onchange', 'onclick', 'pattern', 'placeholder', 'readonly', 'required', 'size',],
        'week'           => ['name', 'type', 'id', 'value', 'class', 'title', 'form', 'autocomplete', 'autofocus', 'hidden', 'disabled', 'max', 'maxlength', 'min', 'onchange', 'onclick', 'placeholder', 'readonly', 'required', 'size', 'step',],
        'select'         => ['name', 'id', 'class', 'title', 'form', 'size', 'multiple', 'onchange', 'onclick', 'autofocus', 'hidden', 'disabled', 'required', 'options'],
        'option'         => ['value', 'selected', 'disabled', 'onclick', 'text', 'hidden'],

    ],


    /*
    |--------------------------------------------------------------------------
    | Default Config For Inputs
    |--------------------------------------------------------------------------
    */

    'default' => [
        /* wrap Type Options: null | div | format       */
        'wrap' => [
            /*
            'type'   => 'format',
            'class'  => ['class' => 'form-control'],
            'format' => '<div {class}>{input}</div>',
            */
            /*
            'type'   => 'format',
            'class'  => ['class' => 'form-control', 'labelClass' => 'bold'],
            'format' => '<div {formclass}>{label}</div><div {class}>{input}</div>',
            */

            'type' => null,

        ],

        'class'      => '',
        'errorClass' => '',

        'label' => [
            'include'  => false,
            /*            Above, Below, Left, Right, Tooltip             */
            'position' => 'Above',
            'view'     => 'default',
        ],

        'defaults' => [
            'required'    => true,
            /*            None, Required, Name             */
            'placeholder' => 'name',
        ],

        'text' => [
            'class'      => '',
            'errorClass' => '',

            'label' => [
                'include'  => false,
                /*            Above, Below, Left, Right, Tooltip             */
                'position' => 'Above',
                'view'     => 'default',
            ],

            'defaults' => [
                'required'    => true,
                /*            None, Required, Name             */
                'placeholder' => 'name',
            ],
        ],

    ],
];
