<?php

namespace Pangolinkeys\Pipe\Tests\Example\Pipes;

use Pangolinkeys\Pipe\Contracts\ProvidesContextPipeline;
use Pangolinkeys\Pipe\Pipeline;

class GetValueFromContext implements ProvidesContextPipeline
{

    /**
     * Get the value from context.
     *
     * @param          $value
     * @param Pipeline $context
     * @return mixed
     */
    function handle($value, $context = null)
    {
        return $context->get('test_example');
    }
}