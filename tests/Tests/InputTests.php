<?php

namespace Tests;

use Carbon\Carbon;
use Illuminate\Support\MessageBag;
use Mrkatz\Collection\HtmlBuilder\Classes\Inputs\date;
use Mrkatz\Collection\HtmlBuilder\Classes\Inputs\text;
use Mrkatz\Collection\HtmlBuilder\Classes\Inputs\textarea;
use Mrkatz\Input\Input;

class InputTests extends TestCase
{
    #region Input Value Tests

    /**
     * @dataProvider types
     * @test
     */
    public function it_can_set_a_value_on_basic_input($type)
    {
        $name  = 'test123';
        $value = 'testValue';
        $stub  = null;

        switch ($type) {
            default:
                $stub = "<input name=\"{$name}\" type=\"{$type}\" value=\"{$value}\" >";
                break;
            case 'submit':
            case 'reset':
                $stub = "<button name=\"{$name}\" type=\"{$type}\" >{$value} </button>";
                break;
            //Password ignores Value
            case 'password':
            case 'image':
                $stub = "<input name=\"{$name}\" type=\"{$type}\" >";
                break;
            case 'textarea':
                $stub = "<textarea name=\"{$name}\" >{$value} </textarea>";
                break;
        }

        /** @var Input $input */
        $input = input()->{$type}($name)->value($value)->html();

        $this->assertEquals($stub, $input);

        /** @var Input $input */
        $input = input()->{$type}($name, $value)->html();

        $this->assertEquals($stub, $input);

        /** @var Input $input */
        $input = input()->{$type}($name, ['value' => $value])->html();

        $this->assertEquals($stub, $input);
    }

    /**
     * @dataProvider dates
     * @test
     */
    public function it_can_set_a_value_on_date_inputs($type)
    {
        $name  = 'test123';
        $value = Carbon::parse('2020-02-25');

        $expected = null;
        $method   = $type;

        switch ($type) {
            case 'date':
                $expected = $value->toDateString();
                break;
            case 'month':
                $expected = $value->format('Y-m');
                break;
            case 'week':
                $expected = $value->format('Y-\WW');
                break;
            case 'time':
                $expected = $value->toTimeString();
                break;
            case 'datetime-local':
                $method   = 'datetime';
                $expected = $value->toDateTimeLocalString();
                break;
        }

        $stub = "<input name=\"{$name}\" type=\"{$type}\" value=\"{$expected}\" >";

        /** @var Input $input */
        $input = input()->{$method}($name)->value($value)->html();

        $this->assertEquals($stub, $input);

        /** @var Input $input */
        $input = input()->{$method}($name, $value)->html();

        $this->assertEquals($stub, $input);

        /** @var Input $input */
        $input = input()->{$method}($name, null, ['value' => $value])->html();

        $this->assertEquals($stub, $input);
    }

    #endregion

    #region Attributes on Inputs
    /**
     * @dataProvider attributes
     * @test
     *
     * @param $attribute
     * @param $value
     * @param $expected
     */
    public function it_can_set_attributes($attribute, $value, $expected)
    {
        $name  = 'test123';
        $types = config('input.slots');

        foreach ($types as $type => $atts) {
            if (!in_array($type, ['option', 'progress', 'meter', 'label'])) {


                if (in_array($attribute, $atts)) {
                    $method = $type;
                    $stub   = null;

                    switch ($type) {
                        default:
                            $stub = "<input name=\"{$name}\" type=\"{$type}\" $expected>";
                            break;
                        case 'textarea':
                            $stub = "<textarea name=\"{$name}\" $expected></textarea>";
                            break;
                        case 'datetime-local':
                            $stub   = "<input name=\"{$name}\" type=\"{$type}\" $expected>";
                            $method = 'datetime';
                            break;
                        case 'button':
                        case 'submit':
                        case 'reset':
                            $stub = "<button name=\"{$name}\" type=\"{$type}\" $expected></button>";
                            break;
                        case 'select':
                            $stub = "<select name=\"{$name}\" $expected></select>";
                            break;

                    }

                    var_dump("{$type} - {$attribute}");

                    if ($type !== 'select') {
                        /** @var Input $input */
                        $input = input()->{$method}($name, [$attribute => $value])->html();

                        $this->assertEquals($stub, $input);
                    }


                    /** @var Input $input */
                    $input = input()->{$method}($name, null, [$attribute => $value])->html();

                    $this->assertEquals($stub, $input);

                    /** @var Input $input */
                    $input = input()->{$method}($name)->$attribute($value)->html();

                    $this->assertEquals($stub, $input);
                }
            }
        }

    }

