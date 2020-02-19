<?php


namespace Mrkatz\Input\Traits\Attributes;

use Mrkatz\Input\Input;

trait HasID
{
    private $id;

    /**
     * @param mixed $id
     *
     * @return Input
     */
    public function id($id)
    {
        $this->id = $id;

        return $this->return();
    }

    public function getFor($html = false)
    {
        if ($html) {
            return $this->formatFor($this->id);
        }
        return $this->getId();
    }

    public function formatFor($id)
    {
        return "for=\"{$id}\"";
    }

    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getId($html = false)
    {
        if ($html) {
            return $this->formatId($this->id);
        }
        return $this->id;
    }

    /**
     * @param $id
     *
     * @return string
     */
    public function formatId($id)
    {
        return isset($id) ? "id=\"{$id}\"" : '';
    }
}