<?php


namespace Pangolinkeys\Pipe\Contracts;


use Pangolinkeys\Pipe\Pipeline;

interface ProvidesContextPipeline extends ProvidesPipeline
{
    /**
     * @param          $value
     * @param Pipeline $context
     * @return mixed
     */
    function handle($value, $context = null);
}