    /**
     * @test
     */
    public function it_can_generate_select_inputs()
    {
        $name  = '123456';
        $value = 'val1';
        $text  = 'selectMe1';

        //options as $key [$val,[$attributes]]
        $options = [$value => [$text, ['selected' => true]]];
        $stub    = "<select name=\"{$name}\" ><option value=\"{$value}\" selected >{$text} </option> </select>";
        $input   = input()->select($name, $options)->html();
        $this->assertEquals($stub, $input);

        //options as $key [$val,[disabled]]
        $options = [$value => [$text, ['disabled' => true]]];
        $stub    = "<select name=\"{$name}\" ><option value=\"{$value}\" disabled >{$text} </option> </select>";
        $input   = input()->select($name, $options)->html();
        $this->assertEquals($stub, $input);

        //options as $key [$val,[$attributes = false]]
        $options = [$value => [$text, ['selected' => false]]];
        $stub    = "<select name=\"{$name}\" ><option value=\"{$value}\" >{$text} </option> </select>";
        $input   = input()->select($name, $options)->html();
        $this->assertEquals($stub, $input);

        //Options as $key [$val]
        $options = [$value => [$text]];
        $stub    = "<select name=\"{$name}\" ><option value=\"{$value}\" >{$text} </option> </select>";
        $input   = input()->select($name, $options)->html();
        $this->assertEquals($stub, $input);

        //Options as key => val
        $options = [$value => $text];
        $stub    = "<select name=\"{$name}\" ><option value=\"{$value}\" >{$text} </option> </select>";
        $input   = input()->select($name, $options)->html();
        $this->assertEquals($stub, $input);

        //Options as key => val & add Additional Option
        $options = [$value => $text];
        $stub    = "<select name=\"{$name}\" ><option value=\"{$value}\" >{$text} </option><option value=\"hello\" >someone </option> </select>";
        $input   = input()->select($name, $options)->addOption('hello', 'someone')->html();
        $this->assertEquals($stub, $input);

        //Set Value
        $options = [$value => $text];
        $stub    = "<select name=\"{$name}\" ><option value=\"{$value}\" selected >{$text} </option> </select>";
        $input   = input()->select($name, $options)->value($value)->html();
        $this->assertEquals($stub, $input);

        //2 options & value
        $options = [$value => $text, "val-2" => "val-2-label"];
        $stub    = "<select name=\"{$name}\" ><option value=\"{$value}\" selected >{$text} </option><option value=\"val-2\" >val-2-label </option> </select>";
        $input   = input()->select($name, $options)->value($value)->html();
        $this->assertEquals($stub, $input);

        //add Options & Set Value
        $options = [$value => $text];
        $stub    = "<select name=\"{$name}\" ><option value=\"{$value}\" selected >{$text} </option> </select>";
        $input   = input()->select($name)->options($options)->value($value)->html();
        $this->assertEquals($stub, $input);

        //placeholder
        $options = [$value => $text];
        $stub    = "<select name=\"{$name}\" ><option selected disabled hidden >placeholder </option><option value=\"{$value}\" >{$text} </option> </select>";
        $input   = input()->select($name, $options)->placeholder('placeholder')->html();
        $this->assertEquals($stub, $input);

        //multiple selected values
        $options = [$value => $text, "val-2" => "val-2-label"];
        $stub    = "<select name=\"{$name}[]\" multiple ><option value=\"{$value}\" selected >{$text} </option><option value=\"val-2\" selected >val-2-label </option> </select>";
        $input   = input()->select($name, $options)->multiple()->value([$value, "val-2"])->html();
        $this->assertEquals($stub, $input);

        //multiple selected values
        $options = [$value => [$text, ['selected' => true]], "val-2" => ["val-2-label", ['selected' => true]]];
        $stub    = "<select name=\"{$name}[]\" multiple ><option value=\"{$value}\" selected >{$text} </option><option value=\"val-2\" selected >val-2-label </option> </select>";
        $input   = input()->select($name, $options)->multiple()->html();
        $this->assertEquals($stub, $input);
    }

