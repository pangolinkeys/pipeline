<?php

namespace Pangolinkeys\Pipe\Tests\Example\Pipes;

use Pangolinkeys\Pipe\Contracts\ProvidesPipeline;

class SubtractBySix implements ProvidesPipeline
{

    /**
     * Process the queue item.
     *
     * @param $value
     * @return mixed
     */
    function handle($value)
    {
        return $value - 6;
    }
}