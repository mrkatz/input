<?php

if (! function_exists('input')) {
    /**
     * new input
     *
     *
     * @return \Mrkatz\Input\Input
     */
    function input()
    {
        return app('Input');
    }
}