    /**
     * @dataProvider types
     * @test
     */
    public function it_can_wrap_a_input_in_a_div_with_class($type)
    {
        $name  = 'test123';
        $value = 'testValue';
        $stub  = null;

        switch ($type) {
            default:
                $stub = "<input name=\"{$name}\" type=\"{$type}\" value=\"{$value}\" >";
                break;
            case 'submit':
            case 'reset':
                $stub = "<button name=\"{$name}\" type=\"{$type}\" >{$value} </button>";
                break;
            //Password ignores Value
            case 'password':
            case 'image':
                $stub = "<input name=\"{$name}\" type=\"{$type}\" >";
                break;
            case 'textarea':
                $stub = "<textarea name=\"{$name}\" >{$value} </textarea>";
                break;
        }

//wrap type & class
        /** @var Input $input */
        $input = input()->{$type}($name)->value($value)->wrap('div', 'form-control')->html();

        $this->assertEquals("<div class=\"form-control\">{$stub}</div>", $input);

//wrap format
        /** @var Input $input */
        $input = input()->{$type}($name)->value($value)->wrap(null, null, '<div class="form-control">{input}</div>')->html();

        $this->assertEquals("<div class=\"form-control\">{$stub}</div>", $input);

//wrap format & class
        /** @var Input $input */
        $input = input()->{$type}($name)->value($value)->wrap(null, 'form-control', '<div {class}>{input}</div>')->html();

        $this->assertEquals("<div class=\"form-control\">{$stub}</div>", $input);
    }

    /**
     * @dataProvider types
     * @test
     */
    public function it_can_show_a_label($type)
    {
        $name  = 'test123';
        $value = 'testValue';
        $label = 'Input1';
        $stub  = null;
        $id    = 'testID1';

        switch ($type) {
            default:
                $stub    = "<input name=\"{$name}\" type=\"{$type}\" value=\"{$value}\" >";
                $stub_id = "<input name=\"{$name}\" type=\"{$type}\" id=\"{$id}\" value=\"{$value}\" >";
                break;
            case 'submit':
            case 'reset':
                $stub    = "<button name=\"{$name}\" type=\"{$type}\" >{$value} </button>";
                $stub_id = "<button name=\"{$name}\" type=\"{$type}\" id=\"{$id}\" >{$value} </button>";
                break;
            //Password ignores Value
            case 'password':
            case 'image':
                $stub    = "<input name=\"{$name}\" type=\"{$type}\" >";
                $stub_id = "<input name=\"{$name}\" type=\"{$type}\" id=\"{$id}\" >";
                break;
            case 'textarea':
                $stub    = "<textarea name=\"{$name}\" >{$value} </textarea>";
                $stub_id = "<textarea name=\"{$name}\" id=\"{$id}\" >{$value} </textarea>";
                break;
        }

        //Has Default Label - Above
        /** @var Input $input */
        $input = input()->{$type}($name)->value($value)->label(true)->html();

        $this->assertEquals("<label >{$name}</label>{$stub}", $input);

        //Has Label Below
        /** @var Input $input */
        $input = input()->{$type}($name)->value($value)->label(true, 'below')->html();

        $this->assertEquals("{$stub}<label >{$name}</label>", $input);

        //Has Label Below with Name
        /** @var Input $input */
        $input = input()->{$type}($name)->value($value)->label($label, [], 'below')->html();

        $this->assertEquals("{$stub}<label >{$label}</label>", $input);

        //Has Label Below with Name, id/for Set
        /** @var Input $input */
        $input = input()->{$type}($name)->value($value)->id($id)->label($label, [], 'below')->html();

        $this->assertEquals("{$stub_id}<label for=\"{$id}\">{$label}</label>", $input);

        //Has Label inWrap with Name, id/for Set
        /** @var Input $input */
        $input = input()->{$type}($name)->value($value)->id($id)->label($label, [], 'below')->wrap(null, 'form-group', '<div {class}><div>{label}</div><div>{input}</div></div>')->html();

        $this->assertEquals("<div class=\"form-group\"><div><label for=\"{$id}\">{$label}</label></div><div>{$stub_id}</div></div>", $input);

        //wrap type with label set
        $input = input()->text('name', 'value')->wrap('div', 'form-group')->label('My Input', 'top')->html();
        $this->assertEquals('<div class="form-group"><label >My Input</label><input name="name" type="text" value="value" ></div>', $input);
        //wrap type with default label set
        $input = input()->text('name', 'value')->wrap('div', 'form-group')->label('My Input')->html();
        $this->assertEquals('<div class="form-group"><label >My Input</label><input name="name" type="text" value="value" ></div>', $input);
    }

