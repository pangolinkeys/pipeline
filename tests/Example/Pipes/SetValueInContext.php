<?php

namespace Pangolinkeys\Pipe\Tests\Example\Pipes;

use Pangolinkeys\Pipe\Contracts\ProvidesContextPipeline;
use Pangolinkeys\Pipe\Pipeline;

class SetValueInContext implements ProvidesContextPipeline
{
    /**
     * Set the value in context
     *
     * @param          $value
     * @param Pipeline $context
     */
    function handle($value, $context = null)
    {
        $context->put('test_example', $value);
        // Note no return statement.
    }
}