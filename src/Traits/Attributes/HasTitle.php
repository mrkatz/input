<?php


namespace Mrkatz\Input\Traits\Attributes;


use Mrkatz\Input\Input;

trait HasTitle
{
    private $title;

    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getTitle($html = false)
    {
        if ($html) {
            return $this->formatTitle($this->title);
        }
        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return string
     */
    public function formatTitle($title)
    {
        return isset($title) ? "title=\"{$title}\"" : '';
    }

    /**
     * @param mixed $title
     *
     * @return HasTitle
     */
    public function title($title)
    {
        $this->title = $title;

        return $this;
    }
}