    /**
     * @test
     */
    public function errors_handling()
    {
        /** @var Input $input */
        $input         = input()->text('adam')->class('goodClass')->errorClass(['ErrorClass']);
        $input->errors = new MessageBag();
        $input->errors->add('adam', 'this is an error');

        $error     = "<div class=\"invalid-feedback\">this is an error</div>";
        $inputHtml = "<input name=\"adam\" type=\"text\" class=\"ErrorClass\" >";

        $this->assertEquals("{$inputHtml}{$error}", $input->html());

        $this->assertEquals("{$inputHtml}{$error}", $input->errorClass('ErrorClass')->html());

        $this->assertEquals("{$error}{$inputHtml}", $input->errors('above')->html());

        $this->assertEquals("<div>{$inputHtml}</div><span class=\"span-out\">{$error}</span>",
                            $input->wrap(null, ['span-out'], '<div>{input}</div><span {class}>{error}</span>')->html());

    }

    #endregion
    public function types()
    {
        return [
            ['checkbox'],
            ['color'],
            ['date'],
            //            ['datetime-local'],
            ['email'],
            ['file'],
            ['hidden'],
            ['image'],
            ['month'],
            ['number'],
            ['password'],
            ['radio'],
            ['range'],
            ['reset'],
            ['search'],
            ['submit'],
            ['tel'],
            ['text'],
            ['textarea'],
            ['time'],
            ['url'],
            ['week'],

        ];
    }

    public function dates()
    {
        return [
            ['date'],
            ['datetime-local'],
            ['month'],
            ['time'],
            ['week'],
        ];
    }

    public function attributes()
    {
        return [

            ['id', '1234abcd', 'id="1234abcd" '],

            ['class', 'store something', 'class="store something" '],
            ['class', ['store', 'something'], 'class="store something" '],

            ['title', 'testing this title', 'title="testing this title" '],

            ['form', 'form123', 'form="form123" '],

            ['autofocus', true, 'autofocus '],
            ['autofocus', false, ''],

            ['checked', true, 'checked '],
            ['checked', false, ''],

            ['disabled', true, 'disabled '],
            ['disabled', false, ''],

            ['onchange', 'function()', 'onchange="function()" '],
            ['onclick', "alert('hi there')", 'onclick="alert(\'hi there\')" '],

            ['required', true, 'required '],
            ['required', false, ''],

            ['readonly', true, 'readonly '],
            ['readonly', false, ''],

            ['max', 10, 'max="10" '],
            ['max', '10', 'max="10" '],

            ['min', 10, 'min="10" '],
            ['min', '10', 'min="10" '],

            ['step', 10, 'step="10" '],
            ['step', '10', 'step="10" '],

            ['size', 10, 'size="10" '],
            ['size', '10', 'size="10" '],

            ['maxlength', 10, 'maxlength="10" '],
            ['maxlength', '10', 'maxlength="10" '],

            ['placeholder', 'Hi There', 'placeholder="Hi There" '],

            ['pattern', '[A-Z]', 'pattern="[A-Z]" '],

            ['formaction', '/action_page2', 'formaction="/action_page2" '],

            ['formenctype', 'default', 'formenctype="application/x-www-form-urlencoded" '],
            ['formenctype', 'multipart', 'formenctype="multipart/form-data" '],
            ['formenctype', 'text', 'formenctype="text/plain" '],

            ['formmethod', 'get', 'formmethod="get" '],
            ['formmethod', 'something', 'formmethod="post" '],
            ['formmethod', 'post', 'formmethod="post" '],

            ['formnovalidate', true, 'formnovalidate '],
            ['formnovalidate', false, ''],

            ['formtarget', 'new', 'formtarget="_blank" '],
            ['formtarget', 'parent', 'formtarget="_parent" '],
            ['formtarget', 'default', 'formtarget="_self" '],

            ['src', '/default.jpg', 'src="/default.jpg" '],
            ['alt', 'Some Text Instead', 'alt="Some Text Instead" '],
            ['width', '100px', 'width="100px" '],
            ['height', '100%', 'height="100%" '],
        ];
    }
}
