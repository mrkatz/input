<?php


namespace Tests;


use Mrkatz\Input\Facades\Input;
use Mrkatz\Input\InputServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    /**
     * Load package service provider
     * @param  \Illuminate\Foundation\Application $app
     * @return InputServiceProvider
     */
    protected function getPackageProviders($app)
    {
        return [InputServiceProvider::class];
    }
    /**
     * Load package alias
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Input' => Input::class,
        ];
    }
}