<?php

namespace Mrkatz\Input\Traits;

use Mrkatz\Input\Input;

trait HasInputHelpers
{
    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function text(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('text', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function number(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('number', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function password(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('password', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function checkbox(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('checkbox', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function color(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('color', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function date(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('date', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function datetime(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('datetime-local', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function email(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('email', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function file(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('file', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function hidden(string $name, $value = null, $attributes = null, $continue = true)
    {
        if (! isset($value) && is_bool($name)) {
            return $this->hiddenA($name);
        }

        return $this->filterInputs('hidden', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function image(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('image', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function month(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('month', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function radio(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('radio', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function range(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('range', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function reset(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('reset', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function search(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('search', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function submit(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('submit', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function button(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('button', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function tel(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('tel', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function textarea(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('textarea', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function time(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('time', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function url(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('url', $name, $value, $attributes, $continue);
    }

    /**
     * @param string $name
     * @param null|string|array $value
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function week(string $name, $value = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('week', $name, $value, $attributes, $continue);
    }

    /**
     * @return Input
     */
    public function csrftoken()
    {
        return $this->filterInputs('hidden', '_token', $this->csrfToken, null, true);
    }

    /**
     * @param string $name
     * @param null|array $options
     * @param null|array|bool $attributes
     * @param bool|null $continue
     *
     * @return Input
     */
    public function select(string $name, $options = null, $attributes = null, $continue = true)
    {
        return $this->filterInputs('select', $name, $options, $attributes, $continue);
    }
}
