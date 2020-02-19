<?php


namespace Mrkatz\Input\Traits\Attributes;


use Mrkatz\Input\Input;

trait HasSrc
{
    private $src;

    /**
     * @param bool $html
     *
     * @return mixed
     */
    public function getSrc($html = false)
    {
        if ($html) {
            return $this->formatSrc($this->src);
        }
        return $this->src;
    }

    /**
     * @param mixed $src
     *
     * @return string
     */
    public function formatSrc($src)
    {
        return isset($src) ? "src=\"{$src}\"" : '';
    }

    /**
     * @param string $src
     *
     * @param bool $asset
     *
     * @return Input
     */
    public function src($src, $asset = false)
    {
        if ($asset) {
            $this->src = asset($src);
        } else {
            $this->src = $src;
        }

        return $this->return();
    }
}