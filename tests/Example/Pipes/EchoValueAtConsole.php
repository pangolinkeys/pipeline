<?php

namespace Pangolinkeys\Pipe\Tests\Example\Pipes;

use Pangolinkeys\Pipe\Contracts\ProvidesPipeline;

class EchoValueAtConsole implements ProvidesPipeline
{

    /**
     * Process the queue item.
     *
     * @param $value
     * @return mixed
     */
    function handle($value)
    {
        echo $value . PHP_EOL;

        return $value;
    }
}